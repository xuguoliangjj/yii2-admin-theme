<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/8/2
 * Time: 12:48
 */
namespace admin\models\permission\search;
use yii\data\ActiveDataProvider;

/**
 * Class UserSearch
 * @package admin\models\permission\search
 */
class UserSearch extends \app\models\User
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username','email'],'required'],
            [['created_at','updated_at'],'integer'],
            ['email','email'],
            [['phone'],'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'email' => '邮箱',
            'created_at'=>'创建时间',
            'phone'     => '手机号'
        ];
    }

    public function search($params)
    {
        $query = UserSearch::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>1
            ]
        ]);
        if (!$this->load($params)) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'username', $this->username]);
        $query->andFilterWhere(['like', 'phone', $this->phone]);
        return $dataProvider;
    }
}