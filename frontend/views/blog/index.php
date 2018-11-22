<?php

use frontend\widgets\Breadcrumbs;
use frontend\components\HtmlHelper;

$this->title = Yii::t('main', 'blog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'blog'), 'url' => false];
?>

<!--blog-->
<section class="cabinet header--padding">
    <div class="container">
        <div class="cabinet__content">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <div class="cabinet__header">
                <h1 class="main-title"><?= Yii::t('main', 'news') ?></h1>
            </div>
            <div class="items-line__items items-line__items--two">
                <?php foreach ($articles as $article): ?>
                    <?php HtmlHelper::singleArticle($article) ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?= \frontend\components\ThemeLinkPager::widget([
            'pagination' => $pagination,
            'prevPageCssClass' => 'prev',
            'nextPageCssClass' => 'next',
            'prevPageLabel' => '<i class="bb-arrow-sm-left"></i>',
            'nextPageLabel' => '<i class="bb-arrow-sm-right"></i>',
            'maxButtonCount' => 8
        ]); ?>
    </div>
</section>

<!--blog-->