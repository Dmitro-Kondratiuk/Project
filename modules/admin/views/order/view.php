<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1>Просмотр заказа №<?= $model->id ?></h1>
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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
                    'attribute'=>'status',
                'value'=>function($data){
                    if($data->status == 0){
                        $s = "<span class='text-danger'>Активен</span>";
                    }else{
                        $s  = "<span class='text-success'>Завершен</span>";
                    }return $s;
                },
                'format'=>'html',
            ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>
</div>
    <?php  $items  = $model->orderItems ?>
    <?php if(!empty($items)): ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Количество</th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach($items as $one): ?>
                <tr>
                    <td><a href="<?= \yii\helpers\Url::to(['/product/view','id'=>$one->product_id])?>"><?= $one->name ?></td>
                    <td><?= $one->qty_item ?></td>
                </tr>
            <?php endforeach; ?>
            <?php  endif;?>
</div>

