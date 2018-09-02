<?php
namespace frontend\modules\account\controllers;

use common\models\UserAddress;
use frontend\modules\account\models\ForgotPassword;
use frontend\modules\account\models\SignUpForm;
use yii;
use yii\web\Controller;
/**
 * Ajax controller for the `account` module
 */
class AjaxController extends Controller
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignUp()
    {
        $data = Yii::$app->request->post();
        if (!Yii::$app->user->isGuest || count($data) < 3)
            return $this->goHome();

        header('Content-Type: text/html; charset=utf-8');
        ob_start();
        if ($user = SignUpForm::signUp($data)) {
            if (Yii::$app->getUser()->login($user)) {
                echo 'done';
            } else {
                echo 'fail';
            }
        } else {
            echo Yii::t('main', 'email_already_exists');
        }
        ob_end_flush();
        die;
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $data = Yii::$app->request->post();

        if (!Yii::$app->user->isGuest || count($data) != 2) {
            return $this->goHome();
        }

        header('Content-Type: text/html; charset=utf-8');
        ob_start();
        SignUpForm::login($data);
        ob_end_flush();
        die;
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionForgotPassword()
    {
        $pass = Yii::$app->request->get('password', false);
        $token = Yii::$app->request->get('token', false);
        if($pass && $token){
            if(ForgotPassword::resetPassword($pass, $token)){
                return $this->redirect('/account/login?password=changed');
            } else
                return $this->goHome();

        } else {
            $data = Yii::$app->request->post();

            if(!$data['email']){
                return $this->goHome();
            }

            if(ForgotPassword::sendEmail($data['email'])){
                header('Content-Type: text/html; charset=utf-8');
                ob_start();
                echo 'success';
                ob_end_flush();
            }
        }

        die;
    }

}