<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/9/5
 * Time: 20:45
 */
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(['id' => 'create-route-form']); ?>
    <div class="form-group">
        <?= $form->field($model,'route')?>
        <?= $form->field($model,'description')->textarea()?>
        <?= Html::submitButton($model -> isNewRecord ? '添加' : '修改',
            ['class' => 'btn btn-success btn-sm']) ?>
    </div>
<?php ActiveForm::end(); ?>