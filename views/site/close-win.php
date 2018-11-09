<?php
$this->registerJs("
layer.load(1, {
  shade: [0.3,'#fff'] //0.1透明度的白色背景
});
parent.layer.closeAll('iframe');
parent.location.reload();
");
?>