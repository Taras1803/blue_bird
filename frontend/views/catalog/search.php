<?php

/* @var $this yii\web\View */

use frontend\components\HtmlHelper;
use frontend\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = Yii::t('main', 'search') . ': ' . $q;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'search'), 'url' => false];
?>
<input type="hidden"
       value="<?= Url::to(['/search?q=' . $q]) ?>"
       id="js__location">
<input type="hidden" value="<?= $catalog_data['max_product_price'] ?>" id="js__max_price">
<input type="hidden" value="search" id="js__search_identy">
<section class="catalog header--padding">
    <div class="container">
        <div class="catalog__content">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <?php if ($catalog_data['products']): ?>
            <div class="catalog__description catalog__description--search">
                <h1 class="main-title"><?= Yii::t('main', 'search_result') ?>: <span><?= $q ?></span></h1>
            </div>
            <div class="search__control--wrapper">
                <div class="search__control">
                    <label>
                        <input type="text" class="field-input form-fields js__searchInput" placeholder="<?= Yii::t('main', 'search_on') ?>" value="<?= $q ?>">
                    </label>
                    <button class="btn-purple-def js__searchButton">
                        <span><?= Yii::t('main', 'search') ?></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="items-line items-line--catalog">
    <div class="container">
        <div class="items-line__content">
            <div class="items-line__header">
                <div class="items-line__inner">
                    <div class="items-line__inline">
                        <div class="dropdown-price">
                            <label for="field-price" class="dropdown-price__header">
                                <input disabled type="text" class="field-price" id="field-price" placeholder="<?= Yii::t('main', 'price') ?>">
                                <i></i>
                            </label>
                            <div class="dropdown-price__body js__priceContainer">
                                <div class="dropdown-price__string">
                                    <label for="from-input">
                                        <span><?= Yii::t('main', 'from') ?></span>
                                        <style>
                                            .t::-webkit-outer-spin-button,
                                            .t::-webkit-inner-spin-button {
                                                -webkit-appearance: none;
                                                margin: 0;
                                            }
                                        </style>
                                        <input type="number" name="min_price" id="from-input"
                                               placeholder="0<?= $catalog_data['currency'] ?>" class="field-input t"
                                               value="<?= $catalog_data['min_price'] ?>">
                                    </label>
                                    <label for="before-input">
                                        <span><?= Yii::t('main', 'to') ?></span>
                                        <input type="number" name="max_price" id="before-input"
                                               placeholder="999<?= $catalog_data['currency'] ?>" class="field-input t"
                                               value="<?= $catalog_data['max_price'] ?>">
                                    </label>
                                </div>
                                <button class="btn-purple-sm js__applyPriceFilter">
                                    <span><span><?= Yii::t('main', 'apply') ?></span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="items-line__inner">
                    <div class="items-line__inline">
                        <div class="dropdown-main">
                            <label for="js__getFilter" class="dropdown-main__header">
                                <input disabled type="text" class="field-sorting" id="js__getFilter"
                                       placeholder="<?= $catalog_data['filters'][$catalog_data['order_by']] ?>"
                                       data-key="<?= $catalog_data['order_by'] ?>">
                                <i></i>
                            </label>
                            <ul class="dropdown-main__body dropdown-main__body--sorting">
                                <?php foreach ($catalog_data['filters'] as $key => $filter): ?>
                                    <li>
                                            <span class="js__changeOrderBy" data-val="<?= $filter ?>"
                                                  data-key="<?= $key ?>"><?= $filter ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="items-line__items items-line__items--lg items-line__items--three">
                <?php foreach ($catalog_data['products'] as $product): ?>
                    <?php HtmlHelper::product($product) ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?= \frontend\components\ThemeLinkPager::widget([
            'pagination' => $catalog_data['pagination'],
            'prevPageCssClass' => 'prev',
            'nextPageCssClass' => 'next',
            'prevPageLabel' => '<i class="bb-arrow-sm-left"></i>',
            'nextPageLabel' => '<i class="bb-arrow-sm-right"></i>',
            'maxButtonCount' => 8
        ]); ?>
    </div>
    <?php else: ?>
        <div class="catalog__description catalog__description--search">
            <h1 class="main-title"><?= Yii::t('main', 'search_result')?>: <span><?= $q ?></span></h1>
        </div>
        <div class="search__control--wrapper">
            <div class="search__control">
                <label>
                    <input type="text" class="field-input form-fields js__searchInput" placeholder="<?= Yii::t('main', 'search_on') ?>" value="<?= $q ?>">
                </label>
                <button class="btn-purple-def js__searchButton">
                    <span><?= Yii::t('main', 'search') ?></span>
                </button>
            </div>
        </div>
        <p class="js__notFound"><?= Yii::t('main', 'products_not_found') ?></p>
    <?php endif; ?>
</section>