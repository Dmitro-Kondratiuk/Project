<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coment */

$this->title = 'Create Coment';
$this->params['breadcrumbs'][] = ['label' => 'Coments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coment-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
