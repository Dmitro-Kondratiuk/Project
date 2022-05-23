<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BlogComent */

$this->title = 'Create Blog Coment';
$this->params['breadcrumbs'][] = ['label' => 'Blog Coments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-coment-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
