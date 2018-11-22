<?php

namespace frontend\components;

use common\models\Lang;
use common\models\Options;
use Yii;
use \yii\helpers\Url;

class PaymentHelper
{
    static function getPaymentMethods()
    {
        return [
            'cod' => [
                'slug' => 'cod',
                'title' => Yii::t('main', 'payment_method_cod'),
                'name' => 'Наложенный платеж',
            ],
            'card_transfer' => [
                'slug' => 'card_transfer',
                'title' => Yii::t('main', 'card_transfer'),
                'name' => 'Перевод на карту',
            ],
        ];
    }

    static function liqPay($order_id, $amount, $currency_code)
    {
        $options = Options::getAllOptions();
        $public_key = $options['liqpay_public_key'];
        $private_key = $options['liqpay_private_key'];
        $return_url = Url::to(['/successful', 'status' => 'completed'], true);
        $server_url = Url::home(true) . 'actions/liqpay-listener';
        $data = [
            'version' => '3',
            'action' => 'pay',
            'amount' => $amount,
            'public_key' => $public_key,
            'currency' => $currency_code,     //'EUR','UAH','USD','RUB','RUR'
            'description' => 'Payment on the Bluebird.com.ua',
            'order_id' => $order_id . '_' . time(),
            'sandbox' => $options['liqpay_mode'],
            'language' => Lang::getCurrent()->url,
            'server_url' => $server_url,
            'result_url' => $return_url
        ];

        $action = 'https://www.liqpay.com/api/3/checkout';
        $data_encode = base64_encode(json_encode($data));
        $signature = base64_encode(sha1($private_key . $data_encode . $private_key, 1));

        return sprintf('
                <form method="POST" accept-charset="utf-8" action="%s">
                    <input type="hidden" name="data" value="%s" />
                    <input type="hidden" name="signature" value="%s" />
                    <input type="submit" class="btn btn--blue" value="LiqPay">
                </form>',
            $action,
            $data_encode,
            $signature
        );
    }

    static function checkoutForm($order_id, $status)
    {
        $action = Url::to(['/successful', 'status' => 'completed']);
        $data = [
            'order_id' => $order_id,
            'status' => $status,
        ];

        $data_encode = base64_encode(json_encode($data));

        return sprintf('
                <form method="POST" accept-charset="utf-8" action="%s">
                    <input type="hidden" name="checkoutData" value="%s" />
                    <input type="submit" class="btn btn--black" value="%s">
                </form>',
            $action,
            $data_encode,
            Yii::t('main', 'checkout')
        );
    }

    static function getFormBySlug($slug, $params)
    {
        if($slug == 'cod')
            return self::checkoutForm($params['order_id'], $params['status']);
        else if ($slug == 'card_transfer')
            return self::liqPay($params['order_id'], $params['amount'], $params['currency_code']);
    }

    public static function liqpayListener()
    {
        $postData = Yii::$app->request->post('data', []);
        if ($postData) {
            $decodeData = base64_decode($postData);
            $json = json_decode($decodeData);
            if ($json->status == 'success' || $json->status == 'sandbox') {
                $order_id = explode('_', $json->order_id);
                return OrdersHelper::saveOrder((int)$order_id[0], [
                    'status' => 1,
                    'payment_information' => [
                        [
                            'name' => 'Статус оплаты',
                            'value' => $json->status,
                        ],
                        [
                            'name' => 'ID платежа',
                            'value' => $json->payment_id,
                        ],
                        [
                            'name' => 'Тип оплаты',
                            'value' => $json->paytype,
                        ],
                        [
                            'name' => 'Сумма',
                            'value' => $json->amount . ' ' . $json->currency,
                        ]
                    ]
                ]);
            } else
                return false;
        } else
            return false;
    }

    static function prepareFormData($data)
    {
        $decodeData = base64_decode($data);
        $json = json_decode($decodeData);

        if($json->order_id && $json->status){
            return OrdersHelper::saveOrder($json->order_id, [
                'status' => 2,
                'payment_information' => []
            ]);
        }
    }
}