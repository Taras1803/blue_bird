<?php

use frontend\widgets\Breadcrumbs;
use frontend\components\HtmlHelper;

$this->title = Yii::t('main', 'blog') . ' / ' .Yii::$app->params['site_name'];
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
        <?= \yii\widgets\LinkPager::widget([
            'pagination' => $pagination,
            'prevPageCssClass' => 'prev',
            'nextPageCssClass' => 'next',
            'prevPageLabel' => '<i class="icon-arrow1"></i>',
            'nextPageLabel' => '<i class="icon-arrow1"></i>',
            'maxButtonCount' => 8
        ]); ?>
    </div>
</section>

<!--blog-->