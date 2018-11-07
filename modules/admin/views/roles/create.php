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


