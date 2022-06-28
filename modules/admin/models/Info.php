<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * This is the model class for table "info".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $last_name
 * @property string $role
 * @property string $email
 */
class Info extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'last_name', 'role', 'email'], 'required'],
            [['user_id'], 'integer'],
            [['name', 'last_name', 'role', 'email','image'], 'string'],
            [['file'],'image']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'role' => 'Role',
            'email' => 'Email',
        ];
    }
    public function beforeSave($insert)
    {
        if($file = UploadedFile::getInstance($this,'file')){
            $dir = "upload/user_logo/";
            $this->image = $file->baseName.'_'.Yii::$app->getSecurity()->generateRandomString(6).'.'.$file->extension;
            $file->saveAs($dir.$this->image);
            return $file;
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }


    public function getImageLik(){
        return Html::img('/upload/user_logo/'.$this->image);
    }
}
