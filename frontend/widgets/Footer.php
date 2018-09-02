<?php

namespace frontend\widgets;

use yii;
use yii\helpers\Url;
use common\models\Lang;
use common\models\ThemeVariables;

class Footer extends \yii\bootstrap\Widget
{
    public function init()
    {
    }

    public function run()
    {
        return $this->render('footer/view', [
            'language' => Lang::getCurrent(),
            'menu' => $this->getMenu(),
            'theme_variables' => ThemeVariables::getValues()
        ]);
    }

    private function getMenu()
    {
        return [
            [
                'title' => Yii::t('main', 'about_us'),
                'link' => Url::to(['/about-us']),
            ],
            [
                'title' => Yii::t('main', 'payment_delivery'),
                'link' => Url::to(['/payment-delivery']),
            ],
            [
                'title' => Yii::t('main', 'cooperation'),
                'link' => Url::to(['/cooperation']),
            ],
            [
                'title' => Yii::t('main', 'blog'),
                'link' => Url::to(['/blog']) . '/',
            ],
            [
                'title' => Yii::t('main', 'contacts'),
                'link' => Url::to(['/contacts']),
            ]
        ];
    }
}