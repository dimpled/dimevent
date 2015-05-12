<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
// Yii::$app->urlManagerFrontend->createAbsoluteUrl('site/index');
?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div id="page-title">
    <h2><?= Html::encode($this->title) ?></h2>
    
    </div>
<div class="panel">
<div class="panel-body">

        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Create Events', ['create'], ['class' => 'btn btn-success']) ?>

</div>
<?php Pjax::begin(); ?>
<div class="table-responsive">
    <?= GridView::widget([
        'id'=>'events-gridveiw',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summaryOptions'=>[
            'class'=>'grid-summary'
        ],
        'tableOptions' => [
            'class' => 'table table-striped',
         ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            //'venue',
            //'start_date',
            //'end_date',
            // 'poster',
            // 'logo',
            // 'open_registration',
            // 'close_registration',
            // 'create_date',
            // 'update_date',
            // 'payment_detail:ntext',
            // 'contact:ntext',
            // 'open',
            // 'open_auto',
            // 'status',
            // 'user_id',
            ['attribute'=>'open','format'=>'raw','value'=>function($model, $key, $index, $column){
                return Html::a($model->open==1?'<i class="glyphicon glyphicon-ok-circle"></i> Open':'<i class="glyphicon glyphicon-ban-circle"></i> Close',['events/index'],[
                        'class'=>'btn btn-sm btn-update-field btn-block '.($model->open == 1?'btn-primary':'btn-default'),
                        'data'=>[
                            'url'=>Url::to(['events/update-field']),
                            'pk'=>$model->id,
                            'value'=>$model->open==1?0:1,
                            'field'=>'open'
                        ]
                ]);
            },'filter'=>['1'=>'Open','0'=>'Close'],'options'=>['style'=>'width:50px;']],

            ['attribute'=>'status','format'=>'raw','value'=>function($model, $key, $index, $column){
                return Html::a($model->status==1?'<i class="glyphicon glyphicon-ok-circle"></i> Active':'<i class="glyphicon glyphicon-ban-circle"></i> Inactive',['events/index'],[
                        'class'=>'btn btn-sm btn-update-field btn-block '.($model->status == 1?'btn-primary':'btn-default'),
                        'data'=>[
                            'url'=>Url::to(['events/update-field']),
                            'pk'=>$model->id,
                            'value'=>$model->status==1?0:1,
                            'field'=>'status'
                        ]
                ]);
            },'filter'=>['1'=>'Active','0'=>'Inactive'],'options'=>['style'=>'width:50px;']],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Actions',
                'options'=>[
                    'style'=>'width:150px;'
                ],
                'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="...">{statistic}{view}{update}{delete}</div>',
                'buttons'=>[
                    'statistic'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-signal"></i>',$url,['class'=>'btn btn-default']);
                    }, 
                    'view'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-eye-open"></i>',$url,['class'=>'btn btn-default']);
                    }, 
                    'update'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>',$url,['class'=>'btn btn-default']);
                    },
                    'delete'=>function($url,$model,$key){
                         return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url,[
                                'title' => Yii::t('yii', 'Delete'),
                                'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                                'class'=>'btn btn-default'
                                ]);
                    }
                ]
            ],
        ],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>

</div>
