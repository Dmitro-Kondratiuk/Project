
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Количество</th>
                <th scope="col">Цена</th>
                <th scope="col">На сумму</th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach($session['cart'] as $id=>$one): ?>
            <tr>
                <td><?= $one['name']?></td>
                <td><?= $one['qty']?></td>
                <td><?= $one['price']?> $</td>
                <td><?= $one['price']*$one['qty']?> $</td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>


