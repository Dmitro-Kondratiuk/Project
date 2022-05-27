<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property string $content
 * @property string $date
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
            [['name', 'content'], 'required'],
            [['content', 'keywords', 'description', 'small_content'], 'string'],
            [['date'], 'safe'],
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
