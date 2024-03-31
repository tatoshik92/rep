<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\User;

class AssetsController extends Controller{

    public function actionIndex($userAlias){
        $this->layout = 'assest';

        $user = User::find()->where(" `alias` = '".htmlspecialchars($userAlias)."' or `uid` = '".htmlspecialchars($userAlias)."'")->one();
        if(!$user){
            return 'User Not found';
        }

        if($user->isActivated == 'N'){
            Yii::$app->response->redirect('/login/activate/'.$user->id.'/');
            Yii::$app->end();
        }

        if($user->active == 'B'){
            return 'Profile blocked';
        }

        return $this->render('index',compact('user'));
    }


}
