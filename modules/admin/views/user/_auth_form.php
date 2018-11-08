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
    <?= $form->field($model, 'roles')->checkboxList($roles,
        [
            'item' => function ($index, $label, $name, $checked, $value) {
                return Html::checkbox($name, $checked, [
                    'value' => $value,
                    'title' => $label,
                ]);
            }
        ]); ?>
    <div class="layui-form-item">
        <div class="layui-input-block">
        <?= Html::submitButton('修改',
            ['class' => 'layui-btn']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>
