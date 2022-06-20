<?php
use kartik\tree\TreeView;

$this->title = 'Kartik menu';
$this->params['breadcrumbs'][] =  $this->title;
?>

<?= TreeView::widget([
    // single query fetch to render the tree
    // use the Product model you have in the previous step
    'query' => \app\models\Kartikmenu::find()->addOrderBy('root, lft'),
    'headingOptions' => ['label' => 'Создание Меню'],
    'fontAwesome' => true,     // optional
    'isAdmin' => true,         // optional (toggle to enable admin mode)
    'displayValue' => 1,        // initial display value
    'softDelete' => true,       // defaults to true
    'cacheSettings' => [
        'enableCache' => false   // defaults to true
    ]
]);?>
