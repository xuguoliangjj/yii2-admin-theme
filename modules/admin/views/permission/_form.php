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
<?php $form = ActiveForm::begin(['id' => 'create-permission-form']); ?>

<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'description')->textarea()?>
<?= $form->field($model, 'ruleName')->dropDownList($rules) ?>
<?= $form->field($model, 'data')->textarea()?>

    <div class="layui-form-item">
    <div class="layui-input-block">
    <?= Html::submitButton($model->isNewRecord ? '添加' : '修改',
        ['class' => 'layui-btn']) ?>
    </div>
    </div>
<?php ActiveForm::end(); ?>