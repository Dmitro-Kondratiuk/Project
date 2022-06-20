<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\controllers\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!--    --><?//= Yii::$app->user->identity->username?>
<?//=   Yii::$app->user->can('updatePost', ['author_id' =>$model->user_id])?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
           [
                   'attribute'=>'category_id',
                    'value'=>function($name){
                    return $name->product->name ? $name->product->name :"";
                    },

           ],
            'name',
            //'content:ntext',
            'price',
            //'old_price',
            //'keywords',
            //'description',
            //'img',
            //'hit',
            //'new',
            [
                  'attribute'=>'new',
                'value'=>function($new){
                    if($new->new == 1){
                        $st = "<span class='text-success'>Новинка</span>";
                    }else{
                        $st = "<span></span>";
                    }
                    return $st;
                },
                'format'=>'html'

            ],
            [
                'attribute'=>'sale',
                'value'=>function($sale){
                    if($sale->sale == 1){
                        $st = "<span class='text-danger'>Распродажа</span>";
                    }else{
                        $st = "<span></span>";
                    }
                    return $st;
                },
                'format'=>'html'

            ],
            //'sale',
            //'count',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \app\modules\admin\models\Product $model, $key, $index, $column) {
                   return  Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
