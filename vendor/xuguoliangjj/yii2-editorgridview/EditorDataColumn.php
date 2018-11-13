<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/7/30
 * Time: 19:29
 */
namespace xuguoliangjj\editorgridview;

use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQueryInterface;
use yii\grid\DataColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\Json;

class EditorDataColumn extends DataColumn
{
    /*
     * 是否可编辑
     * ['editor',function(){
     *      return [];
     * }]
     */
    public $editable = [];



    public $filterOptions = ['class'=>'form-group'];

    /**
     * @inheritdoc
     */
    public $filterInputOptions = ['class' => 'layui-input'];

    /**
     * @var array the HTML attributes for the header cell tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $headerOptions = [];

    /**
     * @inheritdoc
     * @param mixed $model
     * @param mixed $key
     * @param int $index
     * @return null|string
     * @throws InvalidConfigException
     */
    public function getDataCellValue($model, $key, $index)
    {
        return parent::getDataCellValue($model,$key,$index);
    }

    /**
     * @inheritdoc
     */
    protected function renderFilterCellContent()
    {
        if (is_string($this->filter)) {
            return $this->filter;
        }

        $model = $this->grid->filterModel;

        if ($this->filter !== false && $model instanceof Model && $this->attribute !== null && $model->isAttributeActive($this->attribute)) {
            if ($model->hasErrors($this->attribute)) {
                Html::addCssClass($this->filterOptions, 'has-error');
                $this->grid->filterErrors[] = '' . Html::error($model, $this->attribute, $this->grid->filterErrorOptions);
            }
            $options = array_merge(['id' => null,'placeholder'=>'请输入','prompt'=>null], $this->filterInputOptions);
            if (is_array($this->filter)) {
                return Html::activeDropDownList($model, $this->attribute, $this->filter, $options);
            } else {
                return Html::activeTextInput($model, $this->attribute, $options);
            }
        } else {
            return parent::renderFilterCellContent();
        }
    }

    /**
     * Renders the header cell.
     */
    public function renderHeaderCell()
    {
        $cell = $this->renderHeaderCellContent();
        $layData = [
            'field' => $this->attribute,
            'title' => $cell,
            'sort'  => $this->grid->tableOrdering ? true : false
        ];
        if($this -> editable) {
            $url = $this -> editable;
            $layData['edit'] = 'string';
            $layData['style'] = 'color:#337ab7;cursor:text;';
            $layData['templet'] = '<div>{{d.'.$this->attribute.'}}<i title="编辑" class="layui-icon layui-icon-edit admin-edit"></i> </div>';
            $view = $this->grid->getView();
            $id = $this->grid->options['id'];
            $view->registerJs(<<<EOD
                layui.use('table', function(){
                    var table = layui.table;
                    //监听单元格编辑
                    table.on('edit($id)', function(obj){
                         $.ajax({
                            type:"post",
                            data:obj.data,
                            url:'$url',
                            beforeSend:function(){
                            
                            },
                            complete:function(){
                            
                            },
                            success:function(json){
                                jQuery('#$id').yiiGridView('applyFilter');
                            }
                         })
                    });
                });
EOD
            );
        }
        $this->headerOptions = array_merge($this->headerOptions, [
            'lay-data' => Json::encode($layData)
        ]);
        return Html::tag('th', $cell, $this->headerOptions);
    }

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        if ($this->content === null) {
            return $this->grid->formatter->format($this->getDataCellValue($model, $key, $index), $this->format);
        } else {
            return parent::renderDataCellContent($model, $key, $index);
        }
    }

    /*
     *
     */
    protected function initEditableColumns($model,&$columns)
    {
       if(!isset($columns['class']))
       {
           $columns['class'] = $this->attribute;
       }
       if(!isset($columns['data-title']))
       {
           $columns['data-title'] = $model->getAttributeLabel($this->attribute);
       }
    }

    /**
     * @inheritdoc
     */
    protected function renderHeaderCellContent()
    {
        if ($this->header !== null || $this->label === null && $this->attribute === null) {
            return parent::renderHeaderCellContent();
        }

        $provider = $this->grid->dataProvider;
        if ($this->label === null) {
            $label = &$this->label;
            if ($provider instanceof ActiveDataProvider && $provider->query instanceof ActiveQueryInterface) {
                /* @var $model Model */
                $model = new $provider->query->modelClass;
                $label = $model->getAttributeLabel($this->attribute);
            } else {
                $models = $provider->getModels();
                if (($model = reset($models)) instanceof Model) {
                    /* @var $model Model */
                    $label = $model->getAttributeLabel($this->attribute);
                } else {
                    $label = Inflector::camel2words($this->attribute);
                }
            }
        } else {
            $label = $this->label;
        }
        if ($this->attribute !== null && $this->enableSorting &&
            ($sort = $provider->getSort()) !== false && $sort->hasAttribute($this->attribute)) {
            $direction = $sort->getAttributeOrder($this->attribute);
            $up = ' <i class="layui-icon layui-icon-up"></i>';
            $down = ' <i class="layui-icon layui-icon-down"></i>';
            $i = '';
            if($direction === SORT_DESC) {
                $i = $down;
            } else if($direction === SORT_ASC){
                $i = $up;
            }
            return $sort->link($this->attribute, array_merge($this->sortLinkOptions, ['label' => ($this->encodeLabel ? Html::encode($label) : $label)])) . $i;
        } else {
            return $this->encodeLabel ? Html::encode($label) : $label;
        }
    }

    /**
     * Renders the filter cell.
     */
    public function renderFilterCell()
    {
        if($this->filter) {
            $content = '<div class="layui-input-inline">' . $this->renderFilterCellContent() . '</div>';
            if($content != $this->grid->emptyCell)
                return Html::tag('label',$this->label.'：',['style'=>'font-weight:bold;']).$content;
        }else {
            return null;
        }
    }
}