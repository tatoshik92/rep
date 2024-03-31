<?php

namespace app\modules\acp;
use Yii;

/**
 * auto module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\acp\controllers';

    /**
     * {@inheritdoc}
     */
    public function init(){

        if(!Yii::$app->user->isGuest and isset($_GET['logout'])){
            Yii::$app->user->logout();
        }

        if(Yii::$app->user->isGuest){
            Yii::$app->response->redirect('/login/');
            Yii::$app->end();
        }


        parent::init();


    }
}
