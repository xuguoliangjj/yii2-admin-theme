<?php
$this->title = '修改用户 - ' . $model->username;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="layui-card">
    <div class="layui-card-header">
        <?= $this->title?>
    </div>
    <div class="layui-card-body">
        <?= $this->render('_form',['model'=>$model])?>
    </div>
</div>