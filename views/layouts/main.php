<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use \yii\helpers\Url;
use \yii\widgets\Breadcrumbs;


use app\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo"><?= Html::img('/img/logo.png',['style'=>'width:200px'])?></div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <?php foreach ($this->context->topMenu as $item):?>
                <li class="layui-nav-item <?= $item['active'] ? 'layui-this' : '' ?>"><?= Html::a($item['label'],$item['url'],[
                        'data' => [
                            'method' => 'post'
                        ]
                    ])?></li>
            <?php endforeach;?>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <?= Html::img('/img/icon.png',['class'=>"layui-nav-img"])?>
                    <?= Yii::$app->user->identity->username?>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <?= Html::a('注销','/site/logout',[
                    'data' => [
                        'method' => 'post'
                    ]
                ])?>
            </li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <?php foreach ($this->context->leftMenu as $item):?>
                    <li class="layui-nav-item <?= $item['active'] ? 'layui-nav-itemed' : '' ?>">
                        <a class="" href="javascript:;"><?= $item['label']?></a>
                        <dl class="layui-nav-child">
                            <?php foreach ($item['items'] as $child):?>
                                <dd class="<?= $child['active'] ? 'layui-this' : '' ?>"><a  href="<?= Url::toRoute($child['url']) ?>"><?= $child['label'] ?></a></dd>
                            <?php endforeach;?>
                        </dl>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div class="layui-row">
            <div class="layui-col-xs12">
                <div class="layui-card admin-breadcrumb">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => ['class' => 'layui-breadcrumb'],
                        'tag' => 'span',
                        'homeLink' => [
                            'label' => '首页',                  // required
                            'url' => '/',                      // optional, will be processed by Url::to()
                            'template' => "{link}\n", // optional, if not set $this->itemTemplate will be used
                        ],
                        'itemTemplate' => "{link}\n",
                        'activeItemTemplate' => "<a><cite>{link}</cite></a>\n"
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="layui-row admin-content">
            <div class="layui-col-xs12">
                <?= $content?>
            </div>
        </div>
     </div>
    <div class="layui-footer">
        <!-- 底部固定区域 -->
        &copy; My Company <?= date('Y') ?> - <?= Yii::powered() ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
