<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'your_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'your_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'your_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'your_subject')->textarea(['rows' => 1]) ?>
    <?=
    $form->field($model, 'your_message')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder'),
    ]);
    ?>


    <?= $form->field($model, 'status')->dropDownList([ '0'=>'Письмо активно', '1'=>'Письмо прочитано']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
