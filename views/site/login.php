<?php

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\captcha\Captcha;
?>
<div class="site-login">
    <div class="admin-login-box">
        <h2>Admin System</h2>
    </div>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => [
                'class' => 'layui-form'
        ],
        'fieldConfig' => [
            'template' => "<div class=\"layui-form-item\">{input}</div>\n<blockquote>{error}</blockquote>",
        ],
    ]); ?>
        <label class="layui-icon layui-icon-username admin-icon-username" for="loginform-username"></label>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'layui-input admin-login-input','placeholder'=>'用户名']) ?>
        <label class="layui-icon layui-icon-password admin-icon-password" for="loginform-password"></label>
        <?= $form->field($model, 'password')->passwordInput(['class'=>'layui-input admin-password-input','placeholder'=>'密码']) ?>
        <label class="layui-icon layui-icon-vercode admin-icon-captcha" for="loginform-verifycode"></label>
        <?php echo $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            'captchaAction' => 'site/captcha',
            'options' => [
                'class' => 'layui-input admin-input-captcha',
                'style' => '',
                'placeholder' => '输入验证码',
            ],
            'template' => '
                       {input}&nbsp;&nbsp;{image}
                       ',
            'imageOptions' => [
                'style' => 'max-height:38px;',
                'options' => ['class' => 'admin-captcha']
            ]
        ]) ?>
        <?= $form->field($model, 'rememberMe')->checkbox([
                'lay-skin' => 'primary',
                'title' => '记住密码'
            ],false) ?>
        <?= Html::submitButton('登入', ['class' => 'layui-btn layui-btn-fluid', 'name' => 'login-button']) ?>

    <?php ActiveForm::end(); ?>
</div>
