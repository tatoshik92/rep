<?php

namespace app\modules\acp\controllers;
use app\models\Company;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;


class CompanyController extends Controller{

    public function beforeAction($action){
        if(Yii::$app->user->identity->isSuperAdmin != 'Y'){
            Yii::$app->response->redirect('/acp/profile/');
            Yii::$app->end();
        }

        return parent::beforeAction($action);
    }

    public function actionIndex(){
        $companies = Company::find()->all();
        return $this->render('list',compact('companies'));
    }



    public function actionEdit($id){
        $company = Company::find()->where(['id'=>$id])->one();
        if(Yii::$app->request->isPost){
            $company->saveItem(Yii::$app->request->post());
            Yii::$app->session->setFlash('success', "Company updated successfully");
            Yii::$app->response->redirect('/acp/company/edit/'.$company->id.'/');
            Yii::$app->end();
        }

        return $this->render('form',compact('company'));
    }

    public function actionCreate(){
        $company = new Company();
        if(Yii::$app->request->isPost){
            $company->saveItem(Yii::$app->request->post());
            Yii::$app->response->redirect('/acp/company/');
            Yii::$app->session->setFlash('success', "Company successfully established");
            Yii::$app->end();
        }

        return $this->render('form',compact('company'));
    }

    public function actionDelete($id){
        $company = Company::find()->where(['id'=>$id])->one();
        if($company){
            $company->delete();
            Yii::$app->session->setFlash('success', "Company deleted successfully");
        }

        Yii::$app->response->redirect('/acp/company/');
        Yii::$app->end();
        return $this->render('form',compact('company'));
    }

}
