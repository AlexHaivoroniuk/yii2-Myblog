<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
			'css/skel.css',
			'css/style.css',
			'css/style-desktop.css',
		    'css/style-wide.css'
//        'css/site.css',
    ];
    public $js = [
        'js/skel.min.js',
        'js/skel-layers.min.js',
        'js/init.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];


    public $publishOptions = [
//        'forceCopy' => true,/
        //you can also make it work only in debug mode:
         'forceCopy' => YII_DEBUG
    ];
}
