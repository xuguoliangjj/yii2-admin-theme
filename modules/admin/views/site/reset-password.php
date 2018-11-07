<?php
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
$this->title = '修改密码';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php \yii\widgets\Pjax::begin(); ?>
    <div class="panel panel-default own-panel">
        <div class="panel-heading">
            修改密码
        <span class="pull-right own-toggle">
            <a class="glyphicon glyphicon-chevron-up"></a>
        </span>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'repassword')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton('修改', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

<?php \yii\widgets\Pjax::end(); ?>