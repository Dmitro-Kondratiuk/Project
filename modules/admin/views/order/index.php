<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_at',
            'updated_at',
            'qty',
            [
                    'attribute'=>'status',
                    'value'=> function($data){
                    if($data->status == 0){
                        $status = "<span class='text-danger'>Активен</span>";
                    }else{
                        $status = "<span class='text-success'>Завершон</span>";
                    }
                    return $status;
                    },
                    'format'=>'html'
            ],
            //'name',
            //'email:email',
            //'phone',
            //'address',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \app\modules\admin\models\Order $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
