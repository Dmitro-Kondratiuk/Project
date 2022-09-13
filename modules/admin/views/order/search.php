<?php  if(!empty($products)):  ?>
    <div  class="text-center text-success"><font size="6">Вот вся информация по вашему запросу :<?=$q?></font></div>
<?php foreach ($products as $item): ?>
<div class="size">
    Name product:
    <a href="<?= \yii\helpers\Url::to(['/admin/product/view','id'=>$item->id]) ?>"><?= $item->name ?></a>
</div>
<?php endforeach; ?>
<?php else: ?>
    <div class="text-center sizes">
            По вашему запросу: <div class="text-danger"><?=$q?></div> ничего не найдено
    </div>
<?php endif; ?>
<style>
    .size{
        font-size: 20px;
    }
    .sizes{
        font-size: 30px;
    }

</style>
