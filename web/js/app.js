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
    if(url) {
        layer.open({
            type: 2,
            area: ['1500px', '800px'],
            title: '窗口',
            scrollbar:true,
            shadeClose: true,
            shade: false,
            maxmin: true, //开启最大化最小化按钮
            content: url
        });
    }
});