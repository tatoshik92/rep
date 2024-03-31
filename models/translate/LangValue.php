<?php

namespace app\models\translate;
use Yii;
use yii\db\ActiveRecord;

class LangValue extends ActiveRecord{


    public static function tableName(){
        return 'lang_value';
    }


    static function createItem($code,$value){
        $item = new self();
        $item->code = $code;
        $item->default_value = $value;
        $item->save();
    }


    static function getList($curentId = 1){
        $translate = LangValueTranslate::getByLangId($curentId);
        $default = self::find()->all();

        $listreturn = [];
        foreach ($default as $item){
            $listreturn[$item['code']] = (!empty($translate[$item['id']]['value']) ? $translate[$item['id']]['value'] : $item['default_value']);
        }
        return $listreturn;

    }


    static function getListNoDefault($curentId = 1){
        $translate = LangValueTranslate::getByLangId($curentId);
        $default = self::find()->all();

        $listreturn = [];
        foreach ($default as $item){
            if(!empty($translate[$item['id']])){
                $listreturn[$item['code']] = (!empty($translate[$item['id']]) ? $translate[$item['id']]['value'] : $item['default_value'] );
            }

        }
        return $listreturn;

    }




}