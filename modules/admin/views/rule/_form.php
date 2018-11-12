<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/9/5
 * Time: 20:45
 */
use \app\widgets\ActiveForm;
use \yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(['id' => 'create-route-form']); ?>

        <?= $form->field($model,'name')?>
        <?= $form->field($model,'className')->textarea()?>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <?= Html::submitButton('添加',
                    ['class' => 'layui-btn']) ?>
            </div>
        </div>

<?php ActiveForm::end(); ?>