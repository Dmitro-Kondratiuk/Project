<?php

namespace app\models;
use app\models\Product;
use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "coment".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $coment
 */
class Coment extends \yii\db\ActiveRecord
{
    public function  behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['username', 'email', 'coment'], 'required'],
            [['coment'], 'string'],
            [['username', 'email'], 'string', 'max' => 255],
        ];
    }
public function getProduct(){
        return $this->hasOne(Product::class,['id'=>'product_id']);
}
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя',
            'email' => 'E-mail',
            'coment' => 'Отзыв',
        ];
    }

    public function remove()
    {
    }
}
