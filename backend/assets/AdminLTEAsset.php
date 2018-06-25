<?php

namespace backend\assets;

class AdminLTEAsset extends \yii\web\AssetBundle
{

    public $sourcePath = "@bower/admin-lte";

    public $js = [
        'dist/js/app.min.js',
        "plugins/iCheck/icheck.min.js",
    ];

    public $css = [
        '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
        "//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css",
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/skin-blue-light.min.css',
        "plugins/iCheck/square/blue.css",
    ];

    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}