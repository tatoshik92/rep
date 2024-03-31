<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Config extends ActiveRecord{



    public static function tableName(){
        return 'system_config';
    }


    static function saveConf($data){
        if(!empty($data)){
            foreach ($data as $name=>$val){
                $item = self::find()->where(['name'=>$name])->one();
                if(!$item){
                    $item = new self();
                    $item->name = $name;
                }

                $item->value = $val;
                $item->save();
            }
        }


        //Logotype
        if($_FILES['photo']['error'] == 0) {
            $panelLogo = self::find()->where(['name' => 'panel_logo'])->one();
            if(empty($panelLogo)){
                $panelLogo = new self();
                $panelLogo->name = 'panel_logo';
            }
            $fileBase = \yii\web\UploadedFile::getInstanceByName('photo');
            if(in_array($fileBase->extension,['jpg','png','jpeg'])) {
                $newFileName = \Yii::$app->security->generateRandomString() . '.' . $fileBase->extension;
                if ($fileBase->saveAs($_SERVER['DOCUMENT_ROOT'].'/web/uploads/'.$newFileName)) {
                    $oldFile = $panelLogo->value;
                    $panelLogo->value = '/uploads/'.$newFileName;
                    $panelLogo->save();
                    if (!empty($oldFile)){
                        @unlink($_SERVER['DOCUMENT_ROOT'].'/web/'.$oldFile);
                    }
                }
            }
        }



    }


    static  function getValues(){
        $return = [];
        $list = self::find()->asArray()->all();
        foreach ($list as $fC){
            $return[$fC['name']] = $fC['value'];
        }
        return $return;
    }

}