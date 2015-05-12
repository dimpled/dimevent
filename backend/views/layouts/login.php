<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="page-login">
    <?php $this->beginBody() ?>
        <div class="header-logo text-center">
            <img class="logo" src="images/dimple-logo-white.svg" />
        </div>
        <div class="container" >


        <?= $content ?>
        
        </div>




    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
