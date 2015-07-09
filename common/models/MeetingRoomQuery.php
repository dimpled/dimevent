<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[MeetingRoom]].
 *
 * @see MeetingRoom
 */
class MeetingRoomQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MeetingRoom[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MeetingRoom|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}