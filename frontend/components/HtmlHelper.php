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
                            <div class="dropdown-main dropdown-main--mass">
                                <label for="field-mass1" class="dropdown-main__header">
                                    <input disabled type="text" class="field-mass1" id="field-mass1"
                                           placeholder="200 <?= Yii::t('main', 'gr') ?>" name="">
                                    <i></i>
                                </label>
                                <ul class="dropdown-main__body dropdown-main__body--mass1">
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
                            <strong>25$</strong>
                        </div>
                    </div>
                </div>
                <button class="btn-purple-lg"><span><?= Yii::t('main', 'in_shopping_cart') ?></span>
                </button>
            </div>
        </div>
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
                <button class="btn-purple-sm"><span>В КОРЗИНУ</span></button>
            </div>
        </div>
        <?php
    }
}