<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/9/5
 * Time: 18:15
 */
$this->title = '新增权限';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default own-panel">
    <div class="panel-heading">
        <?= $this->title?>
        <span class="pull-right own-toggle">
            <a class="glyphicon glyphicon-chevron-up"></a>
        </span>
    </div>
    <div class="panel-body">
        <?= $this->render('_form',[
            'model'=>$model,
            'rules'=>$rules
        ])?>
    </div>
</div>