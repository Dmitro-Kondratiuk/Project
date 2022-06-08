<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\MenuWidget;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="product-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="form-group field-product-category_id has-success">
        <label class="control-lable" for="product-category_id">Родительская категория</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">
            <option value="0">Выбирете категорию для продукта</option>
            <?php echo MenuWidget::widget(['tpl'=>'product','model'=>$model]) ?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?=
    $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder'),
    ]);
    ?>
    <?= $form->field($model, 'small_content')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ])
    ?>
    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'old_price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'file')->widget(\kartik\file\FileInput::class, [
        'pluginOptions' => [
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

    <?= $form->field($model, 'hit')->CheckBox([ '0', '1', ]) ?>

    <?= $form->field($model, 'new')->CheckBox([ '0', '1', ]) ?>

    <?= $form->field($model, 'sale')->CheckBox([ '0', '1', ]) ?>
    <?= $form->field($model, 'top_sale')->CheckBox([ '0', '1', ]) ?>
    <?=
    $form->field($model, 'tag_array')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Tag::find()->all(),'id','name'),
        'language' => 'ru',
        'options' => ['placeholder' => 'Выбирете Тэг','multiple' => true],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'count')->textInput() ?>
<?php //debug($model->imageLinksDate) ?>
    <div style="color: #1414e2">Галерея для просмотра</div>
  <?=\kartik\file\FileInput::widget([
    'name' => 'ProductImage[attachment]',
    'options'=>[
        'multiple'=>true
    ],
    'pluginOptions' => [
            'deleteUrl'=>\yii\helpers\Url::to(['product/del-img']),
            'initialPreview' =>$model->imgName,
            'initialPreviewAsData'=>true,
            'initialPreviewConfig'=>$model->imageLinksDate,
            'overwriteInitial'=>false,
            'uploadUrl' => \yii\helpers\Url::to(['product/save-img']),
            'uploadExtraData' => [
                'ProductImage[class]' => $model->formName(),
                'ProductImage[product_id]' => $model->id,
            ],
            'maxFileCount' => 10
    ]]);?>
<div>Top Sale<div>
    <?=\kartik\file\FileInput::widget([
        'name' => 'SaleImage[attachment]',
        'pluginOptions' => [
            'uploadUrl' => \yii\helpers\Url::to(['product/save-sale']),
            'uploadExtraData' => [
                'SaleImage[product_id]' => $model->id,
            ],
        ]]);?>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
<?php //debug($model->productImg) ?>

</div>
<?php debug(\yii\helpers\ArrayHelper::map(\app\models\Tag::find()->all(),'id','name')); ?>