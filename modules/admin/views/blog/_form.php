<?php
use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">
<?//= getcwd()?>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?=
    $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder'),
    ]);
    ?>
    <?= $form->field($model, 'created_at')->widget(DateTimePicker::class, [
        'name' => 'dp_4',
        'type' => DateTimePicker::TYPE_INLINE,
        'value' => 'Tue, 23-Feb-1982, 14:45',
        'pluginOptions' => [
            'format' => 'Ymd'
        ]
    ]);?>
    <?= $form->field($model, 'keywords')->textInput() ?>

    <?= $form->field($model, 'description')->textInput() ?>
    <?= $form->field($model, 'small_content')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ])?>

    <?=  $form->field($model, 'file')->widget(FileInput::className(), ['pluginOptions' => [
        'showCaption' => false,
        'showRemove' => false,
        'showUpload' => false,
        'browseClass' => 'btn btn-primary btn-block',
        'browseIcon' => '<i class="fas fa-camera"></i> ',
        'browseLabel' =>  'Выберите фото'
    ],
]);
    ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
