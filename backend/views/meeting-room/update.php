<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MeetingRoom */

$this->title = 'Update Meeting Room: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Meeting Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meeting-room-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
