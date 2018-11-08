<?php
/* @var $this yii\web\View */
?>
<?php
$this->title = '规则列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="layui-card">
    <div class="layui-card-header">
        <?= $this->title?>
    </div>
    <div class="layui-card-body">
        <?= \xuguoliangjj\editorgridview\EditorGridView::widget([
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'summary'=>'',
            'buttons'=>[
                \yii\helpers\Html::a('新增规则',['/admin/rule/create'],['class'=>'layui-btn'])
            ],
            'columns'=>[
                ['attribute'=>'name','label'=>'名称','filter'=>true],
                ['class' => 'xuguoliangjj\editorgridview\ActionColumn','template' => '{view} {update} {delete}'],
            ]
        ]);
        ?>
    </div>
</div>