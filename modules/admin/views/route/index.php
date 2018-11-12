<?php
use \yii\helpers\Url;
$this->title = '路由列表';
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
            'tableOrdering'=>true,
            'summary'=>'',
            'columns'=>[
                ['attribute'=>'name','label'=>'名称','filter'=>true],
                ['attribute'=>'description','label'=>'简述','format'=>'raw','editable'=>Url::to(['/admin/route/update'])],
                ['class' => 'xuguoliangjj\editorgridview\ActionColumn','template' => '{delete}'],
            ]
        ]);
        ?>
    </div>
</div>