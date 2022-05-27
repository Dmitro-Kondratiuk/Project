<?php

namespace app\controllers;
use Yii;
use app\models\User;
use app\models\Blog;
use app\models\BlogComent;
use yii\data\Pagination;

class BlogController extends  AppController
{
    public function  actionIndex(){
        $blog = Blog::find()->all();
        $this->setMeta('K.O | '.'Blog');
        $query = Blog::find()->select(['username','image','created_at','id']);
        $pages = new Pagination(['totalCount'=>$query->count(),'pageSize'=>5,'forcePageParam'=>false,
            'pageSizeParam'=> false]);
        $blogs = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index',compact('blog','blogs','pages'));

    }
    public function actionAbout(){
        $this->setMeta('K.O | '.'About');
        return $this->render('about');
    }
    public function actionView($id){
        $this->setMeta('K.O | '."$id");
        $post = Blog::find()->where(['id'=>$id])->one();
        $blog = new BlogComent();
        if($blog->load(Yii::$app->request->post())){
            $blog->blog_id = $id;
            if($blog->save()){
                Yii::$app->session->setFlash('success','Ваш коментарий был успешно добавлнен');
            }else{
                Yii::$app->session->setFlash('danger','Ваш коментарий что-то до нас не долетел');
            }
        }
        $blog_cometary =  BlogComent::find()->where(['blog_id'=>$id])->all();
        return $this->render('view',compact('post','blog_cometary','blog'));
    }
}