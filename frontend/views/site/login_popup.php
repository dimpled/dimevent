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
        <h4 class="modal-title" id="itemModalLabel">ลงทะเบียนเข้าร่วมประชม</h4>
    </div>

    <div class="modal-body">
<div class="site-login">

    

    <div class="row">
        <div class="col-md-6">
        <p>บุคลากร โรงพยาบาลขอนแก่น</p>
            <?php $form = ActiveForm::begin(['action'=>Url::to(['/site/login-popup']),'id' => 'login-form', 'enableAjaxValidation' => false]); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-6">
        <p>บุคลากรภายนอก</p>
        <?= Html::a('ลงทะเบียน', '#',['class' => 'btn btn-success btn-block']) ?>
        </div>
    </div>
</div>
</div>
</div>


<?php  $this->registerJs("

$('form#{$model->formName()}').on('beforeSubmit', function(e){
    var \$form = $(this);
    $.post(
    \$form.attr('action'), //serialize Yii2 form
    \$form.serialize()
    ).done(function(result){
    if(result.status == 'success'){
       
        alert('ลงทะเบียนเสร็จเรียบร้อย');
    } else{
       
    } 
    }).fail(function(){
        console.log('server error');
    });
    return false;
});

");?>
