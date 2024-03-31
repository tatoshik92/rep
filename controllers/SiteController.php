<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller{

    public function actionError(){

    }

    public function actionIndex(){
        return $this->render('index');
    }

//    function actionGouser(){
//        $userId = 1;
//        $ident = User::findOne($userId);
//        Yii::$app->user->login($ident,3600 * 2400);
//        return 'User';
//    }

}
