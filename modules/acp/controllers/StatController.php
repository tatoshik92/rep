<?php

namespace app\modules\acp\controllers;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;


class StatController extends Controller{

    public function actionIndex(){
        $user = Yii::$app->user->identity;
        return $this->render('index',compact('user'));
    }

}
