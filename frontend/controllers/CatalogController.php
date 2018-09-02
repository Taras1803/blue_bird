<?php

namespace frontend\controllers;

use common\models\Products;
use Yii;
use yii\web\Controller;
use frontend\components\CatalogHelper;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class CatalogController extends Controller
{

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


    public function actionIndex()
    {
        $category_slug = Yii::$app->request->get('main', false);
        if (!$category_slug)
            throw new NotFoundHttpException();

        $catalog_data = CatalogHelper::getCatalogData($category_slug);
        if (!$catalog_data)
            throw new NotFoundHttpException();

        return $this->render('index', [
            'catalog_data' => $catalog_data,
        ]);
    }

    public function actionCategory($main, $slug)
    {
        $catalog_data = CatalogHelper::getCategoryData($main, $slug);
        if (!$catalog_data)
            throw new NotFoundHttpException();

        return $this->render('category', [
            'catalog_data' => $catalog_data,
        ]);
    }

    public function actionProduct($slug)
    {
        return $this->render('product', [
            'product' => CatalogHelper::getProductData($slug),
            'last_products' => CatalogHelper::getLastViewedProducts($slug),
            'related_products' => CatalogHelper::getRelatedProducts($slug),
        ]);
    }

}
