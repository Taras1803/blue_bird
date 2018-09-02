<?php

/* @var $this yii\web\View */

use frontend\widgets\Breadcrumbs;
use frontend\widgets\WriteToUs;

$this->title = Yii::t('main', 'cooperation') . ' / ' . Yii::$app->params['site_name'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'cooperation'), 'url' => false];
?>

<section class="work_with header--padding">
    <div class="container">
        <div class="work_with__content">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <h1 class="main-title"><?= Yii::t('main', 'cooperation') ?></h1>
            <div class="work_with__inners">
                <div class="work_with__inner">
                    <p class="main-text"><?= $work_with_page_text_1 ?></p>
                </div>
                <div class="work_with__inner">
                    <p class="main-text"><?= $work_with_page_text_2 ?></p>
                </div>
            </div>
            <div class="work_img">
                <div class="work_img__items">
                    <div class="img__item">
                        <a href="#">
                            <img src="<?= Yii::$app->glide->createSignedUrl([
                                'glide/index',
                                'path' => 'images/' . $work_with_page_left_img,
                                'w' => 547
                            ], true) ?>" class="about-us__image" alt="" >
                        </a>
                    </div>
                    <div class="img__item">
                        <a href="#">
                            <img src="<?= Yii::$app->glide->createSignedUrl([
                                'glide/index',
                                'path' => 'images/' . $work_with_page_right_img,
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
