<?php

/* @var $this yii\web\View */

use frontend\widgets\Breadcrumbs;
use frontend\widgets\WriteToUs;

$this->title = Yii::t('main', 'payment_delivery') . ' / ' . Yii::$app->params['site_name'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'payment_delivery'), 'url' => false];
?>

<section class="work_with header--padding">
    <div class="container">
        <div class="work_with__content">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <h1 class="main-title"><?= Yii::t('main', 'payment_delivery') ?></h1>
            <div class="work_with__inners">
                <div class="work_with__inner">
                    <p class="main-text"><?= $payment_delivery_page_left_text ?></p>
                </div>
                <div class="work_with__inner">
                    <p class="main-text"><?= $payment_delivery_page_right_text ?></p>
                </div>
            </div>
            <div class="work_img">
                <div class="work_img__items">
                    <div class="img__item">
                        <a href="#">
                            <img src="<?= Yii::$app->glide->createSignedUrl([
                                'glide/index',
                                'path' => 'images/' . $payment_delivery_page_img,
                                'w' => 547
                            ], true) ?>" class="about-us__image" alt="" >
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= WriteToUs::widget() ?>
