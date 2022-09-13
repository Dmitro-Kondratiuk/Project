<main>

    <!-- breadcrumb-area-start -->
    <section class="breadcrumb-area" data-background="img/bg/page-title.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-text text-center">
                        <h1><?=Yii::t('common','Имя категории') ?> : <?= $name->name?></h1>
                        <ul class="breadcrumb-menu">
                            <li><a href="<?= \yii\helpers\Url::home()?>">Home</a></li>
                            <li><span><?= $name->name?></span></li>
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
                <?php if(empty($products)): ?>
                <div class="text-center container text-danger ">Пустая категория</div>
                <?php else: ?>
                <?php foreach ($products as $item): ?>
                <div class="col-lg-6 col-md-6">
                    <article class="postbox post format-image mb-40">
                        <div class="postbox__thumb">
                            <a href="<?=\yii\helpers\Url::to(['blog/view/','id'=>$item->id])?>">
                            <?=\yii\helpers\Html::img("@web/upload/blog/{$item->image}",['alt'=>$item->name]) ?>
                            </a>
                        </div>
                        <div class="postbox__text p-30">
                            <div class="post-meta mb-15">
                                <span><a href="#"><i class="far fa-user"></i> Diboli </a></span>
                                <span><a href="#"><i class="far fa-comments"></i> 23 Comments</a></span>
                            </div>
                            <h3 class="blog-title blog-title-sm">
                                <a href="<?= \yii\helpers\Url::to(['blog/view/','id'=>$item->id])?>"><?=$item->name?></a>
                            </h3>
                            <div class="post-text">
                                <p><?=$item->small_content?></p>
                            </div>
                            <div class="read-more">
                                <a href="<?= \yii\helpers\Url::to(['blog/view/','id'=>$item->id])?>" class="read-more">read more <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="basic-pagination basic-pagination-2 text-center mb-40">
                            <?php
                            echo \yii\widgets\LinkPager::widget([
                                'pagination' => $pages,
                            ]);
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area end -->


</main>