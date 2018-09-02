<?php

use frontend\components\HtmlHelper;
use frontend\widgets\Breadcrumbs;
use frontend\widgets\CommentWidget;
use \yii\helpers\Url;

$this->title = Yii::t('main', 'product') . ' / ' . Yii::$app->params['site_name'];

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', $product['title']), 'url' => false];

?>

    <section class="card header--padding">
        <div class="container">
            <div class="card__content">
                <div class="breadcrumbs">
                    <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
                </div>
                <div class="card__holder">
                    <div class="card__inner">
                        <img src="<?= Yii::$app->glide->createSignedUrl([
                            'glide/index',
                            'path' => 'products/' . $product['images'],
                            'w' => 241
                        ], true) ?>" alt="<?= $product['title'] ?>">
                    </div>
                    <div class="card__description">
                        <div class="card__header">
                            <h1 class="card__name"><?= $product['title'] ?></h1>
                            <div class="card__price"><?= $product['price'] ?>$/<span>50гр</span></div>
                        </div>
                        <form class="card__form">
                            <?php if ($product['weight']): ?>
                                <div class="card__string card__string--center">
                                    <strong><?= Yii::t('main', 'weight') ?></strong>
                                    <div class="card__select">
                                        <div class="dropdown-main dropdown-main--mass">
                                            <label for="field-mass1" class="dropdown-main__header">
                                                <input disabled type="text" class="field-mass1" id="field-mass1"
                                                       placeholder="200 гр" name="">
                                                <i></i>
                                            </label>
                                            <ul class="dropdown-main__body dropdown-main__body--mass1">
                                                <?php foreach ($product['weight'] as $item): ?>
                                                    <li>
                                                        <span><?= $item['value'] . " " . $item[$product['lang']] ?></span>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <button class="btn-purple-lg"><span><?= Yii::t('main', 'in_shopping_cart') ?></span>
                            </button>
                        </form>
                        <div class="card__string card__string--items card__string">
                            <ul class="card__list">
                                <li>
                                    <strong><?= Yii::t('main', 'article') ?>:</strong>
                                    <span><?= $product['article'] ?></span>
                                </li>
                                <?php if ($product['product_attributes']): ?>
                                    <?php foreach ($product['product_attributes'] as $attribute): ?>

                                        <?php if ($attribute['attribute_name']['slug'] != 'weight'): ?>
                                            <li>
                                                <strong><?= $attribute['attribute_name'][$product['lang']] ?>:</strong>
                                                <?php foreach ($attribute['values'] as $value): ?>
                                                    <span><?= $value[$product['lang']] ?></span>
                                                <?php endforeach; ?>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <?php if ($product['consist']): ?>
                                <ul class="card__composition">
                                    <li>
                                        <strong><?= Yii::t('main', 'consist') ?>:</strong>
                                    </li>
                                    <?php foreach ($product['consist'] as $item): ?>
                                        <li>
                                            <span>- <?= $item ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="card__text scrollbar">
                            <p class="main-text"><?= $product['description'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="items-line items-line--mini">
        <div class="container">
            <div class="items-line__content">
                <div class="items-line__top">
                    <div class="items-line__top-inner">
                        <h2 class="main-title"><?= Yii::t('main', 'you_will_also_like') ?></h2>
                    </div>
                    <div class="items-line__top-line"></div>
                </div>
                <div class="items-line__items items-line__items--four">
                    <?php if ($related_products): ?>
                        <?php foreach ($related_products as $product): ?>
                            <?php HtmlHelper::productInSingleProductPage($product) ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="items-line items-line--mini">
        <div class="container">
            <div class="items-line__content">
                <div class="items-line__top">
                    <div class="items-line__top-inner">
                        <h2 class="main-title"><?= Yii::t('main', 'viewed_goods') ?></h2>
                    </div>
                    <div class="items-line__top-line"></div>
                </div>
                <div class="items-line__items items-line__items--four">
                    <?php if ($last_products): ?>
                        <?php foreach ($last_products as $product): ?>
                            <?php HtmlHelper::productInSingleProductPage($product) ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?= CommentWidget::widget(['item_type' => 1, 'item_id' => $product['id']]) ?>