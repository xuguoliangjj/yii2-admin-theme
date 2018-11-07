<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2015/9/5
 * Time: 23:48
 */
namespace admin\models;
use yii\base\Model;
use Yii;

/**
 * Class Rule
 * @package admin\models
 */
class Rule extends Model{
    /**
     * @var string name of the rule
     */
    public $name;

    /**
     * @var integer UNIX timestamp representing the rule creation time
     */
    public $createdAt;

    /**
     * @var integer UNIX timestamp representing the rule updating time
     */
    public $updatedAt;

    /**
     * @var string Rule classname.
     */
    public $className;

    /**
     * @var Rule
     */
    private $_item;

    public function __construct($item=NULL, $config = [])
    {
        $this->_item = $item;
        if ($item !== null) {
            $this->name = $item->name;
            $this->className = get_class($item);
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'className'], 'required'],
            [['className'], 'string'],
            [['className'], 'classExists']
        ];
    }

    /**
     * 检查规则类是否存在
     */
    public function classExists()
    {
        if (!class_exists($this->className) || !is_subclass_of($this->className, \yii\rbac\Rule::className())) {
            $this->addError('className', "未知的规则类: {$this->className}");
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

    /**
     * @param $id
     * @return null|static
     */
    public static function find($id)
    {
        $item = Yii::$app->authManager->getRule($id);
        if($item != NULL)
            return new static($item);
        else
            return NULL;
    }

    /**
     * save or update
     * @return bool
     */
    public function save()
    {
        if($this->validate()){
            $auth = Yii::$app->authManager;
            $class = $this->className;
            if ($this->_item === null) {
                $this->_item = new $class();
                $isNew = true;
            } else {
                $isNew = false;
                $oldName = $this->_item->name;
            }
            $this->_item->name = $this->name;

            if ($isNew) {
                $auth->add($this->_item);
            } else {
                $auth->update($oldName, $this->_item);
            }
            return true;
        }else{
            return false;
        }
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => '名称',
            'className' => '规则类'
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
}