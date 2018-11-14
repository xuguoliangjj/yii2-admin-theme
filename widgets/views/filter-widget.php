<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2018/11/14
 * Time: 14:15
 */
?>
<form class="layui-form"  action="">
    <div class="layui-form-item">
        <label class="layui-form-label">日期</label>
        <div class="layui-input-inline admin-filter-input">
            <input type="text" name="title" required  lay-verify="required" placeholder="请选择" autocomplete="off" class="layui-input date-range-input">
        </div>
        <div class="layui-btn-group">
            <button class="layui-btn layui-btn-primary">今天</button>
            <button class="layui-btn layui-btn-primary">昨天</button>
            <button class="layui-btn layui-btn-primary">前天</button>
            <button class="layui-btn layui-btn-primary">近7天</button>
            <button class="layui-btn layui-btn-primary">近15天</button>
            <button class="layui-btn layui-btn-primary">近30天</button>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">合作</label>
        <div class="layui-input-block admin-filter-input">
            <select name="join" xm-select="join-filter" xm-select-search xm-select-search-type="dl" xm-select-height="36px">
                <option value="">请选择</option>
                <option value="1">11玩</option>
                <option value="2">麟游</option>
                <option value="3">乐玩</option>
                <option value="4">摇点</option>
                <option value="6">应用宝</option>
                <option value="7">分给</option>
                <option value="8">爱玩</option>
                <option value="9">萌友</option>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">设备</label>
        <div class="layui-input-block admin-filter-input">
            <select name="system" xm-select="system-filter" xm-select-search xm-select-search-type="dl" xm-select-height="36px">
                <option value="">请选择</option>
                <option value="1">Android</option>
                <option value="2">Ios</option>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">渠道</label>
        <div class="layui-input-block admin-filter-input">
            <select name="partner" xm-select="partner-filter" xm-select-search xm-select-search-type="dl" xm-select-height="36px">
                <option value="">请选择</option>
                <option value="1">羽厚亦-正版</option>
                <option value="2">11wan买量官包(11玩安卓sdk-2)</option>
                <option value="3">麟游-羽衣狐传说3-混服(麟游-安卓)</option>
                <option value="4">摇点-辰逸</option>
                <option value="6">乐玩-安卓</option>
                <option value="7">摇点-辰逸</option>
                <option value="8">麟游-IOS</option>
                <option value="9">萌友-安卓</option>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">马甲包</label>
        <div class="layui-input-block admin-filter-input">
            <select name="platform" xm-select="platform-filter" xm-select-search xm-select-search-type="dl" xm-select-height="36px">
                <option value="">请选择</option>
                <option value="1">灵剑仙师-马甲包(lingjian.cents.division)</option>
                <option value="2">灵狐仙游记-马甲包(Fairy.mind.game)</option>
                <option value="3">灵狐传说-马甲包(app.fox.legend)</option>
                <option value="4">梦幻修仙OL-马甲包(app.dream.cultivation)</option>
                <option value="6">西游女儿情(com.maijiarong.xiyounrq)</option>
                <option value="7">仙侠志OL梦幻版-马甲包(com.xianxia.zhi)</option>
                <option value="8">仙灵决-麟游马甲包(com.xianling.j)</option>
                <option value="9">一念飞仙-马甲包(fly.cents.app)</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">马甲包</label>
        <div class="layui-input-block admin-filter-input">
            <select name="city" xm-select="select15">
                <option value="">请选择, 此处是联动多选</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">查询</button>
        </div>
    </div>
</form>


