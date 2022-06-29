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
                        <ul>
                            <?php foreach (Yii::$app->params['menu'] as $id=>$item): ?>
                            <li><a href="<?= $item['url']?>"><i class="flaticon-shopping-cart-1"></i> <?= $item['title'] ?></a></li>
                            <?php if(!empty($item['items'])): ?>
                            <?php foreach ($item['items'] as $one) ?>
                                <li><a href="<?=$one['url']?>"><i class="fa fa-space-shuttle"></i> <?= $one['title'] ?></a></li>
                                <?php endif;?>
                            <?php endforeach; ?>
                            <?= $this->render('language')?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6 col-md-8 col-8 d-none d-xl-block">
                    <div class="main-menu text-center">
                        <nav id="mobile-menu">
                            <ul>
                                <li>
                                    <a href="<?= \yii\helpers\Url::home()?>"><?=Yii::t('common','На главную')?></a>
                                </li>

                                <li>
                                    <a href="<?=\yii\helpers\Url::to(['/category/product']) ?>"><?=Yii::t('common','Продукт')?> </a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['/blog/index'])?>"><?=Yii::t('common','Блог')?></a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['blog/about'])?>"><?=Yii::t('common','О Нас')?></a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['contact/index'])?>"><?=Yii::t('common','Контакты')?></a>
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
                            <li class="login-btn">
                                <?php if(Yii::$app->user->isGuest):?>
                                <a href="<?= \yii\helpers\Url::to(['/site/login'])?>"><i class="far fa-user"></i></a></li>
                             <?php elseif (Yii::$app->user->can('canAdmin')): ?>
                                <a href="<?= \yii\helpers\Url::to(['/admin'])?>"><i class="fa fa-home"></i></a></li>
                                <?php else:?>
                                    <a href="<?= \yii\helpers\Url::to(['/site/area'])?>"><i class="fas fa-bath"></i></a></li>
                                <?php endif; ?>
                            <?php if(!Yii::$app->user->isGuest): ?>
                            <li class="d-shop-cart"><a href="#"><i class="flaticon-shopping-cart" onclick="return getCart()"></i> <?php if(!empty($_SESSION['cart.qty'])): ?>
                                        <span class="cart-count"><?=$_SESSION['cart.qty']?></span><?php endif; ?></a>
                            </li>
                            <?php endif; ?>
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
                        <p>Internet shop at home
                        </p>
                        <div class="footer-time d-flex mt-30">
                            <div class="time-icon">
                                <img src="img/icon/time.png" alt="">
                            </div>
                            <div class="time-text">
                                <span>Got Questions ? Call us 24/7!</span>
                               <a href="tel:+380671406238">Call us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 d-lg-none d-xl-block">
                    <div class="footer-widget pl-50 mb-40">
                        <h3>Social Media</h3>
                        <ul class="footer-link">
                            <li><a href="https://www.facebook.com/profile.php?id=100017190759750">Facebook</a></li>
                            <li><a href="https://twitter.com/?lang=ru">Twitter</a></li>
                            <li><a href="https://www.behance.net/">Behance</a></li>
                            <li><a href="https://dribbble.com/"> Dribbble</a></li>
                            <li><a href="https://ru.linkedin.com/">Linkedin</a></li>
                            <li><a href="https://www.youtube.com/">Youtube</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 d-lg-none d-xl-block">
                    <div class="footer-widget pl-30 mb-40">
                        <h3>Location</h3>
                        <ul class="footer-link">
                            <li><a href="https://www.google.com/maps/place/%D0%9D%D1%8C%D1%8E-%D0%99%D0%BE%D1%80%D0%BA,+%D0%A1%D0%A8%D0%90/@40.6971494,-74.2598655,10z/data=!3m1!4b1!4m5!3m4!1s0x89c24fa5d33f083b:0xc80b8f06e177fe62!8m2!3d40.7127753!4d-74.0059728">New York</a></li>
                            <li><a href="https://www.google.com/maps/search/Tokyo/@35.5090627,139.2093851,9z/data=!3m1!4b1">Tokyo</a></li>
                            <li><a href="https://www.google.com/maps/place/%D0%94%D0%B0%D0%BA%D0%BA%D0%B0,+%D0%91%D0%B0%D0%BD%D0%B3%D0%BB%D0%B0%D0%B4%D0%B5%D1%88/@23.7807777,90.3492858,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.810332!4d90.4125181">Dhaka</a></li>
                            <li><a href="https://www.google.com/maps/place/%D0%A7%D0%B8%D1%82%D0%B0%D0%B3%D0%BE%D0%BD%D0%B3,+%D0%91%D0%B0%D0%BD%D0%B3%D0%BB%D0%B0%D0%B4%D0%B5%D1%88/@22.3318538,91.7320919,13z/data=!4m5!3m4!1s0x30acd8a64095dfd3:0x5015cc5bcb6905d9!8m2!3d22.356851!4d91.7831819"> Chittagong</a></li>
                            <li><a href="https://www.google.com/maps/place/%D0%9A%D0%B8%D1%82%D0%B0%D0%B9/@34.4553851,86.0789369,4z/data=!3m1!4b1!4m5!3m4!1s0x31508e64e5c642c1:0x951daa7c349f366f!8m2!3d35.86166!4d104.195397">China</a></li>
                            <li><a href="https://www.google.com/maps/place/%D0%AF%D0%BF%D0%BE%D0%BD%D0%B8%D1%8F/@33.1926866,128.1528692,5z/data=!3m1!4b1!4m5!3m4!1s0x34674e0fd77f192f:0xf54275d47c665244!8m2!3d36.204824!4d138.252924">Japan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3">
                    <div class="footer-widget mb-40">
                        <h3>About</h3>
                        <ul class="footer-link">
                            <li><a href="https://www.termsfeed.com/blog/sample-terms-and-conditions-template/">Terms & Conditions</a></li>
                            <li><a href="https://policies.google.com/privacy?hl=en-US"> Privacy Policy</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/contact/index'])?>">Contact Us</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/contact/faq'])?>">FAQ</a></li>
                            <li><a href="https://www.askaname.com/en/ua/204643_wholesale-food-base-west">Wholesale</a></li>
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
                            <p><?= $this->render('language') ?></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="footer-icon text-center text-md-right ">
                            <a href="https://www.facebook.com/profile.php?id=100017190759750"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/?lang=ru"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.behance.net/"><i class="fab fa-behance"></i></a>
                            <a href="https://ru.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
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
'size' =>'modal-lg',
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
