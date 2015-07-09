<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\MeetingRoom */

$this->title = 'Create Meeting Room';
$this->params['breadcrumbs'][] = ['label' => 'Meeting Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meeting-room-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php  Pjax::begin(['id'=>'MeetingRoom-grid-pjax']);?>
	<div class="modal-body">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'room_name',
            'status',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
  <?php Pjax::end();?>
</div>
