<?php

/* @var $this yii\web\View */

use frontend\widgets\Breadcrumbs;
use frontend\widgets\WriteToUs;

$this->title = Yii::t('main', 'contacts');
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
                        <li><span><?= Yii::t('main', 'phone') ?>:</span><a class="withLine withLine--blue" href="tel:<?= str_replace(["(", ")", " ", "-"], "", $theme_variables['phone_1']) ?>" ><?= $theme_variables['phone_1'] ?></a>
                            <br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><a class=" withLine withLine--blue" href="tel:<?= str_replace(["(", ")", " ", "-"], "", $theme_variables['phone_2']) ?>" ><?= $theme_variables['phone_2'] ?></a></li>
                        <li><span>E-mail:</span><a href="mailto:<?= $theme_variables['company_email'] ?>" class="withLine withLine--blue"><?= $theme_variables['company_email'] ?></a></li>
                    </ul>
                </div>
                <div class="contacts__telephones-item">
                    <ul>
                        <li><span>Viber:</span><a class="withLine withLine--blue" href="viber://chat?number=<?= str_replace(["(", ")", " ", "-"], "", $theme_variables['viber']) ?>"><?= $theme_variables['viber'] ?></a></li>
                        <li><span>What’sApp:</span> <a class="withLine withLine--blue" href="whatsapp://send?phone=<?= str_replace(["(", ")", " ", "-"], "", $theme_variables['whats_app']) ?>"><?= $theme_variables['whats_app'] ?></a></li>
                        <li><span>Telegram:</span> <a class="withLine withLine--blue" href="tg://resolve?domain=<?= str_replace(["(", ")", " ", "-"], "", $theme_variables['telegram']) ?>"><?= $theme_variables['telegram'] ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="contacts__inners">
                <div class="contacts__inner contacts__inner--title">
                    <div class="contacts__title"><?= Yii::t('main', 'store_address') ?></div>
                </div>
                <div class="contacts__maps">
                    <div class="contacts__maps--item">
                        <div class="contacts__maps--map" id="map">

                            </div>
                        <div>
                            <?= $page_content['page_contacts_address_1'] ?>
                        </div>
                    </div>
                    <div class="contacts__maps--item">
                        <div class="contacts__maps--map" id="map2"></div>
                        <div>
                            <?= $page_content['page_contacts_address_2'] ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>

<?= $page_content['google_maps'] ?>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhZNdBlfHjvqdPZ4z5Uk3hGeyZYCaXzZY&callback=initMap">
</script>



<?= WriteToUs::widget() ?>
