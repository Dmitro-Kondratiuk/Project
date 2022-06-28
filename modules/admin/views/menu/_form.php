<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">
<?php //debug(Yii::$app->params['menu']); ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id',['options'=>['class'=>'col-xs-8']])->dropDownList($model->getDropDown(),['prom'=>'добавить меню']) ?>

    <?= $form->field($model, 'title',['options'=>['class'=>'col-xs-12']])->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'url',['options'=>['class'=>'col-xs-3']])->textInput(['maxlength' => true]) ?>


    <div class="col-xs-12">

        <?= Html::submitButton($model->isNewRecord ? 'Добавить':'Сохранить',['class'=>$model->isNewRecord ? 'btn btn-success':'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
