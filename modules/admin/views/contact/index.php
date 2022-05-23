<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">


    <p>
        <?= Html::a('Create Contact', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'your_name',
            'your_phone',
            'your_email:email',
            'your_subject:ntext',
            //'your_message:ntext',
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
//            'status',
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \app\modules\admin\models\Contact $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
