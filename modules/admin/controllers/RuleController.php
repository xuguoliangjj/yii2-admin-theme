<?php

namespace admin\controllers;
use app\components\BaseController;
use admin\models\Rule;
use admin\models\permission\search\RuleSearch;
use Yii;

/**
 * Class RuleController
 * @package admin\controllers
 */
class RuleController extends BaseController
{
    public function actionIndex()
    {
        $searchModel = new RuleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionCreate()
    {
        $model = new Rule();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->name]);
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }

    public function actionUpdate($id)
    {
        $model = Rule::find($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','修改成功');
            return $this->redirect(['index']);
        } else {
            return $this->render('update', ['model' => $model]);
        }
    }

    public function actionDelete($id)
    {
        $model = Rule::find($id);
        Yii::$app->authManager->remove($model->item);
        return $this->redirect(['index']);
    }

}
