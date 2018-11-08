<?php
$this->title = '角色管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="layui-card">
    <div class="layui-card-header">
        <?= $this->title?>
    </div>
    <div class="layui-card-body">
        <?= \xuguoliangjj\editorgridview\EditorGridView::widget([
            'dataProvider'=>$dataProvider,
            'filterModel'=>$model,
            'summary'=>'',
            'buttons'=>[
                \yii\helpers\Html::a('添加角色',['/admin/roles/create'],['class'=>'layui-btn'])
            ],
            'columns'=>[
                ['attribute'=>'name','label'=>'名称','filter'=>true],
                ['attribute'=>'description','label'=>'简述'],
                ['attribute'=>'ruleName','label'=>'规则名'],
                ['attribute'=>'createdAt','label'=>'创建时间','format'=>['date', 'php:Y-m-d H:i:s']],
                ['attribute'=>'updatedAt','label'=>'更新时间','format'=>['date', 'php:Y-m-d H:i:s']],
                ['class' => 'xuguoliangjj\editorgridview\ActionColumn','template' => '{view} {update} {delete}'],
            ]
        ]);
        ?>
    </div>
</div>