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
        $this->layout='@app/views/layouts/empty';
        $model = new Rule();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','添加成功');
            $this->closeWindows();
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }

    public function actionUpdate($id)
    {
        $this->layout='@app/views/layouts/empty';
        $model = Rule::find($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','修改成功');
            $this->closeWindows();
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
