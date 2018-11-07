<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/9/5
 * Time: 18:15
 */

use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'repassword')->passwordInput() ?>
<?= $form->field($model, 'phone')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('添加', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
<?php ActiveForm::end(); ?>