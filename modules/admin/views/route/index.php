<?php
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
                'summary'=>'',
                'columns'=>[
                    ['attribute'=>'name','label'=>'名称','filter'=>true],
                    ['attribute'=>'description','label'=>'简述','format'=>'raw','editable'=>['editor',function($model){
                            return [
                                'data-title'=> '修改简述',
                                'data-type'=>'text',
                                'data-pk'=>$model['name'],
                                'data-url'=>\yii\helpers\Url::to(['/admin/route/update'])
                            ];
                        }]
                    ],
//                    ['attribute'=>'createdAt','label'=>'创建时间','format'=>['date', 'php:Y-m-d H:i:s']],
//                    ['attribute'=>'updatedAt','label'=>'更新时间','format'=>['date', 'php:Y-m-d H:i:s']],
                    ['class' => 'xuguoliangjj\editorgridview\ActionColumn','template' => '{delete}'],
                ]
            ]);
            ?>
        </div>
    </div>