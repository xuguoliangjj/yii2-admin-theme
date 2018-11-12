<?php
$this->title = '修改权限';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="layui-card">
    <div class="layui-card-header">
        <?= $this->title?>
    </div>
    <div class="layui-card-body">
        <?= $this->render('_auth_permission',[
            'model'      =>$model,
            'routes'     =>$routes,
            'permissions'=>$permissions
        ])?>
    </div>
</div>
