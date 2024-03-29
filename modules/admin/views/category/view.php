<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">



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
    <a href="<?=str_replace('admin','',\yii\helpers\Url::home(true)).'/category/'.$model->id;?>">Посмотреть как это выглядит на сайте</a>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                    'attribute'=>'parent_id',
                    'value'=> $model->category->name ?$model->category->name : "<span class='text-danger'>Самостоятельная категория</span>",
                    'format'=>'html'
            ],
            'name',
            'keywords',
            'description',
            'image:image',
        ],
    ]) ?>

</div>
