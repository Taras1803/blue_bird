<?php
namespace frontend\controllers;

use common\models\Lang;
use common\models\Options;
use common\models\Seo;
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
            ->limit($pagination->limit)
            ->offset($pagination->offset)
            ->all();
        $metaData = Seo::getDataBySlug('/blog/');
        Yii::$app->params['metaData'] = $metaData;

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
        $description = $article->getNewsDescriptions()->one();
        $metaData = Seo::getDataBySlug();
        $metaData['meta_title'] = $description->meta_title;
        $metaData['meta_description'] = $description->meta_description;
        $metaData['meta_keywords'] = $description->meta_keywords;
        $metaData['meta_img'] = Yii::$app->glide->createSignedUrl([
            'glide/index',
            'path' => 'blog/' . $article->images,
            'w' => 1140
        ], true);

        Yii::$app->params['metaData'] = $metaData;
        return $this->render('single', [
            'article' => $article,
            'description' => $description,
        ]);
    }
}
