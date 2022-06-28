<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <?php   if(Yii::$app->user->can('admin')):?>
    <p>
        <?= Html::a('Create Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php endif;?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent_id',
            'title:ntext',
            'url:url',
            'sort',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \app\modules\admin\models\Menu $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php foreach (Yii::$app->params['menu'] as $id=>$item): ?>
        <li><a href="<?= $item['url']?>"><i class="flaticon-shopping-cart-1"></i> <?= $item['title'] ?></a></li>
        <?php if(!empty($item['items'])): ?>
            <?php foreach ($item['items'] as $one) ?>
                <li><a href="<?=$one['url']?>"><i class="fa fa-space-shuttle"></i> <?= $one['title'] ?></a></li>
        <?php endif;?>
    <?php endforeach; ?>
</div>
