<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Events */

$this->title = $model->title;

$this->params['breadcrumbs'][] = $this->title;


?>

<!-- <div class="page-header">
   <h2><i class="glyphicon glyphicon-link"></i> <?= Html::encode($this->title) ?></h2>
</div> -->
<div class="panel events-view">
<div class="panel-body">
<!-- <h3 class="title-hero">รายละเอียดงาน</h3> -->




    <?= $model->getImageLogo(); ?>

<div class="page-header">
  <h2><?= Html::encode($this->title) ?> </h2>
</div>
<blockquote>

  <p> <?=Yii::$app->formatter->asDateTime($model->start_date,'medium') ?> - 
 <?=Yii::$app->formatter->asDate($model->end_date,'medium') ?></p>
<footer> <strong>สถานที่ </strong>: <?=$model->venue?></footer>
<footer> <strong>เปิดลงทะเบียน </strong>: <?=Yii::$app->formatter->asDateTime($model->open_registration,'medium') ?> - 
 <?=Yii::$app->formatter->asDateTime($model->close_registration,'medium') ?></footer>
</blockquote>


 <p><?=$model->venue?></p>
<?= $model->description; ?>
 
   
</div>
</div>

 <div class="row">
      <div class="col-md-6">
          <div class="panel">
            <div class="panel-body" style="min-height:150px;">
            <h3 class="title-hero">การติดต่อ</h3>
            <?= $model->contact; ?>
            </div>
          </div>
      </div>
      <div class="col-md-6">
          <div class="panel">
            <div class="panel-body" style="min-height:150px;">
            <h3 class="title-hero">การชำระเงิน</h3>
            <?= $model->payment_detail; ?>
            </div>
          </div>
      </div>
  </div>

   <div class="panel">
            <div class="panel-body">
            <h3 class="title-hero">การตั้งค่า</h3>
           <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'title',
            //'description:ntext',
            //'venue',
            'start_date',
            'end_date',
            // 'poster',
            // 'logo',
            'open_registration:dateTime',
            'close_registration:dateTime',
            

        ],
    ]) ?>


            </div>
    </div>
   <div class="panel">
            <div class="panel-body">
            <h3 class="title-hero">โปสเตอร์</h3>
                <?= $model->getImagePoster(false); ?>
            </div>
    </div>