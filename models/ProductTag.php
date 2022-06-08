<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_tag".
 *
 * @property int $id
 * @property int $product_id
 * @property int $tag_id
 */
class ProductTag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'product_id', 'tag_id'], 'required'],
            [['id', 'product_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'tag_id' => 'Tag ID',
        ];
    }
    public function getTag(){
        return $this->hasOne(Tag::class,['id'=>'tag_id']);
    }

    public function getProd(){
        return $this->hasOne(Product::class,['id'=>'product_id']);
    }

}
