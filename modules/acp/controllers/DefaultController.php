<?php

namespace app\modules\acp\controllers;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;


class DefaultController extends Controller{

    public function beforeAction($action){
        if(Yii::$app->user->identity->isSuperAdmin != 'Y'){
            Yii::$app->response->redirect('/acp/profile/');
            Yii::$app->end();
        }

        return parent::beforeAction($action);
    }

    public function actionIndex(){
        $user = Yii::$app->user->identity;
        return $this->render('index',compact('user'));
    }

}
