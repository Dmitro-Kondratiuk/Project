<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryBlog */

$this->title = 'Create Category Blog';
$this->params['breadcrumbs'][] = ['label' => 'Category Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-blog-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
