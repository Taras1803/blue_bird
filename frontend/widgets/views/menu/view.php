<?php

use \yii\helpers\Url;

if ($language['current']->url == 'ru')
    $homeUrl = '/';
else
    $homeUrl = '/' . $language['current']->url . '/';
?>
<header class="header">
    <div class="header__top">
        <div class="header__inner">
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
        <div class="header__inner">
            <ul class="items-menu">
                <?php foreach($menu as $item): ?>
                    <li>
                        <a href="<?= $item['link'] ?>"><?= $item['title'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="header__inner">
            <ul class="items-line">
                <?php foreach($langs as $lang): ?>
                    <li>
                        <a href="<?= (Yii::$app->getRequest()->getLangUrl() == '/' && $lang->url == 'ru')? '/' : '/' . $lang->url . Yii::$app->getRequest()->getLangUrl() ?>"><?= $lang->name ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <ul class="items-line">
                <?php if(Yii::$app->user->isGuest): ?>
                    <li>
                        <a href="<?= Url::to(['/login']) ?>"><?= Yii::t('main', 'login') ?></a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?= Url::to(['/account']) . '/' ?>"><?= Yii::t('main', 'account') ?></a>
                    </li>
                    <li>
                        <a href="#" class="js__userLogout"><?= Yii::t('main', 'logout') ?></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="header__bottom">
        <div class="header__inner">
            <div class="header__search">
                <span class="bb-search"></span>
                <form action="<?= Url::to(['/search']) ?>" class="header__search-form js__searchForm">
                    <input type="text" id="field-search" placeholder="<?= Yii::t('main', 'search') ?>" name="q">
                    <button class="bb-arrow-lg-right js__sendSearchForm"></button>
                </form>
            </div>
            <button class="header__burger">
                <span></span>
            </button>
        </div>
        <div class="header__inner">
            <a href="<?= $homeUrl ?>" class="header__logo">
                <img src="<?= Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => 'images/' . $theme_variables['header_logo'],
                    'w' => 192
                ], true) ?>" alt="Header Logo">
            </a>
            <ul class="items-main-menu">
                <?php foreach($categories_menu as $item): ?>
                    <li>
                        <a href="<?= $item['link'] ?>"><?= $item['title'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="header__inner">
            <a href="<?= Url::to(['/cart']) ?>" class="header__basket bb-cart">
                <span>(<?= $product_count ?>)</span>
            </a>
        </div>
    </div>
</header>
<nav class="mobile-menu">
    <div class="mobile-menu__top">
        <ul class="items-main-menu">
            <?php foreach($categories_menu as $item): ?>
                <li>
                    <a href="<?= $item['link'] ?>"><?= $item['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="mobile-menu__bottom">
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
        <ul class="items-line">
            <?php if(Yii::$app->user->isGuest): ?>
                <li>
                    <a href="<?= Url::to(['/login']) ?>"><?= Yii::t('main', 'login') ?></a>
                </li>
            <?php else: ?>
                <li>
                    <a href="<?= Url::to(['/account']) . '/' ?>"><?= Yii::t('main', 'account') ?></a>
                </li>
                <li>
                    <a href="#" class="js__userLogout"><?= Yii::t('main', 'logout') ?></a>
                </li>
            <?php endif; ?>
        </ul>
        <ul class="items-line">
            <?php foreach($langs as $lang): ?>
                <li>
                    <a href="<?= (Yii::$app->getRequest()->getLangUrl() == '/' && $lang->url == 'ru')? '/' : '/' . $lang->url . Yii::$app->getRequest()->getLangUrl() ?>"><?= $lang->name ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <ul class="items-menu">
            <?php foreach($menu as $item): ?>
                <li>
                    <a href="<?= $item['link'] ?>"><?= $item['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>

