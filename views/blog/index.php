<main>
    <!-- breadcrumb-area-start -->
    <section class="breadcrumb-area" data-background="img/bg/page-title.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-text text-center">
                        <h1>Blog</h1>
                        <ul class="breadcrumb-menu">
                            <li><a href="<?=\yii\helpers\Url::home() ?>l">Home</a></li>
                            <li><span>Blog</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- blog-area start -->
    <section class="blog-area pt-100 pb-60">
        <div class="container">
            <div class="row">
                <?php foreach($blog as $one): ?>
                <div class="col-lg-4 col-md-6">
                    <article class="postbox post format-image mb-40">
                        <div class="postbox__thumb">
                            <a href="<?= \yii\helpers\Url::to(['/blog/view','id'=>$one->id])?>">
                                <?=\yii\helpers\Html::img("@web/img/product/{$one->img}",['alt'=>$one->name])?>
                            </a>
                        </div>
                        <div class="postbox__text p-30">
                            <div class="post-meta mb-15">
                                <span><i class="far fa-calendar-check"></i><?=$one->created_at=date("F j Y")?></span>
                                <span><i class="far fa-user"><?= $one->username?></i></span>
                            </div>
                            <h3 class="blog-title blog-title-sm">
                                <a href="<?= \yii\helpers\Url::to(['/blog/view','id'=>$one->id])?>"><?= $one->name?></a>
                            </h3>
                            <div class="post-text">
                                <p><?= $one->small_content?></p>
                            </div>
                            <div class="read-more">
                                <a href="<?= \yii\helpers\Url::to(['/blog/view','id'=>$one->id])?>" class="read-more">read more <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="basic-pagination basic-pagination-2 text-center mb-40">
                        <ul>
                            <li><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                            <li><a href="#">01</a></li>
                            <li class="active"><a href="#">02</a></li>
                            <li><a href="#">03</a></li>
                            <li><a href="#"><i class="fas fa-ellipsis-h"></i></a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area end -->

</main>