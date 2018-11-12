<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/9/27
 * Time: 2:58
 *     <?= $form->field($model, 'routes',['parts'=>['{label}'=>$label]])->checkboxList($items,
[
'unselect'=>null,
'class'=>'own-routes-list'
]
); ?>
 */
use \app\widgets\ActiveForm;
use \yii\helpers\Html;
use \yii\helpers\ArrayHelper;
?>
<?php $form = ActiveForm::begin(['id' => 'auth-role-form']); ?>

    <fieldset class="layui-elem-field">
        <legend>角色</legend>
        <div class="layui-field-box">
            <div class="layui-form-item" style="margin-bottom: 10px;">
                <label class="layui-form-label"><i class="layui-icon layui-icon-search"></i></label>
                <div  class="layui-input-inline">
                    <input placeholder="搜索" type="text" class="layui-input searchPage"/>
                </div>
            </div>
            <?= $form->field($model, 'permissions',['parts'=>['{label}'=>'']])->checkboxList($permissions,[
                'class'=>'own-routes-list',
                'item' => function ($index, $label, $name, $checked, $value) {
                    return Html::checkbox($name, $checked, [
                        'value' => $value,
                        'title' => $label
                    ]);
                }
            ]); ?>
        </div>
    </fieldset>

    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>菜单权限</legend>
    </fieldset>
    <div class="own-routes-list">
<?php foreach($routes as $items):?>
    <?php foreach($items['items'] as $sub):?>
        <?php foreach($sub['items'] as $item):?>
            <?php
            if(!$item['items']) {continue;}
            $check = count(array_intersect(ArrayHelper::map($item['items'],'url','url'), $model->routes)) == count($item['items']);
//                $allCheck = '
//                    <div class="layui-form-item">
//                        <div class="layui-input-block">
//                            '.Html::checkbox('all',$check,['class' => 'routes-check-all','title'=>$item['label'] . '-全选','lay-skin'=>'primary']).'
//                        </div>
//                    </div>';
            ?>
            <fieldset class="layui-elem-field">
                <legend><?= Html::checkbox('all',$check,['class' => 'routes-check-all','title'=>$item['label'],'lay-skin'=>'primary'])?></legend>
                <div class="layui-field-box">
                    <?= $form->field($model, 'routes',['parts'=>['{label}'=>'']])->checkboxList(ArrayHelper::map($item['items'],'url','label'),
                        [
                            'unselect'=>null,
                            'class'=>'own-routes-list',
                            'encode'=>false,
                            'item' => function ($index, $label, $name, $checked, $value) {
                                return Html::checkbox($name, $checked, [
                                    'value' => $value,
                                    'title' => $label,
                                    'lay-skin'=>'primary',
                                    'disabled'=>Yii::$app->authManager->getPermission($value) ? false : 'disabled'
                                ]);
                            }
                        ]
                    ); ?>
                </div>
            </fieldset>
        <?php endforeach;?>
    <?php endforeach;?>
<?php endforeach;?>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <?= Html::submitButton('修改', ['class' => 'layui-btn']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>

<script>
    <?php $this->beginBlock('js_end') ?>
    $(document).ready(function(){$("#signupform-verifycode-image").click();});
    <?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['js_end'],\yii\web\View::POS_LOAD);
