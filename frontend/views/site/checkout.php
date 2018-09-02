<?php

/* @var $this yii\web\View */

use frontend\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = Yii::t('main', 'ordering') . ' / ' . Yii::$app->params['site_name'];
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
                    <div class="order__tab"><form action="">
                            <div class="order__tab-items">
                                <div class="order__tab-item">
                                    <h2><?= Yii::t('main', 'basic_information') ?></h2>
                                </div>
                                <div class="order__tab-item">
                                    <div class="order__tab-label"><?= Yii::t('main', 'last_name') ?></div>
                                    <div class="order__tab-field">Тарасенко</div>
                                </div>
                                <div class="order__tab-item">
                                    <div class="order__tab-label"><?= Yii::t('main', 'first_name') ?></div>
                                    <div class="order__tab-field">Марина</div>
                                </div>
                                <div class="order__tab-item">
                                    <div class="order__tab-label"><?= Yii::t('main', 'patronymic') ?></div>
                                    <div class="order__tab-field">Игоревна</div>
                                </div>
                                <div class="order__tab-item">
                                    <label for="field-phone" class="order__tab-label"><?= Yii::t('main', 'phone') ?></label>
                                    <div class="order__tab-field">
                                        <input type="text" class="field-input" name="" id="field-phone" value="+38 050 00 00 000" placeholder="">
                                    </div>
                                </div>
                                <div class="order__tab-item"><h2><?= Yii::t('main', 'your_address') ?></h2></div>
                                <div class="order__tab-item">
                                    <div class="order__tab-label"><?= Yii::t('main', 'country') ?></div>
                                    <div class="order__tab-field">
                                        <div class="country__select">
                                            <div class="dropdown-main dropdown-main--country">
                                                <label for="field-country" class="dropdown-main__header">
                                                    <input disabled="" type="text" class="field-country" id="field-country" placeholder="Украина" name="">
                                                    <i></i>
                                                </label>
                                                <ul class="dropdown-main__body dropdown-main__body--country">
                                                    <li>
                                                        <span><?= Yii::t('main', 'russia') ?></span>
                                                    </li>
                                                    <li>
                                                        <span><?= Yii::t('main', 'kazakhstan') ?></span>
                                                    </li>
                                                    <li>
                                                        <span><?= Yii::t('main', 'belarus') ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order__tab-item">
                                    <div class="order__tab-label"><?= Yii::t('main', 'city') ?></div>
                                    <div class="order__tab-field">
                                        <div class="city__select">
                                            <div class="dropdown-main dropdown-main--city">
                                                <label for="field-city" class="dropdown-main__header">
                                                    <input disabled="" type="text" class="field-city" id="field-city" placeholder="<?= Yii::t('main', 'kharkiv') ?>" name="">
                                                    <i></i>
                                                </label>
                                                <ul class="dropdown-main__body dropdown-main__body--city">
                                                    <li>
                                                        <span><?= Yii::t('main', 'kharkiv') ?></span>
                                                    </li>
                                                    <li>
                                                        <span><?= Yii::t('main', 'moscow') ?></span>
                                                    </li>
                                                    <li>
                                                        <span><?= Yii::t('main', 'kiev') ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order__tab-item">
                                    <label for="field-street" class="order__tab-label"><?= Yii::t('main', 'street_boulevard_avenue') ?></label>
                                    <div class="order__tab-field">
                                        <input type="text" class="field-input" name="" id="field-street" value="" placeholder="<?= Yii::t('main', 'street') ?>">
                                    </div>
                                </div>
                                <div class="order__tab-item">
                                    <label for="field-house--number" class="order__tab-label"><?= Yii::t('main', 'house_number') ?></label>
                                    <div class="order__tab-field">
                                        <input type="text" class="field-input" name="" id="field-house--number" value="" placeholder="45a">
                                    </div>
                                </div>
                                <div class="order__tab-item">
                                    <label for="field-apartment--number" class="order__tab-label"><?= Yii::t('main', 'apartment_number') ?></label>
                                    <div class="order__tab-field">
                                        <input type="text" class="field-input" name="" id="field-apartment--number" value="" placeholder="145">
                                    </div>
                                </div>
                                <div class="order__tab-item"><h2><?= Yii::t('main', 'payment') ?></h2></div>
                                <div class="order__tab-item"><div class="order__tab-label"><?= Yii::t('main', 'payment_method') ?></div>
                                    <div class="order__tab-field">
                                        <div class="payment__select">
                                            <div class="dropdown-main dropdown-main--payment">
                                                <label for="field-payment" class="dropdown-main__header">
                                                    <input disabled="" type="text" class="field-payment" id="field-payment" placeholder="<?= Yii::t('main', 'c_o_d') ?>" name="">
                                                    <i></i>
                                                </label>
                                                <ul class="dropdown-main__body dropdown-main__body--payment">
                                                    <li>
                                                        <span><?= Yii::t('main', 'c_o_d') ?></span>
                                                    </li>
                                                    <li>
                                                        <span><?= Yii::t('main', 'transfer_to_a_card') ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order__tab-item"><h2>Доставка</h2></div>
                                <div class="order__tab-item">
                                    <div class="order__tab-label">Служба доставки</div>
                                    <div class="order__tab-field">
                                        <div class="delivery__select">
                                            <div class="dropdown-main dropdown-main--delivery">
                                                <label for="field-delivery" class="dropdown-main__header">
                                                    <input disabled="" type="text" class="field-delivery" id="field-delivery" placeholder="Новая почта" name="">
                                                    <i></i>
                                                </label>
                                                <ul class="dropdown-main__body dropdown-main__body--delivery">
                                                    <li>
                                                        <span>Новая почта</span>
                                                    </li>
                                                    <li>
                                                        <span>Укр почта</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order__tab-item">
                                    <div class="order__tab-label">Город</div>
                                    <div class="order__tab-field">
                                        <div class="city__select">
                                            <div class="dropdown-main dropdown-main--city">
                                                <label for="field-city" class="dropdown-main__header">
                                                    <input disabled="" type="text" class="field-city" id="field-city" placeholder="Харьков" name="">
                                                    <i></i>
                                                </label>
                                                <ul class="dropdown-main__body dropdown-main__body--city">
                                                    <li>
                                                        <span>Харьков</span>
                                                    </li>
                                                    <li>
                                                        <span>Черкасы</span>
                                                    </li>
                                                    <li>
                                                        <span>Киев</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order__tab-item">
                                    <div class="order__tab-label">Отделение</div>
                                    <div class="order__tab-field">
                                        <div class="post-office__select">
                                            <div class="dropdown-main dropdown-main--post-office">
                                                <label for="field-post-office" class="dropdown-main__header">
                                                    <input disabled="" type="text" class="field-post-office" id="field-post-office" placeholder="1" name="">
                                                    <i></i>
                                                </label>
                                                <ul class="dropdown-main__body dropdown-main__body--post-office">
                                                    <li>
                                                        <span>1</span>
                                                    </li>
                                                    <li>
                                                        <span>2</span>
                                                    </li>
                                                    <li>
                                                        <span>3</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order__tab-item"><h2>Комментарий</h2></div>
                                <div class="order__tab-item"><textarea name="" id="" cols="30" rows="10" placeholder="" class="field-textarea"></textarea></div>
                                <div class="order__tab-item botton-item">
                                    <button class="btn-purple-lg"><span>Оформить заказ</span></button>
                                </div>
                            </div></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
