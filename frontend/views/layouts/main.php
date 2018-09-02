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
    <title><?= Html::encode($this->title) ?></title>

    <meta name="author" content=""/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>

    <meta name="format-detection" content="telephone=no">

    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <?php $this->head() ?>

</head>

<body data-userTime="<?= \common\models\CurrentTime::getUserTimeSession() ?>">
<?php $this->beginBody() ?>
<main class="main">

<?= Menu::widget() ?>

<?= $content ?>

<?= Footer::widget() ?>

</main>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
