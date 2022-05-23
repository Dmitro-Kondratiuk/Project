<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BlogComent */

$this->title = 'Обновление Блог Коментария : ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Blog Coments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blog-coment-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
