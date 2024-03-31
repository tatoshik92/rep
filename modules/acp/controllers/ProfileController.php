<?php

namespace app\modules\acp\controllers;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use app\models\user\Props;


class ProfileController extends Controller{

    public function actionIndex(){
        $user = Yii::$app->user->identity;

        if($user->accessEdit == 'N'){
            return $this->render('no_access');
        }

        if(Yii::$app->request->isPost){
            $user->saveItem(Yii::$app->request->post());
            Props::savePropsInUserFromPost($user->id);
            Yii::$app->session->setFlash('success', "Profile updated successfully");
            Yii::$app->response->redirect('/acp/profile/');
            Yii::$app->end();
        }

        return $this->render('form',compact('user'));
    }

}
