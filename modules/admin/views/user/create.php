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

<div class="panel panel-default own-panel">
    <div class="panel-heading">
        添加用户
        <span class="pull-right own-toggle">
            <a class="glyphicon glyphicon-chevron-up"></a>
        </span>
    </div>
    <div class="panel-body">
        <?= $this->render('_form',[
            'model'=>$model
        ])?>
    </div>
</div>