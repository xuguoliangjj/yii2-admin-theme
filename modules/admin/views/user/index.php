<?php
use \xuguoliangjj\editorgridview\EditorGridView;


$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="layui-card">
    <div class="layui-card-header">
        <?= $this->title?>
    </div>
    <div class="layui-card-body">
        <?php
        echo EditorGridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $model,
            'buttons'=>[
                \yii\helpers\Html::a('添加用户',['/admin/user/create'],['class'=>'layui-btn'])
            ],
            'summary'=>'',
            'columns'=>[
                ['attribute'=>'id','label'=>'序列'],

                ['attribute'=>'username','format'=>'raw','editable'=>['editor',function($model){
                    return [
                        'data-type'=>'text',
                        'data-pk'=>$model->id,
                        'data-url'=>\yii\helpers\Url::to(['/setting/user/change-name'])
                    ];
                }],'filter'=>true],
                ['attribute'=>'phone','label'=>'手机号','filter'=>true],
                ['attribute'=>'email'],
                ['attribute'=>'created_at','label'=>'创建时间','value'=>function($model){
                    return Yii::$app->formatter->asDate($model->created_at,'php:Y-m-d H:i:s');
                }],
                ['attribute'=>'updated_at','label'=>'修改时间','value'=>function($model){
                    return Yii::$app->formatter->asDate($model->updated_at,'php:Y-m-d H:i:s');
                }],
                ['class' => 'xuguoliangjj\editorgridview\ActionColumn']
            ]
        ]);
        ?>
    </div>
</div>