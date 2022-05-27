<?php


namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;

class CategoryController extends AppController
{
    public function actionIndex(){
        $hits = Product::find()->where(['hit'=>'1'])->all();
        $this->setMeta('K.O');
        $news = Product::find()->where(['new'=>'1'])->all();
        return $this->render('index',compact('hits','news'));
    }
    public function actionView(){
        $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        $Category = Category::find()->all();
        $this->setMeta('K.O | ' . $category->name);
        if ($category === null) { // item does not exist
            throw new \yii\web\HttpException(404, 'Упс , такой категории у нас нету');
        }
       // $products = Product::find()->where(['category_id'=>$id])->all();
        $query = Product::find()->where(['category_id'=>$id]);
        $pages = new Pagination(['totalCount'=>$query->count(),'pageSize'=>3,'forcePageParam'=>false,
            'pageSizeParam'=> false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $cat = Category::findAll($id);
        return $this->render('view',compact('products','category','cat','pages','Category'));
    }
    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('K.O | ' . $q);
        if(!$q)
            return $this->render('search');
        $query = Product::find()->where(['like','name',$q]);
        $pages = new Pagination(['totalCount'=>$query->count(),'pageSize'=>10,'forcePageParam'=>false,
            'pageSizeParam'=> false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search',compact('products','pages','q'));
    }
    public function actionContact(){
        $this->setMeta('K.O | '.'Contact');
        return $this->render('contact');
    }
    public function actionProduct(){
        $data = Product::find()->all();
        $Category = Category::find()->all();
        $this->setMeta('K.O | '.'All-product');
        $query = Product::find()->select(['name','image','price','old_price','id']);
        $pages = new Pagination(['totalCount'=>$query->count(),'pageSize'=>6,'forcePageParam'=>false,
            'pageSizeParam'=> false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('product',compact('data','pages','Category','products'));
    }
}