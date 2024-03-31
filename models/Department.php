<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use app\models\User;
use app\models\Files;

class Department extends ActiveRecord{


    public static function tableName(){
        return 'departments';
    }

    public function getLogo(){
        return $this->hasOne(Files::className(),['id'=>'logo_id']);
    }

    function getCountUser(){

    }

    function getUsers(){
        return $this->hasMany(User::className(),['dep_id'=>'id']);
    }


    function saveItem($item){
        if(!empty($item)){
            if(isset($item['name'])){
                $this->name = htmlspecialchars($item['name']);
            }

            if(isset($item['description'])){
                $this->description = htmlspecialchars($item['description']);
            }

            $this->save();
            $this->logo_id = Files::saveFile('photo','/departments/'.$this->id,$this->logo_id);
            $this->save();

        }
        return false;
    }

    //return admin users
    public function adminList(){

    }


}