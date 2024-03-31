<?php

namespace app\modules\acp\controllers;
use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use app\models\user\Props;


class UsersController extends Controller{



    public function beforeAction($action){
        if(Yii::$app->user->identity->isSuperAdmin != 'Y'){
            Yii::$app->response->redirect('/acp/profile/');
            Yii::$app->end();
        }

        return parent::beforeAction($action);
    }

    //Users list
    public function actionIndex(){
        $users = User::find()->all();
        return $this->render('list',compact('users'));
    }



    //Edit user profile
    public function actionEdit($id = null){

        $user = User::findOne($id);

        if(Yii::$app->request->isPost){
            $user->saveItem(Yii::$app->request->post());
            Yii::$app->response->redirect('/acp/users/edit/'.$user->id.'/');
            Yii::$app->session->setFlash('success', "User saved successfully");
            Yii::$app->end();
        }

        return $this->render('form',compact('user'));
    }

    //Create user profile
    public function actionCreate(){
        $user = new User();

        if(Yii::$app->request->isPost){
            $user->saveItem(Yii::$app->request->post());
            //Props::savePropsInUserFromPost($user->id);
            //
            Yii::$app->session->setFlash('success', "User successfully created");
            Yii::$app->response->redirect('/acp/users/edit/'.$user->id.'/');
            Yii::$app->end();
        }

        return $this->render('form',compact('user'));
    }

    //Show profile
    public function actionViews($id = 'null'){
        return $this->render('item');
    }

    public function actionDelete(){
        $id = intval(Yii::$app->request->get('id'));
        $user = User::findOne($id);
        if($user and $user->isSuperAdmin != 'Y'){
            $user->delete();

        }
        Yii::$app->response->redirect('/acp/users/');
        Yii::$app->end();
    }

}
