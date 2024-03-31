<?php

namespace app\modules\acp\controllers;
use app\models\Company;
use app\models\Config;
use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;


class GcardController extends Controller{

    public function beforeAction($action){
        if(Yii::$app->user->identity->isSuperAdmin != 'Y'){
            Yii::$app->response->redirect('/acp/profile/');
            Yii::$app->end();
        }

        return parent::beforeAction($action);
    }

    public function actionIndex(){

        if(Yii::$app->request->isPost){
            //Кол-во карт,
            //Компания//
            $count = intval($_POST['count']);
            $company_id = intval($_POST['company_id']);
            $isActivete = ($_POST['isActivated'] == 'N' ? 'N' : 'Y');

            for ($i=1;$i<=$count;$i++){
                $card = new User();
                $card->firstName = '';
                $card->lastName = '';
                $card->isActivated = $isActivete;
                $card->company_id = $company_id;
                $card->active = 'Y';
                $card->password = Yii::$app->getSecurity()->generatePasswordHash(Yii::$app->security->generateRandomString());
                $card->uid = Yii::$app->security->generateRandomString();
                $card->save();
            }

            Yii::$app->session->setFlash('success', "Profiles generated");
        }

        $companies = Company::find()->all();
        return $this->render('index',compact('companies'));
    }


}
