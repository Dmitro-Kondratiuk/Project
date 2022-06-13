<?php

use yii\helpers\Url;
?>
<main>
    <?php debug($_POST) ?>
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
    <!-- breadcrumb-area-start -->
    <section class="breadcrumb-area" data-background="img/bg/page-title.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-text text-center">
                        <h1><?= $products->category->name."->".$products->name ?></h1>
                        <ul class="breadcrumb-menu">
                            <li><a href="<?= \yii\helpers\Url::home() ?>">Home</a></li>
                            <li><span>shop details</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <!-- shop-area start -->
    <section class="shop-details-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-4">
                    <div class="product-details-img mb-10">
                        <div class="tab-content" id="myTabContentpro">
                            <div class="tab-pane fade show active" id="home" role="tabpanel">
                                <div class="product-large-img">
                                    <?= \yii\helpers\Html::img("@web/upload/product/logo_product/{$products->image}",['alt'=>$products->name]) ?>
                                </div>
                                <div class="sale-tag">
                                    <?php  if($products->new): ?>
                                        <span class="new">new</span>
                                    <?php endif; ?>
                                    <?php  if($products->sale): ?>
                                        <span class="sale">sale</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel">
                                <div class="product-large-img">
                                    <img src="/img/products/pro15.jpg" alt="">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile1" role="tabpanel">
                                <div class="product-large-img">
                                    <img src="/img/products/pro16.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shop-thumb-tab mb-30">
                        <ul class="nav" id="myTab2" role="tablist">
                            <?php foreach ($galery->productImg as $it): ?>
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab"  role="tab" aria-selected="true"><?= \yii\helpers\Html::img("@web/upload/product/".$it->name)?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-8">
                    <div class="product-details mb-30 pl-30">
                        <div class="details-cat mb-20">
                            <a href="#">decor,</a>
                            <a href="#">furniture</a>
                        </div>
                        <h2 class="pro-details-title mb-15"><?=$products->category->name.": ". $products->name ?></h2>
                        <div class="details-price mb-20">
                            <span>$<?= $products->price ?></span>
                            <span class="old-price">$<?= $products->old_price?></span>
                        </div>
                        <div class="product-variant">

                            <div class="product-desc variant-item">
                                <p><?= $products->small_content ?></p>
                            </div>

                            <div class="product-info-list variant-item">
                                <ul>
                                    <li><span>Brands:</span><?=$products->category->name?></li>
                                    <li><span>Product Code:</span> <?=$products->id ?></li>
                                    <li><span>Quantity in stock:   </span> <?=$products->count ?></li>
                                    <a href="<?= \yii\helpers\Url::to(['category/view','id'=>$products->category->id]) ?>"><li><span>Stock:</span> <span class="in-stock"><?=   $products->category->name?></span></li></a>
                                </ul>
                            </div>

                            <div class="product-action-details variant-item">
                                <div class="product-details-action">
                                    <form action="#">
                                        <div class="details-cart mt-40">
                                            <?php if(!Yii::$app->user->isGuest): ?>
                                            <a href="<?=\yii\helpers\Url::to(['/cart/add/','id'=>$products->id])?>" class="btn theme-btn" data-id="<?=$products->id?>">Byu</a>
                                            <?php else: ?>
                                            <a href="<?= Url::to(['/site/login']) ?>"><button class="btn theme-btn">Login</button></a>
                                            <?php endif; ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col-xl-8 col-lg-8">
                    <div class="product-review">
                        <ul class="nav review-tab" id="myTabproduct" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab6" data-toggle="tab" href="#home6" role="tab" aria-controls="home"
                                   aria-selected="true">Description </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab6" data-toggle="tab" href="#profile6" role="tab" aria-controls="profile"
                                   aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="home6" role="tabpanel" aria-labelledby="home-tab6">
                                <div class="desc-text">
                                    <p><?= $products->content?></p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile6" role="tabpanel" aria-labelledby="profile-tab6">
                                <div class="desc-text review-text">
                                    <div class="product-commnets">
                                        <?php foreach ($infa as $one): ?>
                                        <div class="product-commnets-list mb-25 pb-15">
                                            <div class="pro-comments-img">
                                                <img src="/img/products/comments/01.png" alt="">
                                            </div>
                                            <div class="pro-commnets-text">
                                                <h4><?= $one->username?> -
                                                    <span><?=$one->created_at = date("F j Y") ?></span>
                                                </h4>
                                                <div class="pro-rating">
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <p><?= $one->coment?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    </div>
                                    <div class="review-box mt-50">
                                        <h4>Add a Review</h4>
                                        <div class="your-rating mb-40">
                                            <span>Your Rating:</span>
                                            <div class="rating-list">
                                                <a href="#">
                                                    <i class="far fa-star"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="far fa-star"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="far fa-star"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="far fa-star"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="far fa-star"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <?php  $form = \yii\widgets\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <?= $form->field($content, 'coment')->widget(\mihaildev\ckeditor\CKEditor::className(),[
                                                        'editorOptions' => [
                                                            'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                                                            'inline' => false, //по умолчанию false
                                                        ],
                                                    ])
                                                    ?>
                                                </div>
                                                <div class="col-xl-6">
                                                    <?= $form->field($content,'username')?>
                                                 </div>
                                                <div class="col-xl-6">
                                                    <?= $form->field($content,'email')?>
                                                </div>
                                                <div class="col-xl-12">
                                                    <?= \yii\helpers\Html::submitButton('Оставить отзыв', ['class' => 'btn btn-success']) ?>
                                                </div>
                                            </div>
                                        <?php \yii\widgets\ActiveForm::end()  ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="pro-details-banner">
                        <a href="shop.html"><img src="/img/banner/pro-details.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-area end -->

    <!-- product-area start -->
    <section class="product-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="area-title text-center mb-50">
                        <h2>Sale</h2>
                        <p>Goods that are on sale</p>
                    </div>
                </div>
            </div>
            <div class="product-slider-2 owl-carousel">
                <?php foreach ($sale as $one): ?>
                <div class="pro-item">
                    <div class="product-wrapper">
                        <div class="product-img mb-25">
                            <a href="<?= \yii\helpers\Url::to(['/product/view','id'=>$one->id]) ?>">
                                <?= \yii\helpers\Html::img("@web/upload/product/logo_product/{$one->image}",['alt'=>$one->name]) ?>
<!--                                <img class="secondary-img" src="/img/products/pro5.jpg" alt="">-->
                            </a>
                            <div class="product-action text-center">
                                     <?php if(Yii::$app->user->isGuest): ?>
                                <a href="<?= \yii\helpers\Url::to(['/site/login'])?>"><i class="far fa-user"></i></a></li>
                                     <?php else: ?>
                                <a href="<?= \yii\helpers\Url::to(['cart/add','id'=>$sale->id])?>" title="Shoppingb Cart" data-id="<?=$sale->id?>">
                                    <?php endif;?>
                                <a href="<?= \yii\helpers\Url::to(['/product/view','id'=>$one->id]) ?>" title="Quick View">
                                    <i class="flaticon-eye"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-placement="right" title="Compare">
                                    <i class="flaticon-compare"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="pro-cat mb-10">
                                <a href="shop.html">decor, </a>
                                <a href="shop.html">furniture</a>
                            </div>
                            <h4>
                                <a href="product-details.html"><?= $one->name ?></a>
                            </h4>
                            <div class="product-meta">
                                <div class="pro-price">
                                    <span>$<?= $one->price ?> USD</span>
                                    <span class="old-price">$<?= $one->old_price ?> USD</span>
                                </div>
                            </div>
                            <div class="product-wishlist">
                                <a href="#"><i class="far fa-heart" title="Wishlist"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- product-area end -->


</main>