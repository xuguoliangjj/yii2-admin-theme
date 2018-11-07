<?php
/* @var $this yii\web\View */
?>
<?php
$this->title = '规则列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php \yii\widgets\Pjax::begin()?>
    <div class="panel panel-default own-panel">
        <div class="panel-heading">
            规则列表
            <span class="pull-right own-toggle">
                <a class="glyphicon glyphicon-chevron-up"></a>
            </span>
        </div>
        <div class="panel-body">
            <?= \xuguoliangjj\editorgridview\EditorGridView::widget([
                'dataProvider'=>$dataProvider,
                'filterModel'=>$searchModel,
                'summary'=>'',
                'buttons'=>[
                    \yii\helpers\Html::a('新增规则',['/admin/rule/create'],['class'=>'btn btn-sm btn-primary'])
                ],
                'columns'=>[
                    ['attribute'=>'name','label'=>'名称','filter'=>true],
                    ['class' => 'yii\grid\ActionColumn','template' => '{view} {update} {delete}'],
                ]
            ]);
            ?>
        </div>
    </div>
<?php \yii\widgets\Pjax::end()?>