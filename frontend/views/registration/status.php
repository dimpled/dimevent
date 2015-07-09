
<?php
use yii\helpers\Html;
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3>ลงทะเบียนเข้าร่วมประชุม</h3>
</div>
<div class="modal-body">


<?php 
echo 'สวัสดี <strong>'.$regis->fist_name." ".$regis->last_name.'</strong> คุณได้ลงทะเบียนไปแล้วค่ะ..'
?>
<?=  '<p>คลิกที่นี่หากต้องการลงทะเบียนคนใหม่'.Html::a('ออกจากระบบ('.Yii::$app->user->identity->id.')',['/site/logout'],['data-method'=>'post']).'</p>'; ?>

</div>
