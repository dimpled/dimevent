<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use frontend\models\Career;
use common\lib\sdii\components\helpers\SDNoty;
use common\models\Office;
use common\models\Province;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Registration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registration-form">

    <?php $form = ActiveForm::begin(['id'=>$model->formName()]); ?>
	<div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title" id="itemModalLabel">ลงทะเบียนเข้าร่วมประชม</h4>
	</div>

	<div class="modal-body">
		

		<div class="row">
			<div class="col-md-12">
				<?= $form->field($model, 'personal_type')->inline()->radioList([ 1 => 'รพ.ขอนแก่น', 2 => 'ภายนอก', ]) ?>
			</div>
			
		</div>

		<div id="form-regis">

		<div class="panel panel-default">
   		<div class="panel-heading">
    		กรอกรายละเอียด
  		</div>
  		<div class="panel-body">

		<div class="row">
			<div class="col-md-2"><?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?></div>
			<div class="col-md-5 col-xs-6"><?= $form->field($model, 'fist_name')->textInput(['maxlength' => 255]) ?></div>
			<div class="col-md-5 col-xs-6"><?= $form->field($model, 'last_name')->textInput(['maxlength' => 255]) ?></div>
		</div>
		

		<div class="row">
			
			<div class="col-md-4">
				<?= $form->field($model, 'email')->textInput(['maxlength' => 150]) ?>
			</div>
			<div class="col-md-4 col-xs-6">
				<?= $form->field($model, 'cell_phone')->textInput(['maxlength' => 50]) ?>
			</div>

			<div class="col-md-2 col-xs-6">
				<?= $form->field($model, 'age')->textInput() ?>
			</div>
			<div class="col-md-2">
				<?= $form->field($model, 'sex')->inline()->radioList([ 1 => 'ชาย', 2 => 'หญิง', ], ['prompt' => '']) ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8">
				<?= $form->field($model, 'occupation')->dropDownList(ArrayHelper::map(Career::find()->all(),'seq','name'),['prompt'=>'เลือกอาชีพ']) ?>
			</div>
			<div class="col-md-4">
				<?= $form->field($model, 'occupation_other')->textInput(['maxlength' => 150,'disabled'=>'false']) ?>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4 col-xs-9">
			<?= $form->field($model, 'position')->textInput(['maxlength' => 255]) ?>
			</div>
			<div class="col-md-4 col-xs-3">
			<?= $form->field($model, 'level')->textInput(['maxlength' => 100]) ?>
			</div>
			<div class="col-md-4">
			<?= $form->field($model, 'personal_id')->textInput(['maxlength' => 50]) ?>
			</div>
		</div>

		</div>
		</div>

		<div class="panel panel-default">
   		<div class="panel-heading">
    		กรอกรายละเอียด
  		</div>
  		<div class="panel-body">

		<div class="row">
			<div class="col-md-6">
			<?= $form->field($model, 'department')->textInput(['maxlength' => 150]) ?>
			</div>
			<div class="col-md-6">
			<?= $form->field($model, 'office')->textInput(['maxlength' => 50]) ?>
			<?= $form->field($model, 'self_office')->widget(Select2::classname(), [
		        'language' => 'th',
		        'data' => ArrayHelper::merge(ArrayHelper::map(Office::find()->all(),'ref','name'),['99999'=>'อื่นๆ']),
		        'options' => ['placeholder' => 'เลือกหน่วยงาน ...'],
		        'pluginOptions' => [
		            'allowClear' => true
		        ],
		    ]);
		    ?>
			</div>
		</div>

		<?= $form->field($model, 'province_code')->widget(Select2::classname(), [
	        'language' => 'th',
	        'data' => ArrayHelper::map(Province::find()->all(),'PROVINCE_ID','PROVINCE_NAME'),
	        'options' => ['placeholder' => 'เลือกจังหวัด ...'],
	        'pluginOptions' => [
	            'allowClear' => true
	        ],
	    ]);
	    ?>
	    </div>
		</div>

		</div>

	</div>
	<div class="modal-footer">
	    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', ' ลงทะเบียน ') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
	</div>

    <?php ActiveForm::end(); ?>

</div>

<?php  $this->registerJs("

setPersonalType($('input[name=\"Registration[personal_type]:checked').val());

$('form#{$model->formName()}').on('change', 'input[name=\"Registration[personal_type]\"]', function(e){
	setPersonalType($(this).val());

});

function setPersonalType(value){
	if(value=='1'){
		//$('#form-regis').hide();
		$('div.form-group.field-registration-self_office').show();
		$('div.form-group.field-registration-office').hide();
	}else{
		//$('#form-regis').show();
		$('div.form-group.field-registration-self_office').hide();
		$('div.form-group.field-registration-office').show();
	}
}


$('form#{$model->formName()}').on('change', '#registration-occupation', function(e){

	if($(this).val()==12){
		$('#registration-occupation_other').prop('disabled',false);
	}else{
		$('#registration-occupation_other').val('');
		$('#registration-occupation_other').prop('disabled',true);
	}
});

$('form#{$model->formName()}').on('beforeSubmit', function(e){
    var \$form = $(this);
    $.post(
	\$form.attr('action'), //serialize Yii2 form
	\$form.serialize()
    ).done(function(result){
	if(result.status == 'success'){
	   $(\$form).get(0).reset();
	   $(\$form).trigger('reset');
	   $('#modal-registration').modal('hide');
	    alert('ลงทะเบียนเสร็จเรียบร้อย');
	} else{
	   
	} 
    }).fail(function(){
	console.log('server error');
    });
    return false;
});

");?>