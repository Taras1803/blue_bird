<?php

use yii\helpers\Url;
$current_route = Yii::$app->controller->getRoute();
$user = Yii::$app->user->getIdentity();
?>
<?php $this->beginContent('@frontend/views/layouts/main.php'); ?>

    <div class="container">
        <h1 class="mainTitle mainTitle--center"><?= Yii::t('account', 'my_account') ?></h1>

        <div class="account">

            <div class="account--sidebar">
                <div class="account__user">
                    <div class="account__user--img" style="background-image: url(<?= '/uploads/avatars/' . $user->avatar ?>);"></div>
                    <div class="account__user--name">
                        <strong><?= $user->first_name ?> <br> <?= $user->last_name ?></strong>
                    </div>

                    <div class="account__user--btn"><i class="icon-menu_account"></i></div>
                </div>

                <div class="account__menu">
                    <ul class="account__nav">
                        <?php foreach(\frontend\modules\account\models\AccountMenu::getMenu() as $item): ?>
                            <li><a href="<?= $item['link'] ?>" <?= ($current_route == $item['route'])? 'class="active"' : '' ?>><?= $item['title'] ?><?= ($current_route == $item['route'])? '<span>-</span>' : '<span>+</span>' ?></a></li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="account__exit">
                        <a href="#" onclick="$('.js__logOut').trigger('click')"><?= Yii::t('main', 'logout') ?></a>
                    </div>
                </div>
            </div>

            <div class="account--main">
                <?= $content ?>
            </div>
        </div>
    </div>
<?php $this->registerJsFile('/js/account.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
); ?>
<?php $this->endContent(); ?>
