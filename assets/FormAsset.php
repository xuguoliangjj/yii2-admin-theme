<?php

namespace app\assets;

use yii\web\AssetBundle;

class FormAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/assets';

    public $basePath = '@webroot/assets';

    public $css = [
        'form.css'
    ];
    public $js = [
        'form.js'
    ];
    public $depends = [
        'app\assets\LayuiAsset'
    ];
}
