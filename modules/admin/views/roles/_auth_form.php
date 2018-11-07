<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/9/13
 * Time: 19:07
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>
<?php $form = ActiveForm::begin(['id' => 'auth-role-form']); ?>

<div style="width:200px;margin-bottom: 10px;">
    <div class="input-group">
        <input placeholder="搜索角色" type="text" class="form-control" id="searchPage"/>
        <span class="input-group-addon""><i class="glyphicon glyphicon-search"></i></span>
    </div>
</div>

<?= $form->field($model, 'roles')->checkboxList($result['Roles'],['class'=>'own-routes-list']); ?>

<?= $form->field($model, 'permissions')->checkboxList($result['Permissions'],['class'=>'own-routes-list']); ?>
<?= Html::activeLabel($model, 'routes', ['class' => 'control-label']);?>
    <div class="own-routes-list">
<?php foreach($routes as $items):?>
    <div class="page-header">
        <h4><b><?= $items['label']?></b></h4>
    </div>
    <?php foreach($items['items'] as $sub):?>
        <h5><i>菜单：<?= $sub['label']?></i></h5>
        <?php foreach($sub['items'] as $item):?>
            <?php
            if(!$item['items']) {continue;}
            $check = count(array_intersect(ArrayHelper::map($item['items'],'url','url'), $model->routes)) == count($item['items']);
            $allCheck = Html::label(Html::checkbox('all',$check,['class' => 'routes-check-all']) . "&nbsp;" . '[全选] - ' . $item['label']);
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
<?php endforeach;?>

    <div class="form-group">
        <?= Html::submitButton('修改', ['class' => 'btn btn-success btn-sm']) ?>
    </div>
<?php ActiveForm::end(); ?>

<?php
$this->registerJs("
    // 搜索角色名
    $('#searchPage').keyup(function(){
        var val = $(this).val();
        // 查找当前选择的筛选条件
        $('#roleauthform-roles input').each(function(){
             var str = $(this).val();
              if(str.indexOf(val)>=0){
                $(this).parent().show();
            }else{
                $(this).parent().hide();
            }
        });
    });
    
    // 搜索投放平台
    $('#searchChannel').keyup(function(){
        var val = $(this).val();
        // 查找当前选择的筛选条件
        $('#roleauthform-channels input').each(function(){
             var str = $(this)[0].nextSibling.nodeValue;
             if(str.indexOf(val)>=0){
                $(this).parent().show();
            }else{
                $(this).parent().hide();
            }
        });
    });
"); ?>
