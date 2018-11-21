<?php

namespace app\controllers;

use app\components\BaseController;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends BaseController
{
    public $layout='main';

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'minLength' => 4,
                'maxLength' => 4
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout='empty';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * @return string
     */
    public function actionCloseWin()
    {
        $this->layout='empty';
        return $this->render('close-win');
    }

    /**
     * @return mixed
     */
    public function actionMain()
    {

        Yii::$app->response->format = Response::FORMAT_JSON;
        return Json::decode('[{"ymd":"汇总","active_num":1103,"new_dev_num":1052,"new_p":1125,"new_role":1203,"new_pay":830,"new_payp":27,"new_pay_lv":0.02,"new_pay_arpu":30.74,"new_arpu":0.74,"dau_income":50480,"dau_payp":762,"dau_pay_lv":0.15,"pay_arpu":66.25,"dau_arpu":9.82,"dau":5138,"online_avg":0,"online_max":0,"d1":"--","l1":"--","d3":"--","l3":"--","d7":"--","l7":"--","d30":"--","l30":"--"},{"ymd":"20181121","active_num":"5","new_dev_num":"4","new_p":"4","new_role":"7","new_pay":"302.00","new_payp":"1","new_pay_lv":"0.25","new_pay_arpu":"302.00","new_arpu":"75.50","dau_income":"3160.00","dau_payp":"65","dau_pay_lv":"0.19","pay_arpu":"48.62","dau_arpu":"9.32","dau":"339","online_avg":0,"online_max":0,"d1":"","l1":"","d3":"","l3":"","d7":"","l7":"","d30":"","l30":""},{"ymd":"20181120","active_num":"19","new_dev_num":"21","new_p":"25","new_role":"40","new_pay":"6.00","new_payp":"1","new_pay_lv":"0.04","new_pay_arpu":"6.00","new_arpu":"0.24","dau_income":"13276.00","dau_payp":"121","dau_pay_lv":"0.24","pay_arpu":"109.72","dau_arpu":"26.71","dau":"497","online_avg":"0","online_max":"0","d1":"","l1":"","d3":"","l3":"","d7":"","l7":"","d30":"","l30":"","l2":"","d2":""},{"ymd":"20181119","active_num":"15","new_dev_num":"18","new_p":"39","new_role":"28","new_pay":"104.00","new_payp":"2","new_pay_lv":"0.05","new_pay_arpu":"52.00","new_arpu":"2.67","dau_income":"3850.00","dau_payp":"85","dau_pay_lv":"0.16","pay_arpu":"45.29","dau_arpu":"7.31","dau":"527","online_avg":"0","online_max":"0","d1":"3","l1":"7.69%","d3":"","l3":"","d7":"","l7":"","d30":"","l30":"","l2":"","d2":""},{"ymd":"20181118","active_num":"17","new_dev_num":"11","new_p":"12","new_role":"30","new_pay":"0.00","new_payp":"0","new_pay_lv":"0.00","new_pay_arpu":"0.00","new_arpu":"0.00","dau_income":"4270.00","dau_payp":"89","dau_pay_lv":"0.17","pay_arpu":"47.98","dau_arpu":"8.24","dau":"518","online_avg":"0","online_max":"0","d1":"3","l1":"25.00%","d3":"","l3":"","d7":"","l7":"","d30":"","l30":""},{"ymd":"20181117","active_num":"18","new_dev_num":"24","new_p":"30","new_role":"50","new_pay":"0.00","new_payp":"0","new_pay_lv":"0.00","new_pay_arpu":"0.00","new_arpu":"0.00","dau_income":"5480.00","dau_payp":"95","dau_pay_lv":"0.17","pay_arpu":"57.68","dau_arpu":"9.73","dau":"563","online_avg":"0","online_max":"0","d1":"0","l1":"0.00%","d3":"0","l3":"0.00%","d7":"","l7":"","d30":"","l30":""},{"ymd":"20181116","active_num":"28","new_dev_num":"34","new_p":"57","new_role":"56","new_pay":"274.00","new_payp":"3","new_pay_lv":"0.05","new_pay_arpu":"91.33","new_arpu":"4.81","dau_income":"9766.00","dau_payp":"101","dau_pay_lv":"0.16","pay_arpu":"96.69","dau_arpu":"15.50","dau":"630","online_avg":"0","online_max":"0","d1":"4","l1":"7.02%","d3":"4","l3":"7.02%","d7":"","l7":"","d30":"","l30":""},{"ymd":"20181115","active_num":"391","new_dev_num":"381","new_p":"395","new_role":"402","new_pay":"54.00","new_payp":"9","new_pay_lv":"0.02","new_pay_arpu":"6.00","new_arpu":"0.14","dau_income":"6066.00","dau_payp":"105","dau_pay_lv":"0.11","pay_arpu":"57.77","dau_arpu":"6.37","dau":"952","online_avg":"0","online_max":"0","d1":"34","l1":"8.61%","d3":"18","l3":"4.56%","d7":"","l7":"","d30":"","l30":""},{"ymd":"20181114","active_num":"610","new_dev_num":"559","new_p":"563","new_role":"590","new_pay":"90.00","new_payp":"11","new_pay_lv":"0.02","new_pay_arpu":"8.18","new_arpu":"0.16","dau_income":"4612.00","dau_payp":"101","dau_pay_lv":"0.09","pay_arpu":"45.66","dau_arpu":"4.15","dau":"1112","online_avg":"0","online_max":"0","d1":"47","l1":"8.35%","d3":"22","l3":"3.91%","d7":"","l7":"","d30":"","l30":""}]');
    }
}
