<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryBlog */

$this->title = 'Update Category Blog: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Category Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-blog-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
