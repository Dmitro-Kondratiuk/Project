<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kartikmenu */

$this->title = 'Update Kartikmenu: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Kartikmenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kartikmenu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
