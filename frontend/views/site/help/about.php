<?php

use \yii\helpers\Url;

$this->title = Yii::t('main', 'about') . ': ' . $titles[$currentPage] . ' | ' . Yii::$app->params['site_name'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'about') . ': ' . $titles[$currentPage], 'url' => false];
?>

<?= \frontend\widgets\Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>

<!--blog-->
<div class="container">
    <h1 class="mainTitle mainTitle--center"><?= Yii::t('main', 'about') ?></h1>

    <div class="help">

        <div class="help--sidebar">
            <div class="help__menu">
                <ul class="help__nav">
                    <?php foreach ($titles as $slug => $title): ?>
                        <li>
                            <a href="<?= Url::to(['/about/', 'page' => $slug]) ?>"<?= ($currentPage == $slug) ? ' class="active"' : '' ?>><?= $title ?>
                                <span><?= ($currentPage == $slug) ? '-' : '+' ?></span></a>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>

        <div class="help--main">
            <h2 class="help--title"><?= $helpSubtitle ?></h2>

            <div class="help__details">
                <div class="help__details--row">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--blog-->

