<?php

use yii\bootstrap\ActiveForm;

$this->title = Yii::t('main', 'login_registration') . " | " . Yii::$app->params['site_name'];

?>

<!--login-->
<div class="container">
    <h1 class="mainTitle mainTitle--center"><?= Yii::t('main', 'login_registration') ?></h1>
    <input type="hidden" value="<?= \yii\helpers\Url::to(['/account/']) ?>/" id="hiddenUrl">

    <?php if(isset($_GET['password']) && $_GET['password'] == 'changed'): ?>
        <p class="notify__forgotPassword"><?= Yii::t('main', 'password_changed') ?></p>
    <?php endif; ?>

    <?php if($error = Yii::$app->session->getFlash('error')): ?>
        <h3><?= $error ?></h3>
    <?php endif; ?>

    <div class="login">
        <ul class="login--tab">
            <li class="active" data-tab="1"><?= Yii::t('main', 'already_registered_mobile') ?></li>
            <li data-tab="2"><?= Yii::t('main', 'new_customer_mobile') ?></li>
        </ul>

        <div data-cont="1" class="login--left login--item">

            <div class="item">

                <h2><?= Yii::t('main', 'already_registered') ?></h2>

                <?= \frontend\widgets\EAuth::widget(['action' => '/account/login']) ?>

                <div class="or"><span><?= Yii::t('main', 'or') ?></span></div>

                <p><?= Yii::t('main', 'signup_text') ?></p>

                <form id="login-form" class="login__form" action="/account/ajax/login" method="post">
                    <label for="loginform-email">
                        <input type="email" id="loginform-email" class="form-fields required" name="email" placeholder="<?= Yii::t('account', 'email_placeholder') ?>" aria-required="true">
                    </label>
                    <label for="loginform-password" class="input">
                        <input type="password" id="loginform-password" class="form-fields required" name="password" placeholder="<?= Yii::t('main', 'password') ?>" aria-required="true">
                    </label>

                    <div class="errorText" style="display: none;"
                         data-text="<?= Yii::t('main', 'incorrect_login_password') ?>"><?= Yii::t('main', 'incorrect_login_password') ?>
                    </div>

                    <div class="login__form--reset">
                        <a class="js-reset"
                           href="<?= \yii\helpers\Url::to(['/account/forgot']) ?>"><?= Yii::t('main', 'forgot_password') ?>?</a>
                    </div>
                    <div class="login__form--send">
                        <input type="submit" onclick="formSend.send(this, event, 'login')" value="<?= Yii::t('main', 'login') ?>"
                               class="btn btn--white btn--white--border">
                    </div>
                </form>

            </div>

        </div>
        <div data-cont="2" class="login--right login--item">
            <div class="item">

                <h2><?= Yii::t('main', 'new_customer') ?></h2>

                <p><?= Yii::t('main', 'login_text') ?></p>

                <form class="login__form" action="/account/ajax/sign-up">
                    <label for="signup-first_name">
                        <input type="text" name="first_name" id="signup-first_name" placeholder="<?= Yii::t('main', 'first_name') ?>" class="form-fields required">
                    </label>
                    <label for="signup-email">
                        <input type="email" name="email" id="signup-email" placeholder="<?= Yii::t('account', 'email_placeholder') ?>" class="form-fields required">
                    </label>
                    <label for="signup-password">
                        <input type="password" name="password" id="signup-password" placeholder="<?= Yii::t('main', 'password') ?>" class="form-fields required">
                    </label>
                    <div class="errorText" style="display: none;"
                         data-text="<?= Yii::t('main', 'error_fields') ?>"><?= Yii::t('main', 'error_fields') ?>
                    </div>
                    <div class="login__form--send">
                        <input type="submit" onclick="formSend.send(this, event, 'reg')" value="<?= Yii::t('main', 'to_register') ?>" class="btn btn--white btn--white--border">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!--login-->