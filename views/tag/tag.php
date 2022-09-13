
<?php

?>
<main>
<!--    --><?php //debug($product_tag)?>

    <!-- breadcrumb-area-start -->
    <section class="breadcrumb-area" data-background="/img/bg/page-title.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-text text-center">
<!--                        <h3>Вот что мне удалось найти позапросу:  --><?//= \yii\helpers\Html::encode($q) ?><!--</h3>-->
                        <ul class="breadcrumb-menu">
                            <li><a href="<?= \yii\helpers\Url::home() ?>">Главная</a></li>
                            <li><span>shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- shop-area start -->
    <section class="shop-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="shop-banner mb-50">
                    </div>
                    <!-- tab filter -->
                    <div class="row mb-10">
                        <div class="col-xl-5 col-lg-6 col-md-6">
                            <div class="product-showing mb-40">
                                <p>Showing <?= count($product_tag)?> results</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-6">
                            <div class="shop-tab f-right">
                                <ul class="nav text-center" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                           aria-selected="true"><i class="fas fa-list-ul"></i> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                           aria-selected="false"><i class="fas fa-th-large"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pro-filter mb-40 f-right">
                                <form action="#">
                                    <select name="pro-filter" id="pro-filter">
                                        <option value="1">Shop By </option>
                                        <option value="2">Top Sales </option>
                                        <option value="3">New Product </option>
                                        <option value="4">A to Z Product </option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- tab content -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <?php if(!empty($product_tag)):?>
                                <?php  foreach ($product_tag as $product): ?>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="product-wrapper mb-50">
                                            <div class="product-img mb-25">
                                                <a href="<?= \yii\helpers\Url::to(['product/view','id'=>$product->id]) ?>">
                                                    <?=\yii\helpers\Html::img("@web/upload/product/logo_product/{$product->image}") ?>
                                                </a>
                                                <div class="sale-tag">
                                                    <?php  if($product->new): ?>
                                                        <span class="new">new</span>
                                                    <?php endif; ?>
                                                    <?php  if($product->sale): ?>
                                                        <span class="sale">sale</span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="product-action text-center">
                                                    <?php if(Yii::$app->user->isGuest): ?>
                                                        <a href="<?= \yii\helpers\Url::to(['/site/login'])?>"><i class="far fa-user"></i></a></li>
                                                    <?php else: ?>
                                                    <a href="<?= \yii\helpers\Url::to(['cart/add','id'=>$product->id])?>" title="Shoppingb Cart" data-id="<?=$product->id?>">
                                                        <i class="flaticon-shopping-cart"></i>
                                                    </a>
                                                        <?php endif;?>
                                                    <a href="<?= \yii\helpers\Url::to(['product/view','id'=>$product->id]) ?>" title="Quick View">
                                                        <i class="flaticon-eye"></i>
                                                    </a>
                                                    <a href="#" data-toggle="tooltip" data-placement="right" title="Compare">
                                                        <i class="flaticon-compare"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content pr-0">
                                                <div class="pro-cat mb-10">
                                                    <a href="shop.html">furniture</a>
                                                </div>
                                                <h4>
                                                    <a href="<?= \yii\helpers\Url::to(['product/view','id'=>$product->id]) ?>"><?= $product->name ?></a>
                                                </h4>
                                                <div class="product-meta">
                                                    <div class="pro-price">
                                                        <span>$<?= $product->price ?> USD</span>
                                                        <span class="old-price">$<?= $product->old_price ?> USD</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="basic-pagination basic-pagination-2 text-center mt-20">
<!--                                    --><?php
//                                    echo \yii\widgets\LinkPager::widget([
//                                        'pagination' => $pages,
//                                    ]);
//                                    ?>
                                    <?php else :?>
                                        <h2><?=Yii::t('content','Сори, товара с таким тэгом пока не существует') ?></h2>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        </div>
                    </div>

                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-shop">

                        <div class="shop-widget">
                            <h3 class="shop-title"><?= Yii::t('content','Поиск') ?></h3>
                            <form action="<?= \yii\helpers\Url::to(['category/search']) ?>"  method="get" class="shop-search">
                                <input type="text" placeholder="Your keyword...." name="q">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="shop-widget">
                            <h3 class="shop-title"><?= Yii::t('content','Категории') ?></h3>
                            <ul class="shop-link">
                                <?php foreach ($Category as $item):?>
                                    <li><a href="<?= \yii\helpers\Url::to(['/category/view','id'=>$item->id])?>"><i class="far fa-square"></i> <?= $item->name?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="shop-widget">
                            <h3 class="shop-title"><?= Yii::t('content','Тэги')?></h3>
                            <ul class="shop-tag">
                                <?php foreach($tags as $tag): ?>
                                <li><a href="<?=\yii\helpers\Url::to(['/tag/tag','id'=>$tag->id])?>"> <?= $tag->name?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="shop-widget">
                            <h3 class="shop-title"><?=Yii::t('content','Последний продукт') ?></h3>
                            <ul class="shop-sidebar-product">
                                <li>
                                    <div class="side-pro-img">
                                        <a href="product-details.html"><img src="/img/products/latest/shop-rsp3.jpg" alt=""></a>
                                    </div>
                                    <div class="side-pro-content">
                                        <div class="side-pro-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h5><a href="product-details.html">Raglan Baseball-Style</a></h5>
                                        <div class="side-pro-price">
                                            <span>$119.00 USD</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="side-pro-img">
                                        <a href="product-details.html"><img src="/img/products/latest/shop-rsp2.jpg" alt=""></a>
                                    </div>
                                    <div class="side-pro-content">
                                        <div class="side-pro-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h5><a href="product-details.html">Raglan Baseball-Style</a></h5>
                                        <div class="side-pro-price">
                                            <span>$119.00 USD</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="side-pro-img">
                                        <a href="product-details.html"><img src="/img/products/latest/shop-rsp4.jpg" alt=""></a>
                                    </div>
                                    <div class="side-pro-content">
                                        <div class="side-pro-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h5><a href="product-details.html">Raglan Baseball-Style</a></h5>
                                        <div class="side-pro-price">
                                            <span>$119.00 USD</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="shop-widget">
                            <div class="shop-sidebar-banner">
                                <a href="shop.html"><img src="/img/banner/shop-banner.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-area end -->


</main>

