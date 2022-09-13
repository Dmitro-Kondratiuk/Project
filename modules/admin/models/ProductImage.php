<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "product_image".
 *
 * @property int $id
 * @property string $name
 * @property string $class
 * @property int $product_id
 * @property string|null $alt
 */
class ProductImage extends \yii\db\ActiveRecord
{
    public $attachment;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'class', 'product_id'], 'required'],
            [['product_id'], 'integer'],
            [['name', 'class', 'alt'], 'string', 'max' => 255],
            [['attachment'], 'image'],
        ];
    }
    public function getImg(){
        return $this->hasMany(Product::class,['id'=>'product_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'class' => 'Class',
            'product_id' => 'Product ID',
            'alt' => 'Alt',
        ];
    }
    public function getImageUrl(){
        if($this->name){
            $path = str_replace('admin','',Url::home(true)).'/upload/product/'.$this->name;
        }else{
            $path = '';
        }
        return $path;
    }


}
