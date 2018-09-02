<?php

/* @var $this yii\web\View */

use frontend\widgets\Breadcrumbs;
use frontend\widgets\WriteToUs;

$this->title = Yii::t('main', 'about_us') . ' / ' . Yii::$app->params['site_name'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'about_us'), 'url' => false];
?>

<section class="about-us header--padding">
    <div class="container">
        <div class="about-us__content">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <h1 class="main-title"><?= Yii::t('main', 'about_us') ?></h1>
            <img src="<?= Yii::$app->glide->createSignedUrl([
                'glide/index',
                'path' => 'images/' . $about_page_main_img,
                'w' => 950
            ], true) ?>" class="about-us__image" alt="<?= $description->title ?>" >
            <div class="about-us__inners">
                <div class="about-us__inner about-us__inner--title">
                    <div class="about-us__title"><?= Yii::t('main', 'our_history') ?></div>
                </div>
                <div class="about-us__inner">
                    <p class="main-text"><?= $about_page_our_history_text_1 ?></p>
                </div>
            </div>
            <div class="about-us__inners">
                <div class="about-us__inner about-us__inner--title">
                    <div class="about-us__title"><?= Yii::t('main', 'our_history') ?></div>
                </div>
                <div class="about-us__inner">
                    <p class="main-text"><?= $about_page_our_history_text_2 ?></p>
                </div>
            </div>
            <div class="about-us__action">
                <a href="catalog.html" class="main-link main-link--with-arrow bb-arrow-lg-right">ПЕРЕЙТИ В КАТАЛОГ</a>
            </div>
            <div class="about-us__images">
                <div class="about-us__img">
                    <a href="">
                        <img src="/images/img-1.jpg" alt="">
                    </a>
                </div>
                <div class="about-us__img">
                    <a href="">
                        <img src="/images/img-2.jpg" alt="">
                    </a>
                </div>
                <div class="about-us__img">
                    <a href="">
                        <img src="/images/img-3.jpg" alt="">
                    </a>
                </div>
                <div class="about-us__img">
                    <a href="">
                        <img src="/images/img-4.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?= WriteToUs::widget() ?>
