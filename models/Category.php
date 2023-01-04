<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord {

    public function getPosts(){
        return $this->hasMany(Posts::className(), ['category_id' => 'id']);
    }
    
}