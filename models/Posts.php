<?php

namespace app\models;

use yii\db\ActiveRecord;

class Posts extends ActiveRecord {

    // vorpeszi modely kpni tablin petqa vor anunnery irar hamapatasxanen,
    // teche chi ashxati
    // bayc ka shtkelu dzev

  /*  public static function tableName(){
        return "cankali tabli anun";
    }*/

    public function getCategories(){
        return $this->hasOne(Category::class, ['id' => 'category_id']);
        // erku tarberakn el ashxatum en
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}