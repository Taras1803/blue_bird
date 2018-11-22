<?php

use \yii\helpers\Url;

$this->title = Yii::t('main', 'forgot_password');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'account'), 'url' => Url::to(['/account']) . '/'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'forgot_password'), 'url' => false];
?>

<section class="cabinet header--padding">
    <div class="container">
        <div class="cabinet__content">
            <div class="breadcrumbs">
                <?= \frontend\widgets\Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <div class="cabinet__header">
                <h1 class="main-title"><?= Yii::t('main', 'forgot_password') ?></h1>
            </div>
            <div class="cabinet__body">
                <div class="enter__header">
                    <h2><?= vsprintf(Yii::t('main', 'already_account'),['<span><a class="withLine withLine--blue" href="' . Url::to(['/account/login']). '">', '</a></span>']) ?></h2>
                </div>
                <div class="cabinet__tabs">
                    <div class="cabinet__tab tab-personal-data is-active">
                        <div class="cabinet__tab-items">
                            <form action="<?= Url::to(['/account/ajax/forgot-password']) ?>">
                                <div class="cabinet__tab-item">
                                    <label for="field-email" class="cabinet__tab-label">E-mail*</label>
                                    <div class="cabinet__tab-field">
                                        <input type="email" class="field-input form-fields required" name="email" id="field-email">
                                    </div>
                                </div>
                                <div class="errorText" data-text="<?= Yii::t('main', 'fill_in_required_fields') ?>"><?= Yii::t('main', 'fill_in_required_fields') ?></div>
                                <div class="successText"></div>
                                <div class="cabinet__tab-action cabinet__tab-action--end cabinet__tab-action--margin">
                                    <button class="btn-purple-lg js__submitForm" onclick="formSend.send(this, event, 'login')"><span><?= Yii::t('main', 'send') ?></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>