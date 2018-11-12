<?php
$this->title = '权限列表';
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
                 \yii\helpers\Html::button('新增权限',['class'=>'layui-btn','data-url'=>\yii\helpers\Url::to(['/admin/permission/create'])])
            ],
            'columns'=>[
                ['attribute'=>'name','label'=>'名称','filter'=>true],
                ['attribute'=>'description','label'=>'简述'],
                ['attribute'=>'createdAt','label'=>'创建时间','format'=>['date', 'php:Y-m-d H:i:s']],
                ['attribute'=>'updatedAt','label'=>'更新时间','format'=>['date', 'php:Y-m-d H:i:s']],
                ['class' => 'xuguoliangjj\editorgridview\ActionColumn','template' => '{view} {update} {delete}'],
            ]
        ]);

        ?>
    </div>
</div>