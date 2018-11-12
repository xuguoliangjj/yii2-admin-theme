<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/9/5
 * Time: 1:29
 */


$this->title = '修改权限';
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


