<?php

use \yii\helpers\Url;
use common\models\Lang;

use \common\models\Currency;

$lang = Lang::getCurrent();

if ($lang->url == 'ru')
    $homeUrl = '/';
else
    $homeUrl = '/' . $lang->url . '/';

$this->title = Yii::t('main', 'successful');

?>

<section class="thanks header--padding">
    <div class="container">
        <div class="thanks__content">
            <div class="thanks__body">
                <p><img src="/images/log-big.png" alt=""></p>
                <h1><?= $successful_text ?></h1>
                <p class="thanks--text"><?= Yii::t('main', 'our_manager_call_you') ?></p>
                <div class="thanks__botton">
                    <a href="<?= $homeUrl ?>"><button class="btn-purple-lg"><span><?= Yii::t('main', 'to_main') ?></span></button></a>
                </div>
            </div>
        </div>
    </div>
</section>
