<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>



<!-- preloader -->
<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
    </div>
</div>
<!-- preloader end  -->

<!-- header start -->
<header>
<!--    <ul class="catalog">-->
<!--    --><?//= \app\components\MenuWidget::widget(['tpl'=>'menu']) ?>
<!--    </ul>-->
    <div id="header-sticky" class="header-area box-90">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-6 col-md-6 col-7 col-sm-5 d-flex align-items-center pos-relative">
                    <div class="basic-bar cat-toggle">
                        <span class="bar1"></span>
                        <span class="bar2"></span>
                        <span class="bar3"></span>
                    </div>
                    <div class="logo">
                        <a href="<?= \yii\helpers\Url::home()?>"><?= \yii\helpers\Html::img('@web/img/logo/logo.png') ?></a>
                    </div>

                    <div class="category-menu">
                        <h4>Category</h4>
                       <?= \app\components\MenuWidget::widget(['tpl'=>'menu']) ?>
<!--                        <ul>-->
<!--                            <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> Table lamp</a></li>-->
<!--                            <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> Furniture</a></li>-->
<!--                            <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> Chair</a></li>-->
<!--                            <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> Men</a></li>-->
<!--                            <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> Women</a></li>-->
<!--                            <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> Cloth</a></li>-->
<!--                            <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> Trend</a></li>-->
<!--                        </ul>-->
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6 col-md-8 col-8 d-none d-xl-block">
                    <div class="main-menu text-center">
                        <nav id="mobile-menu">
                            <ul>
                                <li>
                                    <a href="<?= \yii\helpers\Url::home()?>">Home</a>
                                </li>

                                <li>
                                    <a href="<?=\yii\helpers\Url::to(['/category/product']) ?>">Products </a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['/blog/index'])?>">Blog</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['blog/about'])?>">About Us</a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['contact/index'])?>">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 col-5 col-sm-7 pl-0">
                    <div class="header-right f-right">
                        <ul>
                            <li class="search-btn">
                                <a class="search-btn nav-search search-trigger" href="#"><i class="fas fa-search"></i></a>
                            </li>
                            <li class="login-btn"><a href="<?= \yii\helpers\Url::to(['/admin'])?>"><i class="far fa-user"></i></a></li>
                           <li class="d-shop-cart"><a href="#"><i class="flaticon-shopping-cart" onclick="return getCart()"></i> <span class="cart-count"><?=$_SESSION['cart.qty']?></span></a>
                        </ul>
                    </div>
                </div>
                <div class="col-12 d-xl-none">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->

<?= $content; ?>

<!-- footer start -->
<footer>
    <div class="footer-area box-90 pt-100 pb-60">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-5 col-md-6 ">
                    <div class="footer-widget mb-40">
                        <div class="footer-logo">
                            <a href="index.html"><img src="img/logo/footer-logo.png" alt=""></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore mag na
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <div class="footer-time d-flex mt-30">
                            <div class="time-icon">
                                <img src="img/icon/time.png" alt="">
                            </div>
                            <div class="time-text">
                                <span>Got Questions ? Call us 24/7!</span>
                               <a href="tel:+380671406238">+380671406238</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 d-lg-none d-xl-block">
                    <div class="footer-widget pl-50 mb-40">
                        <h3>Social Media</h3>
                        <ul class="footer-link">
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Behance</a></li>
                            <li><a href="#"> Dribbble</a></li>
                            <li><a href="#">Linkedin</a></li>
                            <li><a href="#">Youtube</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 d-lg-none d-xl-block">
                    <div class="footer-widget pl-30 mb-40">
                        <h3>Location</h3>
                        <ul class="footer-link">
                            <li><a href="#">New York</a></li>
                            <li><a href="#">Tokyo</a></li>
                            <li><a href="#">Dhaka</a></li>
                            <li><a href="#"> Chittagong</a></li>
                            <li><a href="#">China</a></li>
                            <li><a href="#">Japan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3">
                    <div class="footer-widget mb-40">
                        <h3>About</h3>
                        <ul class="footer-link">
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#"> Privacy Policy</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Wholesale</a></li>
                            <li><a href="#">Direction</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-5 col-md-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-banner">
                            <a href="<?= \yii\helpers\Url::home()?>"><?= \yii\helpers\Html::img("@web/img/banner/add.jpg")?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area box-105">
        <div class="container-fluid">
            <div class="copyright-border pt-30 pb-30">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="copyright text-center text-md-left">
                            <p>Copyright © 2019 <a href="#">BasicTheme</a>. All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="footer-icon text-center text-md-right ">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->

<!-- Fullscreen search -->
<div class="search-wrap">
    <div class="search-inner">
        <i class="fas fa-times search-close" id="search-close"></i>
        <div class="search-cell">
            <form method="get"  action=" <?= \yii\helpers\Url::to(['category/search']) ?>">
                <div class="search-field-holder">
                    <input type="search" class="main-search-input" name = "q" placeholder="Search Entire Store... ">
                </div>
            </form>
        </div>
    </div>
</div><!-- end fullscreen search -->

<?php
Modal::begin([
'title' => '<h2 class="text-center">Ваша корзина</h2>',
'id' => 'cart',
'size' =>'modal-xl',
'footer' => '<button type="button" class="btn btn-secondary" data-dismiss="modal">Продолжить покупки</button>
        <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>,
       <a href="'.\yii\helpers\Url::to(['cart/view']).'"><button type="button" class="btn btn-success">Оформить заказ</button></a>
       '
]);
Modal::end();
?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
