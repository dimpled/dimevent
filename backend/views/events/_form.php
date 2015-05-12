<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use kartik\widgets\SwitchInput;
use dosamigos\tinymce\TinyMce;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<div class="panel">
    <div class="panel-body">  
    <h3 class="title-hero">รายละเอียดงาน</h3>

    <?= $form->field($model, 'ref')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'venue')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'description')->widget(TinyMce::className(), [ 
                'options' => ['rows' => 6], 
                'language' => 'es', 
                'clientOptions' => [ 
                    //'plugins' => [ "advlist autolink lists link charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste" ], 
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image" ] 
            ]);?> 
    </div>
</div>

<div class="panel">
    <div class="panel-body">  
    <h3 class="title-hero">กำหนดการ</h3>
  <div class="row">
           <div class="col-md-6">
            <?= $form->field($model, 'start_date')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Enter event time ...'],
                    'language' => 'th',
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd HH:ii',
                    'showMeridian' => false,
                    'autoclose' => true,
                    'todayBtn' => true
                    ]
            ]); ?>
            </div>  
           <div class="col-md-6">
            <?= $form->field($model, 'end_date')->widget(DateTimePicker::classname(), [
                'options' => ['placeholder' => 'Enter event time ...'],
                 'language' => 'th',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd HH:ii',
                    'showMeridian' => false,
                    'autoclose' => true,
                    'todayBtn' => true
                ]
            ]); ?>
           </div>
    </div>
     <div class="row">
           <div class="col-md-6">
            <?= $form->field($model, 'open_registration')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Enter event time ...'],
                    'language' => 'th',
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd HH:ii',
                    'showMeridian' => false,
                    'autoclose' => true,
                    'todayBtn' => true
                    ]
            ]); ?>
            </div>  
           <div class="col-md-6">
            <?= $form->field($model, 'close_registration')->widget(DateTimePicker::classname(), [
                'options' => ['placeholder' => 'Enter event time ...'],
                 'language' => 'th',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd HH:ii',
                    'showMeridian' => false,
                    'autoclose' => true,
                    'todayBtn' => true
                ]
            ]); ?>
           </div>
    </div>
           </div>
    </div>
<div class="panel">
    <div class="panel-body">  
    <h3 class="title-hero">รายละเอียดงาน</h3>

   <div class="row">
       <div class="col-md-6">
            <?= $form->field($model, 'payment_detail')->widget(TinyMce::className(), [ 
                'options' => ['rows' => 6], 
                'language' => 'es', 
                'clientOptions' => [ 
                    //'plugins' => [ "advlist autolink lists link charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste" ], 
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image" ] 
            ]);?> 
       </div>  
       <div class="col-md-6">
             <?= $form->field($model, 'contact')->widget(TinyMce::className(), [ 
                'options' => ['rows' => 6], 
                'language' => 'es', 
                'clientOptions' => [ 
                    //'plugins' => [ "advlist autolink lists link charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste" ], 
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image" ] 
            ]);?>           
       </div>     
   </div>
    </div>
</div>
<div class="panel">
    <div class="panel-body">  
    <h3 class="title-hero">ไฟล์เอกสาร</h3>

<div class="row">
    <div class="col-md-6 custom-fileinput">
        <?= $form->field($model, 'logo')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                 'initialCaption'=>'',
                 'showCancel'=>false,
                 'showRemove'=>false,
                 'showUpload' => false,
                 'initialPreview'=>$logo['initialPreview'],
                 'initialPreviewConfig'=>$logo['initialPreviewConfig'],
                 'uploadExtraData' => [
                            'ref' => $model->ref,
                            'event_id'=>$model->id
                 ],
            ]
        ]); ?>
    </div>
    <div class="col-md-6 custom-fileinput">
        <?= $form->field($model, 'poster')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
             'pluginOptions' => [
                 'showUpload' => false,
                 'showRemove'=>false,
                  'initialPreview'=>$poster['initialPreview'],
                 'initialPreviewConfig'=>$poster['initialPreviewConfig'],
                 'uploadExtraData' => [
                            'ref' => $model->ref,
                            'event_id'=>$model->id
                 ],
            ]
        ]); ?>
    </div>      
</div>

   <div class="form-group field-upload_files custom-fileinput2">
      <label class="control-label" for="upload_ajax"> เอกสารเพิ่มเติม </label>
    <div>
    <?= FileInput::widget([
                   'name' => 'upload_ajax[]',
                   'options' => ['multiple' => true], //'accept' => 'image/*' หากต้องเฉพาะ image
                    'pluginOptions' => [
                        //'allowedFileExtensions'=>['pdf','doc','docx','xls','xlsx','png','jpeg','jpg'],
                        'overwriteInitial'=>false,
                        'initialPreviewShowDelete'=>true,
                        'initialPreview'=> $attachFile['initialPreview'],
                        'initialPreviewConfig'=> $attachFile['initialPreviewConfig'],
                        'uploadUrl' => Url::to(['/events/upload-ajax']),
                        'uploadExtraData' => [
                            'ref' => $model->ref,
                        ],
                        'maxFileCount' => 10
                    ]
                ]);
    ?>
    </div>
    </div>

    </div>
</div>


   <div class="panel">
    <div class="panel-body">  
    <h3 class="title-hero">ตั้งค่า</h3>
    <div class="row">
        <div class="col-md-4">
         <?= $form->field($model, 'open')->widget(SwitchInput::classname(), []);?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'open_auto')->widget(SwitchInput::classname(), []);?>
        </div>
        <div class="col-md-4">
             <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
                'pluginOptions'=>[
                    'onText'=>'Active',
                    'offText'=>'Inactive'
            ]]);?>
        </div>
    </div>
      </div>
</div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-success'.' btn-lg btn-block ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
