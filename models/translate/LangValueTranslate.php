<?php

namespace app\models\translate;
use Yii;
use yii\db\ActiveRecord;

class LangValueTranslate extends ActiveRecord{


    public static function tableName(){
        return 'lang_value_translate';
    }


    static function getByLangId($id){
        $list = self::find()->where(['lang_id'=>$id])->all();
        $listreturn = [];
        foreach ($list as $item){
            $listreturn[$item['lang_value_id']] = $item;
        }
        return $listreturn;
    }

    static function updateItem($langId,$codeId,$value){
        $item = self::find()->where(['lang_id'=>$langId,'lang_value_id'=>$codeId])->one();
        if(!$item){
            $item = new self();
        }

        $item->lang_value_id = $codeId;
        $item->lang_id = $langId;
        $item->value = htmlspecialchars($value);
        $item->save();
    }
    

}