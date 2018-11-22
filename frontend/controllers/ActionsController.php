<?php

namespace frontend\controllers;

use frontend\components\BasketHelper;
use frontend\components\CatalogHelper;
use frontend\components\CheckoutHelper;
use frontend\components\FilterHelper;
use frontend\components\PaymentHelper;
use Yii;
use yii\web\Controller;
use common\models\CurrentTime;
use yii\web\Response;
use common\models\Comment;
use frontend\components\ThemeHelper;


/**
 * Actions controller
 */
class ActionsController extends Controller
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }

    public function actionLiqpayListener()
    {
        try {
            if (!PaymentHelper::liqpayListener())
                return $this->goHome();
        } catch (\Exception $e) {
            return $this->goHome();
        }
    }


    public function actionSetUserOffsetTime()
    {
        $data = Yii::$app->request->post();
        if ($data['dtz']) {
            CurrentTime::setUserOffsetTime($data);
        }
    }

    public function actionLogout()
    {
        $post = Yii::$app->request->post();
        if ($post && isset($post['logout'])) {
            Yii::$app->user->logout();
        } else
            $this->goHome();
    }

    public function actionWriteUs()
    {
        $post = Yii::$app->request->post('fields', []);
        if ($post) {
            $json = ThemeHelper::sendWriteUsForm($post);
            return $this->asJson($json);
        } else
            return $this->goHome();
    }

    public function actionComment()
    {
        $post = Yii::$app->request->post();
        if ($post) {
            $json = ThemeHelper::sendCommentForm($post);
            return $this->asJson($json);
        } else
            return $this->goHome();
    }

    public function actionAddProductToBasket()
    {
        $post = Yii::$app->request->post();
        if ($post) {
            $json = BasketHelper::addProduct($post);
            return $this->asJson($json);
        } else
            return $this->goHome();
    }

    public function actionRemoveProductFromBasket()
    {
        $post = Yii::$app->request->post();
        if ($post) {
            $json = BasketHelper::removeProduct($post['key']);
            return $this->asJson($json);
        } else
            return $this->goHome();
    }

    public function actionChangeProductCount()
    {
        $post = Yii::$app->request->post();
        if ($post) {
            $json = BasketHelper::changeProductCount($post);
            return $this->asJson($json);
        } else
            return $this->goHome();
    }

    public function actionSaveCheckoutData()
    {
        $post = Yii::$app->request->post();
        if ($post) {
            $json = CheckoutHelper::saveInformation($post);
            return $this->asJson($json);
        } else
            return $this->goHome();
    }

}
