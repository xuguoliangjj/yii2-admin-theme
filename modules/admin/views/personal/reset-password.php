<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2018/11/26
 * Time: 14:43
 */
use \yii\helpers\Html;
use \app\widgets\ActiveForm;

$this->title = '修改密码';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="layui-card">
    <div class="layui-card-header">
        <?= $this->title?>
    </div>
    <div class="layui-card-body">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'repassword')->passwordInput() ?>
        <div class="form-group">
            <?= Html::submitButton('修改', ['class' => 'layui-btn']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>