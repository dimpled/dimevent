<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use ebe\markdown\Markdown;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schedules';
$this->params['breadcrumbs'][] = $this->title;
$parser = new \cebe\markdown\Markdown();
echo $parser->parse("#Title
- test `DIXON`

**test**

php
echo 'sss';
```

> satit seethapon

    ");
?>
<div class="schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php Modal::begin([
            'id'=>'modal-Schedule',
             'toggleButton' => [
                    'label' => '<i class="glyphicon glyphicon-plus"></i> เพิ่มกำหนดการ',
                    'class'=>'btn btn-success',
                    'data-url'=>Url::to(['create'])
            ]
        ]);
        Modal::end(); ?>
    </p>
    <?php  Pjax::begin(['id'=>'Schedule-grid-pjax']);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header'=>'วันที่',
                'value'=>function($model){
                    return $model->start_date.' - '.$model->end_date;
                }
            ],
            //'start_date',
            //'end_date',
           // 'topic',
            [
                'attribute'=>'topic',
                'format'=>'html',
                'value'=>function($model){
                    $m = new cebe\markdown\Markdown();
                    return $m->parse($model->topic);
                }

            ],
            // 'status',
            // 'room_id',
            // 'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php  Pjax::end();?>

</div>
  <?= Html::button('Create Meeting Room', ['id'=>'btn-MeetingRoom','class' => 'btn btn-success','data-url'=>Url::to(['/meeting-room/create'])]) ?>
 <?php Modal::begin(['id'=>'modal-MeetingRoom']);
       Modal::end(); ?>

<?php $this->registerJs("

    // event on click  button
    $('body').on('click', 'button[data-target=\"#modal-Schedule\"]', function(e){
        $('#modal-Schedule')
        .find('.modal-content')
        .load($(this).attr('data-url'));
    });

    $('body').on('click', '#btn-MeetingRoom', function(e){
        $('#modal-MeetingRoom').modal('show')
        .find('.modal-content')
        .load($(this).attr('data-url'));
    });

");
?>
