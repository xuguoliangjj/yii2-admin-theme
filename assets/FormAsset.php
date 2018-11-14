<?php

namespace app\assets;

use yii\web\AssetBundle;

class FormAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/assets';

    public $basePath = '@webroot/assets';

    public $css = [
        'layui-formselects/dist/formSelects-v4.css',
        'form.css',
    ];
    public $js = [
        'layui-formselects/dist/formSelects-v4.min.js',
        'form.js',
    ];
    public $depends = [
        'app\assets\LayuiAsset'
    ];
}
