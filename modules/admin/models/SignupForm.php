<?php
namespace admin\models;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repassword;
    public $phone;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.','on'=>['create']],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            //['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.','on'=>['create']],

            [['password','repassword'], 'required','on'=>['create']],
            [['password','repassword'], 'string', 'min' => 6],
            ['repassword', 'compare', 'compareAttribute' => 'password','message'=>'两次输入的密码不一致！'],
            [['phone'],'required'],
            [['phone'], 'string', 'max' => 13],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->phone = $this->phone;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

    /**
     * @param $id
     * @return $this
     */
    public function findOne($id)
    {
        $user = User::findOne($id);
        $this->username=$user->username;
        $this->email   =$user->email;
        $this->phone = $user->phone;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'email'    => '邮箱',
            'password' => '密码',
            'repassword' => '重复密码',
            'phone' => '手机号',
        ];
    }
}
