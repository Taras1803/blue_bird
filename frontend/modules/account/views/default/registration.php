<?php

use \yii\helpers\Url;

$this->title = Yii::t('main', 'registration');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'account'), 'url' => Url::to(['/account']) . '/'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'registration'), 'url' => false];
?>

<section class="registr header--padding">
    <div class="container">
        <div class="registr__content">
            <div class="breadcrumbs">
                <?= \frontend\widgets\Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <div class="registr__header">
                <h1 class="main-title"><?= Yii::t('main', 'registration') ?></h1>
            </div>
            <div class="registr__body">
                <div class="enter__header">
                    <h2><?= vsprintf(Yii::t('main', 'already_account'),['<span><a class="withLine withLine--blue" href="' . Url::to(['/account/login']). '">', '</a></span>']) ?></h2>
                </div>
                <div class="registr__tabs">
                    <div class="cabinet__tab tab-personal-data is-active">
                        <form action="<?= Url::to(['/account/ajax/sign-up']) ?>" class="registr__tab-items">
                            <div class="registr__tab-item">
                                <label for="field-email" class="registr__tab-label">E-mail*</label>
                                <div class="registr__tab-field">
                                    <input type="email" class="field-input form-fields required" name="email" id="field-email">
                                </div>
                            </div>
                            <div class="registr__tab-item">
                                <label for="field-password" class="registr__tab-label"><?= Yii::t('main', 'password') ?>*</label>
                                <div class="registr__tab-field">
                                    <input type="password" class="field-input form-fields required" name="password" id="field-password">
                                </div>
                            </div>
                            <div class="registr__tab-item">
                                <label for="field-repeat--password" class="registr__tab-label"><?= Yii::t('main', 'repeat_password') ?>*</label>
                                <div class="registr__tab-field">
                                    <input type="password" class="field-input form-fields required" name="repeat_password" id="field-repeat--password">
                                </div>
                            </div>
                            <div class="registr__tab-line"><div class="line"></div></div>
                            <div class="registr__tab-item">
                                <label for="field-surname" class="registr__tab-label"><?= Yii::t('main', 'last_name') ?>*</label>
                                <div class="registr__tab-field">
                                    <input type="text" class="field-input form-fields required" name="last_name">
                                </div>
                            </div>
                            <div class="registr__tab-item">
                                <label for="field-name" class="registr__tab-label"><?= Yii::t('main', 'first_name') ?>*</label>
                                <div class="registr__tab-field">
                                    <input type="text" class="field-input form-fields required" name="first_name" id="field-name">
                                </div>
                            </div>
                            <div class="registr__tab-item">
                                <label for="field-patronymic" class="registr__tab-label"><?= Yii::t('main', 'middle_name') ?></label>
                                <div class="registr__tab-field">
                                    <input type="text" class="field-input form-fields" name="middle_name" id="field-patronymic">
                                </div>
                            </div>
                            <div class="registr__tab-item">
                                <label for="field-tel" class="registr__tab-label"><?= Yii::t('main', 'phone') ?></label>
                                <div class="registr__tab-field">
                                    <input type="text" class="field-input form-fields" name="phone" id="field-tel" value="+38" placeholder="+38">
                                </div>
                            </div>
                            <div class="registr__tab-item">
                                <label for="field-born" class="registr__tab-label"><?= Yii::t('main', 'dob') ?></label>
                                <div class="registr__tab-field">
                                    <input type="date" class="field-input unstyled form-fields" name="dob" id="field-born" placeholder="00.00.0000">
                                </div>
                            </div>
                            <div class="registr__tab-item">
                                <label for="field-city" class="registr__tab-label"><?= Yii::t('main', 'city') ?></label>
                                <div class="registr__tab-field">
                                    <input type="text" class="field-input form-fields" name="city" id="field-city">
                                </div>
                            </div>
                            <div class="registr__tab-item">
                                <label for="field-adresse" class="registr__tab-label"><?= Yii::t('main', 'address') ?></label>
                                <div class="registr__tab-field">
                                    <input type="text" class="field-input form-fields" name="address" id="field-adresse">
                                </div>
                            </div>
                            <div class="errorText" data-text="<?= Yii::t('main', 'fill_in_required_fields') ?>"><?= Yii::t('main', 'fill_in_required_fields') ?></div>
                            <div class="successText"></div>
                            <div class="cabinet__tab-action cabinet__tab-action--end cabinet__tab-action--margin">
                                <button class="btn-purple-lg js__submitForm" onclick="formSend.send(this, event, 'registration')"><span><?= Yii::t('main', 'registration') ?></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
