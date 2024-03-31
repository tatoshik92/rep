<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class LoginController extends Controller{



    public function actionIndex($userAlias = null){

        if(!Yii::$app->user->isGuest){
            Yii::$app->response->redirect('/acp/');
            Yii::$app->end();
        }

        $user = User::find()->where(" `alias` = '".htmlspecialchars($userAlias)."' or `uid` = '".htmlspecialchars($userAlias)."'")->one();

        if(Yii::$app->request->isPost){

            if(empty($user)){
                $user = User::find()->where(['id'=>intval($_POST['id'])])->one();
            }

            if ($user and Yii::$app->getSecurity()->validatePassword($_POST['password'], $user->password)) {

                $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

                if(empty(Yii::$app->request->post('fa2code'))){

                    if(empty($user->google2fa_secret)){
                        $user->google2fa_secret = $google2fa->generateSecretKey();
                        $user->save();
                    }

                    return $this->render('fa2code',compact('user','google2fa'));
                }else{

                    if($google2fa->verifyKey($user->google2fa_secret, $_POST['fa2code'])){
                        Yii::$app->user->login($user,3600 * 2400);
                        $user->show2faCode = 0;
                        $user->save();
                        Yii::$app->response->redirect('/acp/');
                        Yii::$app->end();
                    }

                    return $this->render('fa2code',compact('user','google2fa'));
                }

                
            }else{
                //TODO
                //Flash message
            }


        }

        return $this->render('index',compact('user'));
    }

    function actionActivate($id){

        $user = User::find()->where(['id'=>$id,'isActivated'=>'N'])->one();
        //Уже активирован, переносим на логин
        if(!$user){
            Yii::$app->response->redirect('/login/');
            Yii::$app->end();
        }

        if(Yii::$app->request->isPost){
            //Сохраняем юзера
            $user->firstName = htmlspecialchars($_POST['firstName']);
            $user->lastName = htmlspecialchars($_POST['lastName']);
            $user->main_email = htmlspecialchars($_POST['email']);
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($_POST['password']);
            $user->isActivated = 'Y';
            $user->save();

            Yii::$app->user->login($user,3600 * 2400);
            Yii::$app->response->redirect('/acp/');
            Yii::$app->end();
        }

        return $this->render('activate',compact('user'));
    }


}
