<?php

/* @var $this yii\web\View */

use \frontend\components\HtmlHelper;
use frontend\widgets\BannerWidget;
use yii\helpers\Url;

$this->title = Yii::$app->params['site_name'];
?>

<?= BannerWidget::widget() ?>

<section class="our-history">
    <div class="container">
        <div class="our-history__content">
            <div class="our-history__holder">
                <div class="our-history__photo" style="background-image: url(<?= Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => 'images/' . $about_image,
                    'w' => 627
                ], true) ?>);"></div>
                <div class="our-history__description">
                    <span class="main-text main-text--sm"><?= Yii::t('main', 'about_us') ?></span>
                    <h2 class="main-title"><?= Yii::t('main', 'our_history') ?></h2>
                    <p class="main-text"><?= $about_text ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="items-line items-line--novelties">
    <div class="container">
        <div class="items-line__content">
            <div class="items-line__top">
                <div class="items-line__top-inner">
                    <span class="main-text main-text--sm">Категории</span>
                    <h2 class="main-title">Новинки</h2>
                </div>
                <div class="items-line__top-line"></div>
                <div class="items-line__top-inner">
                    <a href="#" class="main-link"><span><?= Yii::t('main', 'see_more') ?></span> все</a>
                </div>
            </div>
            <div class="items-line__items items-line__items--three">
                <?php if ($new_products): ?>
                    <?php foreach ($new_products as $product): ?>
                        <?php HtmlHelper::product($product) ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="items-line items-line--shares">
    <div class="container">
        <div class="items-line__content">
            <div class="items-line__top">
                <div class="items-line__top-inner">
                    <span class="main-text main-text--sm">Категории</span>
                    <h2 class="main-title">акции</h2>
                </div>
                <div class="items-line__top-line"></div>
                <div class="items-line__top-inner">
                    <a href="#" class="main-link"><?= Yii::t('main', 'see_more') ?></a>
                </div>
            </div>
            <div class="items-line__items items-line__items--four">
                <?php if ($action_products): ?>
                    <?php foreach ($action_products as $product): ?>
                        <?php HtmlHelper::product($product) ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php if ($news): ?>
    <section class="items-line items-line--news">
        <div class="container">
            <div class="items-line__content">
                <div class="items-line__top">
                    <div class="items-line__top-inner">
                        <span class="main-text main-text--sm">Категории</span>
                        <h2 class="main-title"><?= Yii::t('main', 'news') ?></h2>
                    </div>
                    <div class="items-line__top-line"></div>
                    <div class="items-line__top-inner">
                        <a href="<?= Url::to(['/blog']) ?>/" class="main-link"><?= Yii::t('main', 'see_more') ?></a>
                    </div>
                </div>
                <div class="items-line__items items-line__items--two">
                    <?php foreach ($news as $item): ?>
                        <?php HtmlHelper::singleArticle($item) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

