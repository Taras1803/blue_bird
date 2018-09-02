<?php

/* @var $this yii\web\View */

use frontend\widgets\Breadcrumbs;
use frontend\widgets\WriteToUs;

$this->title = Yii::t('main', 'contacts') . ' / ' . Yii::$app->params['site_name'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'contacts'), 'url' => false];
?>

<section class="contacts header--padding">
    <div class="container">
        <div class="contacts__content">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <div class="contacts__telephones">
                <div class="contacts__telephones-item"><h1 class="main-title"><?= Yii::t('main', 'contacts') ?></h1></div>
                <div class="contacts__telephones-item">
                    <ul>
                        <li><span><?= Yii::t('main', 'phone') ?>:</span><a href="tel:+38 050 555 55 55" class="withLine withLine--blue"><?= $teme_variables['phone_1'] ?></a>
                            <br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="tel:+38 050 555 55 55" class=" withLine withLine--blue"><?= $teme_variables['phone_2'] ?></a></li>
                        <li><span>E-mail:</span><a href="mailto:info@bluebird.com" class="withLine withLine--blue"><?= $teme_variables['company_email'] ?></a></li>
                    </ul>
                </div>
                <div class="contacts__telephones-item">
                    <ul>
                        <li><span>Viber:</span><a class="withLine withLine--blue" href="viber://chat?number=+380505555555"><?= $teme_variables['viber'] ?></a></li>
                        <li><span>What’sApp:</span> <a class="withLine withLine--blue" href="whatsapp://send?phone=+380505555555" ><?= $teme_variables['what’s_app'] ?></a></li>
                        <li><span>Telegram:</span> <a class="withLine withLine--blue" href="tg://resolve?domain=+380505555555"><?= $teme_variables['telegram'] ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="contacts__inners">
                <div class="contacts__inner contacts__inner--title">
                    <div class="contacts__title"><?= Yii::t('main', 'store_address') ?></div>
                </div>
                <div class="contacts__maps">
                    <div class="contacts__maps--item">
                        <div class="contacts__maps--map" id="map"></div>
                        <div>
                            <ul>
                                <li>Украина,Харьков</li>
                                <li>Проспект Науки 45</li>
                                <li><a href="tel:+38 050 555 55 55" class=" withLine withLine--blue">+38 050 555 55 55</a></li>
                                <li>09:00-20:00</li>
                            </ul>
                        </div>
                    </div>
                    <div class="contacts__maps--item">
                        <div class="contacts__maps--map" id="map2"></div>
                        <div>
                            <ul>
                                <li>Украина,Харьков</li>
                                <li>Проспект Науки 45</li>
                                <li><a href="tel:+38 050 555 55 55" class=" withLine withLine--blue">+38 050 555 55 55</a></li>
                                <li>09:00-20:00</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>
<?= WriteToUs::widget() ?>
