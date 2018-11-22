<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\widgets\Menu;
use frontend\widgets\Footer;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->params['metaData']['meta_title']) ?></title>

    <?= Html::csrfMetaTags() ?>

    <meta name="author" content="<?= Yii::$app->params['author'] ?>"/>
    <meta name="description" content="<?= Yii::$app->params['metaData']['meta_description'] ?>"/>


    <meta property="og:site_name" content="<?= Yii::$app->params['author'] ?>"/>
    <meta property="og:title" content="<?= Yii::$app->params['metaData']['meta_title'] ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:description" content="<?= Yii::$app->params['metaData']['meta_description'] ?>"/>
    <meta property="og:url" content="<?= Yii::$app->params['metaData']['url'] ?>"/>
    <meta property="og:image" content="<?= Yii::$app->params['metaData']['meta_img'] ?>"/>

    <meta name="twitter:site" content="<?= Yii::$app->params['author'] ?>"/>
    <meta name="twitter:title" content="<?= Yii::$app->params['metaData']['meta_title'] ?>">
    <meta name="twitter:description" content="<?= Yii::$app->params['metaData']['meta_description'] ?>"/>
    <meta name="twitter:image" content="<?= Yii::$app->params['metaData']['meta_img'] ?>"/>
    <meta name="twitter:creator" content="<?= Yii::$app->params['author'] ?>"/>

    <link rel="canonical" href="<?= Yii::$app->params['metaData']['url'] ?>"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    
    <?php $this->head() ?>

</head>

<body data-userTime="<?= \common\models\CurrentTime::getUserTimeSession() ?>">
<?php $this->beginBody() ?>

<?= Menu::widget() ?>

<main class="main">
<?= $content ?>
</main>

<?= Footer::widget() ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
