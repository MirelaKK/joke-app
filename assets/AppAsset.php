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
        'css/site.css',
        'assets/1918460d/css/bootstrap-datepicker.min.css',
        'assets/1918460d/css/bootstrap-datepicker.standalone.min.css',
        'assets/1918460d/css/bootstrap-datepicker3.min.css',
        'assets/1918460d/css/bootstrap-datepicker3.standalone.min.css'
    ];
    public $js = [
		'assets/4b55cba6/jquery.pjax.js',
		'assets/4d03865d/yii.activeForm.js',
        	'assets/4d03865d/yii.captcha.js',
                'assets/4d03865d/yii.gridView.js',
                'assets/4d03865d/yii.validation.js',
                'assets/4d03865d/yii.js',
    		'assets/49ff8c7f/bloodhound.js',
                'assets/49ff8c7f/typeahead.bundle.min,js',
                'assets/49ff8c7f/typeahead.jquery.min.js',
		'assets/68b36b0a/jquery.min.js',
		'assets/4551d01/js/bootstrap.min.js',
		'assets/a98ae72c',
		'assets/ebdf6503/toolbar.js',
		'assets/ebdf6503/timeline.js',
                'assets/1918460d/js/bootstrap-datepicker.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
