<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2016/4/4
 * Time: 16:53
 */
$this->title = '添加用户';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="layui-card">
    <div class="layui-card-header">
        <?= $this->title?>
    </div>
    <div class="layui-card-body">
        <?= $this->render('_form',[
            'model'=>$model
        ])?>
    </div>
</div>