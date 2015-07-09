<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RegistrationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Registrations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Registration'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'personal_type',
                'filter'=>[1=>'ภายใน',2=>'ภายนอก'],
                'value'=>function($model){
                    return $model->personal_type==1?'ภายใน':'ภายนอก';
                }
            ],
            'fullName',
            // 'title',
            // 'fist_name',
            // 'last_name',
            'email:email',
            // 'register_date',
            'cell_phone',
            // 'sex',
            // 'position',
            // 'level',
             'personal_id',
            // 'age',
             'department',
            // 'self_department',
             'office',
            // 'self_office',
            // 'occupation',
            // 'personal_type',
            // 'occupation_other',
            // 'province_code',
            // 'department_id',
            // 'employee_id',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
