var formSelects = layui.formSelects;
formSelects.render('partner-filter',{

});

layui.formSelects.on('partner-filter', function(id, vals, val, isAdd, isDisabled){
    //id:           点击select的id
    //vals:         当前select已选中的值
    //val:          当前select点击的值
    //isAdd:        当前操作选中or取消
    //isDisabled:   当前选项是否是disabled
    alert("当前选择了: " + JSON.stringify(vals));
}, true);