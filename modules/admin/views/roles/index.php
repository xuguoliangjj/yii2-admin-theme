<?php
use \yii\helpers\Html;
use \yii\helpers\Url;
use \xuguoliangjj\editorgridview\EditorGridView;
$this->title = '角色管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="layui-card">
    <div class="layui-card-header">
        <?= $this->title?>
    </div>
    <div class="layui-card-body">
        <?= EditorGridView::widget([
            'dataProvider'=>$dataProvider,
            'filterModel'=>$model,
            'summary'=>'',
            'buttons'=>[
                Html::button('添加角色',['class'=>'layui-btn','data-url'=>Url::to(['/admin/roles/create'])])
            ],
            'columns'=>[
                ['attribute'=>'name','label'=>'名称','filter'=>true],
                ['attribute'=>'description','label'=>'简述','filter'=>true],
                ['attribute'=>'ruleName','label'=>'规则名'],
                ['attribute'=>'createdAt','label'=>'创建时间','format'=>['date', 'php:Y-m-d H:i:s']],
                ['attribute'=>'updatedAt','label'=>'更新时间','format'=>['date', 'php:Y-m-d H:i:s']],
                ['class' => 'xuguoliangjj\editorgridview\ActionColumn','template' => '{view} {update} {delete}'],
            ]
        ]);
        ?>
    </div>
</div>