<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/7/27
 * Time: 11:51
 */
namespace xuguoliangjj\editorgridview;

use yii\bootstrap\Alert;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\base\Model;
use app\widgets\LinkPager;

class EditorGridView extends GridView
{
    public $summaryOptions = ['class' => 'summary pull-right'];
    public $dataColumnClass;
    public $tableOptions = ["class"=>"grid-view layui-table","width"=>"100%"];
    public $outerTableOptions = ['class'=>'own-table-outer'];
    public $options = ['class'=>'grid-view','style'=>'clear:both;'];
    /**
     * @var string the HTML content to be displayed when [[dataProvider]] does not have any data.
     */
    public $emptyText='<center>没有找到数据</center>';
    /**
     * @inheritdoc
     */
    public $emptyCell='';
    /**
     * @inheritdoc
     */
    public $filterRowOptions = ['class' => 'layui-elem-quote filters form-inline'];
    /**
     * @inheritdoc
     */
    public $filterErrorOptions = ['class' => ''];

    public $buttonOptions = ['class'=>'layui-elem-quote'];
    /**
     * @var array
     * 搜索发生的错误
     */
    public $filterErrors = [];

    /**
     * @var按钮
     */
    public $buttons = [];
    /**
     * @var bool
     * 是否用datatable渲染，默认true
     */
    public $isDatatable = true;
    /**
     * @var string
     * Perform one of the built in error reporting actions:
     * alert (default) - Alert the error
     * throw - Throw a Javascript error
     * none - Do nothing (you would want to use this error in this case)
     */
    public $tableErrMode = 'none';
    /**
     * @var string
     * 是否开启表格排序,默认关闭
     */
    public $tableOrdering = false;

    public $layout = "{items}\n{pager}";
    public function init()
    {
        $this -> dataColumnClass = EditorDataColumn::className();
        parent::init();
    }

    public function run()
    {
        $id = $this->options['id'];
        $options = Json::htmlEncode($this->getClientOptions());
        $view = $this->getView();
        EditorGridViewAsset::register($view);
        $view->registerJs("jQuery('#$id').yiiGridView($options);$(document).off('change.yiiGridView keydown.yiiGridView');");
        if ($this->showOnEmpty || $this->dataProvider->getCount() > 0) {
            $content = preg_replace_callback("/{\\w+}/", function ($matches) {
                $content = $this->renderSection($matches[0]);

                return $content === false ? $matches[0] : $content;
            }, $this->layout);
        } else {
            $content = $this->renderEmpty();
        }

        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'div');
        echo Html::tag($tag, $content, $options);
        foreach ($this->columns as $column) {
            if(isset($column->attribute) && $column->editable)
            {
                $models = $this->dataProvider->getModels();
                if(($model = reset($models)) instanceof Model)
                {
                    $name = Html::getInputName($model, $column->attribute);
                }else{
                    $name = $column->attribute;
                }

                $attributeName = $column->attribute;
//                $view->registerJs("$('.$attributeName').editable({
//                    placement:'right',
//                    ajaxOptions: {
//                        type: 'GET',
//                        dataType: 'json'
//                    },
//                    success: function(response, newValue) {
//                        if(response.status=='success')
//                        {
//                            return jQuery('#{$this->options['id']}').yiiGridView('applyFilter');
//                        }
//                        else
//                        {
//                            return response.msg;
//                        }
//                    },
//                    params: function(rawParams) {
//                        var params = {};
//                        params['$name']=rawParams.value;
//                        params['pk']=rawParams.pk;
//                        return params;
//                    }
//                });");
            }
        }
        if($this->isDatatable) {
            $class = $this->outerTableOptions['class'];
            $id = $this->options['id'];
            $view->registerJs(<<<EOD
EOD
            );
        }
    }

    /**
     * Renders the data models for the grid view.
     */
    public function renderItems()
    {
        $button = $this->renderTableButtons();
        $caption = $this->renderCaption();
        $columnGroup = $this->renderColumnGroup();
        $tableHeader = $this->showHeader ? $this->renderTableHeader() : false;
        $tableBody = $this->renderTableBody();
        $tableFooter = $this->showFooter ? $this->renderTableFooter() : false;
        $filter = $this->renderFilters();            //筛选过滤
        $content = array_filter([
            $caption,
            $columnGroup,
            $tableHeader,
            $tableFooter,
            $tableBody,
        ]);

        $this->tableOptions['lay-filter'] = $this->options['id'];
        $this->tableOptions['lay-data'] = Json::encode([
            'page' => false,
            'limit' => PHP_INT_MAX,
            'id' => $this->options['id'],
            'autoSort'=>true,
            'height'=> 500,

        ]);
        $table = Html::tag('table', implode("\n", $content), $this->tableOptions);
        return $filter.$button.$this->renderSummary().Html::tag('div',$table,$this->outerTableOptions);
    }

    /**
     * Renders the pager.
     * @return string the rendering result
     */
    public function renderPager()
    {
        $pagination = $this->dataProvider->getPagination();
        if ($pagination === false || $this->dataProvider->getCount() <= 0) {
            return '';
        }
        /* @var $class LinkPager */
        $pager = $this->pager;
        $class = ArrayHelper::remove($pager, 'class', LinkPager::className());
        $pager['pagination'] = $pagination;
        $pager['firstPageLabel'] = true;
        $pager['lastPageLabel'] = true;
        $pager['view'] = $this->getView();

        return $class::widget($pager);
    }
    /*
     * 添加表格按钮
     */
    public function renderTableButtons()
    {
        if(!empty($this->buttons)) {
            $content = Html::beginTag('div',$this->buttonOptions);
            $content .= Html::tag('div', implode('', $this->buttons), ['class'=>'admin-grid-buttons']);
            $content .= Html::endTag('div');
            return $content;
        }
        else
            return $this->emptyCell;
    }

    /**
     * Renders the table header.
     * @return string the rendering result.
     */
    public function renderTableHeader()
    {
        $cells = [];
        foreach ($this->columns as $column) {
            /* @var $column Column */
            $cells[] = $column->renderHeaderCell();
        }
        $content = Html::tag('tr', implode('', $cells), $this->headerRowOptions);

        return "<thead>\n" . $content . "\n</thead>";
    }

    /**
     * Renders the table footer.
     * @return string the rendering result.
     */
    public function renderTableFooter()
    {
        $cells = [];
        foreach ($this->columns as $column) {
            /* @var $column Column */
            $cells[] = $column->renderFooterCell();
        }
        $content = Html::tag('tr', implode('', $cells), $this->footerRowOptions);

        return "<tfoot>\n" . $content . "\n</tfoot>";
    }

    /**
     * Renders the filter.
     * @return string the rendering result.
     */
    public function renderFilters()
    {
        if ($this->filterModel !== null) {
            $id = $this->options['id'];
            $view = $this->getView();
            $view->registerJs("jQuery('#$id #filter-search').click(
                function(){jQuery('#$id').yiiGridView('applyFilter')})
            ");
            $cells = [];
            $searchBtn = false;
            foreach ($this->columns as $column) {
                /* @var $column Column */
                $html = $column->renderFilterCell();
                if($html != null){
                    $searchBtn = true;
                }
                if($html) {
                    $cells[] = Html::tag('div', $html,['class'=>'layui-inline']);
                }
            }
            if($searchBtn) {
                $cells[] = Html::tag('div', Html::button('查询', ['class' => 'layui-btn', 'id' => 'filter-search']),['class'=>'layui-inline']);
            }
            $filterError = !empty($this->filterErrors) ? Alert::widget([
                'options' => [
                    'class' => 'alert-warning',
                ],
                'body' => implode("\n",$this->filterErrors),
            ]) : '';
            return Html::tag('form', implode('', $cells), $this->filterRowOptions).$filterError;
        } else {
            return '';
        }
    }
}