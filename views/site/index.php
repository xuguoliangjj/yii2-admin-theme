<?php
$this->title = '后台首页';
$this->params['breadcrumbs'][] = $this->title;
?>

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

<?php for($i=0; $i<3; $i++): ?>
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