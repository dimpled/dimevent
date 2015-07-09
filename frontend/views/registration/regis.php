<?php
use yii\helpers\Url;
?>





<section id="services">
<div class="container">

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 text-center">

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">ลงทะเบียน</h2>
                        <p>งานประชุมวิชาการ ครั้งที่ 7 ประจำปี 2558</p>
                        <p>24 -  26 มิถุนายน 2558 ณ โรงพยาบาลขอนแก่น</p>
                        <hr class="primary">
                        <div class="row">
						    <div class="col-md-6">
						        <botton id="btn-private" data-url="<?=Url::to(['registration/create','type'=>1]); ?>" data-url-login="<?=Url::to(['registration/login-popup']); ?>" class="btn btn-success btn-lg btn-block"> <i class="glyphicon glyphicon-user"></i> บุคลากร รพ.ขอนแก่น</botton><br>
						    </div>
						    <div class="col-md-6">
						        <botton id="btn-public" data-url="<?=Url::to(['registration/create','type'=>2]); ?>" class="btn btn-primary btn-lg btn-block"> <i class="glyphicon glyphicon-user"></i>  บุคลากรภายนอก</botton>
						    </div>
						</div>
                    </div>
                </div>

          
        </div>
    </div>
</div>
</section>
<?php
$this->registerJs("
	$('#mainNav').addClass('affix');
	$('body').addClass('bg-regis');

");
?>