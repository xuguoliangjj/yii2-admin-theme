<?php
$this->title = '角色管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default own-panel">
    <div class="panel-heading">
        角色管理
        <span class="pull-right own-toggle">
        <a class="glyphicon glyphicon-chevron-up"></a>
        </span>
    </div>
    <div class="panel-body">
        <?= \xuguoliangjj\editorgridview\EditorGridView::widget([
            'dataProvider'=>$dataProvider,
            'filterModel'=>$model,
            'summary'=>'',
            'buttons'=>[
                \yii\helpers\Html::a('添加角色',['/admin/roles/create'],['class'=>'btn btn-sm btn-primary'])
            ],
            'columns'=>[
                ['class' => 'yii\grid\ActionColumn','template' => '{view} {update} {delete}'],
                ['attribute'=>'name','label'=>'名称','filter'=>true],
                ['attribute'=>'description','label'=>'简述'],
                ['attribute'=>'ruleName','label'=>'规则名'],
                ['attribute'=>'createdAt','label'=>'创建时间','format'=>['date', 'php:Y-m-d H:i:s']],
                ['attribute'=>'updatedAt','label'=>'更新时间','format'=>['date', 'php:Y-m-d H:i:s']]
            ]
        ]);
        ?>
    </div>
</div>