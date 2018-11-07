<?php

namespace app\assets;

use yii\web\AssetBundle;

class LayuiAsset extends AssetBundle
{
    public $sourcePath = '@npm';

    public $basePath = '@webroot/assets';

    public $css = [
        'layui-src/dist/css/layui.css'
    ];
    public $js = [
        'layui-src/dist/layui.all.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
