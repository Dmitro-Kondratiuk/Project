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
                        <h1>Registration</h1>
                        <ul class="breadcrumb-menu">
                            <li><a href="<?= \yii\helpers\Url::home()?>">Home</a></li>
                            <li><span>Registration</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- login Area Strat-->
    <section class="login-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="basic-login">
                        <h3 class="text-center mb-60">Signup From Here</h3>
                        <?php  $form = \yii\widgets\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
                        <?= $form->field($user,'username') ?>
                        <?= $form->field($user,'password')->passwordInput() ?>
                        <div class="mt-10"></div>
                        <?= \yii\helpers\Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-danger']) ?>
                        <?php \yii\widgets\ActiveForm::end() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login Area End-->


</main>