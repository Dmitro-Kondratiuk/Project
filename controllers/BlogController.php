<?php

namespace app\controllers;
use app\models\BlogTag;
use app\models\CategoryBlog;
use app\models\Tag;
use app\models\TagBlog;
use Yii;
use app\models\User;
use app\models\Blog;
use app\models\BlogComent;
use yii\data\Pagination;

class BlogController extends  AppController
{
    public function  actionIndex(){
        $blog = Blog::find()->all();
        $this->setMeta('K.O | '.$blog->name,$blog->keywords,$blog->description);
        $query = Blog::find()->select(['username','image','created_at','id']);
        $pages = new Pagination(['totalCount'=>$query->count(),'pageSize'=>6,'forcePageParam'=>false,
            'pageSizeParam'=> false]);
        $blogs = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index',compact('blog','blogs','pages'));

    }
    public function actionAbout(){
        $this->setMeta('K.O | '.'About');
        return $this->render('about');
    }
    public function actionView($id){
        $post = Blog::find()->where(['id'=>$id])->one();
        $this->setMeta("K.O | ".$post->name,$post->keywords,$post->description);
        $blog = new BlogComent();
        $category = CategoryBlog::find()->all();
        $qty = Blog::find()->joinWith('category')->where(['category_id'=>1])->count();
        $qty2 = Blog::find()->joinWith('category')->where(['category_id'=>2])->count();
        $qtycar = Blog::find()->joinWith('category')->where(['category_id'=>3])->count();
//        $customers = Blog::find()
//            ->select([
//                '{{category_blog}}.*', // select all customer fields
//                'COUNT(category_id) AS ordersCount' // calculate orders count
//            ])
//            ->joinWith('category') // ensure table junction
//            ->groupBy('{{blog}}.id') // group the result to ensure aggregation function works
//            ->all();

        if($blog->load(Yii::$app->request->post())){
            $blog->blog_id = $id;
            if($blog->save()){
                Yii::$app->session->setFlash('success','Ваш коментарий был успешно добавлнен');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('danger','Ваш коментарий что-то до нас не долетел');
            }
        }
        $blog_cometary =  BlogComent::find()->where(['blog_id'=>$id])->all();
        $blog_tag = TagBlog::find()->all();
        return $this->render('view',compact('post','blog_cometary','blog','category','qty2','qty','qtycar','blog_tag'));
    }
    public function actionCategory($id){
        $this->setMeta('K.O | '.'Category-Blog');
        $name =CategoryBlog::find()->select(['name'])->one();
        $query = Blog::find()->where(['category_id'=>$id])->select(['id','name','image','small_content']);
        $pages = new Pagination(['totalCount'=>$query->count(),'pageSize'=>6,'forcePageParam'=>false,
            'pageSizeParam'=> false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('category',compact('name','pages','products'));
    }
    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('K.O | ' . $q);
        if(!$q)
            return $this->render('search');
        $query = Blog::find()->where(['like','name',$q]);
        $pages = new Pagination(['totalCount'=>$query->count(),'pageSize'=>6,'forcePageParam'=>false,
            'pageSizeParam'=> false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
    return $this->render('search',compact('pages','products','q'));
    }
}