<?php
$this->title = '权限列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="layui-card">
    <div class="layui-card-header">
        <?= $this->title?>
    </div>
    <div class="layui-card-body">
        <?php
        echo \xuguoliangjj\editorgridview\EditorGridView::widget([
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'summary'=>'',
            'buttons'=>[
                \yii\helpers\Html::a('新增权限',['/admin/permission/create'],['class'=>'layui-btn'])
            ],
            'columns'=>[
                ['class' => 'xuguoliangjj\editorgridview\ActionColumn','template' => '{view} {update} {delete}'],
                ['attribute'=>'name','label'=>'名称','filter'=>true],
                ['attribute'=>'description','label'=>'简述'],
                ['attribute'=>'createdAt','label'=>'创建时间','format'=>['date', 'php:Y-m-d H:i:s']],
                ['attribute'=>'updatedAt','label'=>'更新时间','format'=>['date', 'php:Y-m-d H:i:s']]
            ]
        ]);

        ?>
    </div>
</div>