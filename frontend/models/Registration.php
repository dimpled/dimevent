<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "registration".
 *
 * @property integer $id
 * @property string $title
 * @property string $fist_name
 * @property string $last_name
 * @property string $email
 * @property string $register_date
 * @property string $cell_phone
 * @property string $sex
 * @property string $position
 * @property string $level
 * @property string $personal_id
 * @property integer $age
 * @property string $office
 * @property string $occupation
 */
class Registration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['province_code','title','fist_name','last_name','office','position','personal_type','sex','age','email','occupation','cell_phone'],'required'],
            [['register_date'], 'safe'],
            [['sex'], 'string'],
            [['age','personal_type','employee_id'], 'integer'],
            [['title', 'level'], 'string', 'max' => 100],
            [['province_code'], 'string', 'max' => 2],
            [['department_id'], 'string', 'max' => 6],
            [['fist_name', 'last_name', 'position'], 'string', 'max' => 255],
            [['email', 'occupation','department'], 'string', 'max' => 150],
            [['cell_phone', 'personal_id', 'office'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'personal_type'=>Yii::t('app', 'เป็นบุคลากร'),
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'คำนำหน้า'),
            'fist_name' => Yii::t('app', 'ชื่อ'),
            'last_name' => Yii::t('app', 'นามสกุล'),
            'email' => Yii::t('app', 'อีเมล์'),
            'register_date' => Yii::t('app', 'วันที่เวลาลงทะเบียน'),
            'cell_phone' => Yii::t('app', 'โทรศัพท์มือถือ'),
            'sex' => Yii::t('app', 'เพศ '),
            'position' => Yii::t('app', 'ตำแหน่ง'),
            'level' => Yii::t('app', 'ระดับ'),
            'personal_id' => Yii::t('app', 'เลขที่ใบประกอบวิชาชีพ'),
            'age' => Yii::t('app', 'อายุ'),
            'department'=>Yii::t('app', 'แผนก'),
            'office' => Yii::t('app', 'หน่วยงาน'),
            'self_office' => Yii::t('app', 'หน่วยงาน'),
            'department_id' => Yii::t('app', 'แผนก'),            
            'occupation' => Yii::t('app', 'อาชีพ'),
            'occupation_other'=>Yii::t('app', 'อาชีพอื่นๆ'),
            'province_code'=>Yii::t('app', 'จังหวัด'),
            'fullName'=>Yii::t('app', 'ชื่อ-นามสกุล'),
        ];
    }

    public function getFullName(){
        return $this->title.$this->fist_name.' '.$this->last_name;
    }

    public function getDepartment(){
        return @$this->hasOne(department::className(),['code'=>'self_office']);
    }
    
    public function getDepartmentName(){
        return @$this->department->name;
    }
}
