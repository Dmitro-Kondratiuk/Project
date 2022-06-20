<?php

namespace app\controllers;
use app\models\Contact;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ContactController extends  AppController
{

    public function actionIndex(){
        $this->setMeta('K.O | '.'Contact');
        $contact = new Contact();
        if($contact->load(Yii::$app->request->post())){
            if($contact->save()){
                Yii::$app->session->setFlash('success','Ваш коментарий был успешно добавлнен');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('danger','Ваш коментарий что-то до нас не долетел');
            }
        }
        return $this->render('index',compact('contact'));
    }
}