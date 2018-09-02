<?php

namespace frontend\controllers;

use common\models\News;
use common\models\Products;
use Yii;
use common\models\ThemeVariables;
use common\models\PagesContent;
use yii\web\Controller;


/**
 * Site controller
 */
class SiteController extends Controller
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }

    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'about_image' => ThemeVariables::getValueBySlug('main_page_our_history_img'),
            'about_text' => PagesContent::getPagesContentBySlug('home_page_our_history_text'),
            'news' => News::find()->where(['status' => 1])->orderBy(['created_at' => SORT_DESC])->limit(2)->all(),
            'new_products' => Products::find()->where(['status' => 1])->orderBy(['created_at' => SORT_DESC])->limit(3)->all(),
            'action_products' => Products::find()->where(['status' => 1])->andWhere(['action' => 1])->orderBy(['created_at' => SORT_DESC])->limit(4)->all(),
        ]);
    }

    public function actionAboutUs()
    {
        return $this->render('about-us', [
            'about_page_main_img' => ThemeVariables::getValueBySlug('about_page_main_img'),
            'about_page_our_history_text_1' => PagesContent::getPagesContentBySlug('about_page_our_history_text_1'),
            'about_page_our_history_text_2' => PagesContent::getPagesContentBySlug('about_page_our_history_text_2'),
        ]);
    }

    public function actionCooperation()
    {
        return $this->render('cooperation', [
            'work_with_page_text_1' => PagesContent::getPagesContentBySlug('work_with_page_text_1'),
            'work_with_page_text_2' => PagesContent::getPagesContentBySlug('work_with_page_text_2'),
            'work_with_page_left_img' => ThemeVariables::getValueBySlug('work_with_page_left_img'),
            'work_with_page_right_img' => ThemeVariables::getValueBySlug('work_with_page_right_img'),
        ]);
    }

    public function actionContacts()
    {
        $data = ThemeVariables::getValues();
        return $this->render('contacts', [
            'page_contatcts_address_1' => PagesContent::getPagesContentBySlug('page_contatcts_address_1'),
            'page_contatcts_address_2' => PagesContent::getPagesContentBySlug('page_contatcts_address_2'),
            'teme_variables' => $data,
        ]);
    }

    public function actionPaymentDelivery()
    {
        return $this->render('payment-delivery', [
            'payment_delivery_page_left_text' => PagesContent::getPagesContentBySlug('payment_delivery_page_left_text'),
            'payment_delivery_page_right_text' => PagesContent::getPagesContentBySlug('payment_delivery_page_right_text'),
            'payment_delivery_page_img' => ThemeVariables::getValueBySlug('payment_delivery_page_img'),

        ]);
    }

    public function actionCheckout()
    {
        return $this->render('checkout', [

        ]);
    }

    public function actionShoppingCart()
    {
        return $this->render('shopping-cart', [

        ]);
    }
}
