<?php
use yii\helpers\Url;
?>
<a href="<?=Url::to(['/site/event-detail','id'=>$model->id]);?>" >
<!-- 	<h4 >
		<i style="color:green;" class="glyphicon glyphicon-record"></i>  <?=$model->title; ?>
	</h4>
	<p class="item-time" ><i class="glyphicon glyphicon-time"></i> <i><?=Yii::$app->formatter->asDateTime($model->start_date,'medium');?></i></p>
	<p class="item-time" ><i class="glyphicon glyphicon-map-marker"></i> <i><?=$model->venue;?></i></p>
	<p class="item-veniue"></p> -->

	 <img  src="images/thumb.jpg" data-holder-rendered="true" style="height:200px;width: 100%; display: block;">
          <div class="caption">
            <h3 id="thumbnail-label"><?=$model->title; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
           <p class="item-time" ><i class="glyphicon glyphicon-time"></i> <i><?=Yii::$app->formatter->asDateTime($model->start_date,'medium');?></i></p>
	<p class="item-time" ><i class="glyphicon glyphicon-map-marker"></i> <i><?=$model->venue;?></i></p>
          </div>
</a>
 