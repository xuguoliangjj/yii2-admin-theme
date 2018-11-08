<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/8/9
 * Time: 19:16
 */
$this->title = '角色授权 - ' . $id;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="layui-card">
    <div class="layui-card-header">
        <?= $this->title?>
    </div>
    <div class="layui-card-body">
        <?= $this->render('_auth_form',[
            'model' =>$model,
            'result'=>$result,
            'routes'=>$routes
        ])?>
    </div>
</div>