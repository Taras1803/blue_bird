<?php

namespace frontend\controllers;

use common\models\Seo;
use Yii;
use common\models\ThemeVariables;
use common\models\PagesContent;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use common\models\News;
use common\models\Products;
use frontend\components\BasketHelper;
use frontend\components\CheckoutHelper;
use frontend\components\PaymentHelper;


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
        $metaData = Seo::getDataBySlug('/');
        Yii::$app->params['metaData'] = $metaData;
        return $this->render('index', [
            'about_image' => ThemeVariables::getValueBySlug('main_page_our_history_img'),
            'about_text' => PagesContent::getPagesContentBySlug('home_page_our_history_text'),
            'news' => News::find()->where(['status' => 1])->orderBy(['created_at' => SORT_DESC])->limit(2)->all(),
            'new_products' => Products::find()->where(['status' => 1])->orderBy(['created_at' => SORT_DESC])->limit(3)->all(),
            'action_products' => Products::find()->where(['status' => 1])->andWhere(['>', 'action', 0])->orderBy(['updated_at' => SORT_DESC])->limit(4)->all(),
        ]);
    }

    public function actionAboutUs()
    {
        $img = ThemeVariables::getValueBySlug('about_page_main_img');
        $metaData = Seo::getDataBySlug('/about-us');
        $metaData['meta_img'] = Yii::$app->glide->createSignedUrl([
            'glide/index',
            'path' => 'images/' . $img,
            'w' => 950
        ], true);
        Yii::$app->params['metaData'] = $metaData;

        return $this->render('about-us', [
            'about_page_main_img' => $img,
            'about_page_our_history_text_1' => PagesContent::getPagesContentBySlug('about_page_our_history_text_1'),
            'about_page_our_history_text_2' => PagesContent::getPagesContentBySlug('about_page_our_history_text_2'),
            'instagram_images' => PagesContent::getPagesContentBySlug('page_about_us_insta_img'),
        ]);
    }

    public function actionCooperation()
    {
        $img = ThemeVariables::getValueBySlug('work_with_page_left_img');
        $metaData = Seo::getDataBySlug('/cooperation');
        $metaData['meta_img'] = Yii::$app->glide->createSignedUrl([
            'glide/index',
            'path' => 'images/' . $img,
            'w' => 547
        ], true);
        Yii::$app->params['metaData'] = $metaData;
        return $this->render('cooperation', [
            'work_with_page_text_1' => PagesContent::getPagesContentBySlug('work_with_page_text_1'),
            'work_with_page_text_2' => PagesContent::getPagesContentBySlug('work_with_page_text_2'),
            'work_with_page_left_img' => $img,
            'work_with_page_right_img' => ThemeVariables::getValueBySlug('work_with_page_right_img'),
        ]);
    }

    public function actionContacts()
    {
        $metaData = Seo::getDataBySlug('/contacts');
        Yii::$app->params['metaData'] = $metaData;
        return $this->render('contacts', [
            'theme_variables' => ThemeVariables::getValues(),
            'page_content' => PagesContent::getPagesContents(),
        ]);
    }

    public function actionPaymentDelivery()
    {
        $img = ThemeVariables::getValueBySlug('payment_delivery_page_img');
        $metaData = Seo::getDataBySlug('/payment-delivery');
        $metaData['meta_img'] = Yii::$app->glide->createSignedUrl([
            'glide/index',
            'path' => 'images/' . $img,
            'w' => 950
        ], true);
        Yii::$app->params['metaData'] = $metaData;

        return $this->render('payment-delivery', [
            'payment_delivery_page_left_text' => PagesContent::getPagesContentBySlug('payment_delivery_page_left_text'),
            'payment_delivery_page_right_text' => PagesContent::getPagesContentBySlug('payment_delivery_page_right_text'),
            'payment_delivery_page_img' => $img,

        ]);
    }

    public function actionCheckout()
    {
        $data = CheckoutHelper::getCheckoutData();
        if(!$data)
            return $this->redirect(Url::to(['/shopping-cart']));

        $metaData = Seo::getDataBySlug('/checkout');
        Yii::$app->params['metaData'] = $metaData;

        return $this->render('checkout', [
            'data' => $data
        ]);
    }

    public function actionShoppingCart()
    {
        $metaData = Seo::getDataBySlug('/shopping-cart');
        Yii::$app->params['metaData'] = $metaData;

        return $this->render('shopping-cart', [
            'data' => BasketHelper::getBasketData()
        ]);
    }

    public function actionSuccessful($status)
    {
        if($status != 'completed')
            throw new NotFoundHttpException();

        $post = Yii::$app->request->post('checkoutData', false);
        if($post){
            PaymentHelper::prepareFormData($post);
        }

        $metaData = Seo::getDataBySlug('/successful');
        Yii::$app->params['metaData'] = $metaData;

        BasketHelper::clearUserBasket();

        return $this->render('successful', [
            'successful_text' => PagesContent::getPagesContentBySlug('successful_text'),
        ]);
    }


}
