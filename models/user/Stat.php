<?php

namespace app\models\user;

use app\models\translate\PropsTranslate;
use Yii;
use yii\web\Request;
use yii\db\ActiveRecord;


class Stat extends \yii\db\ActiveRecord{

    public static function tableName(){
        return 'user_page_stat_open';
    }


    static function addView($userId){
        $curentDay = self::find()->where(['user_id' => $userId,'date' => date('Y-m-d')])->one();
        if(!$curentDay){
            $curentDay = new self();
            $curentDay->user_id = $userId;
            $curentDay->count = 0;
            $curentDay->date = date('Y-m-d');
        }

        $curentDay->count =  $curentDay->count + 1;
        $curentDay->save();
    }

    static function getLastRecords($userId = null, $count = 7){
        $return = [];
        if(is_null($userId)){
            $userId = Yii::$app->user->identity->id;
        }
        $auxArr = self::find()->asArray()->where(['user_id'=>$userId])->limit($count)->orderBy(['date'=>SORT_DESC])->all();
        foreach ($auxArr as $item){
            $return[$item['date']] = $item['count'];
        }

        return $return;
    }

}
