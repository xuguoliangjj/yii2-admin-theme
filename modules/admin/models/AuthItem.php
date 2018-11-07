<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/8/30
 * Time: 0:14
 */

namespace admin\models;

use yii\base\Model;
use Yii;
use yii\rbac\Item;

/**
 * Class AuthItem
 * @package admin\models
 */
class AuthItem extends Model{
    public $type;
    public $name;
    public $description;
    public $ruleName;
    public $data;

    //Item
    private $_item;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ruleName'], 'in',
                'range' => array_keys(Yii::$app->authManager->getRules()),
                'message' => 'Rule not exists'],
            [['name', 'type','description'], 'required'],
            [['type'], 'integer'],
            [['description', 'data', 'ruleName'], 'default'],
            [['name', 'ruleName'], 'string', 'max' => 64]
        ];
    }

    /**
     * 初始化对象
     * @param Item  $item
     * @param array $config
     */
    public function __construct($item=NULL, $config = [])
    {
        $this->_item = $item;
        if ($item !== null) {
            $this->name = $item->name;
            $this->type = $item->type;
            $this->description = $item->description;
            $this->ruleName = $item->ruleName;
            $this->data = $item->data;
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => '名称',
            'type' => '类型',
            'description' => '描述',
            'ruleName' => '规则名称',
            'data' => '数据',
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Get item
     * @return Item
     */
    public function getItem()
    {
        return $this->_item;
    }

    /**
     * 检查是否是新记录
     * @return boolean
     */
    public function getIsNewRecord()
    {
        return $this->_item === null;
    }

    public function save()
    {
        if($this->validate()) {
            $manager = Yii::$app->authManager;
            if ($this->_item === null) {
                if ($this->type == Item::TYPE_ROLE) {
                    $this->_item = $manager->createRole($this->name);
                } else {
                    $this->_item = $manager->createPermission($this->name);
                }
                //新增新的角色
                $isNew = true;
            }else{
                //修改现有角色
                $isNew = false;
                $oldName = $this->_item->name;
            }
            $this->_item->name = $this->name;
            $this->_item->description = $this->description;
            $this->_item->ruleName = $this->ruleName;
            $this->_item->data = $this->data;

            if ($isNew) {
                $manager->add($this->_item);
            } else {
                $manager->update($oldName, $this->_item);
            }
            return true;
        }else{
            return false;
        }
    }

    public static function findByPk($id)
    {
        $item = Yii::$app->authManager->getPermission($id);
        if($item != NULL)
            return new static($item);
        else
            return NULL;
    }
}