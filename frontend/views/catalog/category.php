<?php

/* @var $this yii\web\View */

use frontend\components\HtmlHelper;
use frontend\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = Yii::t('main', 'catalog') . ' / ' . Yii::$app->params['site_name'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main',  $catalog_data['category']['parent']), 'url' => Url::to(['/catalog']) . '/' . $catalog_data['category']['parent']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', $catalog_data['category']['title']), 'url' => false];
?>

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
                                <input disabled type="text" class="field-price" id="field-price" placeholder="Цена"
                                       name="">
                                <i></i>
                            </label>
                            <form class="dropdown-price__body">
                                <div class="dropdown-price__string">
                                    <label for="from-input">
                                        <span><?= Yii::t('main', 'from') ?></span>
                                        <input type="text" name="" id="from-input" placeholder="20$"
                                               class="field-input">
                                    </label>
                                    <label for="before-input">
                                        <span><?= Yii::t('main', 'to') ?></span>
                                        <input type="text" name="" id="before-input" placeholder="80$"
                                               class="field-input">
                                    </label>
                                </div>
                                <button class="btn-purple-sm"><span><span><?= Yii::t('main', 'apply') ?></span></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="items-line__inner">
                    <div class="items-line__inline">
                        <div class="dropdown-main">
                            <label for="field-sorting" class="dropdown-main__header">
                                <input disabled type="text" class="field-sorting" id="field-sorting"
                                       placeholder="Сортировка" name="">
                                <i></i>
                            </label>
                            <ul class="dropdown-main__body dropdown-main__body--sorting">
                                <?php foreach ($catalog_data['category']['filters'] as $filter): ?>
                                    <li>
                                        <span data-val="По цене(от меньшей к большей)"><?= $filter ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="items-line__items items-line__items--lg items-line__items--three">
                <?php if ($catalog_data['category']['products']): ?>
                    <?php foreach ($catalog_data['category']['products'] as $product): ?>
                        <?php HtmlHelper::product($product) ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>