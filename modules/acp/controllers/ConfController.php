<?php

namespace app\modules\acp\controllers;
use app\models\Config;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;


class ConfController extends Controller{

    public function beforeAction($action){
        if(Yii::$app->user->identity->isSuperAdmin != 'Y'){
            Yii::$app->response->redirect('/acp/profile/');
            Yii::$app->end();
        }

        return parent::beforeAction($action);
    }

    public function actionIndex(){

        if(Yii::$app->request->isPost){
            Config::saveConf($_POST['conf']);
        }

        $conf = Config::getValues();
        return $this->render('index',compact('conf'));
    }


}
