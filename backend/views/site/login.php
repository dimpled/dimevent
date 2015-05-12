<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-5 col-md-offset-4 col-sm-6 col-sm-offset-3">

        
            <?php $form = ActiveForm::begin(['id' => 'login-form','options'=>['class'=>'form-login']]); ?>
                <?= $form->field($model, 'username')->textInput(['placeholder'=>'Username'])->label(false); ?>
                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password'])->label(false); ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div class="form-group">
                    <?= Html::submitButton('Sign In', ['class' => 'btn  btn-block btn-lg', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
