<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "career".
 *
 * @property integer $seq
 * @property string $name
 */
class Career extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'career';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'seq' => Yii::t('app', 'Seq'),
            'name' => Yii::t('app', 'Name'),
        ];
    }
}
