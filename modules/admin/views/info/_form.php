<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Info */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="info-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'last_name')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'email')->textarea([ 'placeholder' => "",'class' => 'form-control']) ?>
    <?=  $form->field($model, 'file')->widget(\kartik\file\FileInput::class, [
        'pluginOptions' => [
            'initialPreview' =>$model->ImageLik,
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="fas fa-camera"></i> ',
            'browseLabel' =>  'Выберите фото для загрузки'
        ],
        'options' => ['accept' => 'image/*']
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php
$str = Yii::$app->user->identity;
$roleName =$str['username'];
$user = Yii::$app->authManager->getAssignment($roleName,Yii::$app->user->id);

?>
</div>
