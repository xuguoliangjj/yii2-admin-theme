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

<?= $form->field($model, 'username')->textInput() ?>

<?= $form->field($model, 'email')->textInput() ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'repassword')->passwordInput() ?>
<?= $form->field($model, 'phone')->textInput() ?>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <?= Html::submitButton('提交', ['class' => 'layui-btn', 'name' => 'signup-button']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>