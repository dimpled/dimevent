<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Registration */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Registration',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registrations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="registration-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
