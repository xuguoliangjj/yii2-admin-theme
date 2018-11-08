<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2018/11/8
 * Time: 10:16
 */
namespace app\widgets;

class LinkPager extends \yii\widgets\LinkPager
{
    /**
     * @var string|bool the label for the "next" page button. Note that this will NOT be HTML-encoded.
     * If this property is false, the "next" page button will not be displayed.
     */
    public $nextPageLabel = '<i class="layui-icon layui-icon-right"></i>';
    /**
     * @var string|bool the text label for the previous page button. Note that this will NOT be HTML-encoded.
     * If this property is false, the "previous" page button will not be displayed.
     */
    public $prevPageLabel = '<i class="layui-icon layui-icon-left"></i>';
}