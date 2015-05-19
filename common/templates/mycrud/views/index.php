<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use <?= $generator->indexWidgetType === 'grid' ? "common\lib\sdii\widgets\SDGridView" : "yii\\widgets\\ListView" ?>;
use common\lib\sdii\widgets\SDModalForm;
use common\lib\sdii\components\helpers\SDNoty;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">

    <div class="sdbox-header">
	<h3><?= "<?= " ?> Html::encode($this->title) ?></h3>
    </div>
<?php if(!empty($generator->searchModelClass)): ?>
<?= "    <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
<?php endif; ?>

    <p style="padding-top: 10px;">
	<span class="label label-primary">Notice</span>
	<?= "<?= " ?>Yii::t('app', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.') ?>
    </p>

<?php if ($generator->indexWidgetType === 'grid'): ?>
    <?= "<?php " ?> Pjax::begin(['id'=>'<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-grid-pjax']);?>
    <?= "<?= " ?>SDGridView::widget([
	'id' => '<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-grid',
	'panelBtn' => Html::button(Yii::t('app', '<span class="glyphicon glyphicon-plus"></span>'), ['data-url'=>Url::to(['<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>']),
        'dataProvider' => $dataProvider,
        <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n        'columns' => [\n" : "'columns' => [\n"; ?>
            ['class' => 'yii\grid\SerialColumn'],

<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "            '" . $name . "',\n";
        } else {
            echo "            // '" . $name . "',\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if (++$count < 6) {
            echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        } else {
            echo "            // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }
    }
}
?>

            ['class' => 'common\lib\sdii\widgets\SDActionColumn'],
        ],
    ]); ?>
    <?= "<?php " ?> Pjax::end();?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>

</div>

<?= "<?= " ?> SDModalForm::widget([
    'id' => 'modal-<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>',
    'size'=>'modal-lg',
]);
?>

<?= "<?php " ?> $this->registerJs("
$('#<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-grid-pjax').on('click', '#modal-addbtn-<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>', function(){
modal<?= Inflector::classify(StringHelper::basename($generator->modelClass)) ?>($(this).attr('data-url'));
});

$('#<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modal<?= Inflector::classify(StringHelper::basename($generator->modelClass)) ?>('".Url::to(['<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>/update', 'id'=>''])."'+id);
});	

$('#<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action == 'view'){
	modal<?= Inflector::classify(StringHelper::basename($generator->modelClass)) ?>(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function(){
	    $.post(
		url
	    ).done(function(result){
		if(result.status == 'success'){
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }).fail(function(){
		console.log('server error');
	    });
	})
    }
    return false;
});
	
function modal<?= Inflector::classify(StringHelper::basename($generator->modelClass)) ?>(url) {
    $('#modal-<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?> .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>