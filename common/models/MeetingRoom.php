<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "meeting_room".
 *
 * @property integer $id
 * @property string $room_name
 * @property string $status
 */
class MeetingRoom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meeting_room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['room_name','required'],
            [['status'], 'string'],
            [['room_name'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_name' => 'Room Name',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MeetingRoomQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MeetingRoomQuery(get_called_class());
    }
}
