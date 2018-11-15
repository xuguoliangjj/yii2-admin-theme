<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2018/11/15
 * Time: 10:16
 */
namespace app\widgets\models;

class FilterForm extends \yii\base\Model
{
    //日期
    public $date;
    //合作方
    public $join;
    //设备
    public $system;
    //渠道
    public $partner;
    //包名
    public $platform;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['date','join', 'system','partner', 'platform'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'join'=>'合作方',
            'system'=>'设备',
            'partner'=>'渠道',
            'platform'=>'马甲'
        ];
    }
}