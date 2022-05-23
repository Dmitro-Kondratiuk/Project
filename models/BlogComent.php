<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use app\models\Blog;

/**
 * This is the model class for table "blog_coment".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $content
 * @property int $blog_id
 * @property string $created_at
 */
class BlogComent extends \yii\db\ActiveRecord
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
        return 'blog_coment';
    }

    public function getBlog(){
        return $this->hasOne(Blog::className(),['blog_id'=>'id']);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'content'], 'required'],
            [['content'], 'string'],
            [['blog_id'], 'integer'],
            [['created_at'], 'safe'],
            [['username', 'email','web'], 'string', 'max' => 255],
        ];
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
            'content' => 'Что вы хотите написать',
            'blog_id' => 'Blog ID',
            'created_at' => 'Created At',
            'web'=>'Сайт который вы хотите порекомендовать'
        ];
    }
}
