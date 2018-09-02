<?php
namespace frontend\controllers;

use common\models\Lang;
use common\models\Options;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use common\models\Banner;

/**
 * Site controller
 */
class BannerController extends Controller
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

//        $ip = $_SERVER['REMOTE_ADDR'];
//        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
//        echo $details->city;

        $pagination = new Pagination([
            'defaultPageSize' => Options::getBySlug('blogPerPage'),
            'totalCount' => Banner::find()->where(['show' => 1])->count()
        ]);

        return $this->render('index', [
            'articles' => Banner::find()
                ->where(['show' => 1])
                ->orderBy(['id' => SORT_DESC])
                ->limit($pagination->limit)
                ->offset($pagination->offset)
                ->all(),
            'pagination' => $pagination
        ]);
    }

    public function actionSingle($id)
    {
        $slug = explode("_", $id);
        $article = Banner::findOne((int)$slug[0]);
        return $this->render('single', [
            'article' => $article,
            'description' => $article->getBannerDescriptions()->one(),
        ]);
    }
}