<?php

namespace frontend\components;

use Yii;
use common\models\UserBasket;
use common\models\Products;
use common\models\ProductsToAttributes;
use common\models\Currency;
use common\models\Lang;
use common\models\ProductsToLookbook;

class BasketHelper
{
    static function addProduct($data)
    {
        $json = [];
        $json['error'] = 0;
        $json['basket_count'] = 0;

        $product = Products::findOne(['id' => $data['id'], 'status' => 1]);
        if (!$product) {
            $json['error'] = 1;
            $json['basket_count'] = self::getBasketProductsCount();
            return $json;
        }

        if ($product->type == 2 && $data['count'] != 1) {
            $pta = ProductsToAttributes::findOne($data['count']);
            if (!$pta) {
                $json['error'] = 1;
                $json['basket_count'] = self::getBasketProductsCount();
                return $json;
            }
        }

        $product = [
            'id' => $data['id'],
            'count' => $data['count'],
        ];

        if (Yii::$app->user->isGuest)
            self::setGuestBasket($product);
        else
            self::setLoginBasket($product);

        $json['basket_count'] = self::getBasketProductsCount();
        return $json;
    }

    static function changeProductCount($data)
    {
        $json = [];
        $json['error'] = 0;

        if (Yii::$app->user->isGuest) {
            $basket_data = self::getUserBasket();
            if (isset($basket_data[$data['key']]))
                $basket_data[$data['key']]['count'] = $data['count'];
            Yii::$app->session->set('userBasket', $basket_data);
        } else {
            $basket_data = self::getUserBasket();
            if (isset($basket_data[$data['key']]))
                $basket_data[$data['key']]['count'] = $data['count'];

            $ub = UserBasket::findOne(['user_id' => Yii::$app->user->id]);
            $ub->params = json_encode($basket_data);
            $ub->save();
        }

        return $json;
    }

    static function removeProduct($key)
    {
        $json = [];
        $json['error'] = 0;

        if (Yii::$app->user->isGuest) {
            $basket_data = self::getUserBasket();
            if (isset($basket_data[$key]))
                unset($basket_data[$key]);
            Yii::$app->session->set('userBasket', $basket_data);
        } else {
            $basket_data = self::getUserBasket();
            if (isset($basket_data[$key]))
                unset($basket_data[$key]);

            $ub = UserBasket::findOne(['user_id' => Yii::$app->user->id]);
            $ub->params = ($basket_data) ? json_encode($basket_data) : '';
            $ub->save();
        }
        return $json;
    }

    private static function setGuestBasket($product)
    {
        $basketData = self::getUserBasket();
        $basketData[] = $product;

        Yii::$app->session->set('userBasket', $basketData);
    }

    private static function setLoginBasket($product)
    {
        $basket_data = self::getUserBasket();
        $basket_data[] = $product;
        $ub = UserBasket::findOne(['user_id' => Yii::$app->user->id]);
        $ub->params = json_encode($basket_data);
        $ub->save();
    }

    public static function getUserBasket()
    {
        if (Yii::$app->user->isGuest)
            return Yii::$app->session->get('userBasket', []);
        else {
            $ub = UserBasket::findOne(['user_id' => Yii::$app->user->id]);
            $basket = [];
            if (!$ub)
                return $basket;

            return json_decode($ub->params, true);
        }
    }

    public static function getBasketProductsCount()
    {
        return count(self::getUserBasket());
    }

    public static function clearUserBasket($user_id = 0)
    {
        if ($user_id > 0) {
            $ub = UserBasket::findOne(['user_id' => $user_id]);
            if ($ub) {
                $ub->params = '';
                $ub->save();
            }
        } else {
            if (Yii::$app->user->isGuest) {
                Yii::$app->session->remove('userBasket');
            } else {
                $ub = UserBasket::findOne(['user_id' => Yii::$app->user->id]);
                if ($ub) {
                    $ub->params = '';
                    $ub->save();
                }
            }
        }
    }

    public static function clearSessionBasket($key)
    {
        session_id($key);
        session_start();
        unset($_SESSION['userBasket']);
    }

    static function getBasketData()
    {
        $data = [];
        $userBasket = self::getUserBasket();
        if ($userBasket) {
            $data['products'] = [];
            $data['totals'] = 0;
            $data['products_count'] = 0;
            $data['currency'] = ThemeHelper::getCurrency();
            foreach ($userBasket as $key => $item) {
                $product = Products::findOne($item['id']);
                if ($product) {
                    $description = $product->getProductsDescriptions()->one();
                    if ($product->type == 1) {
                        $price = ceil($item['count'] * ThemeHelper::priceCalculation($product->price, $product->action));
                    } else {
                        if ($item['count'] != 1) {
                            $pta = ProductsToAttributes::findOne($item['count']);
                            if ($pta)
                                $price = ceil(ThemeHelper::priceCalculation($pta->price, $product->action));
                            else
                                $price = ceil($item['count'] * ThemeHelper::priceCalculation($product->price, $product->action));
                        } else {
                            $price = ceil($item['count'] * ThemeHelper::priceCalculation($product->price, $product->action));
                        }
                    }

                    $data['totals'] += $price;
                    $data['products'][$key] = [
                        'id' => $product->id,
                        'slug' => $product->slug,
                        'type' => $product->type,
                        'title' => $description->title,
                        'image' => explode("|", $product->images)[0],
                        'attributes' => CatalogHelper::getSingleProductAttributes($product->id),
                        'count' => $item['count'],
                        'counts' => CatalogHelper::getProductCount($product->id, $product->type),
                        'price' => $price,
                    ];
                    $data['products_count'] += 1;
                }
            }
        }

        return $data;
    }

}
