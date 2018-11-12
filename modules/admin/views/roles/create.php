<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/8/16
 * Time: 18:42
 */

$this->title = '添加角色';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="layui-card">
    <div class="layui-card-header">
        <?= $this->title?>
    </div>
    <div class="layui-card-body">
        <?= $this->render('_form',[
            'model'=>$model,
            'rules'=>$rules
        ])?>
    </div>
</div>


