<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
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
                    ['label' => 'Обратно на сайт ', 'icon' => 'dashboard', 'url' => ['/']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                ],
            ]
        ) ?>

    </section>

</aside>
