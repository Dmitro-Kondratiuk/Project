<?php

namespace app\modules\admin\models;

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
            [['your_name', 'your_phone', 'your_email', 'your_subject', 'your_message', 'created_at'], 'required'],
            [['your_subject', 'your_message', 'status'], 'string'],
            [['created_at'], 'safe'],
            [['your_name', 'your_phone', 'your_email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'your_name' => 'Имя отпраителя',
            'your_phone' => 'Телефон',
            'your_email' => 'E-mail',
            'your_subject' => 'Тема',
            'your_message' => 'Сообщение',
            'status' => 'Статус',
            'created_at' => 'Дата создания',
        ];
    }
}
