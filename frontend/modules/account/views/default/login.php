<?php

use frontend\widgets\Breadcrumbs;
use \yii\helpers\Url;

$this->title = Yii::t('main', 'login');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'account'), 'url' => Url::to(['/account']) . '/'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'login'), 'url' => false];
?>

<section class="cabinet header--padding">
    <div class="container">
        <div class="cabinet__content">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <div class="cabinet__header">
                <h1 class="main-title"><?= Yii::t('main', 'login') ?></h1>
            </div>
            <div class="cabinet__body">
                <div class="enter__header">
                    <h2><?= vsprintf(Yii::t('main', 'no_account'),['<span><a class="withLine withLine--blue" href="' . Url::to(['/account/registration']). '">', '</a></span>']) ?></h2>
                </div>

                <div class="cabinet__tabs">
                    <div class="cabinet__tab tab-personal-data is-active">
                        <div class="cabinet__tab-items">
                            <?php if(isset($_GET['password']) && $_GET['password'] == 'changed'): ?>
                                <p class="passwordСhanged"><?= Yii::t('main', 'password_changed_successfully') ?></p>
                            <?php endif; ?>
                            <form action="<?= Url::to(['/account/ajax/login']) ?>">
                                <div class="cabinet__tab-item">
                                    <label for="field-email" class="cabinet__tab-label">E-mail*</label>
                                    <div class="cabinet__tab-field">
                                        <input type="email" class="field-input form-fields required" name="email" id="field-email">
                                    </div>
                                </div>
                                <div class="cabinet__tab-item">
                                    <label for="field-password" class="cabinet__tab-label"><?= Yii::t('main', 'password') ?>*</label>
                                    <div class="cabinet__tab-field">
                                        <input type="password" class="field-input form-fields required" name="password" id="field-password">
                                    </div>
                                </div>
                                <div class="forget-pass"><span><a class="withLine withLine--blue" href="<?= Url::to(['/account/forgot']) ?>"><?= Yii::t('main', 'forgot_password') ?></a></span></div>
                                <div class="save-me">
                                    <label>
                                        <input class="checkbox form-fields" type="checkbox" name="remember_me">
                                        <span class="checkbox-custom"></span>
                                        <span><?= Yii::t('main', 'remember_me') ?></span>
                                    </label>
                                </div>
                                <div class="errorText" data-text="<?= Yii::t('main', 'fill_in_required_fields') ?>"><?= Yii::t('main', 'fill_in_required_fields') ?></div>
                                <div class="successText"></div>
                                <div class="cabinet__tab-action cabinet__tab-action--end cabinet__tab-action--margin">
                                    <button class="btn-purple-lg js__submitForm" onclick="formSend.send(this, event, 'login')"><span><?= Yii::t('main', 'login') ?></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>