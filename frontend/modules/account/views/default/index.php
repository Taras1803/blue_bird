<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;

$this->title = Yii::t('account', 'main_info')  . ' | ' . Yii::t('account', 'my_account') . ' | ' . Yii::$app->params['site_name'];
?>

<div class="account--title"><?= Yii::t('account', 'main_info') ?> <a href="<?= Url::to(['/account/edit-info']) ?>"><?= Yii::t('account', 'edit') ?></a></div>

<div class="account__details">

    <div class="account__details--row">
        <div class="account__details--title"><?= Yii::t('account', 'first_name') ?></div>
        <div class="account__details--info"><?= $mainInfo->first_name ?></div>
    </div>

    <?php if($mainInfo->last_name): ?>
        <div class="account__details--row">
            <div class="account__details--title"><?= Yii::t('account', 'last_name') ?></div>
            <div class="account__details--info"><?= $mainInfo->last_name ?></div>
        </div>
    <?php endif; ?>

    <?php if($mainInfo->gender ): ?>
        <div class="account__details--row">
            <div class="account__details--title"><?= Yii::t('account', 'gender') ?></div>
            <div class="account__details--info"><?= $gender[$mainInfo->gender] ?></div>
        </div>
    <?php endif; ?>

    <div class="account__details--row">
        <div class="account__details--title"><?= Yii::t('account', 'email_address') ?></div>
        <div class="account__details--info"><?= $mainInfo->email ?></div>
    </div>

    <?php if($userAddress && $userAddress->phone): ?>
        <div class="account__details--row">
            <div class="account__details--title"><?= Yii::t('account', 'phone') ?></div>
            <div class="account__details--info"><?= $userAddress->phone ?></div>
        </div>
    <?php endif; ?>

    <?php if($mainInfo->date_birth): ?>
        <div class="account__details--row">
            <div class="account__details--title"><?= Yii::t('account', 'date_birth') ?></div>
            <div class="account__details--info"><?= $mainInfo->date_birth ?></div>
        </div>
    <?php endif; ?>

    <?php if($userAddress && $userAddress->country_id): ?>
        <div class="account__details--row">
            <div class="account__details--title"><?= Yii::t('account', 'country') ?></div>
            <div class="account__details--info"><?= \common\models\Countries::getCountry($userAddress->country_id) ?></div>
        </div>
    <?php endif; ?>

    <?php if($userAddress && $userAddress->state): ?>
        <div class="account__details--row">
            <div class="account__details--title"><?= Yii::t('account', 'country') ?></div>
            <div class="account__details--info"><?= $userAddress->state ?></div>
        </div>
    <?php endif; ?>

    <?php if($userAddress && $userAddress->city): ?>
        <div class="account__details--row">
            <div class="account__details--title"><?= Yii::t('account', 'city') ?></div>
            <div class="account__details--info"><?= $userAddress->city ?></div>
        </div>
    <?php endif; ?>

    <?php if($userAddress && $userAddress->address): ?>
        <div class="account__details--row">
            <div class="account__details--title"><?= Yii::t('account', 'address') ?></div>
            <div class="account__details--info"><?= $userAddress->address ?></div>
        </div>
    <?php endif; ?>

    <?php if($userAddress && $userAddress->postcode): ?>
        <div class="account__details--row">
            <div class="account__details--title"><?= Yii::t('account', 'postcode') ?></div>
            <div class="account__details--info"><?= $userAddress->postcode ?></div>
        </div>
    <?php endif; ?>

    <?php if($userAddress && $userAddress->novaposhta): ?>
        <div class="account__details--row">
            <div class="account__details--title"><?= Yii::t('main', 'novaposhta') ?></div>
            <div class="account__details--info"><?= $userAddress->novaposhta ?></div>
        </div>
    <?php endif; ?>
</div>

<div class="account--title"><?= Yii::t('account', 'security') ?> <a href="<?= Url::to(['/account/edit-security']) ?>"><?= Yii::t('account', 'edit') ?></a></div>

<div class="account__details">
    <div class="account__details--row">
        <div class="account__details--title"><?= Yii::t('account', 'password') ?></div>
        <div class="account__details--info">•••••••••••</div>
    </div>

<!--    <div class="account__details--row">-->
<!--        <div class="account__details--title">Дополнительный email</div>-->
<!--        <div class="account__details--info">kfufi@gmail.com</div>-->
<!--    </div>-->

</div>
