<?php


namespace app\controllers;
use app\controllers\AppController;
use yii\db\ActiveRecord;
use app\models\Cart;
use app\models\OrderItems;
use app\models\Product;
use app\models\Order;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class CartController extends  AppController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }
    public function actionAdd(){
        $id= Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if(empty($product))return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);
        $this->layout = false;
        return $this->render('cart-modal',compact('session'));

    }

    public function actionClear(){
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal',compact('session'));

    }
    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout=false;
        return $this->render('cart-modal',compact('session'));
    }
    public function actionShow(){
        $session = Yii::$app->session;
        $session->open();
        $this->layout=false;
        return $this->render('cart-modal',compact('session'));
    }
    public function actionView(){
        $this->setMeta('K.O |'.' Корзина');
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();
        if($order->load(Yii::$app->request->post()) ){
           $order->qty = $session['cart.qty'];
           $order->sum = $session['cart.sum'];
           if($order->save()){
               $this->saveOrderItems($session['cart'],$order->id);
               Yii::$app->session->setFlash('success','Ваш заказ принят,спасибо что выбрали нас');
               Yii::$app->mailer->compose('order', compact('session'))
                   ->setFrom('kondratyuk.mitya@gmail.com')
                   ->setTo($order->email)
                   ->setSubject('Ваш заказ')
                   ->send();
               $session->remove('cart');
               $session->remove('cart.qty');
               $session->remove('cart.sum');
               return $this->refresh();
           }else{
               Yii::$app->session->setFlash('error','Ошибка при формлении заказа');
           }

        }
        return $this->render('view',compact('session','order'));
    }
    protected function saveOrderItems($items,$order_id){
        foreach ($items as $id=>$item){
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['price']*$item['qty'];
            $order_items->save();
        }
    }
}