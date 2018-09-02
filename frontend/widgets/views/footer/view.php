<?php
if ($language['current']->url == 'ru')
    $homeUrl = '/';
else
    $homeUrl = '/' . $language['current']->url . '/';
?>
<footer class="footer">
    <div class="footer__top">
        <div class="container">
            <div class="footer__content">
                <a href="<?= $homeUrl ?>" class="footer__logo">
                    <img src="<?= Yii::$app->glide->createSignedUrl([
                        'glide/index',
                        'path' => 'images/' . $theme_variables['footer_logo'],
                        'w' => 140
                    ], true) ?>" alt="Footer Logo">
                </a>
                <div class="footer__holder">
                    <div class="footer__inner">
                        <ul class="items-menu">
                            <?php foreach($menu as $item): ?>
                                <li>
                                    <a href="<?= $item['link'] ?>"><?= $item['title'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="footer__inner">
                        <span><?= Yii::t('main', 'phone') ?>:</span>
                        <ul class="items-line">
                            <?php if($theme_variables['phone_1']): ?>
                                <li>
                                    <a href="tel:<?= str_replace(["(", ")", " ", "-"], "", $theme_variables['phone_1']) ?>"><?= $theme_variables['phone_1'] ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if($theme_variables['phone_2']): ?>
                                <li>
                                    <a href="tel:<?= str_replace(["(", ")", " ", "-"], "", $theme_variables['phone_2']) ?>"><?= $theme_variables['phone_2'] ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="footer__social">
                    <span><?= Yii::t('main', 'follow_us') ?>:</span>
                    <ul>
                        <?php if($theme_variables['instagram_link']): ?>
                            <li>
                                <a href="<?= $theme_variables['instagram_link'] ?>" class="bb-inst"></a>
                            </li>
                        <?php endif; ?>
                        <?php if($theme_variables['facebook_link']): ?>
                            <li>
                                <a href="<?= $theme_variables['facebook_link'] ?>" class="bb-fb"></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="footer__content">
                <div class="footer__copyright">All right reserved, 2018 <?= (date("Y", time()) == '2018')? '' : '- ' . date("Y", time()) ?></div>
            </div>
        </div>
    </div>
</footer>