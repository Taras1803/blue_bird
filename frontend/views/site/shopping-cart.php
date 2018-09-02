<?php

/* @var $this yii\web\View */

use frontend\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = Yii::t('main', 'ordering') . ' / ' . Yii::$app->params['site_name'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'cart'), 'url' => false];
?>

<section class="basket header--padding">
    <div class="container">
        <div class="basket__content">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <div class="basket__header">
                <h1 class="main-title"><?= Yii::t('main', 'cart') ?></h1>
                <div class="basket__sum">857$</div>
            </div>
            <div class="basket__items">
                <div class="basket__item">
                    <div class="basket__inner basket__inner--photo">
                        <a href="#" class="basket__photo">
                            <img src="/images/prd1.jpg" alt="">
                        </a>
                    </div>
                    <div class="basket__inner basket__inner--description">
                        <div class="basket__description">
                            <a href="#" class="basket__name">English Tea Shop Super Fruit Gift Tin</a>
                            <ul class="basket__list">
                                <li>
                                    <strong><?= Yii::t('main', 'country_of_growth') ?>:</strong> <span><?= Yii::t('main', 'thailand') ?></span>
                                </li>
                                <li>
                                    <strong><?= Yii::t('main', 'variety') ?>:</strong> <span>lorem ipsu</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="basket__inner basket__inner--mass">
                        <div class="basket__title"><?= Yii::t('main', 'weight') ?></div>
                        <div class="basket__mass">
                            <div class="dropdown-main dropdown-main--mass">
                                <label for="field-mass" class="dropdown-main__header">
                                    <input disabled type="text" class="field-mass1" id="field-mass" placeholder="200 гр" name="">
                                    <i></i>
                                </label>
                                <ul class="dropdown-main__body">
                                    <li>
                                        <span>200 <?= Yii::t('main', 'gr') ?></span>
                                    </li>
                                    <li>
                                        <span>300 <?= Yii::t('main', 'gr') ?></span>
                                    </li>
                                    <li>
                                        <span>400 <?= Yii::t('main', 'gr') ?></span>
                                    </li>
                                    <li>
                                        <span>500 <?= Yii::t('main', 'gr') ?></span>
                                    </li>
                                    <li>
                                        <span>1 <?= Yii::t('main', 'kg') ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="basket__inner basket__inner--actions">
                        <button class="basket__delete"><?= Yii::t('main', 'remove_from_cart') ?></button>
                        <div class="basket__price">25$</div>
                    </div>
                </div>
            </div>
            <div class="basket__total">
                <strong><?= Yii::t('main', 'quantity') ?>: 2 <?= Yii::t('main', 'pc') ?></strong>
                <strong><?= Yii::t('main', 'total_amount') ?>: 857$</strong>
            </div>
            <div class="basket__action">
                <a href="<?= Url::to(['/checkout']) ?>"><button class="btn-purple-lg"><span><?= Yii::t('main', 'checkout') ?></span></button></a>
            </div>
        </div>
    </div>
</section>

