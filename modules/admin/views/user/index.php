<?php
use \xuguoliangjj\editorgridview\EditorGridView;
use \yii\helpers\Url;
use \yii\helpers\Html;

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
                Html::button('添加用户',['class'=>'layui-btn','data-url'=>Url::to(['/admin/user/create'])])
            ],
            'summary'=>'',
            'columns'=>[
                ['attribute'=>'id','label'=>'序列'],

                ['attribute'=>'username','format'=>'raw','filter'=>true,'filterInputOptions'=>['class'=>'layui-input']],
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