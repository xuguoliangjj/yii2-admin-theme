<?php
use yii\helpers\Html;
use yii\helpers\Url;
use \xuguoliangjj\editorgridview\EditorGridView;
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
        <?= EditorGridView::widget([
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'summary'=>'',
            'buttons'=>[
                Html::button('新增规则',['class'=>'layui-btn','data-url'=>Url::to(['/admin/rule/create'])])
            ],
            'columns'=>[
                ['attribute'=>'name','label'=>'名称','filter'=>true],
                ['class' => 'xuguoliangjj\editorgridview\ActionColumn','template' => '{view} {update} {delete}'],
            ]
        ]);
        ?>
    </div>
</div>