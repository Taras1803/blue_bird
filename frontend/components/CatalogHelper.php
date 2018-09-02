<?php

namespace frontend\components;

use common\models\Categories;
use common\models\Lang;
use common\models\Products;
use common\models\ProductsAttributesValues;
use common\models\ProductsToAttributes;
use common\models\ProductsToCategories;
use Yii;
use yii\db\Expression;

class CatalogHelper
{
    static function getCatalogData($slug)
    {
        $data = [];
        $main_category = Categories::findOne(['slug' => $slug]);
        $childrens = Categories::findAll(['parent' => $main_category->id]);
        foreach ($childrens as $children){
            $categories_ids[] = $children->id;
        }
        array_push($categories_ids, $main_category->id);
        if ($main_category) {
            $products_to_category = ProductsToCategories::find()->where(['in','category_id', $categories_ids])->all();
            if ($products_to_category) {
                foreach ($products_to_category as $item) {
                    $ids[] = $item->product_id;
                }
                $products = Products::find()->where(['in', 'id', $ids])->orderBy(['created_at' => SORT_DESC])->all();
            }
            $description_main = $main_category->getCategoriesDescriptions()->one();
            $data['category'] = [
                'title' => $description_main->name,
                'slug' => $main_category->slug,
                'description' => $description_main->description,
                'products' => $products,
            ];

            $data['sub_categories'] = [];

            $sub_categories = Categories::findAll(['status' => 1, 'parent' => $main_category->id]);
            if ($sub_categories) {
                $cats = [];
                foreach ($sub_categories as $sub_cat) {
                    $description = $sub_cat->getCategoriesDescriptions()->one();
                    $cats[] = [
                        'id' => $sub_cat->id,
                        'title' => $description->name,
                        'slug' => $sub_cat->slug,
                    ];
                }
                $data['sub_categories'] = $cats;
                $data['filters'] = self::getFilters();
            }
        }

        return $data;
    }

    static function getCategoryData($main, $slug)
    {

        $data = [];
        $category = Categories::findOne(['slug' => $slug]);
        if ($category) {
            $products_to_category = ProductsToCategories::findAll(['category_id' => $category->id]);
            if ($products_to_category) {
                foreach ($products_to_category as $item) {
                    $ids[] = $item->product_id;
                }
                $products = Products::find()->where(['in', 'id', $ids])->orderBy(['created_at' => SORT_DESC])->all();
            }
        }
        if ($category) {
            $description = $category->getCategoriesDescriptions()->one();
            $data['category'] = [
                'title' => $description->name,
                'slug' => $category->slug,
                'description' => $description->description,
                'filters' => self::getFilters(),
                'parent' => $main,
                'products' => $products
            ];
        }
        return $data;
    }

    static function getProductData($slug)
    {
        $data = [];
        $product = Products::findOne(['slug' => $slug]);

        if ($product) {
            $description = $product->getProductsDescriptions()->one();
            if ($description->consist != '') {
                $consist = explode(PHP_EOL, $description->consist);
            }
            $product_attributes = ProductsToAttributes::getProductAttributes($product->id);
            $lang = Lang::getCurrent();
            foreach ($product_attributes as $attribute){
                if ($attribute['attribute_name']['slug'] == 'weight'){
                    foreach ($attribute['values'] as $item){
                        $weight[]  = [
                            'value' => $item->value,
                            'ru' => $item->ru,
                            'uk' => $item->uk,
                        ];
                    }
                }
            }
            $data = [
                'id' => $product->id,
                'images' => $product->images,
                'price' => $product->price,
                'article' => $product->article,
                'product_attributes' => $product_attributes,
                'lang' => $lang->url,
                'consist' => $consist,
                'title' => $description->title,
                'slug' => $product->slug,
                'description' => $description->description,
            ];
            if ($weight){
                $data['weight'] = $weight;
            }
        }
        return $data;
    }

    static function getLastViewedProducts($slug)
    {
        $product = Products::findOne(['slug' => $slug]);
        $session = Yii::$app->session;
        if (!$session['user_last_viewed']){
            $session['user_last_viewed'] = [];
        }
        $data = $session['user_last_viewed'];
        if (!in_array($product->id, $data)) {
            array_unshift($data, $product->id);
            $session['user_last_viewed'] = $data;
        }
        $ids = $session['user_last_viewed'];
        if (count($ids) > 4) {
            array_splice($ids, 4);
            unset($session['user_last_viewed']);
            $session['user_last_viewed'] = $ids;
        }
        if ($ids) {
            foreach ($ids as $id) {
                $products[] = Products::findOne(['id' => $id]);
            }
        }
        return $products;
    }

    static function getRelatedProducts($slug)
    {
        $product = Products::findOne(['slug' => $slug]);
        $product_to_category = ProductsToCategories::find()->select('category_id')->where(['product_id' => $product->id])->one();
        $category_id = $product_to_category->category_id;
        $products_ids = ProductsToCategories::find()->select('product_id')->where(['category_id' => $category_id])->asArray()->column();
        if ($products_ids) {
            foreach ($products_ids as $id) {
                if ($id != $product->id) {
                    $ids[] = $id;
                }
            }
            shuffle($ids);
            if (count($ids) > 4) {
                array_splice($ids, 4);
            }
            $products = Products::find()->where(['in', 'id', $ids])->orderBy(new Expression('rand()'))->all();
        }
        return $products;
    }

    private static function getFilters()
    {
        return [
            'new' => Yii::t('main', 'filter_new'),
            'old' => Yii::t('main', 'filter_old'),
            'price_low' => Yii::t('main', 'filter_price_low'),
            'price_height' => Yii::t('main', 'filter_price_height'),
        ];
    }

}
