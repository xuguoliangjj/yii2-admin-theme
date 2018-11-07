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
        <?= $form->field($model,'name')?>
        <?= $form->field($model,'className')->textarea()?>
        <?= Html::submitButton('添加',
            ['class' => 'btn btn-success btn-sm']) ?>
    </div>
<?php ActiveForm::end(); ?>