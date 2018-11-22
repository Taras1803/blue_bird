<?php

/* @var $this yii\web\View */

use frontend\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = Yii::t('main', 'ordering');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'cart'), 'url' => Url::to(['/shopping-cart'])];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'ordering'), 'url' => false];
?>

<section class="order header--padding">
    <div class="container">
        <div class="order__content">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <div class="order__header">
                <h1 class="main-title"><?= Yii::t('main', 'ordering') ?></h1>
            </div>
            <div class="order__body">
                <div class="order__tabs">
                    <div class="order__tab">
                        <form action="/actions/save-checkout-data">
                            <div class="order__tab-items">
                                <div class="order__tab-item">
                                    <h2><?= Yii::t('main', 'basic_information') ?></h2>
                                </div>
                                <div class="order__tab-item">
                                    <label for="field-last_name"
                                           class="order__tab-label"><?= Yii::t('main', 'last_name') ?>*</label>
                                    <div class="order__tab-field">
                                        <input type="text" class="field-input form-fields required" name="last_name"
                                               value="<?= $data['information']['last_name'] ?>"
                                               id="field-last_name">
                                    </div>
                                </div>
                                <div class="order__tab-item">
                                    <label for="field-first_name"
                                           class="order__tab-label"><?= Yii::t('main', 'first_name') ?>*</label>
                                    <div class="order__tab-field">
                                        <input type="text" class="field-input form-fields required"
                                               name="first_name" value="<?= $data['information']['first_name'] ?>"
                                               id="field-first_name">
                                    </div>
                                </div>
                                <div class="order__tab-item">
                                    <label for="field-middle_name"
                                           class="order__tab-label"><?= Yii::t('main', 'middle_name') ?></label>
                                    <div class="order__tab-field">
                                        <input type="text" class="field-input form-fields" name="middle_name"
                                               value="<?= $data['information']['middle_name'] ?>"
                                               id="field-middle_name">
                                    </div>
                                </div>
                                <div class="order__tab-item">
                                    <label for="field-email" class="order__tab-label">Email*</label>
                                    <div class="order__tab-field">
                                        <input type="text" class="field-input form-fields required" name="email"
                                               id="field-email"
                                               value="<?= $data['information']['email'] ?>">
                                    </div>
                                </div>
                                <div class="order__tab-item">
                                    <label for="field-phone"
                                           class="order__tab-label"><?= Yii::t('main', 'phone') ?></label>
                                    <div class="order__tab-field">
                                        <input type="text" class="field-input form-fields" name="phone" id="field-phone"
                                               value="<?= $data['information']['phone'] ?>">
                                    </div>
                                </div>

                                <div class="order__tab-item"><h2><?= Yii::t('main', 'delivery') ?></h2></div>
                                <div class="order__tab-item">
                                    <div class="order__tab-label"><?= Yii::t('main', 'delivery_service') ?>*</div>
                                    <div class="order__tab-field">
                                        <div class="delivery__select">
                                            <div class="dropdown-main dropdown-main--delivery">
                                                <label for="field-delivery" class="dropdown-main__header">
                                                    <input disabled="true" type="text"
                                                           class="field-delivery form-fields required has-value"
                                                           id="field-delivery"
                                                           value="<?= $data['delivery_methods'][$data['information']['delivery_method']]['title'] ?>"
                                                           data-value="<?= $data['information']['delivery_method'] ?>"
                                                           name="delivery_method">
                                                    <i></i>
                                                </label>
                                                <ul class="dropdown-main__body dropdown-main__body--delivery">
                                                    <?php foreach ($data['delivery_methods'] as $key => $delivery_methods): ?>
                                                        <li>
                                                            <span data-value="<?= $key ?>"
                                                                  data-text="<?= $delivery_methods['description'] ?>"
                                                                  class="js__changeDeliveryMethod"><?= $delivery_methods['title'] ?></span>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order__tab-item"
                                     style="<?= ($data['information']['delivery_method'] != 'pickup') ? '' : 'display: none;' ?>">
                                    <label for="field-city"
                                           class="order__tab-label"><?= Yii::t('main', 'city') ?>*</label>
                                    <div class="order__tab-field">
                                        <input type="text"
                                               class="field-input js__deliveryField <?= ($data['information']['delivery_method'] != 'pickup') ? 'form-fields required' : '' ?>"
                                               name="city" id="field-city"
                                               value="<?= $data['information']['city'] ?>">
                                    </div>
                                </div>

                                <div class="order__tab-item"
                                     style="<?= ($data['information']['delivery_method'] == 'nova_poshta_courier') ? '' : 'display: none;' ?>">
                                    <label for="field-city"
                                           class="order__tab-label"><?= Yii::t('main', 'address') ?>*</label>
                                    <div class="order__tab-field">
                                        <input type="text"
                                               class="field-input js__deliveryField <?= ($data['information']['delivery_method'] == 'nova_poshta_courier') ? 'form-fields required' : '' ?>"
                                               name="address"
                                               id="field-city"
                                               value="<?= $data['information']['address'] ?>">
                                    </div>
                                </div>

                                <div class="order__tab-item"
                                     style="<?= ($data['information']['delivery_method'] == 'nova_poshta') ? '' : 'display: none;' ?>">
                                    <label for="field-np_detachment"
                                           class="order__tab-label"><?= Yii::t('main', 'np_detachment') ?>*</label>
                                    <div class="order__tab-field">
                                        <input type="text"
                                               class="field-input js__deliveryField <?= ($data['information']['delivery_method'] == 'nova_poshta') ? 'form-fields required' : '' ?>"
                                               name="np_detachment"
                                               id="field-np_detachment"
                                               value="<?= $data['information']['np_detachment'] ?>">
                                    </div>
                                </div>

                                <p class="js__deliveryText"><?= $data['delivery_methods'][$data['information']['delivery_method']]['description'] ?></p>

                                <div class="order__tab-item"><h2><?= Yii::t('main', 'payment') ?></h2></div>
                                <div class="order__tab-item">
                                    <div class="order__tab-label"><?= Yii::t('main', 'payment_method') ?>*</div>
                                    <div class="order__tab-field">
                                        <div class="payment__select">
                                            <div class="dropdown-main dropdown-main--payment">
                                                <label for="field-payment" class="dropdown-main__header">
                                                    <input disabled="true" type="text"
                                                           class="field-payment form-fields required has-value"
                                                           id="field-payment"
                                                           value="<?= $data['payment_methods'][$data['information']['payment_method']]['name'] ?>"
                                                           name="payment_method"
                                                           data-value="<?= $data['information']['payment_method'] ?>">
                                                    <i></i>
                                                </label>
                                                <ul class="dropdown-main__body dropdown-main__body--payment">
                                                    <?php foreach ($data['payment_methods'] as $key => $payment_methods): ?>
                                                        <li style="<?= ($data['information']['delivery_method'] == 'pickup' && $key == 'cod') ? 'display: none;' : '' ?>">
                                                            <span data-value="<?= $key ?>"
                                                                  class="js__changePaymentMethod"><?= $payment_methods['name'] ?></span>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="order__tab-item"><h2><?= Yii::t('main', 'comment') ?></h2></div>
                                <div class="order__tab-item">
                                    <textarea name="comment" cols="30" rows="10"
                                              class="field-textarea form-fields"><?= $data['information']['comment'] ?></textarea>
                                </div>
                                <div class="errorText"
                                     data-text="<?= Yii::t('main', 'fill_in_required_fields') ?>"><?= Yii::t('main', 'fill_in_required_fields') ?></div>
                                <div class="successText"></div>
                                <div class="order__tab-item botton-item">
                                    <button type="submit" class="btn-purple-lg js__submitForm"
                                            onclick="formSend.send(this, event, 'checkout')">
                                        <span><?= Yii::t('main', 'checkout') ?></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div style="display: none;" id="js__formContainer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
