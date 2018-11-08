<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/11/6
 * Time: 0:55
 */
$this->title = '用户授权 - ' . $user->username;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="layui-card">
    <div class="layui-card-header">
        <?= $this->title?>
    </div>
    <div class="layui-card-body">
        <?= $this->render('_auth_form',[
            'model'=>$model,
            'roles'=>$roles
        ])?>
    </div>
</div>
