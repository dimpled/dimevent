<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lib_office".
 *
 * @property string $ref
 * @property string $name
 */
class Office extends \yii\db\ActiveRecord
{
    public static function primaryKey(){
        return ['ref'];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_office';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 125]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => 'Ref',
            'name' => 'Name',
        ];
    }
}
