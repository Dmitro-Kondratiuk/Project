<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coment */

$this->title = 'Update Coment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Coments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coment-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
