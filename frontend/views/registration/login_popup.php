<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="itemModalLabel">รพ.ขอนแก่น กรุณาเข้าสู่ระบบ</h4>
</div>

<div class="modal-body">
        <div class="site-login">
                    <p>กรอกรหัสล็อกอินที่ท่านใช้ดูเงินเดือน หรือล็อกอินเข้า Internet</p>
                    <?php $form = ActiveForm::begin(['action'=>Url::to(['/registration/login-popup']),'id' => 'login-form-kkh', 'enableAjaxValidation' => true]); ?>
                        <?= $form->field($model, 'username') ?>
                        <?= $form->field($model, 'password')->passwordInput() ?>
                        
                        <div class="form-group">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-lg', 'name' => 'login-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>

        </div>
</div>


<?php  $this->registerJs("

$('form#login-form-kkh').on('beforeSubmit', function(e){

    var form = $(this);
    $.post(
    form.attr('action'),
    form.serialize()
    ).done(function(result){
        if(result.status == 'success'){
            console.log('login success!');
            isLogin = true;
            $('#modal-login').modal('hide');

        } else{
           
        } 
    }).fail(function(){
        console.log('server error');
    });

    return false;
});

");?>