<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/9/5
 * Time: 23:45
 */
namespace admin\models\permission\search;
use admin\components\rule\RouteRule;
use admin\models\Rule;
use yii\base\Model;
use Yii;
use yii\data\ArrayDataProvider;

class RuleSearch extends Model{
    /**
     * @var string name of the rule
     */
    public $name;

    public function rules()
    {
        return [
            [['name'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => '名称',
        ];
    }

    public function search($params)
    {
        $authManager = Yii::$app->authManager;
        $models = [];
        $included = !($this->load($params) && $this->validate() && trim($this->name) !== '');
        foreach ($authManager->getRules() as $name => $item) {
            if ($name != RouteRule::RULE_NAME && ($included || stripos($item->name, $this->name) !== false)) {
                $models[$name] = new Rule($item);
            }
        }

        return new ArrayDataProvider([
            'allModels' => $models,
        ]);
    }
}