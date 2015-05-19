<?php
use yii\widgets\ListView;
use yii\bootstrap\ButtonGroup;
use yii\widgets\Pjax;
use yii\Helpers\Url;
use yii\Helpers\Html;
use yii\bootstrap\Modal;
use common\lib\sdii\widgets\SDGridView;
use common\lib\sdii\widgets\SDModalForm;
use common\lib\sdii\components\helpers\SDNoty;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>คุณธรรม คู่คุณภาพ เพื่อประชาชน</h1>
                <hr>
                <p style="margin-bottom:0;">งานประชุมวิชาการ  ครั้งที่ 7 ประจำปี 2558</p>
                <p >เนื่องในโอกาสครบรอบ 20 ปี ศูนย์แพทยศาสตรศึกษาชั้นคลินิก โรงพยาบาลขอนแก่น</p>
                <p> 24 -  26 มิถุนายน 2558 ณ โรงพยาบาลขอนแก่น</p>
                <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-plus"></span> ลงทะเบียน'),'#registration', ['data-url'=>Url::to(['registration/create']), 'class' => 'btn btn-primary btn-xl', 'id'=>'modal-addbtn-registration'])?>
                 <a href="#about" class="btn btn-primary btn-xl page-scroll">ส่งผลงาน</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">ลงทะเบียนส่งผลงาน</h2>
                    <hr class="light">
                    <p class="text-faded">โรงพยาบาลขอนแก่น ขอเชิญบุคลากรด้านสาธารณสุข ส่งผลงานวิชาการเพื่อเข้ารับการคัดเลือกให้นำเสนอและประกวด ในการประชุมวิชาการโรงพยาบาลขอนแก่น ครั้งที่ 7 ประจำปี 2558 ในวันที่  24-26 มิถุนายน 2558 โดยมี Theme ในการประชุมครั้งนี้คือ "คุณธรรม คู่คุณภาพ เพื่อประชาชน " </p>
                    <a href="#" class="btn btn-default btn-xl">รายละเอียด</a>
        
                     <a href="#" class="btn btn-default btn-xl">ลงทะเบียนส่งผลงาน</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                        <h3>Sturdy Templates</h3>
                        <p class="text-muted">Our templates are updated regularly so they don't break.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Ready to Ship</h3>
                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Up to Date</h3>
                        <p class="text-muted">We update dependencies to keep things fresh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Made with Love</h3>
                        <p class="text-muted">You have to make your websites with love these days!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Free Download at Start Bootstrap!</h2>
                <a href="#" class="btn btn-default btn-xl wow tada">Download Now!</a>
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <?php
    Modal::begin([
    'id'=>'modal-registration',
    'size'=> Modal::SIZE_LARGE,
    'header' => '<h2>Hello world</h2>',
    'footer'=>'ok',
    //'toggleButton' => ['label' => 'ลงทะเบียน','id'=>'btn-modal-registration','class'=>'btn btn-lg btn-warning','data-url'=>Url::to(['registration/create'])],
]);



Modal::end();

Modal::begin([
    'id'=>'modal-login',
    'header' => '<h2>Hello world</h2>',
    'toggleButton' => ['label' => 'click me'],
]);

echo 'Say hello...';

Modal::end();

$this->registerJs("

    var isLogin = ".(Yii::$app->user->isGuest?'false':'true').";

    $('body').on('click', '#modal-addbtn-registration', function(){
        if(isLogin){
            modalRegistration($(this).attr('data-url'));
        }else{
            modalLogin();
        }
    
    });
        
    function modalRegistration(url) {
        
        $('#modal-registration').modal('show')
        .find('.modal-content')
        .load(url);
    }

    function modalLogin() {
        
        $('#modal-registration').modal('show')
        .find('.modal-content')
        .load('".Url::to(['/site/login-popup'])."');
    }

");?>



