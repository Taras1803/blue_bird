<?php

/* @var $this yii\web\View */

use frontend\components\HtmlHelper;
use frontend\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = Yii::t('main', 'catalog') . ' / ' . Yii::$app->params['site_name'];

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
            <div class="items-line__header">
                <div class="items-line__inner">
                    <?php if ($catalog_data['sub_categories']): ?>
                        <div class="items-line__inline">
                            <div class="dropdown-category">
                                <div class="dropdown-category__wrapper">
                                    <label for="field-category" class="dropdown-category__header">
                                        <input disabled type="text" class="field-category" id="field-category"
                                               placeholder="<?= Yii::t('main', 'categories') ?>" name="" disabled>
                                        <i></i>
                                    </label>
                                    <ul class="dropdown-category__items">
                                        <li class="dropdown-category__item">
                                            <span>Зеленый чай</span>
                                            <button>X</button>
                                        </li>
                                        <li class="dropdown-category__item">
                                            <span>Черный чай</span>
                                            <button>X</button>
                                        </li>
                                    </ul>
                                </div>
                                <form class="dropdown-category__body">
                                    <ul>
                                        <?php foreach ($catalog_data['sub_categories'] as $key => $sub_category): ?>
                                            <li>
                                                <label for="check<?= $key + 1 ?>" class="checkbox">
                                                    <input type="checkbox" id="check<?= $key + 1 ?>">
                                                    <span class="checkbox__mark"></span>
                                                    <span class="checkbox__title"> <?= $sub_category['title'] ?></span>
                                                </label>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <button class="btn-purple-sm"><span><?= Yii::t('main', 'apply') ?></span></button>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
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
                                <?php foreach ($catalog_data['filters'] as $filter): ?>
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