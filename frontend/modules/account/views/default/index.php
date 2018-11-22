<?php

/* @var $this yii\web\View */

use frontend\widgets\Breadcrumbs;
use \yii\helpers\Url;

$this->title = Yii::t('main', 'account');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'account'), 'url' => false];
?>

<section class="cabinet header--padding">
    <div class="container">
        <div class="cabinet__content">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <div class="cabinet__header">
                <h1 class="main-title"><?= Yii::t('main', 'account') ?></h1>
                <div class="cabinet__buttons">
                    <a class="cabinet__button is-active" href="<?= Url::to(['/account']) ?>/"><?= Yii::t('main', 'account') ?></a>
                    <a class="cabinet__button"
                       href="<?= Url::to(['/account/orders']) ?>"><?= Yii::t('main', 'orders_history') ?></a>
                </div>
            </div>
            <div class="cabinet__body">
                <div class="cabinet__tabs">
                    <div class="cabinet__tab tab-personal-data is-active">
                        <div class="cabinet__tab-items cabinet__tab-items--personal-data">
                            <div class="cabinet__tab-item">
                                <div class="cabinet__tab-label"><?= Yii::t('main', 'fio') ?></div>
                                <div class="cabinet__tab-field"><?= $user_fio ?></div>
                            </div>
                            <?php if ($user->organization): ?>
                                <div class="cabinet__tab-item">
                                    <div class="cabinet__tab-label"><?= Yii::t('main', 'organization') ?></div>
                                    <div class="cabinet__tab-field"><?= $user->organization ?></div>
                                </div>
                            <?php endif; ?>
                            <?php if ($user->dob): ?>
                                <div class="cabinet__tab-item">
                                    <div class="cabinet__tab-label"><?= Yii::t('main', 'dob') ?></div>
                                    <div class="cabinet__tab-field"><?= $user->dob ?></div>
                                </div>
                            <?php endif; ?>
                            <?php if ($user->city): ?>
                                <div class="cabinet__tab-item">
                                    <div class="cabinet__tab-label"><?= Yii::t('main', 'city') ?></div>
                                    <div class="cabinet__tab-field"><?= $user->city ?></div>
                                </div>
                            <?php endif; ?>
                            <?php if ($user->phone): ?>
                                <div class="cabinet__tab-item">
                                    <div class="cabinet__tab-label"><?= Yii::t('main', 'phone') ?></div>
                                    <div class="cabinet__tab-field"><?= $user->phone ?></div>
                                </div>
                            <?php endif; ?>
                            <?php if ($user->email): ?>
                                <div class="cabinet__tab-item">
                                    <div class="cabinet__tab-label">E-mail</div>
                                    <div class="cabinet__tab-field"><?= $user->email ?></div>
                                </div>
                            <?php endif; ?>
                            <?php if ($user->address): ?>
                                <div class="cabinet__tab-item">
                                    <div class="cabinet__tab-label"><?= Yii::t('main', 'address') ?></div>
                                    <div class="cabinet__tab-field"><?= $user->address ?></div>
                                </div>
                            <?php endif; ?>
                            <?php if ($user->discount): ?>
                                <div class="cabinet__tab-item">
                                    <div class="cabinet__tab-label"><?= Yii::t('main', 'discount') ?></div>
                                    <div class="cabinet__tab-field"><?= $user->discount ?></div>
                                </div>
                            <?php endif; ?>
                            <?php if ($user->discount_card): ?>
                                <div class="cabinet__tab-item">
                                    <div class="cabinet__tab-label"><?= Yii::t('main', 'discount_card') ?></div>
                                    <div class="cabinet__tab-field"><?= $user->discount_card ?></div>
                                </div>
                            <?php endif; ?>
                            <div class="cabinet__tab-item cabinet__tab-item--password">
                                <div class="cabinet__tab-label"><?= Yii::t('main', 'password') ?></div>
                                <div class="cabinet__tab-field">••••••</div>
                            </div>
                            <div class="cabinet__tab-action">
                                <a class="btn-purple-lg"
                                   href="<?= Url::to(['/account/edit']) ?>"><span><?= Yii::t('main', 'edit') ?></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
