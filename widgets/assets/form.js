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


layui.formSelects.data('select15', 'local', {
    arr: [
        {
            "name": "北京",
            "value": 1,
            "children": [
                {"name": "北京市1", "value": 12, "children": [
                    {"name": "朝阳区1", "value": 13, "children": []},
                    {"name": "朝阳区2", "value": 14, "children": []},
                    {"name": "朝阳区3", "value": 15, "children": []},
                    {"name": "朝阳区4", "value": 16, "children": []},
                ]},
                {"name": "北京市2", "value": 17, "children": []},
                {"name": "北京市3", "value": 18, "children": []},
                {"name": "北京市4", "value": 19, "children": []},
            ]
        },
        {
            "name": "天津",
            "value": 2,
            "children": [
                {"name": "天津市1", "value": 51, "children": []},
            ]
        },
    ],
    linkage: true
});

//如果有需要默认值的小伙伴请使用formSelects.value
formSelects.value('select15', ['1/12/13', '1/12/14'])