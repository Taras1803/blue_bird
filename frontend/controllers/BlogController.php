<?php
namespace frontend\controllers;

use common\models\Lang;
use common\models\Options;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use common\models\News;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class BlogController extends Controller
{

    public function init()
    {
//        Yii::$app->view->params['countries'] = Countries::getCountries();
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

        $pagination = new Pagination([
            'defaultPageSize' => Options::getBySlug('blogPerPage'),
            'totalCount' => News::find()->where(['status' => 1])->count()
        ]);
        $articles = News::find()
            ->where(['status' => 1])
            ->orderBy(['id' => SORT_DESC])
            ->limit(8)
            ->offset(0)
            ->all();
        return $this->render('index', [
            'articles' => $articles,
            'pagination' => $pagination
        ]);
    }

    public function actionSingle($slug)
    {
        $article = News::findOne(['slug' => $slug, 'status' => 1]);
        if(!$article)
            throw new NotFoundHttpException();

        return $this->render('single', [
            'article' => $article,
            'description' => $article->getNewsDescriptions()->one(),
        ]);
    }
}
