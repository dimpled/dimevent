<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use common\lib\sdii\widgets\SDGridView;
use common\lib\sdii\widgets\SDModalForm;
use common\lib\sdii\components\helpers\SDNoty;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RegistrationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Registrations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="padding-top: 10px;">
	<span class="label label-primary">Notice</span>
	<?= Yii::t('app', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.') ?>
    </p>

    <?php  Pjax::begin(['id'=>'registration-grid-pjax']);?>
    <?= SDGridView::widget([
	'id' => 'registration-grid',
	'panelBtn' => Html::button(Yii::t('app', '<span class="glyphicon glyphicon-plus"></span>'), ['data-url'=>Url::to(['registration/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-registration']),
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'fist_name',
            'last_name',
            'email:email',
            // 'register_date',
            // 'cell_phone',
            // 'sex',
            // 'position',
            // 'level',
            // 'personal_id',
            // 'age',
            // 'office',
            // 'occupation',

            ['class' => 'common\lib\sdii\widgets\SDActionColumn'],
        ],
    ]); ?>
    <?php  Pjax::end();?>

</div>

<?=  SDModalForm::widget([
    'id' => 'modal-registration',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#registration-grid-pjax').on('click', '#modal-addbtn-registration', function(){
modalRegistration($(this).attr('data-url'));
});

$('#registration-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalRegistration('".Url::to(['registration/update', 'id'=>''])."'+id);
});	

$('#registration-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action == 'view'){
	modalRegistration(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function(){
	    $.post(
		url
	    ).done(function(result){
		if(result.status == 'success'){
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#registration-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }).fail(function(){
		console.log('server error');
	    });
	})
    }
    return false;
});
	
function modalRegistration(url) {
    $('#modal-registration .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-registration').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>