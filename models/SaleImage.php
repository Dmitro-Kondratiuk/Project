<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sale_image".
 *
 * @property int $id
 * @property string $name
 * @property int $product_id
 * @property string $alt
 */
class SaleImage extends \yii\db\ActiveRecord
{
    public $attachment;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id', 'product_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['attachment'], 'image'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'product_id' => 'Product ID',
            'alt' => 'Alt',
        ];
    }
}
