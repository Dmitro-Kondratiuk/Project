<?php
use yii\widgets\ActiveForm;
?>
<main>

    <!-- breadcrumb-area-start -->
    <section class="breadcrumb-area" data-background="img/bg/page-title.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-text text-center">
                        <h1>Shoping Cart</h1>
                        <ul class="breadcrumb-menu">
                            <li><a href="<?= \yii\helpers\Url::home()?>">home</a></li>
                            <li><span>Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
<!-- Cart Area Strat-->
    <section class="cart-area pt-100 pb-100">
<!--        // display success message-->
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>

<!--        // display error message-->
        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <?= Yii::$app->session->getFlash('error') ?>
            </div>
        <?php endif; ?>
        <?php if(empty($session['cart'])): ?>
            <div>
                <p class="text-center">Корзина пустая</p>
            </div>
       <?php else:?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="product-price">Unit Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($session['cart'] as $id=>$one):?>
                                <tr>
                                    <td class="product-thumbnail"><?= \yii\helpers\Html::img("@web/upload/product/logo_product/{$one['image']}",['height'=>100,'width'=>150])?></td>
                                    <td class="product-name"><a href="<?= \yii\helpers\Url::to(['product/view','id'=>$id])?>"><?= $one['name']?></a></td>
                                    <td class="product-price"><span class="amount"><?= $one['price']?>$</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus"><input type="text" value="<?= $one['qty']?>" /></div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount"><?= $one['qty']*$one['price']?>$</span></td>
                                    <td class="product-remove"><i class="fa fa-times del" data-id="<?=$id?>" ></i></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <button value="Refresh Page" onClick="window.location.href=window.location.href">Обновить корзину</button>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code"
                                               type="text">
                                        <button class="btn theme-btn-2" name="apply_coupon" type="submit">Apply coupon</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div>
                        <br>
                         <h2 class="text-center"><?= Yii::t('common','Заполните пожалуйста форму для оформления заказа')?></h2>
                                    <?php $form = ActiveForm::begin() ?>
                                    <?= $form->field($order,'name') ?>
                                    <?= $form->field($order,'email') ?>
                                    <?= $form->field($order,'phone') ?>
                                    <?= $form->field($order,'address') ?>
                        <div class="text-center">
                            <?= \yii\helpers\Html::submitButton(Yii::t('common','Оформить заказ'), ['class' => 'btn btn-success']) ?>
                        </div>
                                    <?php \yii\widgets\ActiveForm::end()?>
                    </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul class="mb-20">
                                        <li>Total <span><?= $session['cart.sum']?>$</span></li>
                                    </ul>
                                    <a class="btn btn-primary" href="#">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endif;?>
    </section>

    <!-- Cart Area End-->


</main>