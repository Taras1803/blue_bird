<?php

namespace frontend\widgets;

use common\models\Categories;
use yii;
use yii\helpers\Url;
use common\models\Lang;
use common\models\ThemeVariables;

class Menu extends \yii\bootstrap\Widget
{
    public function init()
    {
    }

    public function run()
    {
        return $this->render('menu/view', [
            'language' => Lang::getCurrent(),
            'langs' => Lang::find()->orderBy(['default' => SORT_DESC])->all(),
            'menu' => $this->getMenu(),
            'categories_menu' => $this->getCategoriesMenu(),
            'theme_variables' => ThemeVariables::getValues(),
            'product_count' => 0
        ]);
    }

    private function getCategoriesMenu()
    {
        $data = [];
        $categories = Categories::findAll(['parent' => 0, 'status' => 1]);
        if($categories){
            foreach ($categories as $category){
                $data[] = [
                    'title' => ($category->getCategoriesDescriptions()->one())->name,
                    'link' => Url::to(['/catalog']) . '/' . $category->slug,
                ];
            }
        }

        return $data;
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