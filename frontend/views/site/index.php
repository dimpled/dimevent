<?php
use yii\widgets\ListView;
use yii\bootstrap\ButtonGroup;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>

<div style="padding:20px;">
<?php Pjax::begin(['id'=>'event-form-search']); ?>
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
<?php Pjax::end(); ?>
</div>

<div id="event-list-style" class="text-right">
     <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary">
        <input type="radio" name="options" id="option2" autocomplete="off"> <i class="glyphicon glyphicon-th-large"></i>
      </label>
      <label class="btn btn-primary">
        <input type="radio" name="options" id="option3" autocomplete="off"> <i class="glyphicon glyphicon-th-list"></i>
      </label>
    </div>
</div>


<?php Pjax::begin(['id'=>'event-pajax']); ?>
<?php
echo ListView::widget( [
    'dataProvider' => $dataProvider,
    'itemView' => '_item',
    'itemOptions'=>['tag'=>'li'],
    'layout' => "{summary}<ul id=\"event-listView\" class=\"cd-gallery-items cd-container\">\n{items}</ul>\n{pager}"
] ); 
?>
   <?php Pjax::end(); ?>
   

<?php
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#event-form-search").on("pjax:end", function() {
            console.log("xxx");
            $.pjax.reload({container:"#event-pajax"});  //Reload GridView
        });
    });'
);
?>

