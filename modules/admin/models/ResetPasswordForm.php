<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2016/4/4
 * Time: 17:32
 */
namespace admin\models;

use yii\base\Model;
use Yii;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;
    public $repassword;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password','repassword'], 'required'],
            [['password','repassword'], 'string', 'min' => 6],
            ['repassword', 'compare', 'compareAttribute' => 'password','message'=>'两次输入的密码不一致！'],
        ];
    }

    /**
     * Resets password.
     *
     * @return boolean if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);

        return $user->save();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password' => '密码',
            'repassword' => '再次输入密码'
        ];
    }
}
