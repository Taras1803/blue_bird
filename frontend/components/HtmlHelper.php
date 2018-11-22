<?php

namespace frontend\components;

use Yii;
use yii\helpers\Url;

class HtmlHelper
{

    static function singleArticle($item, $params = [])
    {
        $description = $item->getNewsDescriptions()->one();
        ?>
        <div class="items-line__item">
            <div class="news">
                <a href="<?= Url::to(['/blog']) ?>/<?= $item->slug ?>">
                    <img src="<?= Yii::$app->glide->createSignedUrl([
                        'glide/index',
                        'path' => 'blog/' . $item->images,
                        'w' => 556
                    ], true) ?>" alt="<?= $description->title ?>">
                </a>
                <div class="news__description">
                    <a href="<?= Url::to(['/blog']) ?>/<?= $item->slug ?>"> <?= $description->title ?> </a>
                    <span> <?= date("d/m/Y", $item->created_at) ?> </span>
                    <p class="main-text"> <?= $description->short_description ?></p>
                </div>
            </div>
        </div>
        <?php
    }

    static function product($product, $params = [])
    {
        $description = $product->getProductsDescriptions()->one();
        ?>
        <?php if($product && $description): ?>
            <?php $product_count = CatalogHelper::getProductCount($product->id, $product->type) ?>
            <div class="items-line__item">
            <div class="product">
                <div class="product__block">
                    <?php if ($product->images): ?>
                        <a href="<?= Url::to(['/product']) ?>/<?= $product->slug ?>" class="product__inner">
                            <img src="<?= Yii::$app->glide->createSignedUrl([
                                'glide/index',
                                'path' => 'products/' . $product->images,
                                'w' => 225
                            ], true) ?>" alt="<?= $description->title ?>">
                        </a>
                    <?php endif; ?>
                    <div class="product__description">
                        <a href="<?= Url::to(['/product']) ?>/<?= $product->slug ?>"
                           class="product__link"><?= $description->title ?></a>
                        <div class="product__bottom">
                            <div class="dropdown-main dropdown-main--mass js__dropdownContainer">
                                <label for="field-mass1" class="dropdown-main__header">
                                    <input disabled type="text" class="field-mass1 js__productCount"
                                           placeholder="<?= $product_count[1] ?>" data-value="1">
                                    <i></i>
                                </label>
                                <ul class="dropdown-main__body dropdown-main__body--mass1">
                                    <?php foreach($product_count as $key => $value): ?>
                                        <li>
                                            <span data-value="<?= $key ?>" class="js__changeProductCount"><?= $value ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php if($product->action): ?>
                                <strong class="withSale"><?= ThemeHelper::priceCalculation($product->price, $product->action) ?><?= ThemeHelper::getCurrency() ?><s><?= ThemeHelper::priceCalculation($product->price, 0) ?><?= ThemeHelper::getCurrency() ?></s></strong>
                            <?php else: ?>
                                <strong><?= ThemeHelper::priceCalculation($product->price, 0) ?><?= ThemeHelper::getCurrency() ?></strong>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <button class="btn-purple-lg"  onclick="basket.add(event, this, <?= $product->id ?>)"><span><?= Yii::t('main', 'in_shopping_cart') ?></span>
                </button>
            </div>
        </div>
        <?php endif; ?>
        <?php
    }

    static function productInSingleProductPage($product, $params = [])
    {
        $description = $product->getProductsDescriptions()->one();
        ?>
        <div class="items-line__item">
            <div class="product">
                <a href="<?= Url::to(['/product']) ?>/<?= $product->slug ?>" class="product__block">
                    <div class="product__inner">
                        <img src="<?= Yii::$app->glide->createSignedUrl([
                            'glide/index',
                            'path' => 'products/' . $product->images,
                            'w' => 225
                        ], true) ?>" alt="<?= $description->title ?>">
                    </div>
                    <div class="product__description">
                        <span class="product__link"><?= $description->title ?></span>
                        <div class="product__bottom">
                            <strong>25$</strong>
                        </div>
                    </div>
                </a>
                <button class="btn-purple-sm"><span><?= Yii::t('main', 'in_shopping_cart') ?></span></button>
            </div>
        </div>
        <?php
    }
}