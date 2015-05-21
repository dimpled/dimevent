<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\CreativeAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

CreativeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
        <!-- Plugin CSS -->
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
</head>

<body id="page-top">
    <?php $this->beginBody() ?>
    
       
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">งานประชุมวิชาการ รพ.ขอนแก่น</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#schedule">กำหนดการ</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">ตารางประชุม</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#submission">ส่งผลงาน</a>
                    </li>
                    
                    
                    <li>
                        <a class="page-scroll" href="#download">ดาวน์โหลด</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">ติดต่อเรา</a>
                    </li>
                     <!-- <li>
                        <a class="page-scroll" data-method="post" href="index.php?r=site/logout">Logout</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

         <?php
            // NavBar::begin([
            //     'brandLabel' => '<img class="brand-logo" src="images/dimple-logo-white.svg" />',
            //     'brandUrl' => Yii::$app->homeUrl,
            //     'options' => [
            //         'class' => 'navbar-inverse navbar-fixed-top',
            //     ],
            // ]);
            // $menuItems = [
            //     ['label' => 'Home', 'url' => ['/site/index']],
            //     //['label' => 'About', 'url' => ['/site/about']],
            //     //['label' => 'Contact', 'url' => ['/site/contact']],
            // ];
            // if (Yii::$app->user->isGuest) {
            //     $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
            //     $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            // } else {
            //     $menuItems[] = [
            //         'label' => 'Logout (' . Yii::$app->user->identity->id . ')',
            //         'url' => ['/site/logout'],
            //         'linkOptions' => ['data-method' => 'post']
            //     ];
            // }
            // echo Nav::widget([
            //     'options' => ['class' => 'navbar-nav navbar-right'],
            //     'items' => $menuItems,
            // ]);
            // NavBar::end();
        ?>

<?=$content;?>







    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
