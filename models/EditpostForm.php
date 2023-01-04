<?php

namespace app\models;

use Yii;
use yii\base\Model;

use yii\db\ActiveRecord;



/**
 * ContactForm is the model behind the contact form.
 */
class EditpostForm extends  ActiveRecord
{

    // public $name;
    // public $category_id;
    // public $description;

    public static function tableName(){
        return "posts";
    }

    public function rules(){
        return [
           [ ['name'], 'required'],
           ['description', 'trim'],
           ['category_id', 'trim'],
           [
            [
                'imageFile'], 'file',
                //'skipOnEmpty' => false,
                'extensions' => 'png, jpg'
            ],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(Yii::getAlias('@webroot').'/uploads/'. $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}