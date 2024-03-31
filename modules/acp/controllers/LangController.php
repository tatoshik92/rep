<?php

namespace app\modules\acp\controllers;
use app\models\Department;
use app\models\translate\Lang;
use app\models\translate\LangValue;
use app\models\translate\LangValueTranslate;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;


class LangController extends Controller{

    public function beforeAction($action){
        if(Yii::$app->user->identity->isSuperAdmin != 'Y'){
            Yii::$app->response->redirect('/acp/profile/');
            Yii::$app->end();
        }

        return parent::beforeAction($action);
    }

    public function actionIndex(){
        if(Yii::$app->request->isPost and Yii::$app->request->post('action') == 'lang_conf'){
            //save Active lang
            $this->saveCongLang();

        }
        if(Yii::$app->request->isPost and Yii::$app->request->post('action') == 'lang_translate'){
            $this->saveTranslate();
        }
        return $this->render('index');
    }


    private function saveCongLang(){
        $listLang = Lang::getList();
        foreach ($listLang as $lang){
            if($_POST['lang'][$lang->id] == 'Y'){
                $lang->active = 'Y';
            }else{
                $lang->active = 'N';
            }
            $lang->save();

        }
    }

    private function saveTranslate(){
        foreach ($_POST['langvalue'] as $langId=>$codeItem){
            foreach ($codeItem as $codeId => $value){
                LangValueTranslate::updateItem($langId,$codeId,$value);
            }
        }
    }


}
