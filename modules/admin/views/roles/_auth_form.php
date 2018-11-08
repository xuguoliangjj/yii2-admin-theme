<?php
/**
* Created by PhpStorm.
* User: xuguoliang
* Date: 2015/9/13
* Time: 19:07
*/
use app\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>
<?php $form = ActiveForm::begin(['id' => 'auth-role-form']); ?>

<div class="layui-form-item" style="width:200px;margin-bottom: 10px;">
<div  class="layui-input-block">
    <input placeholder="搜索" type="text" class="layui-input" id="searchPage"/>
</div>
</div>

<?= $form->field($model, 'roles')->checkboxList($result['Roles'],[
    'class'=>'own-routes-list',
    'item' => function ($index, $label, $name, $checked, $value) {
        return Html::checkbox($name, $checked, [
            'value' => $value,
            'title' => $label,
            'lay-skin'=>'primary'
        ]);
    }
]); ?>

<?= $form->field($model, 'permissions')->checkboxList($result['Permissions'],[
    'class'=>'own-routes-list',
    'item' => function ($index, $label, $name, $checked, $value) {
        return Html::checkbox($name, $checked, [
            'value' => $value,
            'title' => $label,
            'lay-skin'=>'primary'
        ]);
    }
]); ?>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend><?= Html::activeLabel($model, 'routes', ['class' => 'control-label'])?></legend>
</fieldset>
<div class="own-routes-list">
<?php foreach($routes as $items):?>
    <?php foreach($items['items'] as $sub):?>
        <?php foreach($sub['items'] as $item):?>
            <?php
                if(!$item['items']) {continue;}
                $check = count(array_intersect(ArrayHelper::map($item['items'],'url','url'), $model->routes)) == count($item['items']);
                $allCheck = '
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            '.Html::checkbox('all',$check,['class' => 'routes-check-all','title'=>$item['label'] . '-全选','lay-skin'=>'primary']).'
                        </div>
                    </div>
                ';
            ?>
            <?= $form->field($model, 'routes',['parts'=>['{label}'=>$allCheck]])->checkboxList(ArrayHelper::map($item['items'],'url','label'),
                    [
                        'unselect'=>null,
                        'class'=>'own-routes-list',
                        'encode'=>false,
                        'item' => function ($index, $label, $name, $checked, $value) {
                            return Html::checkbox($name, $checked, [
                                'value' => $value,
                                'title' => $label,
                                'lay-skin'=>'primary'
                            ]);
                        }
                    ]
                ); ?>
        <?php endforeach;?>
    <?php endforeach;?>
<?php endforeach;?>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <?= Html::submitButton('修改', ['class' => 'layui-btn']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>

<?php
$this->registerJs("
// 搜索角色名
$('#searchPage').keyup(function(){
    var val = $(this).val();
    // 查找当前选择的筛选条件
    $('#roleauthform-roles input').each(function(){
         var str = $(this).val();
          if(str.indexOf(val)>=0){
            $(this).parent().show();
        }else{
            $(this).parent().hide();
        }
    });
});

// 搜索投放平台
$('#searchChannel').keyup(function(){
    var val = $(this).val();
    // 查找当前选择的筛选条件
    $('#roleauthform-channels input').each(function(){
         var str = $(this)[0].nextSibling.nodeValue;
         if(str.indexOf(val)>=0){
            $(this).parent().show();
        }else{
            $(this).parent().hide();
        }
    });
});
"); ?>
