<?php

use frontend\widgets\Breadcrumbs;
use frontend\widgets\CommentWidget;
use \yii\helpers\Url;

$this->title = Yii::t('main', 'single') . ' / ' .Yii::$app->params['site_name'];

$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'blog'), 'url' => Url::to(['/blog/']) . '/'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', $description->title), 'url' => false];

?>

    <!--blog-->
<section class="cabinet header--padding">
    <div class="container">
        <div class="cabinet__content">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <div class="news-item">
                <div class="news-item__img">
                    <p>
                        <img src="<?= Yii::$app->glide->createSignedUrl([
                            'glide/index',
                            'path' => 'blog/' . $article->images,
                            'w' => 1140
                        ], true) ?>" alt="<?= $description->title ?>" >
                    </p>
                </div>
                <div class="news-item__content news__description">
                    <div class="w25">
                        <a href="#"><?= $description->title ?></a>
                        <span><?= date("d/m/Y", $article->created_at) ?></span>
                    </div>
                    <div class="w35"><p class="main-text"><?= $description->description ?></p></div>
                    <div class="w35"><p class="main-text"><?= $description->description_2 ?></p></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= CommentWidget::widget(['item_type' => 2, 'item_id' => $article->id]) ?>