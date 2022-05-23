<?php if(!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Фото</th>
                <th scope="col">Название</th>
                <th scope="col">Количество</th>
                <th scope="col">Цена</th>
                <th scope="col">На сумму</th>
                <th scope="col"><span aria-hidden="true">&times;</span></th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach($session['cart'] as $id=>$one): ?>
            <tr>
                <td ><?= \yii\helpers\Html::img($one['img'])?></td>
                <td><?= $one['name']?></td>
                <td><?= $one['qty']?></td>
                <td><?= $one['price']?> $</td>
                <td><?= $one['price']*$one['qty']?> $</td>
                <td><span data-id="<?=$id?>" class="text-danger del-item">X</span></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td class="text-center">Общяя информация по заказу</td>
            </tr>
            <tr>
                <td>Количество товаров: <td>
                <td><?=$session['cart.qty'] ?></td>
            </tr>
            <tr>
                <td>На сумму: </td>
                <td> </td>
                <td><?= $session['cart.sum']?> $</td>
            </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3 class="text-center">Корзина пустая</h3>
<?php endif;?>

