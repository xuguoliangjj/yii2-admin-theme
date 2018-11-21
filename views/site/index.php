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
    <div class="layui-col-xs6">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">
                图表1
            </div>
            <div class="layui-card-body">
                <div id="main" style="width: 100%;height:500px;"></div>
            </div>
        </div>
    </div>

    <div class="layui-col-xs6">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">
                图表2
            </div>
            <div class="layui-card-body">
                <div id="main2" style="width: 100%;height:500px;"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
<?php $this->beginBlock('test') ?>

    // 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('main'));
var myChart2 = echarts.init(document.getElementById('main2'));
    // 指定图表的配置项和数据
var dataAxis = ['点', '击', '柱', '子', '或', '者', '两', '指', '在', '触', '屏', '上', '滑', '动', '能', '够', '自', '动', '缩', '放'];
var data = [220, 182, 191, 232, 290, 330, 310, 123, 442, 321, 90, 149, 210, 122, 133, 332, 198, 123, 125, 220];
var yMax = 500;
var dataShadow = [];

for (var i = 0; i < data.length; i++) {
    dataShadow.push(yMax);
}

option = {
    title: {
        text: '特性示例：渐变色 阴影 点击缩放',
        subtext: 'Feature Sample: Gradient Color, Shadow, Click Zoom'
    },
    xAxis: {
        data: dataAxis,
        axisLabel: {
            inside: true,
            textStyle: {
                color: '#fff'
            }
        },
        axisTick: {
            show: false
        },
        axisLine: {
            show: false
        },
        z: 10
    },
    yAxis: {
        axisLine: {
            show: false
        },
        axisTick: {
            show: false
        },
        axisLabel: {
            textStyle: {
                color: '#999'
            }
        }
    },
    dataZoom: [
        {
            type: 'inside'
        }
    ],
    series: [
        { // For shadow
            type: 'bar',
            itemStyle: {
                normal: {color: 'rgba(0,0,0,0.05)'}
            },
            barGap:'-100%',
            barCategoryGap:'40%',
            data: dataShadow,
            animation: false
        },
        {
            type: 'bar',
            itemStyle: {
                normal: {
                    color: new echarts.graphic.LinearGradient(
                        0, 0, 0, 1,
                        [
                            {offset: 0, color: '#83bff6'},
                            {offset: 0.5, color: '#188df0'},
                            {offset: 1, color: '#188df0'}
                        ]
                    )
                },
                emphasis: {
                    color: new echarts.graphic.LinearGradient(
                        0, 0, 0, 1,
                        [
                            {offset: 0, color: '#2378f7'},
                            {offset: 0.7, color: '#2378f7'},
                            {offset: 1, color: '#83bff6'}
                        ]
                    )
                }
            },
            data: data
        }
    ]
};

// Enable data zoom when user click bar.
var zoomSize = 6;
myChart.on('click', function (params) {
    console.log(dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)]);
    myChart.dispatchAction({
        type: 'dataZoom',
        startValue: dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)],
        endValue: dataAxis[Math.min(params.dataIndex + zoomSize / 2, data.length - 1)]
    });
});

    // 使用刚指定的配置项和数据显示图表。
myChart.setOption(option);
myChart2.setOption(option);
<?php $this->endBlock() ?>
</script>
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
