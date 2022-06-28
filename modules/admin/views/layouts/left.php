<aside class="main-sidebar">
    <?php  if(!empty(\app\modules\admin\models\Info::find()->where(['user_id' => Yii::$app->user->id])->one())):  ?>
    <?php $user = \app\modules\admin\models\Info::find()->where(['user_id' => Yii::$app->user->id])->one() ?>
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                    <?= \yii\helpers\Html::img("@web/upload/user_logo/{$user->image}") ?>
            </div>
            <div class="pull-left info">
                <p><?= $user->name?> <?= $user->last_name?></p>
                <p class="text-danger"><?= \Yii::$app->user->identity->username ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
<?php else: ?>
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <?= \yii\helpers\Html::img("@web/upload/user_logo/no-image.png") ?>
                </div>
                <div class="pull-left info">

                    <p><?= \Yii::$app->user->identity->username ?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <?php endif; ?>
        <!-- search form -->

        <form action="<?= \yii\helpers\Url::to(['/admin/order/search/']) ?>" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Shop', 'options' => ['class' => 'header']],
                    ['label' => 'Order', 'icon' => 'archive', 'url' => ['/admin/order']],
                    ['label' => 'Menu', 'icon' => 'bars', 'url' => ['/admin/menu/index']],
                    ['label' => 'Contact', 'icon' => 'asterisk', 'url' => ['/admin/contact']],
                    ['label' => 'Coment', 'icon' => 'asterisk', 'url' => ['/admin/coment']],
                    ['label' => 'BlogComent', 'icon' => 'dashboard', 'url' => ['/admin/comentary']],
                    [
                        'label' => 'Category',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'View', 'icon' => 'file-code-o', 'url' => ['/admin/category'],],
                            ['label' => 'Create', 'icon' => 'dashboard', 'url' => ['/admin/category/create'],],
                        ],
                    ],
                    [
                        'label' => 'Blog',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'View', 'icon' => 'file-code-o', 'url' => ['/admin/blog'],],
                            ['label' => 'Create', 'icon' => 'dashboard', 'url' => ['/admin/blog/create'],],
                            ['label' => 'Categoty_Blog', 'icon' => 'file-code-o', 'url' => ['/admin/categoryblog'],],
                        ],
                    ],
                    //['label' => 'Product', 'icon' => 'apple', 'url' => ['/admin/product']],
//                    ['label' => 'Login', 'url' => ['/site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Product',
                        'icon' => 'apple',
                        'url' => '#',
                        'items' => [
                            ['label' => 'View', 'icon' => 'file-code-o', 'url' => ['/admin/product'],],
                            ['label' => 'Create', 'icon' => 'dashboard', 'url' => ['/admin/product/create'],],
                            ['label' => 'View_Tag', 'icon' => 'file-code-o', 'url' => ['/admin/tag'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
                        ],
                    ],
                    ['label' => 'Date_User', 'icon' => 'file-code-o', 'url' => ['//admin/info/']],
                    ['label' => 'Обратно на сайт ', 'icon' => 'dashboard', 'url' => ['/']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                ],
            ]
        ) ?>

    </section>

</aside>
