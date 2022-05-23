<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Contact */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contact-view">
    <h1>Просмотр сообщения: <?= $model->your_name ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'your_name',
            'your_phone',
            'your_email:email',
            'your_subject:ntext',
            'your_message:html',
            [
                'attribute'=>'status',
                'value'=>function($data){
                    if($data->status == 0){
                        $s = "<span class='text-danger'>Письмо активно</span>";
                    }else {
                        $s = "<span class='text-success'>Письмо прочитано</span>";
                    }
                    return $s;
                },
                'format'=>'html',
            ],
            'created_at',
        ],
    ]) ?>

</div>
