function refreshSite() {
    $.ajax({
        type:"POST",
        dataType:"json",
        data:$("#filter-form").serialize(),
        url:"/site/main",
        beforeSend:function(){
            $(".admin-card-num").empty().html($.loadingBig);
            $(".admin-card-total-num").empty().html($.loadingMini);
            var main = $("#admin-site-main");
            main.prev().show();
            main.next().remove();
        },
        complete:function(){
            $(".admin-card-num").children('i').remove();
            $(".admin-card-total-num").children('i').remove();
            $("#admin-site-main").prev().hide();
        },
        success:function(json){
            $(".admin-card-income").html(json[1].dau_income);
            $(".admin-card-payp").html(json[1].dau_payp);
            $(".admin-card-new_p").html(json[1].new_p);
            $(".admin-card-dau").html(json[1].dau);

            $(".admin-card-total-income").html(json[0].dau_income);
            $(".admin-card-total-payp").html(json[0].dau_payp);
            $(".admin-card-total-new_p").html(json[0].new_p);
            $(".admin-card-total-dau").html(json[0].dau);
            refreshTable(json);
        }
    });
}

function refreshTable(json) {
    layui.use('table', function(){
        var table = layui.table;
        //展示已知数据
        table.render({
            elem: '#admin-site-main',
            toolbar: true,
            cellMinWidth:'110',
            cols: [[ //标题栏
                {field: 'ymd', title: '日期', sort:true},
                {field: 'active_num', title: '激活数', sort:true},
                {field: 'new_dev_num', title: '新增账号设备数', sort:true,minWidth:150},
                {field: 'new_p', title: '新增账号', sort:true},
                {field: 'new_role', title: '新增角色', sort:true},
                {field: 'new_pay', title: '新增充值', sort:true},
                {field: 'new_payp', title: '新增充值人数', sort:true},
                {field: 'new_pay_lv', title: '新增付费率', sort:true},
                {field: 'new_pay_arpu', title: '新增付费ARPU', sort:true},
                {field: 'new_arpu', title: '新增ARPU', sort:true},
                {field: 'dau_income', title: '充值金额', sort:true},
                {field: 'dau_payp', title: '充值人数', sort:true},
                {field: 'dau_pay_lv', title: '付费渗透率', sort:true},
                {field: 'pay_arpu', title: '付费ARPU', sort:true},
                {field: 'dau_arpu', title: '登录ARPU', sort:true},
                {field: 'dau', title: '登录人数', sort:true},
                {field: 'online_avg', title: '平均在线', sort:true},
                {field: 'online_max', title: '最高在线', sort:true},
                {field: 'd1', title: '次日留存数', sort:true},
                {field: 'l1', title: '次日留存率', sort:true},
                {field: 'd3', title: '3日留存数', sort:true},
                {field: 'l3', title: '3日留存率', sort:true},
                {field: 'd7', title: '7日留存数', sort:true},
                {field: 'l7', title: '7日留存率', sort:true},
                {field: 'd30', title: '30日留存数', sort:true},
                {field: 'l30', title: '30日留存率', sort:true}
            ]]
            ,data: json
            ,skin: 'row' //表格风格
            ,even: true
            ,limit:json.length
            ,height:500,
            done: function(res, curr, count) {
                refreshChart(this);
            }
        });
    });
}

function refreshChart(table) {
    var chart = echarts.init(document.getElementById('admin-chart-income'));
    var xAxisData = [];
    var seriesData = [];
    var legendData = [];
    var seriesDataTemp = {};
    var tempCols = table.cols[0];
    var cols = {};
    for (var i in tempCols) {
        cols[tempCols[i].field] = tempCols[i].title;
        legendData.push(tempCols[i].title);
    }
    var data = table.data;
    for (var k in data) {
        var items = data[k];
        if(items.ymd !== '汇总') {
            xAxisData.push(items.ymd);
            for(var i in items) {
                if(seriesDataTemp[i] === undefined){
                    seriesDataTemp[i] = [];
                }
                seriesDataTemp[i].push(items[i])
            }
        }
    }

    for (var key in seriesDataTemp) {
        if(key === 'ymd') continue;
        for (var i in seriesDataTemp[key]) {
            var val = seriesDataTemp[key][i].toString();
            val = val.replace('%','');
            seriesDataTemp[key][i] = val
        }
        seriesData.push({
            name:cols[key],
            type:'line',
            data:seriesDataTemp[key]
        });
    }
    option = {
        tooltip : {
            trigger: 'axis',
            axisPointer: {
                type : 'shadow'
            }
        },
        legend: {
            type: 'scroll',
            orient: 'vertical',
            right: 10,
            top: 20,
            bottom: 20,
            data: legendData
        },
        grid: {
            left: '3%',
            right: '150px',
            bottom: '3%',
            containLabel: true
        },
        xAxis : [
            {
                type : 'category',
                data : xAxisData,
                axisTick: {
                    alignWithLabel: true
                }
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : seriesData,
        animationEasing: 'elasticOut'

    };
    chart.clear();
    chart.setOption(option);
}
var obj = $("body");
obj.on('refresh',function () {
    refreshSite();
});
$.triggerList.push(obj);