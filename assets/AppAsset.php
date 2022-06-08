<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "css/bootstrap.min.css",
        "css/owl.carousel.min.css",
        "css/animate.min.css",
        "css/magnific-popup.css",
        "css/fontawesome-all.min.css",
        "css/flaticon.css",
        "css/meanmenu.css",
        "css/meanmenu.css",
        "css/slick.css",
        "css/default.css",
        "css/site.css",
        "css/style.css",
        "css/responsive.css",
    ];
    public $js = [
        "js/ajaxlibsjquery1.11.1jquery.min.js",
        "js/vendor/jquery-1.12.4.min.js",
        "js/popper.min.js",
        "js/bootstrap.min.js",
        "js/owl.carousel.min.js",
        "js/isotope.pkgd.min.js",
        "js/one-page-nav-min.js",
        "js/slick.min.js",
        "js/jquery.meanmenu.min.js",
        "js/ajax-form.js",
        "js/wow.min.js",
        "js/jquery.scrollUp.min.js",
        "js/jquery.final-countdown.min.js",
        "js/imagesloaded.pkgd.min.js",
        "js/jquery.magnific-popup.min.js",
        "js/plugins.js",
        "js/main.js",
        "js/jquery.cookie.js",
        "js/jquery.accordion.js",
        'js/fileinput.min.js',
        'js/bootstrap-datetimepicker.fr.js',
        'js/bootstrap-datetimepicker.min.js',
        'js/select2-krajee.min.js',
        'js/select2.full.min.js'


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
