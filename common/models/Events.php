<?php

namespace common\models;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Json;
/**
 * This is the model class for table "events".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $venue
 * @property string $start_date
 * @property string $end_date
 * @property string $poster
 * @property string $logo
 * @property string $open_registration
 * @property string $close_registration
 * @property string $create_date
 * @property string $update_date
 * @property string $payment_detail
 * @property string $contact
 * @property integer $open
 * @property integer $open_auto
 * @property integer $status
 * @property integer $register_limit
 * @property integer $user_id
 * @property string $ref
 */
class Events extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_date',
                'updatedAtAttribute' => 'update_date',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'payment_detail', 'contact'], 'string'],
            [['start_date', 'end_date', 'open_registration', 'close_registration', 'create_date', 'update_date'], 'safe'],
            [['open', 'open_auto', 'status', 'register_limit', 'user_id'], 'integer'],
            [['title', 'venue', 'poster'], 'string', 'max' => 255],
            [['ref'], 'string', 'max' => 100],
            [['logo'],'file','maxFiles'=>1],
            [['poster'],'file','maxFiles'=>1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'ชื่องาน',
            'description' => 'รายละเอียด',
            'venue' => 'สถานที่',
            'start_date' => 'วันที่เริ่มงาน',
            'end_date' => 'วันที่สิ้นสุด',
            'poster' => 'ไฟล์โปสเตอร์',
            'logo' => 'ไฟล์โลโก้งาน',
            'open_registration' => 'วันที่เปิดให้ลงทะเบียน',
            'close_registration' => 'วันที่ปิดให้ลงทะเบียน',
            'create_date' => 'สร้างวันที่',
            'update_date' => 'แก้ไขวันที่',
            'payment_detail' => 'รายละเอียดการชำระเงิน',
            'contact' => 'รายละเอียดการติดต่อ',
            'open' => 'เปิดให้ลงทะเบียน',
            'open_auto' => 'เปิดลงทะเบียนอัตโนมัติ',
            'status' => 'สถานะ',
            'register_limit' => 'จำนวนที่เปิดให้ลงทะเบียน',
            'user_id' => 'ผู้บันทึก',
            'ref' => 'referent สำหรับ อัพโหลด',
        ];
    }

    private function getNameFromJson($field){
        return  key(Json::decode($this->{$field}));
    }

    private function getImageUrl($thumbnail=false){
        if(Yii::$app->id =='app-frontend'){
            $baseUrl = Yii::$app->urlManagerBackend->getBaseUrl();
        }else{
            $baseUrl = Url::base(true);
        }
        return $baseUrl.'/event_files/'.$this->ref.'/'.($thumbnail===false?null:'thumbnail/');
    }

    public function getLogo($thumbnail=true){
        return $this->logo?$this->getImageUrl($thumbnail).$this->getNameFromJson('logo'):null;
    }

    public function getPoster($thumbnail=true){
        return $this->poster?$this->getImageUrl($thumbnail).$this->getNameFromJson('poster'):null;
    }

    public function getImageLogo($thumbnail=true){
        return Html::img($this->getLogo($thumbnail));
    }

    public function getImagePoster($thumbnail=true){
        return Html::img($this->getPoster($thumbnail),['class'=>'img-thumbnail']);
    }

}
