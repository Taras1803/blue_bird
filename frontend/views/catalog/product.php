<?php

use frontend\components\HtmlHelper;
use frontend\widgets\Breadcrumbs;
use frontend\widgets\CommentWidget;
use \yii\helpers\Url;

$this->title = Yii::t('main', 'product');

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'catalog'), 'url' => Url::to(['/catalog/' . $product['category_slug']])];
$this->params['breadcrumbs'][] = ['label' => $product['title'], 'url' => false];

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
                            'w' => 570
                        ], true) ?>" alt="<?= $product['title'] ?>">
                    </div>
                    <div class="card__description">
                        <div class="card__header">
                            <h1 class="card__name"><?= $product['title'] ?></h1>
                            <?php if($product['action']): ?>
                                <div class="card__price"><?= $product['price'] ?><?= $product['currency'] ?> <s><?= $product['price'] ?><?= $product['currency'] ?></s>/<span><?= $product['per_count'] ?></span></div>
                            <?php else: ?>
                                <div class="card__price"><?= $product['price'] ?><?= $product['currency'] ?>/<span>50гр</span></div>
                            <?php endif; ?>
                        </div>
                        <div class="card__form">
                            <div class="card__string card__string--center">
                                <strong><?= Yii::t('main', 'weight') ?></strong>
                                <div class="card__select">
                                    <div class="dropdown-main dropdown-main--mass js__dropdownContainer">
                                        <label for="field-mass1" class="dropdown-main__header">
                                            <input disabled type="text" class="field-mass1 js__productCount" id="field-mass1"
                                                   placeholder="<?= $product['product_count'][1] ?>" data-value="1">
                                            <i></i>
                                        </label>
                                        <ul class="dropdown-main__body dropdown-main__body--mass1">
                                            <?php foreach($product['product_count'] as $key => $value): ?>
                                                <li>
                                                    <span data-value="<?= $key ?>" class="js__changeProductCount"><?= $value ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <button class="btn-purple-lg" onclick="basket.addSingle(event, this, <?= $product['id'] ?>)"><span><?= Yii::t('main', 'in_shopping_cart') ?></span>
                            </button>
                        </div>
                        <div class="card__string card__string--items card__string">
                            <ul class="card__list">
                                <li>
                                    <strong><?= Yii::t('main', 'article') ?>:</strong>
                                    <span><?= $product['article'] ?></span>
                                </li>
                                <?php if ($product['product_attributes']): ?>
                                    <?php foreach ($product['product_attributes'] as $attribute): ?>
                                        <li>
                                            <strong><?= $attribute['attribute_name'] ?>:</strong>
                                            <span><?= $attribute['value'] ?></span>
                                        </li>
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
<?php if ($related_products): ?>
    <section class="items-line items-line--mini">
        <div class="container">
            <div class="items-line__content">
                <div class="items-line__top">
                    <div class="items-line__top-inner">
                        <h2 class="main-title"><?= Yii::t('main', 'you_will_also_like') ?></h2>
                    </div>
                    <div class="items-line__top-line"></div>
                </div>
                <div class="items-line__items items-line__items--four items-line__items--lg">
                    <?php foreach ($related_products as $product): ?>
                        <?php HtmlHelper::product($product) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($last_products): ?>
    <section class="items-line items-line--mini">
        <div class="container">
            <div class="items-line__content">
                <div class="items-line__top">
                    <div class="items-line__top-inner">
                        <h2 class="main-title"><?= Yii::t('main', 'viewed_goods') ?></h2>
                    </div>
                    <div class="items-line__top-line"></div>
                </div>
                <div class="items-line__items items-line__items--four items-line__items--lg">
                    <?php foreach ($last_products as $product): ?>
                        <?php HtmlHelper::product($product) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?= CommentWidget::widget(['item_type' => 1, 'item_id' => $product['id']]) ?>