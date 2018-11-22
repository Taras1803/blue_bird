<?php

/* @var $this yii\web\View */

use frontend\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = Yii::t('main', 'cart');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'cart'), 'url' => false];
?>

<section class="basket header--padding">
    <div class="container">
        <div class="basket__content">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <?php if (!$data): ?>
                <div class="basket__header">
                    <h1 class="main-title"><?= Yii::t('main', 'cart') ?></h1>
                </div>
                <div class="basket__items">
                    <p><?= Yii::t('main', 'cart_empty') ?></p>
                </div>
            <?php else: ?>
                <div class="basket__header">
                    <h1 class="main-title"><?= Yii::t('main', 'cart') ?></h1>
                    <div class="basket__sum"><?= $data['totals'] ?><?= $data['currency'] ?></div>
                </div>
                <div class="basket__items">
                    <?php foreach ($data['products'] as $product_key => $product): ?>
                        <div class="basket__item">
                            <div class="basket__inner basket__inner--photo">
                                <a href="<?= Url::to(['/product']) ?>/<?= $product['slug'] ?>" class="basket__photo">
                                    <img src="<?= Yii::$app->glide->createSignedUrl([
                                        'glide/index',
                                        'path' => 'products/' . $product['image'],
                                        'w' => 225
                                    ], true) ?>" alt="<?= $product['title'] ?>">
                                </a>
                            </div>
                            <div class="basket__inner basket__inner--description">
                                <div class="basket__description">
                                    <a href="<?= Url::to(['/product']) ?>/<?= $product['slug'] ?>"
                                       class="basket__name"><?= $product['title'] ?></a>
                                    <ul class="basket__list">
                                        <?php if ($product['attributes']): ?>
                                            <?php foreach ($product['attributes'] as $attribute): ?>
                                                <li>
                                                    <strong><?= Yii::t('main', $attribute['attribute_name']) ?>
                                                        :</strong>
                                                    <span><?= $attribute['value'] ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <li class="empy_product_attributes"></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="basket__inner basket__inner--mass">
                                <div class="basket__title"><?= Yii::t('main', 'quantity') ?></div>
                                <div class="basket__mass">
                                    <div class="dropdown-main dropdown-main--mass">
                                        <label for="field-mass" class="dropdown-main__header">
                                            <input disabled type="text" class="field-mass1"
                                                   placeholder="<?= $product['counts'][$product['count']] ?>"
                                                   data-value="<?= $product['count'] ?>">
                                            <i></i>
                                        </label>
                                        <ul class="dropdown-main__body">
                                            <?php foreach ($product['counts'] as $key => $value): ?>
                                                <li>
                                                    <span onclick="basket.change_count(<?= $product_key ?>, <?= $key ?>)"
                                                          data-value="<?= $key ?>"
                                                          class="js__changeProductCount"><?= $value ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="basket__inner basket__inner--actions">
                                <button class="basket__delete"
                                        onclick="basket.remove(<?= $product_key ?>)"><?= Yii::t('main', 'remove_from_cart') ?></button>
                                <div class="basket__price"><?= $product['price'] ?><?= $data['currency'] ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="basket__total">
                    <strong><?= Yii::t('main', 'quantity') ?>
                        : <?= $data['products_count'] ?> <?= Yii::t('main', 'pc') ?></strong>
                    <strong><?= Yii::t('main', 'total_amount') ?>
                        : <?= $data['totals'] ?><?= $data['currency'] ?></strong>
                </div>
                <div class="basket__action">
                    <a href="<?= Url::to(['/checkout']) ?>">
                        <button class="btn-purple-lg"><span><?= Yii::t('main', 'checkout') ?></span></button>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

