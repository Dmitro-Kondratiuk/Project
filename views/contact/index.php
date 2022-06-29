
<main>
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
                        <h1><?= Yii::t('common','Свяжитесь с нами') ?></h1>
                        <ul class="breadcrumb-menu">
                            <li><a href="<?= \yii\helpers\Url::home()?>">
                                    <?= Yii::t('common','На главную')?>
                                    </a></li>
                            <li><span>
                                    <?=Yii::t('common','Контакты') ?>
                                </span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- contact-area start -->
    <section class="contact-area pt-120 pb-90" data-background="assets/img/bg/bg-map.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="contact text-center mb-30">
                        <i class="fas fa-envelope"></i>
                        <h3>Mail Here</h3>
                        <p>Admin@BasicTheme.com</p>
                        <p>Info@Themepur.com</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="contact text-center mb-30">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>Visit Here</h3>
                        <p>27 Division St, New York, NY 10002,
                            Jaklina, United Kingpung</p>
                    </div>
                </div>
                <div class="col-xl-4  col-lg-4 col-md-4 ">
                    <div class="contact text-center mb-30">
                        <i class="fas fa-phone"></i>
                        <h3>Call Here</h3>
                        <p>+8 (123) 985 789</p>
                        <p>+787 878897 87</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area end -->

    <!-- contact-form-area start -->
    <section class="contact-form-area grey-bg pt-100 pb-100">
        <div class="container">
            <div class="form-wrapper">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title mb-55">
                            <h1><?= Yii::t('common','Свяжитесь с нами через форму которая находиться ниже')?></h1>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-3 d-none d-xl-block ">
                        <div class="section-link mb-80 text-right">
                            <a class="btn text-success" href="tel:+380671406238"><i class="fas fa-phone"></i>
                                <?= Yii::t('common','Позвонить')?>
                                </a>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <?php  $form = \yii\widgets\ActiveForm::begin()?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-box user-icon mb-30">
                                <?= $form->field($contact,'your_name')->textInput(['placeholder'=>Yii::t('common','Введите свое имя')])?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-box email-icon mb-30">
                               <?= $form->field($contact,'your_phone')->textInput(['placeholder'=>Yii::t('common','Введите свой номер телефона')])?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-box phone-icon mb-30">
                                <?= $form->field($contact,'your_email')->textInput(['placeholder' =>Yii::t('common','Введите свой  E-mail')])?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-box subject-icon mb-30">
                                <?= $form->field($contact,'your_subject')->textInput(['placeholder'=>Yii::t('common','Введите тему вашего обращения')])?>
                            </div>
                        </div>
                        <div class="col-lg-12">

                                <?= $form->field($contact, 'your_message')->widget(\mihaildev\ckeditor\CKEditor::className(),[
                                    'editorOptions' => [
                                        'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                                        'inline' => false, //по умолчанию false
                                    ],
                                ])->textInput(  ['placeholder'=>Yii::t('common','Введите текст')])
                                ?>

                            <div class="contact-btn text-center">
                                <?php if(Yii::$app->user->isGuest): ?>
                                <a href="<?= \yii\helpers\Url::to(['site/login'])?>" class="btn bg-info text-white" >Зарегистрироваться</a>
                                <?php else:?>
                                <button class="btn bg-success text-white" type="submit"><?= Yii::t('common','Отправить контактную форму') ?></button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php  \yii\widgets\ActiveForm::end()?>
                    <p class="ajax-response text-center"></p>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-form-area end -->

<!--    <section class="map-area">-->
<!--        <div id="contact-map" class="contact-map"></div>-->
<!--    </section>-->


</main>

