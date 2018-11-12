<?php

namespace admin\controllers;

use app\components\BaseController;
use admin\models\Route;
use admin\models\permission\search\AuthItemSearch;
use Yii;
use yii\helpers\Json;

/**
 * Class RouteController
 * @package admin\controllers
 */
class RouteController extends BaseController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = new AuthItemSearch();
        $dataProvider = $model->search(Yii::$app->request->get());
        return $this->render('index',[
                'model'=>$model,
                'dataProvider'=>$dataProvider
            ]);
    }

    /**
     * 新增路由
     * @return string
     */
//    public function actionCreate()
//    {
//        $model = new Route();
//        if($model->load(Yii::$app->request->post()))
//        {
//            //按照逗号分隔数组
//            $routes       = preg_split('/\s*,\s*/', trim($model->route), -1, PREG_SPLIT_NO_EMPTY);
//            $descriptions = preg_split('/\s*,\s*/', trim($model->description), -1, PREG_SPLIT_NO_EMPTY);
//            if($model->save($routes,$descriptions)){
//                Yii::$app->session->setFlash('success','添加路由成功');
//                $this->redirect(['index']);
//            }else{
//                Yii::$app->session->setFlash('fail','添加路由失败');
//                $this->redirect(['create']);
//            }
//        }
//        return $this->render('create',['model'=>$model]);
//    }


    public function actionUpdate()
    {
        $pk = Yii::$app->request->post('name');
        $description = Yii::$app->request->post('description');
        $model = Route::find($pk);
        if($model && !$model -> isNewRecord)
        {
            $auth = Yii::$app->authManager;
            $newItem = $auth->createPermission('/' . trim($pk,'/'));
            $newItem -> description = $description;
            if($auth -> update($pk,$newItem)){
                Yii::$app->session->setFlash('success','修改成功');
            }else{
                Yii::$app->session->setFlash('error','修改失败');
            }

        }else{
            //按照逗号分隔数组
            $model = new Route();
            $model->route        = $pk;
            $model->description = $description;
            $routes       = preg_split('/\s*,\s*/', trim($pk), -1, PREG_SPLIT_NO_EMPTY);
            $descriptions = preg_split('/\s*,\s*/', trim($description), -1, PREG_SPLIT_NO_EMPTY);
            if($model->save($routes,$descriptions)){
                Yii::$app->session->setFlash('success','新增路由成功');
            }else{
                Yii::$app->session->setFlash('error','新增路由失败');
            }
        }
    }

    /**
     * @param $id
     */
    public function actionDelete($id)
    {
        $model = new Route();
        if($model ->delete($id)){
            Yii::$app->session->setFlash('success','删除成功');
            $this->redirect(['index']);
        }else{
            Yii::$app->session->setFlash('fail',$id . ' 删除失败');
            $this->redirect(['index']);
        }
    }

}
