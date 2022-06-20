<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kartikmenu */

$this->title = 'Create Kartikmenu';
$this->params['breadcrumbs'][] = ['label' => 'Kartikmenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kartikmenu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
