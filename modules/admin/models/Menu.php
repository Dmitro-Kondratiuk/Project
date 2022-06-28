<?php

namespace app\modules\admin\models;
use paulzi\adjacencyList\AdjacencyListBehavior;
use paulzi\adjacencyList\AdjacencyListQueryTrait;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
 * @property string $url
 * @property int $sort
 */
class Menu extends \yii\db\ActiveRecord
{
    public function rules()
    {
        return [
            [['parent_id', 'sort'], 'integer'],
            [['title'], 'string'],
            [['sort'],'number'],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'title' => 'Имя',
            'url' => 'Url',
            'sort' => 'Сортировка',
        ];
    }
    public function behaviors() {
        return [
            [
                'class' => AdjacencyListBehavior::class,
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';

    }
    public static function  getRootList(){
        return self::find()->roots()->with('children.children.children')->all();
    }
    public static function find()
    {
        return new MenuQuery(get_called_class());
    }
    public function  getTree(){
        return ArrayHelper::toArray($this->children,[
           $this->className()=>[
               'title'=>'title',
               'url'=>'url',
               'items'=>function($model){
                return ArrayHelper::toArray($model->children,[
                    $this->className()>[
                        'label'=>'title',
                        'url'=>'url'
                    ]
                ]);
               }
           ]
        ]);
    }

    public static function getDropDown(){
    $list = [];
    $separator = ">";
    foreach (self::getRootList() as $root){
        $list[$root->id] = $root->title;
        if($root->children){
            foreach ($root->children as $one){
                $list[$one->id]=$separator.$one->title;
                if(isset($one->children)){
                    foreach ($one->children as $two){
                        $list[$two->id]= $separator.$separator.$two->title;
                        if(isset($two->children)){
                            foreach ($two->children as $three){
                                $list[$three->id]=$separator.$separator.$separator.$three->title;
                            }
                        }
                    }
                }
            }
        }
    }

    return $list ;
    }
    public function beforeSave($insert)
    {
        if(empty($this->parent_id)){
            $this->makeRoot();
        }else{
            if($parent =Menu::findOne($this->parent_id)){
                $this->prependTo($parent);
            }
        }
       if(parent::beforeSave($insert)) {
           return true;
       }else{
           return false;
       }

    }


    /**
     * {@inheritdoc}
     */

}
