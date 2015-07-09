<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property integer $id
 * @property string $start_date
 * @property string $end_date
 * @property string $topic
 * @property string $status
 * @property integer $room_id
 * @property string $type
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date'], 'safe'],
            [['status', 'type'], 'string'],
            [['room_id'], 'integer'],
            [['topic'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส schedule',
            'start_date' => 'เวลาเริ่ม',
            'end_date' => 'เวลาสิ้นสุด',
            'topic' => 'ชื่อเรื่อง',
            'status' => 'สถานะ',
            'room_id' => 'ห้องประชุม',
            'type' => 'Type',
        ];
    }

    /**
     * @inheritdoc
     * @return ScheduleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ScheduleQuery(get_called_class());
    }
}
