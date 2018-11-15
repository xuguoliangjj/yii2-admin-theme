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
<?php $form = ActiveForm::begin([
    'fieldConfig' => [
        'labelOptions' => ['class'=>'layui-form-label']
    ]
]); ?>

<?= $form->field($model, 'date',['parts'=>['{label}'=>'&nbsp;'],'options'=>['class'=>'layui-inline']])->textInput([
        'class'=>'layui-input date-range-input'
]) ?>

<?= $form->field($model, 'join',['parts'=>['{label}'=>'&nbsp;'],'options'=>['class'=>'layui-inline']])->multipleDropDownList([
    ''=>'请选择合作方',
    1=>'11玩',
    2=>'麟游',
    3=>'乐玩',
    4=>'摇点',
    5=>'应用宝',
],['xm-select'=>'join-filter']) ?>

<?= $form->field($model, 'system',['parts'=>['{label}'=>'&nbsp;'],'options'=>['class'=>'layui-inline']])->multipleDropDownList([
    ''=>'请选择系统',
    1=>'IOS',
    2=>'Android'
],['xm-select'=>'system-filter']) ?>
<?= $form->field($model, 'partner',['parts'=>['{label}'=>'&nbsp;'],'options'=>['class'=>'layui-inline']])->multipleDropDownList([
    ''=>'请选择渠道',
    1=>'羽厚亦-正版',
    2=>'应用宝'
],['xm-select'=>'partner-filter'])  ?>
<?= $form->field($model, 'platform',['parts'=>['{label}'=>'&nbsp;'],'options'=>['class'=>'layui-inline']])->multipleDropDownList([
    ''=>'请选择马甲包',
    1=>'马甲包1',
    2=>'马甲包2'
],['xm-select'=>'platform-filter'])  ?>


<div class="layui-inline">
    <div class="layui-input-inline">
        <?= Html::submitButton('查询',
            ['class' => 'layui-btn']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>