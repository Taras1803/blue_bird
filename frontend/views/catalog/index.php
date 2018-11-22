<?php

/* @var $this yii\web\View */

use frontend\components\HtmlHelper;
use frontend\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = $catalog_data['category']['title'];

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', $catalog_data['category']['title']), 'url' => false];
?>
<input type="hidden"
       value="<?= Url::to(['/catalog']) ?>/<?= $catalog_data['category']['slug'] ?>"
       id="js__location">
<input type="hidden" value="<?= $catalog_data['max_product_price'] ?>" id="js__max_price">
<section class="catalog header--padding">
    <div class="container">
        <div class="catalog__content">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <div class="catalog__description">
                <h1 class="main-title"><?= $catalog_data['category']['title'] ?></h1>
                <div class="main-text">
                    <p>
                        <?php if ($catalog_data['category']['description']): ?>
                            <?= $catalog_data['category']['description'] ?>
                        <?php endif ?>
                    </p>
                    <ul>
                        <?php if ($catalog_data['sub_categories']): ?>
                            <?php foreach ($catalog_data['sub_categories'] as $sub_category): ?>
                                <li>
                                    <a href="<?= Url::to(['/catalog']) ?>/<?= $catalog_data['category']['slug'] ?>/<?= $sub_category['slug'] ?>"
                                       class="main-text">
                                        <?= $sub_category['title'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="items-line items-line--catalog">
    <div class="container">
        <div class="items-line__content">
            <?php if ($catalog_data['products']): ?>
                <div class="items-line__header">
                    <div class="items-line__inner">
                        <?php if ($catalog_data['sub_categories']): ?>
                            <div class="items-line__inline">
                                <div class="dropdown-category">
                                    <?php if($catalog_data['filters_cats']): ?>
                                        <div class="count_category">
                                            <span> <?= (count($catalog_data['filters_cats']) > 1)? vsprintf(Yii::t('main', 'selected_categories'), count($catalog_data['filters_cats'])) : $catalog_data['sub_categories'][$catalog_data['filters_cats'][0]]['title'] ?>
                                                <i class="bb-close js__tagClose"></i></span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="dropdown-category__body">
                                        <ul>
                                            <?php foreach ($catalog_data['sub_categories'] as $key => $sub_category): ?>
                                                <li>
                                                    <label for="check_cats_<?= $key + 1 ?>" class="checkbox">
                                                        <input type="checkbox"
                                                               id="check_cats_<?= $key + 1 ?>"
                                                               value="<?= $sub_category['id'] ?>"
                                                               class="js__filtersCats"
                                                            <?= ($catalog_data['filters_cats'] && in_array($sub_category['id'], $catalog_data['filters_cats'])) ? 'checked' : '' ?>>
                                                        <span class="checkbox__mark"></span>
                                                        <span class="checkbox__title"> <?= $sub_category['title'] ?></span>
                                                    </label>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <button class="btn-purple-sm js__applyFilterCats">
                                            <span><?= Yii::t('main', 'apply') ?></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
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
                                            <input type="number" name="min_price" id="from-input"
                                                   placeholder="0<?= $catalog_data['currency'] ?>" class="field-input t"
                                                   value="<?= $catalog_data['min_price'] ?>">
                                        </label>
                                        <label for="before-input">
                                            <span><?= Yii::t('main', 'to') ?></span>
                                            <input type="number" name="max_price" id="before-input"
                                                   placeholder="999<?= $catalog_data['currency'] ?>"
                                                   class="field-input t"
                                                   value="<?= $catalog_data['max_price'] ?>">
                                        </label>
                                    </div>
                                    <button class="btn-purple-sm js__applyPriceFilter">
                                        <span>
                                            <?= Yii::t('main', 'apply') ?>
                                        </span>
                                    </button>
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
            <?php else: ?>
                <p class="js__notFound"><?= Yii::t('main', 'products_not_found') ?></p>
            <?php endif; ?>
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
</section>
