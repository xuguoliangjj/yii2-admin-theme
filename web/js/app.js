//JavaScript代码区域
layui.use('element', function(){
    var element = layui.element;

});

layui.use('laydate', function(){
    var laydate = layui.laydate;

    //执行一个laydate实例
    laydate.render({
        elem: '.date-input' //指定元素
    });

    //执行一个laydate实例
    laydate.render({
        elem: '.date-range-input',
        range: true
    });
});

$('.admin-grid-buttons > button,.admin-pop-btn').click(function (e) {
    var url = $(this).data('url');
    var action = $(this).data('action');
    if(action === 'delete') {
        return true;
    }
    if(url) {
        layer.open({
            type: 2,
            area: ['80%', '80%'],
            title: ' ',
            scrollbar:true,
            shadeClose: true,
            shade: 0.5,
            maxmin: true, //开启最大化最小化按钮
            content: url
        });
    }
});

$(".routes-check-all").siblings('.layui-form-checkbox').click(function () {
    var c = $(this).siblings('.routes-check-all').prop("checked");
    var i = $(this).parent().siblings('.layui-field-box').find('input:checkbox');
    i.prop("checked", c);
    if(c) {
        i.siblings('.layui-form-checkbox').addClass('layui-form-checked');
    }else{
        i.siblings('.layui-form-checkbox').removeClass('layui-form-checked');
    }
});

$('.searchPage').keyup(function(){
    var val = $(this).val();
    // 查找当前选择的筛选条件
    var input = $(this).parent().parent().siblings('.layui-form-item').find('.own-routes-list').find('input')
    input.each(function(){
        var str = $(this).val();
        if(str.indexOf(val)>=0){
            $(this).next().show();
        }else{
            $(this).next().hide();
        }
    });
});