<?php

namespace admin\controllers;
use app\components\BaseController;

use app\models\ResetPasswordForm;
use app\models\User;
use Yii;
use yii\web\Response;

/**
 * Class PersonalController
 * @package admin\controllers
 */
class PersonalController extends BaseController
{
    /**
     * @return string|Response
     */
    public function actionResetPassword()
    {
        $model = new ResetPasswordForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = User::findOne(Yii::$app->user->id);
            $user->setPassword($model->password);
            if($user->save()) {
                Yii::$app ->session->setFlash('success','修改密码成功');
                return $this->goHome();
            }
        }
        return $this->render('reset-password', [
            'model' => $model,
        ]);
    }
}
