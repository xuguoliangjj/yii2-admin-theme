<?php

namespace admin\controllers;
use app\components\BaseController;

use admin\models\RoleAuthForm;
use admin\models\permission\search\AuthItemSearch;
use admin\models\AuthItem;
use Yii;
use yii\helpers\ArrayHelper;
use yii\rbac\Item;
use yii\web\NotFoundHttpException;

/**
 * Class RolesController
 * @package admin\controllers
 */
class RolesController extends BaseController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = new AuthItemSearch(['type'=>Item::TYPE_ROLE]);
        $dataProvider = $model->search(Yii::$app->request->get());
        return $this->render('index',[
            'dataProvider'=>$dataProvider,
            'model'=>$model
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout='@app/views/layouts/empty';
        $rules = ArrayHelper::merge([''=>'NONE'],ArrayHelper::map(Yii::$app->getAuthManager()->getRules(),'name','name'));
        $model = new AuthItem();
        $model->type=Item::TYPE_ROLE;             //角色
        if($model->load(Yii::$app->getRequest()->post()) && $model->save()) {
            return $this->redirect(['view','id'=>$model->name]);
        }else{
            return $this->render('create',[
                'model'=>$model,
                'rules'=>$rules
            ]);
        }
    }

    /**
     * @param $id
     * 删除角色，id是角色名
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->authManager->remove($model->item)){
            Yii::$app->session->setFlash('success',"删除 $id 成功");
        } else {
            Yii::$app->session->setFlash('fail', "删除 $id 失败");
        }
        $this->closeWindows();
    }

    /**
     * @param $id
     * @return string
     * 修改角色名、简述。。
     */
    public function actionUpdate($id)
    {
        $this->layout='@app/views/layouts/empty';
        $rules = ArrayHelper::merge([''=>'NONE'],ArrayHelper::map(Yii::$app->getAuthManager()->getRules(),'name','name'));
        $model =  $this->findModel($id);
        if($model->load(Yii::$app->getRequest()->post()) && $model->save()) {
            Yii::$app->session->setFlash('success',"修改 $id 成功");
            $this->closeWindows();
        }
        return $this->render('update',[
            'model'=>$model,
            'rules'=>$rules
        ]);
    }

    /**
     * @param $id
     * @param string $term
     * @return string
     */
    public function actionView($id,  $term = '')
    {
        $this->layout='@app/views/layouts/empty';
        $model = new RoleAuthForm();
        $model->roles = [$id=>$id];
        $model->setScenario('auth');
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            foreach($model->getAttributes() as $key => $value){
                if(empty($value)){
                    $model->$key=[];
                }
            }
            $roles = ArrayHelper::merge(
                $model->roles,
                $model->permissions,
                $model->routes
            );

            $manager = Yii::$app->getAuthManager();
            $parent = $manager->getRole($id);
            $manager->removeChildren($parent);
            foreach ($roles as $role) {
                if($role == $id){
                    continue;
                }
                $child = $manager->getRole($role);
                $child = $child ? : $manager->getPermission($role);
                if($child) {
                    $manager->addChild($parent, $child);
                }
            }
            Yii::$app->session->setFlash('success',"修改 $id 权限成功");
            $this->closeWindows();
        }
        $result = [
            'Roles'       => [],
            'Routes'      => [],
            'Permissions' => []
        ];
        $authManager = Yii::$app->authManager;
        $children = array_keys($authManager->getChildren($id));
        if(empty($children)){
            //throw new ErrorException('cannot find id '.$id);
        }
        $children[] = $id;
        foreach ($authManager->getRoles() as $name => $role) {
            if (empty($term) or strpos($name, $term) !== false) {
                $result['Roles'][$name] = $name;                //角色权限
            }
        }

        foreach ($authManager->getPermissions() as $name => $role) {
            if (empty($term) or strpos($name, $term) !== false) {
                if($name[0] === '/'){                           //路由权限
                    $result['Routes'][$name] = $name;
                }else{                                          //权限组
                    $result['Permissions'][$name] = $role->description;
                }
            }
        }

        foreach ($authManager->getChildren($id) as $name => $child) {
            if (empty($term) or strpos($name, $term) !== false) {
                if ($child->type == Item::TYPE_ROLE) {
                    $model->roles[$name]      = $name;
                } else {
                    if($name[0] === '/'){
                        $model->routes[$name] = $name;
                    }else{
                        $model->permissions[$name]   = $name;
                    }
                }
            }
        }

        $routes = require(Yii::getAlias('@app/config/permission.php'));
        return $this->render('view',[
            'id' => $id,
            'result'=>$result,
            'model' =>$model,
            'routes'=>$routes
        ]);
    }

    /**
     * @param $id
     * @return AuthItem
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        $item = Yii::$app->getAuthManager()->getRole($id);
        if ($item) {
            return new AuthItem($item);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
