<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CreativeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/animate.min.css',
        'css/creative.css'
    ];
    public $js = [
        'js/jquery.easing.min.js',
        'js/jquery.fittext.js',
        'js/wow.min.js',
        'js/creative.js'
    ];
    public $depends = [

        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapThemeAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        '\rmrevin\yii\fontawesome\AssetBundle'
    ];
}
