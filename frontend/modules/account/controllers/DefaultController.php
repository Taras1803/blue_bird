<?php

namespace frontend\modules\account\controllers;

use common\models\PageContent;
use yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\SubscribeUs;
use frontend\components\ThemeHelper;
use common\models\Countries;
use common\models\UserAddress;
use frontend\modules\account\models\UserInfo;
use common\models\CheckoutSession;
use common\models\Currency;
use common\models\Lang;
use common\models\Orders;
use common\models\OrdersProducts;
use common\models\OrdersStatus;
use common\models\Promocode;
use common\models\PromocodeToUser;
use common\models\User;
use yii\helpers\Url;

/**
 * Default controller for the `account` module
 */
class DefaultController extends Controller
{
    public $layout = 'account';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ]
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
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

    public function actionIndex()
    {
        $this->checkLogin();
        return $this->render('index', [

        ]);
    }

    /**
     * Displays login page.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest)
            return $this->redirect('/account/');

        return $this->render('login');
    }

    public function actionForgot()
    {
        if (!Yii::$app->user->isGuest)
            return $this->redirect('/account/');

        $this->layout = '@frontend/views/layouts/main';
        return $this->render('forgot');
    }


    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Пароль успешно обновлен.');

            return $this->redirect(['/account/login']);
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    private function checkLogin()
    {
        if (Yii::$app->user->isGuest)
            return $this->redirect(['/account/login']);
    }

}
