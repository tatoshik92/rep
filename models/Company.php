<?php

namespace app\models;
use app\models\translate\CompanyTranslate;
use Yii;
use yii\db\ActiveRecord;
use app\models\Files;

class Company extends ActiveRecord{

    public $translations = [];

    public static function tableName(){
        return 'company';
    }

    public function getLogo(){
        return $this->hasOne(Files::className(),['id'=>'logo_id']);
    }



    function saveItem($item){
        if(!empty($item)){
            if(isset($item['name'])){
                $this->name = htmlspecialchars($item['name']);
            }
            if(isset($item['description'])){
                $this->description = htmlspecialchars($item['description']);
            }
            if(isset($item['jscode'])){
                $this->jscode = htmlspecialchars($item['jscode']);
            }
            $this->save();
            $this->logo_id = Files::saveFile('photo','/company/'.$this->id,$this->logo_id);
            $this->save();
            CompanyTranslate::saveCompany($this->id,$_POST['langCompany']);
        }
        return false;
    }




    function getTranslate($lang = 1, $field = 'name',$default = ''){
        $this->getLangValue();

        if(empty($this->translations[$lang][$field])){
            return $default;
        }

        return $this->translations[$lang][$field];
    }

    function getLangValue(){
        if(empty($this->translations)){
            $this->translations = CompanyTranslate::getValues($this->id);
        }

    }



}