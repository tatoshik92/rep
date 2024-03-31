<?php

namespace app\models\translate;
use Yii;
use yii\db\ActiveRecord;

class PropsTranslate extends ActiveRecord{


    public static function tableName(){
        return 'user_props_translate';
    }


    static function getValues($propsId){
        $translate = [];
        $findRes = self::find()->where(['props_id'=>$propsId])->all();
        foreach ($findRes as $res){
            $translate[$res->lang] = $res;
        }

        return $translate;
    }


    static function saveProps($propsId,$userId,$lang,$value){
            $translate = self::find()->where(['props_id'=>$propsId,'user_id'=>$userId, 'lang'=>$lang])->one();
            if(!$translate){
                $translate = new self();
            }
            $translate->props_id = $propsId;
            $translate->user_id = $userId;
            $translate->value = ($value);
            $translate->lang = intval($lang);
            $translate->save();
    }


    static function cleanTranslate($user_id){
        Yii::$app->db->CreateCommand("DELETE FROM `".self::tableName()."` WHERE `user_id` = '".$user_id."'")->execute();
    }


}