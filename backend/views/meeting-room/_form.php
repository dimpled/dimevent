<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\MeetingRoom */
/* @var $form yii\widgets\ActiveForm */
?>
<?php  Pjax::begin(['id'=>'MeetingRoom-form-pjax']);?>
<div class="meeting-room-form">

     <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ],'id'=>'form-'.$model->formName()]); ?>
     <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">ห้องประชุม</h4>
    </div>
    <div class="modal-body">
    <div class="row">
    	<div class="col-md-8"><?= $form->field($model, 'room_name')->textInput(['maxlength' => true]) ?></div>
    	<div class="col-md-4"> <?= $form->field($model, 'status')->dropDownList([ '0', '1', ], ['prompt' => '']) ?></div>
    </div>

 	</div>
    <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
 <?php Pjax::end();?>
<?php
$this->registerJs("

  $('#MeetingRoom-form-pjax').on('pjax:end', function() {
      $.pjax.reload({container:'#MeetingRoom-grid-pjax'});
  });

");
?>