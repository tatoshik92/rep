<?php

namespace app\models\translate;
use Yii;
use yii\db\ActiveRecord;

class UserTranslate extends ActiveRecord{


    public static function tableName(){
        return 'users_translate';
    }


    static function getValues($user_id){
        $translate = [];
        $findRes = self::find()->where(['user_id'=>$user_id])->all();
        foreach ($findRes as $res){
            $translate[$res->lang] = $res;
        }
        return $translate;
    }


    static function saveUser($userId,$fields){

        foreach ($fields as $langId=>$value){
            $translate = self::find()->where(['user_id'=>$userId, 'lang'=>$langId])->one();
            if(!$translate){
                $translate = new self();
            }

            $translate->user_id = $userId;
            $translate->prefixName = htmlspecialchars($value['prefixName']);
            $translate->suffixName = htmlspecialchars($value['suffixName']);
            $translate->firstName = htmlspecialchars($value['firstName']);
            $translate->lastName = htmlspecialchars($value['lastName']);
            $translate->role = htmlspecialchars($value['role']);
            $translate->note = htmlspecialchars($value['note']);
            $translate->lang = $langId;

            $translate->save();

        }

    }


}