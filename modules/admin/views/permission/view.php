<?php
$this->title = '修改权限';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default own-panel">
    <div class="panel-heading">
        修改权限
        <span class="pull-right own-toggle">
            <a class="glyphicon glyphicon-chevron-up"></a>
        </span>
    </div>
    <div class="panel-body">
        <?= $this->render('_auth_permission',[
            'model'      =>$model,
            'routes'     =>$routes,
            'permissions'=>$permissions
        ])?>
    </div>
</div>
