yii.allowAction = function ($e) {
    var message = $e.data('confirm');
    return message === undefined || yii.confirm(message, $e);
};
// --- Delete action (bootbox) ---
yii.confirm = function (message, ok, cancel) {
    var index = layer.confirm(message, {
        btn: ['确定','取消'] //按钮
    }, function(){
        !ok || ok();
        layer.close(index);
    }, function(){
        !cancel || cancel();
        layer.close(index);
    });
};