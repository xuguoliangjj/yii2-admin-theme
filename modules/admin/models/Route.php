<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/9/5
 * Time: 20:49
 */
namespace admin\models;

use yii\base\Model;
use Yii;

class Route extends Model{
    /**
     * @var 路由url
     */
    public $route;

    public $description;

    private $_item;

    /*
     * 是否是新纪录
     */
    private $_isNewRecord=true;

    public function __construct($item=NULL,$config=[])
    {
        $this->_item=$item;
        if($this->_item != NULL){
            $this->route=$item->name;
            $this->description=$item->description;
        }
        parent::__construct($config);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return[
            [['route','description'],'required'],
            [['route','description'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'route' => '路由',
            'description' => '描述'
        ];
    }


    public function save($routes,$descriptions)
    {
        if($this->validate()){
            $auth = Yii::$app->authManager;
            foreach($routes as $key => $route){
                $item = $auth->createPermission('/' . trim($route,'/'));
                $item->description = $descriptions[$key];
                $auth->add($item);
            }
            return true;
        }else{
            return false;
        }
    }

    public function delete($route)
    {
        $auth = Yii::$app->authManager;
        $item = $auth -> getPermission($route);
        if($item == NULL) {
            return false;
        }
        return $auth -> remove($item);
    }

    public function search()
    {
        $auth = Yii::$app->authManager;
        $items = $auth->getPermissions();
        $result = [];
        foreach($items as $item){
            $result[]=[
                'name'=>$item->name,
                'description'=>$item->description
            ];
        }
    }

    public static function find($id)
    {
        $auth = Yii::$app->authManager;
        $item = $auth->getPermission($id);
        if($item != NULL){
            return new static($item);
        }else{
            return NULL;
        }
    }

    /**
     * 检查是否是新纪录
     * @return boolean
     */
    public function getIsNewRecord()
    {
        return $this->_item === null;
    }

}