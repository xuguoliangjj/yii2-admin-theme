<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use \yii\helpers\Url;
use app\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<body class="layui-layout-body">
<div id="bg" style="width: 100%;height: 100%;position: absolute;overflow: hidden;"></div>
<div class="layui-layout layui-layout-admin-empty">
        <!-- 内容主体区域 -->
    <div class="layui-body">
        <?= $content?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
