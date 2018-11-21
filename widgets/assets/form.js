var formSelects = layui.formSelects;

function filterOptions(form) {
    $.ajax({
        type:"POST",
        dataType:"json",
        data:form.serialize(),
        url:"/filter",
        beforeSend:function(){
            $("#filter-search").addClass('layui-btn-disabled');
        },
        complete:function(){
            $("#filter-search").removeClass('layui-btn-disabled');
        },
        success:function(json){
            var arr = [];
            function child(data,arr) {
                var selected = data['xm-select'];
                if(!arr[selected]) arr[selected] = [];
                delete data['xm-select'];
                for (i in data) {
                    var pushData = {
                        'name':data[i].name,
                        'value':data[i].value,
                        'selected':$.inArray(data[i].value,layui.formSelects.value(selected, 'val')) != -1 ? 'selected' : ''
                    };
                    if(JSON.stringify(arr[selected]).indexOf(JSON.stringify(pushData)) == -1){
                        arr[selected].push(pushData);
                    }
                    if(data[i]['children']) {
                        child(data[i]['children'],arr);
                    }
                }
            }
            child(json,arr);
            var filters = ['join-filter','system-filter','partner-filter','platform-filter'];
            for( k in filters) {
                key = filters[k];
                if( arr[key] ) {
                    pushArr = arr[key];
                }else{
                    pushArr = [];
                }
                layui.formSelects.data(key, 'local', {arr: pushArr});
                formSelects.btns(key, ['select', 'remove'], {show: 'name'});
            }
            $("#filter-search").trigger('click');
        }
    });
}
filterOptions($("#filter-form"));
layui.formSelects.on('join-filter', function(){
    filterOptions($("#filter-form"))
}, true);

layui.formSelects.on('system-filter', function(){
    filterOptions($("#filter-form"))
}, true);

layui.formSelects.on('partner-filter', function(){
    filterOptions($("#filter-form"))
}, true);

layui.formSelects.on('platform-filter', function(){
    filterOptions($("#filter-form"))
}, true);

$("#filter-search").click(function () {
    for(k in $.triggerList) {
        $.triggerList[k].trigger('refresh');
    }
});


$("#own-filter-date-quick > button").click(function(){
    $(this).siblings("button").addClass("layui-btn-primary");
    $(this).removeClass("layui-btn-primary");
    var date = $(this).data("date");
    var timestamp = new Date().getTime() + date * 86400 * 1000;
    var start = new Date(timestamp).Format("yyyy-MM-dd");
    var end   = new Date(new Date().getTime()).Format("yyyy-MM-dd");
    if(date === -1 || date === -2)
    {
        end = start;
    }
    $('#filterform-date').val(start + ' - ' +end);
    $("#filter-search").trigger('click');
});

Date.prototype.Format = function (fmt) {
    var o = {
        "M+": this.getMonth() + 1, //月份
        "d+": this.getDate(), //日
        "h+": this.getHours(), //小时
        "m+": this.getMinutes(), //分
        "s+": this.getSeconds(), //秒
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度
        "S": this.getMilliseconds() //毫秒
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
};