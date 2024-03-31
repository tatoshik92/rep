<?php

namespace app\models\translate;
use Yii;
use yii\db\ActiveRecord;

class Lang extends ActiveRecord{

    public $translate = [];

    public static function tableName(){
        return 'lang';
    }

    static function getActive(){
        return self::find()->where(['active'=>'Y'])->all();
    }

    static function getByCode($code){
        return self::find()->where(['code'=>$code])->one();
    }

    static function getList(){
        return self::find()->all();
    }

    function loadTValue($code = ''){
        $this->translate = LangValue::getListNoDefault($this->id);
    }


}