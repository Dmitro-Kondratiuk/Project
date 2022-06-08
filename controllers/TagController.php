<?php

namespace app\controllers;
use app\models\ProductTag;
use app\models\Tag;
use app\modules\admin\models\Product;
use Yii;
class TagController extends AppController
{
    public function actionTag($id){
        $name = Tag::findAll($id);
        foreach ($name as $r){
           $e= $r->name;
        };
        $this->setMeta("K.O | ".$e);
        $product_tag = \app\models\Product::find()->joinWith('productTag')->where(['product_tag.tag_id' => $id])->all();
        return $this->render('tag',compact('product_tag','name'));
    }
}