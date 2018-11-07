<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/9/27
 * Time: 2:55
 */
namespace admin\models;

use yii\base\Model;

/**
 * Class AuthPermissionForm
 * @package admin\setting\models
 */
class AuthPermissionForm extends Model
{
    public $routes;
    public $permissions;
    public $app;
    public $platforms;

    /**
     * @return array
     */
    public function rules()
    {
        return [
           // ['routes,permissions','default','value'=>[]]
        ];
    }

    /**
     * @return array
     */
    public function scenarios()
    {
        return [
            'auth'=>['routes','permissions','app','platforms']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'routes'=>'路由',
            'permissions'=>'权限',
            'app'=>'游戏',
            'platforms'=>'地区'
        ];
    }
}