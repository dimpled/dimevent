<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uploads".
 *
 * @property integer $id
 * @property string $file_name
 * @property string $realfile_name
 * @property string $ref
 * @property string $create_date
 * @property string $type
 */
class Uploads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uploads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_date'], 'safe'],
            [['type'], 'string'],
            [['file_name', 'realfile_name'], 'string', 'max' => 255],
            [['ref'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'file_name' => 'ชื่อไฟล์',
            'realfile_name' => 'ชื่อไฟล์ที่เก็บจริง',
            'ref' => 'หมายเลข referent',
            'create_date' => 'สร้างวันที่',
            'type' => 'Type',
        ];
    }
}
