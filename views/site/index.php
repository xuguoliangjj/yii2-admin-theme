<?php
use \app\widgets\FilterWidget;

$this->title = '主页概览';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('@web/js/site.js',['depends'=>['app\assets\FormAsset']])
?>
<div class="layui-row admin-layui-row">
    <div class="layui-col-md12">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">
                筛选
            </div>
            <div class="layui-card-body">
                <?= FilterWidget::widget()?>
            </div>
        </div>
    </div>
</div>

<div class="layui-row admin-layui-row">
    <div class="layui-col-md3">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">
                当日收入
                <span class="layui-badge layui-bg-green admin-pull-right admin-card-tag">日</span>
            </div>
            <div class="layui-card-body">
                <p class="admin-big-font admin-card-num admin-card-income">
                    <i style="font-size: 32px;" class="layui-icon layui-icon-loading-1 layui-anim layui-anim-rotate layui-anim-loop"></i>
                </p>
                <p>
                    累计收入
                    <span class="admin-pull-right">
                        <span class="admin-card-total-num admin-card-total-income"></span>
                        <i class="layui-icon layui-icon-rmb"></i>
                    </span>
                </p>
            </div>
        </div>
    </div>
    <div class="layui-col-md3">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">付费人数
                <span class="layui-badge layui-bg-green admin-pull-right admin-card-tag">日</span>
            </div>
            <div class="layui-card-body">
                <p class="admin-big-font admin-card-num admin-card-payp">
                    <i style="font-size: 32px;" class="layui-icon layui-icon-loading-1 layui-anim layui-anim-rotate layui-anim-loop"></i>
                </p>
                <p>累计人数
                    <span class="admin-pull-right">
                        <span class="admin-card-total-num admin-card-total-payp"></span>
                        <i class="layui-icon layui-icon-user"></i>
                    </span>
                </p>
            </div>
        </div>
    </div>
    <div class="layui-col-md3">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">新增玩家
                <span class="layui-badge layui-bg-green admin-pull-right admin-card-tag">日</span>
            </div>
            <div class="layui-card-body">
                <p class="admin-big-font admin-card-num admin-card-new_p">
                    <i style="font-size: 32px;" class="layui-icon layui-icon-loading-1 layui-anim layui-anim-rotate layui-anim-loop"></i>
                </p>
                <p>累计新增
                    <span class="admin-pull-right">
                        <span class="admin-card-total-num admin-card-total-new_p"></span>
                        <i class="layui-icon layui-icon-user"></i>
                    </span>
                </p>
            </div>
        </div>
    </div>
    <div class="layui-col-md3">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">活跃玩家
                <span class="layui-badge layui-bg-green admin-pull-right admin-card-tag">日</span>
            </div>
            <div class="layui-card-body">
                <p class="admin-big-font admin-card-num admin-card-dau">
                    <i style="font-size: 32px;" class="layui-icon layui-icon-loading-1 layui-anim layui-anim-rotate layui-anim-loop"></i>
                </p>
                <p>累计活跃
                    <span class="admin-pull-right">
                        <span class="admin-card-total-num admin-card-total-dau"></span>
                        <i class="layui-icon layui-icon-user"></i>
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>


<div class="layui-row admin-layui-row">
    <div class="layui-col-xs12">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">
                关键报表
            </div>
            <div class="layui-card-body" style="min-height: 500px;">
                <div style='text-align: center;margin-top: 250px;' class="loading">
                    <i style="font-size: 32px;" class="layui-icon layui-icon-loading-1 layui-anim layui-anim-rotate layui-anim-loop"></i>
                </div>
                <table class="layui-hide" id="admin-site-main"></table>
            </div>
        </div>
    </div>
</div>

<div class="layui-row admin-layui-row">
    <div class="layui-col-xs12">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">
                柱状图
            </div>
            <div class="layui-card-body">
                <div id="admin-chart-income" style="width: 100%;height:600px;"></div>
            </div>
        </div>
    </div>
</div>
