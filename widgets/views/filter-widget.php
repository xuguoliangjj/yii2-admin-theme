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
<div class="layui-form-item">
    <div class="layui-inline">
        <div class="layui-btn-group" id="own-filter-date-quick">
            <button class="layui-btn layui-btn-primary layui-btn-sm" data-date="0">今日</button>
            <button class="layui-btn layui-btn-primary layui-btn-sm" data-date="-1">昨天</button>
            <button class="layui-btn layui-btn-primary layui-btn-sm" data-date="-2">前天</button>
            <button class="layui-btn layui-btn-sm" data-date="-7">近7天</button>
            <button class="layui-btn layui-btn-primary layui-btn-sm" data-date="-15">近15天</button>
            <button class="layui-btn layui-btn-primary layui-btn-sm" data-date="-30">近30天</button>
        </div>
    </div>
</div>

<?php $form = ActiveForm::begin([
    'fieldConfig' => [
        'labelOptions' => ['class'=>'layui-form-label']
    ],
    'id'=>'filter-form'
]); ?>
<div class="layui-form-item">
    <?= $form->field($model, 'date',['parts'=>['{label}'=>false],'options'=>['class'=>'layui-inline']])->textInput([
            'class'=>'layui-input date-range-input'
    ]) ?>

    <?= $form->field($model, 'join',['parts'=>['{label}'=>false],'options'=>['class'=>'layui-inline']])->multipleDropDownList([
        ''=>'请选择合作方'
    ],['xm-select'=>'join-filter']) ?>

    <?= $form->field($model, 'system',['parts'=>['{label}'=>false],'options'=>['class'=>'layui-inline']])->multipleDropDownList([
        ''=>'请选择系统'
    ],['xm-select'=>'system-filter']) ?>
    <?= $form->field($model, 'partner',['parts'=>['{label}'=>false],'options'=>['class'=>'layui-inline']])->multipleDropDownList([
        ''=>'请选择渠道'
    ],['xm-select'=>'partner-filter'])  ?>
    <?= $form->field($model, 'platform',['parts'=>['{label}'=>false],'options'=>['class'=>'layui-inline']])->multipleDropDownList([
        ''=>'请选择马甲包'
    ],['xm-select'=>'platform-filter'])  ?>

    <div class="layui-inline">
        <div class="layui-input-inline">
            <?= Html::button('搜索',
                ['class' => 'layui-btn','id'=>'filter-search']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>