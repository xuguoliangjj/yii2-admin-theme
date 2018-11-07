<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/9/13
 * Time: 19:04
 */
namespace admin\models;

use yii\base\Model;

/**
 * Class RoleAuthForm
 * @package admin\models
 */
class RoleAuthForm extends Model
{
    public $routes = [];
    public $roles;
    public $permissions;
    public $app;
    public $platforms;
    public $channels;
    public $companys;
    public $partners;
    public $ctypes;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['roles','required']
        ];
    }

    /**
     * @return array
     */
    public function scenarios()
    {
        return [
            'auth'=>['routes','permissions','roles','app','platforms','channels','companys','partners','ctypes']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'routes'=>'权限',
            'roles'=>'角色',
            'permissions'=>'权限组',
            'app'=>'游戏',
            'platforms'=>'地区',
            'channels'=>'投放平台',
            'companys'=>'公司',
            'partners'=>'合作方',
            'ctypes'=>'广告类型',
        ];
    }
}