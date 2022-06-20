<?php


namespace app\models;
use app\modules\admin\models\ProductImage;
use yii\db\ActiveRecord;

class Product extends  ActiveRecord
{

public static function tableName()
{
    return 'product';
}
    public function  getCategory(){
        return $this->hasOne(Category::className(),['id'=>'category_id']);
    }
    public function getProductImage(){
        return $this->hasMAny(ProductImage::class,['product_id'=>'id']);
    }
    public function getSaleImg(){
        return $this->hasOne(SaleImage::class,['product_id'=>'id']);
    }
    public function getProductTag(){
        return $this->hasMany(ProductTag::class,['product_id'=>'id']);
    }
    public function getComent(){
    return $this->hasMany(Coment::class,['product_id'=>'id']);
    }
}