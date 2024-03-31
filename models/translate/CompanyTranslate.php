<?php

namespace app\models\translate;
use Yii;
use yii\db\ActiveRecord;

class CompanyTranslate extends ActiveRecord{


    public static function tableName(){
        return 'company_translate';
    }


    static function getValues($company_id){
        $translate = [];
        $findRes = self::find()->where(['company_id'=>$company_id])->all();
        foreach ($findRes as $res){
            $translate[$res->lang] = $res;
        }
        return $translate;
    }


    static function saveCompany($company_id,$fields){

        foreach ($fields as $langId=>$value){
            $translate = self::find()->where(['company_id'=>$company_id, 'lang'=>$langId])->one();
            if(!$translate){
                $translate = new self();
            }
            $translate->company_id = $company_id;
            $translate->name = htmlspecialchars($value['name']);
            $translate->description = htmlspecialchars($value['description']);
            $translate->lang = $langId;
            $translate->save();
        }

    }


}