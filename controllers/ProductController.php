<?php


namespace app\controllers;
use app\models\Coment;
use app\models\Product;
use Yii;
use app\models\Category;

class ProductController extends  AppController
{
    public function actionView(){
        $id = Yii::$app->request->get('id');
        $products = Product::find()->with('category')->where(['id'=>$id])->one();
        if ($products  === null) { // item does not exist
            throw new \yii\web\HttpException(404, 'Упс , такого продутка у нас нету');
        }
        $this->setMeta($products->category->name.' | ' .$products->name);
        $sale = Product::find()->where(['sale'=>'1'])->all();
        $category = Category::findAll($id);
        $content = new Coment();
        if($content->load(Yii::$app->request->post()) ){
            $content->product_id = $products->id;
            if($content->save()){
                Yii::$app->session->setFlash('success','Ваш коментарий был успешно добавлнен');
            }else{
                Yii::$app->session->setFlash('danger','Ваш коментарий что-то до нас не долетел');
            }
        }
        $infa = Coment::find()->where(['product_id'=>$id])->all();
        return $this->render('view',compact('products','sale','category','infa','content'));

    }
    public function actionIndex(){
        $data = Product::find()->with('category')->all();
        return $this->render('index',compact('data'));
    }
}