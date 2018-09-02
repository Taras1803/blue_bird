<?php

use \yii\helpers\Url;
use \common\models\Currency;

$this->title = Yii::t('main', 'page_not_found') . ' / ' . Yii::$app->params['site_name'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'page_not_found'), 'url' => false];
$lang = \common\models\Lang::getCurrent();
if ($lang->url == 'ru')
    $homeUrl = '/';
else
    $homeUrl = '/' . $lang->url . '/';
?>

<section class="errorPage header--padding">
    <div class="container">
        <div class="errorPage__content">
            <div class="errorPage__body">
                <h1>404</h1>
                <div><img  class="errorPage__body--img" src="/images/error404.png" alt=""></div>
                <p class="errorPage__body--text"><?= Yii::t('main', 'oops') ?></p>
                <div class="errorPage__body--button"><button class="btn-purple-lg"><a href="<?= $homeUrl ?>"><span><?= Yii::t('main', 'to_main') ?></span></a></button></div>
            </div>
        </div>
    </div>
</section>