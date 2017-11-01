<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAssetAdmin extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/modalImage.css',
        'css/lightbox5.css',
    ];
    public $js = [
        'js/main.js',
        'js/modal2.js',
        'js/modalImage1.js',
        'js/lightbox5.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\web\JqueryAsset'
    ];

    public $publishOptions = [
//        'forceCopy' => true,
        //you can also make it work only in debug mode:
         'forceCopy' => YII_DEBUG
    ];

    public function init()
    {
        // Tell AssetBundle where the assets files are
        $this->sourcePath = __DIR__ . "/assets";
        parent::init();
    }
}