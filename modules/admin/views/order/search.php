<?php  if(!empty($products)):  ?>
    <div  class="text-center text-success"><font size="6">Вот вся информация по вашему запросу :<?=$q?></font></div>
<?php foreach ($products as $item): ?>
<div><font size="5">
    Name product:
    <a href="<?= \yii\helpers\Url::to(['/admin/product/view','id'=>$item->id]) ?>"><?= $item->name ?></a>
    </font>
</div>
<?php endforeach; ?>
<?php else: ?>
    <div class="text-center">
        <font size="6">
            По вашему запросу: <div class="text-danger"><?=$q?></div> ничего не найдено
        </font>
    </div>
<?php endif; ?>

