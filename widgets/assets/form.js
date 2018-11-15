var formSelects = layui.formSelects;

formSelects.btns('join-filter', ['select', 'remove'], {show: 'name'});
formSelects.btns('system-filter', ['select', 'remove'], {show: 'name'});
formSelects.btns('partner-filter', ['select', 'remove'], {show: 'name'});
formSelects.btns('platform-filter', ['select', 'remove'], {show: 'name'});

layui.formSelects.on('join-filter', function(id, vals, val, isAdd, isDisabled){
    console.log(vals,isAdd,isDisabled);
}, true);

layui.formSelects.on('system-filter', function(id, vals, val, isAdd, isDisabled){
    console.log(vals,isAdd,isDisabled);
}, true);

layui.formSelects.on('partner-filter', function(id, vals, val, isAdd, isDisabled){
    console.log(vals,isAdd,isDisabled);
}, true);

layui.formSelects.on('platform-filter', function(id, vals, val, isAdd, isDisabled){
    console.log(vals,isAdd,isDisabled);
}, true);