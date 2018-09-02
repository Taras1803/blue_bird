<?php
/**
 * Created by PhpStorm.
 * User: Samir
 * Date: 14.03.2018
 * Time: 18:26
 */

use \yii\helpers\Url;
$this->title = Yii::t('main', 'help_title') . ': ' . $titles[$currentPage] . ' | ' . Yii::$app->params['site_name'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'help_title') . ': ' . $titles[$currentPage], 'url' => false];
?>

<?= \frontend\widgets\Breadcrumbs::widget(['breadcrumbs' => $this->params['breadcrumbs']]) ?>

<!--blog-->
<div class="container">
    <h1 class="mainTitle mainTitle--center"><?= Yii::t('main', 'help_title') ?></h1>

    <div class="help">

        <div class="help--sidebar">
            <div class="help__menu">
                <ul class="help__nav">
                    <?php foreach ($titles as $slug => $title): ?>
                        <li>
                            <a href="<?= Url::to(['/help/', 'page' => $slug]) ?>"<?= ($currentPage == $slug) ? ' class="active"' : '' ?>><?= $title ?>
                                <span><?= ($currentPage == $slug) ? '-' : '+' ?></span></a>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>

        <div class="help--main">
            <h2 class="help--title"><?= $helpSubtitle ?></h2>

            <div class="help__details">
                <?php if (is_array($content)) : foreach ($content as $item): ?>
                    <?php $description = $item->getFaqDescription()->one() ?>
                    <div class="help__details--row">
                        <h3><?= $description->question ?></h3>
                        <?= $description->answer ?>
                    </div>
                <?php endforeach; else: ?>
                    <div class="help__details--row">
                        <?= $content ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--blog-->

