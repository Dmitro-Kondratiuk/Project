<?php

namespace app\controllers;
use app\models\Blog;
use app\models\Category;
use app\models\ProductTag;
use app\models\Tag;
use app\models\TagBlog;
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
        $tags = Tag::find()->all();
        $Category = Category::find()->select(['id','name'])->all();
        return $this->render('tag',compact('product_tag','name','tags','Category'));
    }
    public function actionBlog($id){
        $name = TagBlog::findAll($id);
        foreach ($name as $r){
            $e= $r->name;
        };
        $this->setMeta("K.O | ".$e);
        $blog_tag = Blog::find()->joinWith('blogTag')->where(['blog_tag.tag_id' => $id])->all();
        return $this->render('blog',compact('name','blog_tag'));
    }
}