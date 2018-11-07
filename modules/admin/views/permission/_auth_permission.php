<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/9/27
 * Time: 2:58
 *     <?= $form->field($model, 'routes',['parts'=>['{label}'=>$label]])->checkboxList($items,
[
'unselect'=>null,
'class'=>'own-routes-list'
]
); ?>
 */
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
use \yii\helpers\ArrayHelper;
?>
<?php $form = ActiveForm::begin(['id' => 'auth-role-form']); ?>
<?= $form->field($model, 'permissions')->checkboxList($permissions,['class'=>'own-routes-list']); ?>

<?= Html::activeLabel($model, 'routes', ['class' => 'control-label']);?>
<div class="own-routes-list">
<?php foreach($routes as $items):?>
    <div class="page-header">
        <h4><b><?= $items['label']?></b></h4>
    </div>
    <?php foreach($items['items'] as $item):?>
        <?php
            $check = count(array_intersect(ArrayHelper::map($item['items'],'url','url'), $model->routes)) == count($item['items']);
            $allCheck = Html::label(Html::checkbox('all',$check,['class' => 'routes-check-all']) . "&nbsp;" . $item['label']);
        ?>
        <?= $form->field($model, 'routes',['parts'=>['{label}'=>$allCheck]])->checkboxList(ArrayHelper::map($item['items'],'url','label'),
            [
                'unselect'=>null,
                'class'=>'own-routes-list',
                'encode'=>false
            ]
        ); ?>
    <?php endforeach;?>
<?php endforeach;?>
</div>
    <div class="form-group">
        <?= Html::submitButton('修改', ['class' => 'btn btn-success btn-sm']) ?>
    </div>
<?php ActiveForm::end(); ?>

<script>
    <?php $this->beginBlock('js_end') ?>
    $(document).ready(function(){$("#signupform-verifycode-image").click();});
    <?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['js_end'],\yii\web\View::POS_LOAD);
