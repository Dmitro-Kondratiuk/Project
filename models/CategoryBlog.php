<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_blog".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 */
class CategoryBlog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'image'], 'string', 'max' => 255],
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
            'image' => 'Image',
        ];
    }
    public function getBlog(){
        return $this->hasMany(Blog::class,['category_id'=>'id']);
    }
}
