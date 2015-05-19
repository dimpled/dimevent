<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Registration */

$this->title = 'Registration#'.$model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registrations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-view">

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="modal-body">
        <?= DetailView::widget([
	    'model' => $model,
	    'attributes' => [
		'id',
		'title',
		'fist_name',
		'last_name',
		'email:email',
		'register_date',
		'cell_phone',
		'sex',
		'position',
		'level',
		'personal_id',
		'age',
		'office',
		'occupation',
	    ],
	]) ?>
    </div>
</div>
