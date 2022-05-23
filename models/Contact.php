<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $your_name
 * @property string $your_phone
 * @property string $your_email
 * @property string $your_subject
 * @property string $your_message
 * @property string $status
 * @property string $created_at
 */
class Contact extends \yii\db\ActiveRecord
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
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['your_name', 'your_phone', 'your_email', 'your_subject', 'your_message',], 'required'],
            [['your_subject', 'your_message', 'status'], 'string'],
            [['created_at'], 'safe'],
            [['your_name', 'your_phone', 'your_email'], 'string', 'max' => 255],
        ];
    }
    public function addToContact(){

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'your_name' => 'Your Name',
            'your_phone' => 'Your Phone',
            'your_email' => 'Your Email',
            'your_subject' => 'Your Subject',
            'your_message' => 'Your Message',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
