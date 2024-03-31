<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

class Files extends ActiveRecord{

    static $baseDir = '/web/uploads';
    static $webDir = '/uploads';
    static $fileExtAllow = ['png','jpeg','jpg','gif','pdf,ppt','doc','docx','xls'];

    static $fileExtAllowResize = ['png','jpeg','jpg'];

    public static function tableName(){
        return 'files';
    }

    static function saveFile($name = 'photo' ,$path = '/files',$old_id = ''){
        if (empty($_FILES[$name]['name']) and $_POST[$name.'_remove'] == 1 and !empty($old_id)) {
            if (Files::deleteFile($old_id)) {
                return null;
            }
        } else {
            if ($_FILES[$name]['error'] == 0) {
                $file = Files::uploadFile($name,$path , $old_id);
                if ($file) {
                    return $file->id;
                }
            }
        }
        return $old_id;
    }

    //Uploads file
    static function uploadFile($name,$path = '',$delId = null,$ext_accept = ['png','jpeg','jpg','gif','pdf,ppt']){
        //Если с файлом все хорошо
        if($_FILES[$name]['error'] == 0) {
            //Создаем папку, если нету.
            if (!file_exists($_SERVER['DOCUMENT_ROOT'].self::$baseDir.$path)) {
                mkdir($_SERVER['DOCUMENT_ROOT'].self::$baseDir.$path, 0777, true);
            }

            $fileBase = \yii\web\UploadedFile::getInstanceByName($name);
            if(in_array($fileBase->extension,$ext_accept)) {
                $newFileName = \Yii::$app->security->generateRandomString() . '.' . $fileBase->extension;
                if ($fileBase->saveAs($_SERVER['DOCUMENT_ROOT'] . self::$baseDir . $path . '/' . $newFileName)) {
                    //Создаем запись в базе.
                    $file = new self();
                    $file->file_name = $newFileName;
                    $file->ext = $fileBase->extension;
                    $file->size = $fileBase->size;
                    $file->original_name = $fileBase->name;
                    $file->mimetype = $fileBase->type;
                    $file->path = self::$baseDir . $path . '/' . $newFileName;
                    $file->src = self::$webDir . $path . '/' . $newFileName;
                    $file->save();
                    if (!empty($file->id) and !is_null($delId)) {
                        $oldFile = self::getFileByID($delId);
                        if (!empty($oldFile)) {
                            @unlink($_SERVER['DOCUMENT_ROOT'] . $oldFile->path);
                            $oldFile->delete();
                        }
                    }

                    if(Yii::$app->user->identity->id == 1){
                        if(in_array($fileBase->extension,self::$fileExtAllowResize)) {
                            //Image::getImagine()->open($_SERVER['DOCUMENT_ROOT'] . $file->path)->thumbnail(new Box(700, 3000))->save($_SERVER['DOCUMENT_ROOT'] . $file->path, ['quality' => 90]);
                        }
                    }



                    return $file;
                }
            }
        }
        return false;
    }



    //Get file By ID
    static function getFileByID($id){
        return self::find()->where(['id'=>$id])->one();
    }


    //Delete File By ID FIle
    static function deleteFile($fileId){
        $file = self::getFileByID($fileId);
        if($file and $file->isSystem == 'N'){
            @unlink($_SERVER['DOCUMENT_ROOT'] . $file->path);
            $file->delete();
            return true;
        }

        return false;
    }


}