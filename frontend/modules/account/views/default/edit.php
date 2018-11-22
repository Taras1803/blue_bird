<?php

use \yii\helpers\Url;

$this->title = Yii::t('main', 'edit') . ' / ' . Yii::t('main', 'account');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'account'), 'url' => Url::to(['/account']) . '/'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'update'), 'url' => false];
?>

<section class="cabinet header--padding">
    <div class="container">
        <div class="cabinet__content">
            <div class="breadcrumbs">
                <?= \frontend\widgets\Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <div class="cabinet__header">
                <h1 class="main-title">редактирование</h1>
                <div class="cabinet__buttons">
                    <a href="<?= Url::to(['/account']) ?>/" class="main-link main-link--with-line">Назад</a>
                </div>
            </div>
            <div class="cabinet__body">
                <div class="cabinet__tabs">
                    <div class="cabinet__tab tab-personal-data is-active">
                        <div class="cabinet__tab-items">
                            <form action="<?= Url::to(['/account/ajax/update-info']) ?>" class="registr__tab-items">
                                <div class="cabinet__tab-item">
                                    <label for="field-fio"
                                           class="cabinet__tab-label"><?= Yii::t('main', 'first_name') ?>*</label>
                                    <div class="cabinet__tab-field">
                                        <input type="text" class="field-input form-fields required" name="first_name"
                                               id="field-fio" <?php if ($user->first_name): ?> value="<?= $user->first_name ?>" <?php endif; ?>
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="cabinet__tab-item">
                                    <label for="field-fio"
                                           class="cabinet__tab-label"><?= Yii::t('main', 'last_name') ?>*</label>
                                    <div class="cabinet__tab-field">
                                        <input type="text" class="field-input form-fields required" name="last_name"
                                               id="field-fio" <?php if ($user->last_name): ?> value="<?= $user->last_name ?>" <?php endif; ?>
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="cabinet__tab-item">
                                    <label for="field-fio"
                                           class="cabinet__tab-label"><?= Yii::t('main', 'middle_name') ?></label>
                                    <div class="cabinet__tab-field">
                                        <input type="text" class="field-input form-fields" name="middle_name"
                                               id="field-fio" <?php if ($user->middle_name): ?> value="<?= $user->middle_name ?>" <?php endif; ?>
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="cabinet__tab-item">
                                    <label for="field-date"
                                           class="cabinet__tab-label"><?= Yii::t('main', 'dob') ?></label>
                                    <div class="cabinet__tab-field">
                                        <input type="date" class="field-input unstyled form-fields" name="dob"
                                               id="field-date" <?php if ($user->dob): ?> value="<?= $user->dob ?>" <?php endif; ?>
                                               placeholder="00.00.0000">
                                    </div>
                                </div>
                                <div class="cabinet__tab-item">
                                    <label for="field-organization"
                                           class="cabinet__tab-label"><?= Yii::t('main', 'organization') ?></label>
                                    <div class="cabinet__tab-field">
                                        <input type="text" class="field-input form-fields" name="organization"
                                               id="field-organization" <?php if ($user->organization): ?> value="<?= $user->organization ?>" <?php endif; ?>
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="cabinet__tab-item">
                                    <label for="field-email" class="cabinet__tab-label">E-mail*</label>
                                    <div class="cabinet__tab-field">
                                        <input type="email" class="field-input form-fields required" name="email"
                                               id="field-email" <?php if ($user->email): ?> value="<?= $user->email ?>" <?php endif; ?>
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="cabinet__tab-item">
                                    <label for="field-phone"
                                           class="cabinet__tab-label"><?= Yii::t('main', 'phone') ?></label>
                                    <div class="cabinet__tab-field">
                                        <input type="text" class="field-input form-fields" name="phone"
                                               id="field-phone" <?php if ($user->phone): ?> value="<?= $user->phone ?>" <?php endif; ?>
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="cabinet__tab-item">
                                    <label for="field-city"
                                           class="cabinet__tab-label"><?= Yii::t('main', 'city') ?></label>
                                    <div class="cabinet__tab-field">
                                        <input type="text" class="field-input form-fields" name="city"
                                               id="field-city" <?php if ($user->city): ?> value="<?= $user->city ?>" <?php endif; ?>
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="cabinet__tab-item">
                                    <label for="field-address"
                                           class="cabinet__tab-label"><?= Yii::t('main', 'address') ?></label>
                                    <div class="cabinet__tab-field">
                                        <input type="text" class="field-input form-fields" name="address"
                                               id="field-address" <?php if ($user->address): ?> value="<?= $user->address ?>" <?php endif; ?>
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="cabinet__tab-item">
                                    <label for="field-discount-card"
                                           class="cabinet__tab-label"><?= Yii::t('main', 'discount_card') ?></label>
                                    <div class="cabinet__tab-field">
                                        <input type="text" class="field-input form-fields" name="discount_card"
                                               id="field-discount-card" <?php if ($user->discount_card): ?> value="<?= $user->discount_card ?>" <?php endif; ?>
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="errorText"
                                     data-text="<?= Yii::t('main', 'fill_in_required_fields') ?>"><?= Yii::t('main', 'fill_in_required_fields') ?></div>
                                <div class="successText"></div>
                                <div class="cabinet__tab-action cabinet__tab-action--end cabinet__tab-action--margin">
                                    <button class="btn-purple-lg js__submitForm"
                                            onclick="formSend.send(this, event, 'update-info')">
                                        <span><?= Yii::t('main', 'save') ?></span></button>
                                </div>
                            </form>


                            <form action="<?= Url::to(['/account/ajax/update-password']) ?>" class="registr__tab-items">
                                <div class="cabinet__tab-item cabinet__tab-item--password">
                                    <label for="field-password-old"
                                           class="cabinet__tab-label"><?= Yii::t('main', 'old_password') ?></label>
                                    <div class="cabinet__tab-field">
                                        <input type="password" class="field-input form-fields required"
                                               name="old_password"
                                               id="field-password-old" value="" placeholder="">
                                    </div>
                                </div>
                                <div class="cabinet__tab-item">
                                    <label for="field-password-new"
                                           class="cabinet__tab-label"><?= Yii::t('main', 'new_password') ?></label>
                                    <div class="cabinet__tab-field">
                                        <input type="password" class="field-input form-fields required"
                                               name="new_password"
                                               id="field-password-new" value="" placeholder="">
                                    </div>
                                </div>
                                <div class="cabinet__tab-item">
                                    <label for="field-password-new-repeat"
                                           class="cabinet__tab-label"><?= Yii::t('main', 'confirm_password') ?></label>
                                    <div class="cabinet__tab-field">
                                        <input type="password" class="field-input form-fields required"
                                               name="confirm_password"
                                               id="field-password-new-repeat" value="" placeholder="">
                                    </div>
                                </div>
                                <div class="errorText"
                                     data-text="<?= Yii::t('main', 'fill_in_required_fields') ?>"><?= Yii::t('main', 'fill_in_required_fields') ?></div>
                                <div class="successText"></div>
                                <div class="cabinet__tab-action cabinet__tab-action--end cabinet__tab-action--margin">
                                    <button class="btn-purple-lg js__submitForm"
                                            onclick="formSend.send(this, event, 'update-password')">
                                        <span><?= Yii::t('main', 'save') ?></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
