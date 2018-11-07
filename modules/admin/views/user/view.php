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

<div class="panel panel-default own-panel">
    <div class="panel-heading">
        <?= $this->title?>
        <span class="pull-right own-toggle">
            <a class="glyphicon glyphicon-chevron-up"></a>
        </span>
    </div>
    <div class="panel-body">
        <?= $this->render('_auth_form',[
            'model'=>$model,
            'roles'=>$roles
        ])?>
    </div>
</div>
