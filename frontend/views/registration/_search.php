<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RegistrationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registration-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'fist_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'register_date') ?>

    <?php // echo $form->field($model, 'cell_phone') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'personal_id') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'office') ?>

    <?php // echo $form->field($model, 'occupation') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
