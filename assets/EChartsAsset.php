<?php

namespace app\assets;

use yii\web\AssetBundle;

class EChartsAsset extends AssetBundle
{
    public $sourcePath = '@npm';

    public $basePath = '@webroot/assets';

    public $css = [

    ];
    public $js = [
        'echarts/dist/echarts.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
