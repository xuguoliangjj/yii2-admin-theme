<?php

namespace admin\controllers;

use app\components\BaseController;
use admin\models\AssignmentForm;
use admin\models\permission\search\UserSearch;

use admin\models\SignupForm;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use Yii;

/**
 * Class UserController
 * @package admin\controllers
 */
class UserController extends BaseController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = new UserSearch();
        $dataProvider = $model -> search(Yii::$app->request->get());
        return $this->render('index',[
            'dataProvider'=>$dataProvider,
            'model'=>$model
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $this->layout='@app/views/layouts/empty';
        $model = new AssignmentForm();
        $user = User::findOne($id);
        $model -> setScenario('auth');
        $authManager = Yii::$app->authManager;
        if($model -> load(Yii::$app->request->post()) && $model -> validate()){
            foreach($model->getAttributes() as $key => $value){
                if(empty($value)){
                    $model->$key=[];
                }
            }
            //Revokes all roles from a user.
            try {
                $authManager->revokeAll($id);
                //角色
                if(is_array($model->roles)) {
                    foreach ($model->roles as $name) {
                        $item = $authManager->getRole($name);
                        $authManager->assign($item, $id);
                    }
                }

            }catch (\Exception $e){
                Yii::$app ->session->setFlash('fail',$e->getMessage());
                $this -> refresh();
                Yii::$app->end();
            }
            Yii::$app ->session->setFlash('success','授权成功');
            $this -> redirect(['index']);
        }
        $roles = $authManager->getRoles();
        $roles = ArrayHelper::map($roles,'name','name');
        foreach($authManager->getAssignments($id) as $name => $item){
            if($name[0] == '/'){
                $model -> permissions[$authManager -> getPermission($name) -> description] =  $name;
            }elseif(substr($name,0,3) == 'app'){
                $model -> app[$name]  = $name;
            }else{
                $model -> roles[$name] = $name;
            }
        }
        return $this->render('view',[
            'model'=>$model,
            'roles'=>$roles,
            'user'=>$user
        ]);
    }

    /**
     * @param $pk
     */
    public function actionChangeName($pk)
    {
        $model = UserSearch::findOne($pk);
        if($model)
        {
            $model->load(Yii::$app->request->get());
            if(UserSearch::findOne(['username'=>$model->username]))
            {
                return Json::encode(array('status' => 'error','msg'=>'改用户名已被使用'));
            }
            if($model->update())
            {
                return Json::encode(array('status' => 'success'));
            }else{
                return Json::encode(array('status' => 'error','msg'=>'修改名称失败'));
            }
        }else{
            return Json::encode(array('status' => 'error','msg'=>'不存在此人'));
        }
    }

    /**
     * @param $pk
     */
    public function actionChangeTime($pk)
    {
        $model = UserSearch::findOne($pk);
        if($model)
        {
            $model->load(Yii::$app->request->get());
            $model->created_at = strtotime($model->created_at);

            if($model->update())
            {
                echo Json::encode(array('status' => 'success'));
            }else{
                echo Json::encode(array('status' => 'error','msg'=>'修改时间失败'));
            }
        }else{
            echo Json::encode(array('status' => 'error','msg'=>'不存在此人'));
        }
        Yii::$app->end();
    }

    /**
     * @return string
     */
    public function actionCreate()
    {
        $this->layout='@app/views/layouts/empty';
        $model = new SignupForm();
        $model->setScenario('create');
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                Yii::$app ->session->setFlash('success','添加成功');
                $this->redirect(['index']);
            }
        }
        return $this->render('create',[
            'model' => $model
        ]);
    }

    /**
     * 删除用户
     * @param $id
     */
    public function actionDelete($id)
    {
        $model = User::findOne($id);
        if($model->delete()) {
            Yii::$app->authManager->revokeAll($id);
            Yii::$app ->session->setFlash('success','用户' .$model->username .'已成功删除');
            $this->redirect(['index']);
        }else{
            Yii::$app ->session->setFlash('fail','用户' .$model->username .'删除失败');
            $this->redirect(['index']);
        }
    }

    /**
     * 修改用户账号、邮箱、密码
     * @param $id
     * @return string
     */
    public function actionUpdate($id)
    {
        $this->layout='@app/views/layouts/empty';
        $model = (new SignupForm())->findOne($id);
        $username = $model->username;
        if ($model->load(Yii::$app->request->post())) {
            if($username != $model->username)
            {
                if(User::findOne(['username'=>$model->username]))
                {
                    $model->addError('username','用户名和其他用户重复');
                }
            }
            $user = User::findOne($id);
            $user->username=$model->username;
            $user->email   =$model->email;
            $user->phone = $model->phone;
            if($model->password)
            {
                $user->setPassword($model->password);
            }
            if($model->validate($model->activeAttributes(),false) && $user->save())
            {
                Yii::$app ->session->setFlash('success','修改成功');
                $this->redirect(['index']);
            }
        }
        return $this->render('update',[
            'model' => $model
        ]);
    }

}
