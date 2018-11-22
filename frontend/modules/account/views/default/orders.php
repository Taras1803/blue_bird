<?php

/* @var $this yii\web\View */

use common\models\CurrentTime;
use frontend\widgets\Breadcrumbs;
use \yii\helpers\Url;

$this->title = Yii::t('main', 'orders_history') . ' / ' . Yii::t('main', 'account');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'account'), 'url' => Url::to(['/account']) . '/'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'orders_history'), 'url' => false];
$userTime = CurrentTime::getUserOffsetTime();
?>
<input type="hidden"
       value="<?= Url::to(['/account/orders']) ?>"
       id="js__location">
<section class="cabinet header--padding">
    <div class="container">
        <div class="cabinet__content">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>
            </div>
            <div class="cabinet__header">
                <h1 class="main-title"><?= Yii::t('main', 'account') ?></h1>
                <div class="cabinet__buttons">
                    <a class="cabinet__button"
                       href="<?= Url::to(['/account']) ?>/"><?= Yii::t('main', 'personal_data') ?></a>
                    <a class="cabinet__button is-active"
                       href="<?= Url::to(['/account/orders']) ?>"><?= Yii::t('main', 'orders_history') ?></a>
                </div>
            </div>
            <div class="cabinet__body">
                <div class="cabinet__tabs">
                    <div class="cabinet__tab tab-history-of-orders is-active">
                        <div class="cabinet__tab-header">
                            <div class="dropdown-main">
                                <label for="field-sorting" class="dropdown-main__header">
                                    <input disabled type="text" class="field-sorting" id="field-sorting"
                                           placeholder="<?= $orders_data['current_sort'] ?>" name="">
                                    <i></i>
                                </label>
                                <ul class="dropdown-main__body dropdown-main__body--sorting">
                                    <?php foreach ($orders_data['filters'] as $key => $filter): ?>
                                        <li>
                                            <span class="js__changeOrderBy" data-val="<?= $filter ?>"
                                                  data-key="<?= $key ?>"><?= $filter ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="cabinet__table">
                            <div class="cabinet__table-tr">
                                <div class="cabinet__table-header">
                                    <div class="cabinet__table-item">
                                        <strong><?= Yii::t('main', 'order') ?></strong>
                                    </div>
                                    <div class="cabinet__table-item">
                                        <strong><?= Yii::t('main', 'date') ?></strong>
                                    </div>
                                    <div class="cabinet__table-item">
                                        <strong><?= Yii::t('main', 'summa') ?></strong>
                                    </div>
                                    <div class="cabinet__table-item">
                                        <strong>Детальнее</strong>
                                    </div>
                                </div>
                            </div>
                            <?php if ($orders_data['orders']): ?>
                                <?php foreach ($orders_data['orders'] as $order): ?>
                                    <div class="cabinet__table-tr">
                                        <div class="cabinet__table-header">
                                            <div class="cabinet__table-item">
                                                <span><?= $order['item']['id'] ?></span>
                                            </div>
                                            <div class="cabinet__table-item">
                                                <span><?= date("H:i d.m.Y", $order['item']['created_at'] + $userTime) ?></span>
                                            </div>
                                            <div class="cabinet__table-item">
                                                <span><?= $order['item']['total_price'] . $orders_data['currency'] ?></span>
                                            </div>
                                            <div class="cabinet__table-item">
                                                <button></button>
                                            </div>
                                        </div>
                                        <div class="cabinet__table-body">
                                            <?php foreach ($order['products'] as $product): ?>
                                                <div class="cabinet__table-items">
                                                    <div class="cabinet__table-item">
                                                        <p><a href="<?= Url::to(['/product']) ?>/<?= $product->slug?>"><?= $product->title ?></a></p>
                                                    </div>
                                                    <div class="cabinet__table-item">
                                                        <p><?= $product->count ?></p>
                                                    </div>
                                                    <div class="cabinet__table-item">
                                                        <p><?= $product['price'] . $orders_data['currency'] ?></p>
                                                    </div>
                                                    <div class="cabinet__table-item">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= \frontend\components\ThemeLinkPager::widget([
            'pagination' => $orders_data['pagination'],
            'prevPageCssClass' => 'prev',
            'nextPageCssClass' => 'next',
            'prevPageLabel' => '<i class="icon-arrow1"></i>',
            'nextPageLabel' => '<i class="icon-arrow1"></i>',
            'maxButtonCount' => 8
        ]); ?>
    </div>
</section>
