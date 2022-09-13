<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">
    <h1>Просмотр товара: <?= $model->name ?></h1>
    <?php if (\Yii::$app->user->can('updatePost', ['author_id' =>$model->user_id])):?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div>
        <a href="<?=str_replace('admin','',\yii\helpers\Url::home(true)).'/product/'.$model->id;?>">Посмотреть продукт на сайте</a>
    </div>
    <?php  endif; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                'id',
            [
                'attribute'=>'category_id',
                'value'=>$model->product->name ?$model->product->name:''
            ],
            'name',
            'content:html',
            'small_content:html',
            'price',
            'old_price',
            'keywords',
            'description',
            [
                'attribute'=>'hit',
                'value'=>function($new){
                    if($new->hit == 1){
                        $st = "<span class='text-primary'>Хит</span>";
                    }else{
                        $st = "<span></span>";
                    }
                    return $st;
                },
                'format'=>'html'

            ],
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
            [
                'attribute'=>'top_sale',
                'value'=>function($new){
                    if($new->top_sale == 1){
                        $st = "<span class='text-primary'>Топ продаж</span>";
                    }else{
                        $st = "<span class='text-aqua'>Этот товар пока что не находиться в списке топ распродаж</span>";
                    }
                    return $st;
                },
                'format'=>'html'

            ],
            'count',
            'tagStr',
            [
                    'attribute'=>'img',
                    'format'=>'image'
            ]
        ],
    ]) ?>
<?php
    foreach ($model->productImg as $item){
        echo Html::img('@web/upload/Product/'.$item->name);
    }
    ?>
<!-- foreach ($model->productImg as $item){-->
<!--    echo Html::img('@web/upload/Product/'.$item->name);-->
<!--}-->



</div>
