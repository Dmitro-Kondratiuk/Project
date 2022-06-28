<?php


namespace app\controllers;

use app\models\Category;
use app\models\Product;
use app\models\ProductTag;
use app\models\Tag;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class CategoryController extends AppController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout','index',],
                        'allow' => true,
                        'roles' => ['*'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }
    public function actionIndex(){
        $hits = Product::find()->where(['hit'=>'1'])->all();
        $this->setMeta('K.O');
        $news = Product::find()->where(['new'=>'1'])->all();
        $top_sale= Product::find()->with('saleImg')->where(['top_sale'=>'1'])->one();
        return $this->render('index',compact('hits','news','top_sale'));
    }
    public function actionView(){
        $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        $Category = Category::find()->all();
        $this->setMeta('K.O | ' . $category->name,$category->keywords,$category->description);
        if ($category === null) { // item does not exist
            throw new \yii\web\HttpException(404, 'Упс , такой категории у нас нету');
        }
       // $products = Product::find()->where(['category_id'=>$id])->all();
        $query = Product::find()->where(['category_id'=>$id]);
        $pages = new Pagination(['totalCount'=>$query->count(),'pageSize'=>3,'forcePageParam'=>false,
            'pageSizeParam'=> false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $cat = Category::findAll($id);
        $tags = Tag::find()->all();
        return $this->render('view',compact('products','category','cat','pages','Category','tags'));
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
        $tags = Tag::find()->all();
        $Category = Category::find()->select(['id','name'])->all();
        return $this->render('search',compact('products','pages','q','tags','Category'));
    }
    public function actionContact(){
        $this->setMeta('K.O | '.'Contact');
        return $this->render('contact');
    }
    public function actionProduct(){
        $data = Product::find()->all();
        $Category = Category::find()->all();
        $this->setMeta('K.O | '.'All-product');
        $query = Product::find()->select(['name','image','price','old_price','id','new','sale']);
        $pages = new Pagination(['totalCount'=>$query->count(),'pageSize'=>6,'forcePageParam'=>false,
            'pageSizeParam'=> false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $tags = Tag::find()->all();
        return $this->render('product',compact('data','pages','Category','products','tags'));
    }

}