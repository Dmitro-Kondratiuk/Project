<?php

namespace app\modules\admin\models;

use app\models\BlogComent;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property string $content
 * @property string $created_at
 * @property string $keywords
 * @property string $description
 * @property string $small_content
 */
class Blog extends \yii\db\ActiveRecord
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
    public function getBlogComent(){
        return $this->hasMany(BlogComent::className(),['id'=>'blog_id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content', 'created_at','small_content'], 'required'],
            [['content', 'keywords', 'description', 'small_content'], 'string'],
            [['created_at'], 'safe'],
            [['name', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя блога',
            'content' => 'Контент',
            'date' => 'Время создания',
            'keywords' => 'Ключевые слова',
            'description' => 'Мета-описание',
            'small_content' => 'Небольшой текст (который на preview)',
            'img' => 'Картинка',
        ];
    }
}
