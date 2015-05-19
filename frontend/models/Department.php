<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property string $code
 * @property string $name
 */
class Department extends \yii\db\ActiveRecord {

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }
    
    public static function primaryKey() {
        return ['code'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['code'], 'required'],
            [['code'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

}
