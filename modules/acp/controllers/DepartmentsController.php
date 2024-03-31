<?php

namespace app\modules\acp\controllers;
use app\models\Department;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;


class DepartmentsController extends Controller{

    public function beforeAction($action){
        if(Yii::$app->user->identity->isSuperAdmin != 'Y'){
            Yii::$app->response->redirect('/acp/profile/');
            Yii::$app->end();
        }

        return parent::beforeAction($action);
    }

    public function actionIndex(){
        $deps = Department::find()->all();
        return $this->render('list',compact('deps'));
    }


    public function actionView($id){
        $dep = Department::findOne($id);
        return $this->render('view',compact('dep'));
    }


    public function actionEdit($id){
        $dep = Department::find()->where(['id'=>$id])->one();
        if(Yii::$app->request->isPost){
            $dep->saveItem(Yii::$app->request->post());
            Yii::$app->session->setFlash('success', "Department updated successfully");
            Yii::$app->response->redirect('/acp/departments/edit/'.$dep->id.'/');
            Yii::$app->end();
        }

        return $this->render('form',compact('dep'));
    }

    public function actionCreate(){
        $dep = new Department();

        if(Yii::$app->request->isPost){
            $dep->saveItem(Yii::$app->request->post());
            Yii::$app->session->setFlash('success', "Department successfully established");
            Yii::$app->response->redirect('/acp/departments/');
            Yii::$app->end();
        }

        return $this->render('form',compact('dep'));
    }


    public function actionDelete(){
        $id = intval($_GET['id']);
        $dep = Department::findOne($id);
        if($dep){
            $dep->delete();
            Yii::$app->session->setFlash('success', "Department successfully deleted");
            Yii::$app->response->redirect('/acp/departments/');
        }

        Yii::$app->end();
        return '';
    }


}
