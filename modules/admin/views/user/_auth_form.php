<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/9/5
 * Time: 18:15
 */

use \app\widgets\ActiveForm;
use \yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(); ?>
<fieldset class="layui-elem-field">
    <legend>角色</legend>
    <div class="layui-field-box">
        <div class="layui-form-item" style="margin-bottom: 10px;">
            <label class="layui-form-label"><i class="layui-icon layui-icon-search"></i></label>
            <div  class="layui-input-inline">
                <input placeholder="搜索" type="text" class="layui-input searchPage"/>
            </div>
        </div>
        <?= $form->field($model, 'roles',['parts'=>['{label}'=>'']])->checkboxList($roles,
            [
                'class'=>'own-routes-list',
                'item' => function ($index, $label, $name, $checked, $value) {
                    return Html::checkbox($name, $checked, [
                        'value' => $value,
                        'title' => $label,
                    ]);
                }
            ]); ?>
    </div>
</fieldset>
    <div class="layui-form-item">
        <div class="layui-input-block">
        <?= Html::submitButton('修改',
            ['class' => 'layui-btn']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>
