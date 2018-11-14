<?php
$this->title = '后台首页';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="layui-row admin-layui-row">
    <div class="layui-col-md12">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">
                筛选
            </div>
            <div class="layui-card-body">
                <?= \app\widgets\FilterWidget::widget()?>
            </div>
        </div>
    </div>
</div>

<div class="layui-row admin-layui-row">
    <div class="layui-col-md3">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">
                访问量
                <span class="layui-badge layui-bg-green admin-pull-right admin-card-tag">日</span>
            </div>
            <div class="layui-card-body">
                <p class="admin-big-font">9,999,666</p>
                <p>昨日同比 <span class="admin-pull-right">+10% <i class="layui-icon layui-icon-flag"></i></span></p>
            </div>
        </div>
    </div>
    <div class="layui-col-md3">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">下载
                <span class="layui-badge layui-bg-green admin-pull-right admin-card-tag">日</span>
            </div>
            <div class="layui-card-body">
                <p class="admin-big-font">9,999,666</p>
                <p>昨日同比 <span class="admin-pull-right">+10% <i class="layui-icon layui-icon-flag"></i></span></p>
            </div>
        </div>
    </div>
    <div class="layui-col-md3">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">激活
                <span class="layui-badge layui-bg-green admin-pull-right admin-card-tag">日</span>
            </div>
            <div class="layui-card-body">
                <p class="admin-big-font">9,999,666</p>
                <p>昨日同比 <span class="admin-pull-right">-10% <i class="layui-icon layui-icon-flag"></i></span></p>
            </div>
        </div>
    </div>
    <div class="layui-col-md3">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">活跃用户
                <span class="layui-badge layui-bg-green admin-pull-right admin-card-tag">日</span>
            </div>
            <div class="layui-card-body">
                <p class="admin-big-font">9,999,666</p>
                <p>昨日同比 <span class="admin-pull-right">-10% <i class="layui-icon layui-icon-flag"></i></span></p>
            </div>
        </div>
    </div>
</div>

<?php for($i=0; $i<1; $i++): ?>
<div class="layui-row admin-layui-row">
    <div class="layui-col-xs12">
        <div class="layui-card admin-card-list">
            <div class="layui-card-header">
                关键报表
            </div>
            <div class="layui-card-body">
                <table class="layui-table">
                    <colgroup>
                        <col width="150">
                        <col width="150">
                        <col width="200">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>人物</th>
                        <th>民族</th>
                        <th>出场时间</th>
                        <th>格言</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>贤心</td>
                        <td>汉族</td>
                        <td>1989-10-14</td>
                        <td>人生似修行</td>
                    </tr>
                    <tr>
                        <td>张爱玲</td>
                        <td>汉族</td>
                        <td>1920-09-30</td>
                        <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
                    </tr>
                    <tr>
                        <td>Helen Keller</td>
                        <td>拉丁美裔</td>
                        <td>1880-06-27</td>
                        <td> Life is either a daring adventure or nothing.</td>
                    </tr>
                    <tr>
                        <td>岳飞</td>
                        <td>汉族</td>
                        <td>1103-北宋崇宁二年</td>
                        <td>教科书再滥改，也抹不去“民族英雄”的事实</td>
                    </tr>
                    <?php for($j=0; $j<10; $j   ++): ?>
                    <tr>
                        <td>孟子</td>
                        <td>华夏族（汉族）</td>
                        <td>公元前-372年</td>
                        <td>猿强，则国强。国强，则猿更强！ </td>
                    </tr>
                    <?php endfor;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endfor;?>

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
var data = [220, 182, 191, 234, 290, 330, 310, 123, 442, 321, 90, 149, 210, 122, 133, 334, 198, 123, 125, 220];
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
