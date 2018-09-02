<?php

$this->title = Yii::t('main', 'forgot_password') . " | " . Yii::$app->params['site_name'];

?>

<!--login-->
<div class="container">
    <h1 class="mainTitle mainTitle--center"><?= Yii::t('main', 'forgot_password') ?></h1>
    <input type="hidden" value="<?= \yii\helpers\Url::to(['/account/login']) ?>" id="hiddenUrl">

    <div class="login">
        <div class="item">
            <p class="js__notify"><?= Yii::t('main', 'forgot_text') ?></p>
            <form id="forgot-form" class="forgot__form" action="/account/ajax/forgot-password" method="post" data-title="<?= Yii::t('main', 'forgot_pass_success') ?>">
                <label for="forgot-email">
                    <input type="email" id="forgot-email" class="form-fields required" name="email"
                           placeholder="Email" aria-required="true">
                </label>

                <div class="errorText" style="display: none;"
                     data-text="<?= Yii::t('main', 'incorrect_email') ?>"><?= Yii::t('main', 'incorrect_email') ?>
                </div>

                <div class="login__form--send">
                    <input type="submit" onclick="formSend.send(this, event, 'forgot')"
                           value="<?= Yii::t('main', 'send') ?>"
                           class="btn btn--white btn--white--border">
                </div>
            </form>

        </div>

    </div>
</div>

<!--login-->