<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Events */

$this->title =  $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="events-update">
<div class="page-header">
   <h2><i class="glyphicon glyphicon-link"></i> <?= Html::encode($this->title) ?></h2>
</div>
   

    <?= $this->render('_form', [
        'model' => $model,
          'logo'=>$logo,
          'poster'=>$poster,
          'attachFile' => $attachFile
    ]) ?>

</div>
