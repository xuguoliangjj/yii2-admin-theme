<?php
$this->title = '修改用户 - ' . $model->username;
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
        <?= $this->render('_resetpass_form',['model'=>$model])?>
    </div>
</div>