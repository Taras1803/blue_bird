<?php

namespace frontend\controllers;

use common\models\Comment;
use frontend\components\ThemeHelper;
use Yii;
use yii\web\Controller;
use common\models\CurrentTime;
use yii\web\Response;


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
            $coment = new Comment();
            $coment->lang_id = $post['lang_id'];
            $coment->item_type = $post['item_type'];
            $coment->item_id = $post['item_id'];
            $coment->comment = $post['comment'];
            $coment->created_at = time();
            $coment->status = 0;
            $coment->user_id = 0;
            $coment->user_name = $post['user_name'];
            $coment->save();
            $post['id'] = $coment->id;
            $json = ThemeHelper::sendCommentForm($post);
            return $this->asJson($json);
        } else
            return $this->goHome();
    }
}
