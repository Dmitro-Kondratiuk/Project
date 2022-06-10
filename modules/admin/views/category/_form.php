<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\MenuWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group field-category-parent_id has-success">
        <label class="control-lable" for="category-paretn_id">Родительская категория</label>
        <select id="category-parent_id" class="form-control" name="Category[parent_id]">
            <option value="0">Самостоятельная категория</option>
            <?php echo MenuWidget::widget(['tpl'=>'select','model'=>$model]) ?>
        </select>
    </div>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'file')->widget(\kartik\file\FileInput::class, [
        'pluginOptions' => [
            'initialPreview' =>$model->imgP,
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

</div>
