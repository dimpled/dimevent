<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Events */

$this->title = 'Create Events';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-header">
   <h2><i class="glyphicon glyphicon-link"></i> <?= Html::encode($this->title) ?></h2>
</div>
<div class="events-create">
    <?= $this->render('_form', [
        'model' => $model,
        'logo'=>$logo,
        'poster'=> $poster,
        'attachFile' => $attachFile
    ]) ?>
</div>
