<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\lib\sdii\components\helpers\SDNoty;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">

    <?= "<?php " ?>$form = ActiveForm::begin(['id'=>$model->formName()]); ?>
	<div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title" id="itemModalLabel"><?= Inflector::camel2words(StringHelper::basename($generator->modelClass)) ?></h4>
	</div>

	<div class="modal-body">
<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "\t\t<?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
    }
} ?>
	</div>
	<div class="modal-footer">
	    <?= "<?= " ?>Html::submitButton($model->isNewRecord ? <?= $generator->generateString('Create') ?> : <?= $generator->generateString('Update') ?>, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    <?= "<?= " ?>Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
	</div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>

<?= "<?php " ?> $this->registerJs("
$('form#{$model->formName()}').on('beforeSubmit', function(e){
    var \$form = $(this);
    $.post(
	\$form.attr('action'), //serialize Yii2 form
	\$form.serialize()
    ).done(function(result){
	if(result.status == 'success'){
	    ". SDNoty::show('result.message', 'result.status') ."
	    if(result.action == 'create'){
		$(\$form).trigger('reset');
		$.pjax.reload({container:'#<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-grid-pjax'});
	    } else if(result.action == 'update'){
		$(document).find('#modal-<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>').modal('hide');
		$.pjax.reload({container:'#<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-grid-pjax'});
	    }
	} else{
	    ". SDNoty::show('result.message', 'result.status') ."
	} 
    }).fail(function(){
	console.log('server error');
    });
    return false;
});

");?>