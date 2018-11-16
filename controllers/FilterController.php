<?php

namespace app\controllers;

use app\components\BaseController;
use app\widgets\models\FilterForm;
use Yii;
use yii\web\Response;


class FilterController extends BaseController
{
    /**
     * Declares the allowed HTTP verbs.
     * Please refer to [[VerbFilter::actions]] on how to declare the allowed verbs.
     * @return array the allowed HTTP verbs.
     */
    protected function verbs()
    {
        return [
            'index' => ['POST'],
        ];
    }

    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new FilterForm();
        if($model->load(Yii::$app->request->post()) && $model->join){
            $arr = [
                'xm-select' => 'join-filter',
                [
                    'name' => '11玩',
                    'value' => '1',
                    'children' => [

                    ]
                ],
                [
                    'name' => '应用宝',
                    'value' => '2',
                    'children' => [
                        'xm-select' => 'system-filter',
                        ['value' => '2', 'name' => 'Android', 'children' => [
                            'xm-select' => 'partner-filter',
                            ['value' => '16', 'name' => '应用宝-16'],
                            ['value' => '272', 'name' => '应用宝-272']
                        ]]
                    ]
                ]
            ];
        }else{
            $arr = [
                'xm-select' => 'join-filter',
                [
                    'name' => '11玩',
                    'value' => '1',
                    'children' => [
                        'xm-select' => 'system-filter',
                        ['value' => '1', 'name' => 'IOS', 'children' => [
                            'xm-select' => 'partner-filter',
                            ['value' => '108', 'name' => '羽厚亦-正版', 'children' => [
                                'xm-select' => 'platform-filter',
                                ['value' => 'com.bundle1', 'name' => '马甲包1'],
                                ['value' => 'com.bundle2', 'name' => '马甲包2'],
                                ['value' => 'com.bundle3', 'name' => '马甲包3']
                            ]]
                        ]],
                        ['value' => '2', 'name' => 'Android', 'children' => [
                            'xm-select' => 'partner-filter',
                            ['value' => '105', 'name' => '羽厚亦-安卓1'],
                            ['value' => '105', 'name' => '羽厚亦-安卓2'],
                            ['value' => '105', 'name' => '羽厚亦-安卓3']
                        ]]
                    ]
                ],
                [
                    'name' => '应用宝',
                    'value' => '2',
                    'children' => [
                        'xm-select' => 'system-filter',
                        ['value' => '2', 'name' => 'Android', 'children' => [
                            'xm-select' => 'partner-filter',
                            ['value' => '16', 'name' => '应用宝-16'],
                            ['value' => '272', 'name' => '应用宝-272']
                        ]]
                    ]
                ]
            ];
        }

        return $arr;
    }
}
