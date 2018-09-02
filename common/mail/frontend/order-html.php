<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$site_name = Yii::$app->params['site_name'];
$site_url = Yii::$app->params['siteUrl'];
$image_url = $site_url . '/uploads/products/';
$site_logo = $site_url . Yii::$app->params['siteLogo'];

?>

<style>
    ul{
        list-style: none;
    }
    /****** responsive ********/
    @media only screen and (max-width: 300px) {
        body {
            width: 218px !important;
            margin: auto !important;
        }

        .table {
            width: 195px !important;
            margin: auto !important;
        }

        .logo, .titleblock, .linkbelow, .box, .footer, .space_footer {
            width: auto !important;
            display: block !important;
        }

        span.title {
            font-size: 20px !important;
            line-height: 23px !important
        }

        span.subtitle {
            font-size: 14px !important;
            line-height: 18px !important;
            padding-top: 10px !important;
            display: block !important;
        }

        td.box p {
            font-size: 12px !important;
            font-weight: bold !important;
        }

        .table-recap table, .table-recap thead, .table-recap tbody, .table-recap th, .table-recap td, .table-recap tr {
            display: block !important;
        }

        .table-recap {
            width: 200px !important;
        }

        .table-recap tr td, .conf_body td {
            text-align: center !important;
        }

        .address {
            display: block !important;
            margin-bottom: 10px !important;
        }

        .space_address {
            display: none !important;
        }
    }

    @media only screen and (min-width: 301px) and (max-width: 500px) {
        body {
            width: 308px !important;
            margin: auto !important;
        }

        .table {
            width: 285px !important;
            margin: auto !important;
        }

        .logo, .titleblock, .linkbelow, .box, .footer, .space_footer {
            width: auto !important;
            display: block !important;
        }

        .table-recap table, .table-recap thead, .table-recap tbody, .table-recap th, .table-recap td, .table-recap tr {
            display: block !important;
        }

        .table-recap {
            width: 293px !important;
        }

        .table-recap tr td, .conf_body td {
            text-align: center !important;
        }

    }

    @media only screen and (min-width: 501px) and (max-width: 768px) {
        body {
            width: 478px !important;
            margin: auto !important;
        }

        .table {
            width: 450px !important;
            margin: auto !important;
        }

        .logo, .titleblock, .linkbelow, .box, .footer, .space_footer {
            width: auto !important;
            display: block !important;
        }
    }

    /* Mobile */

    @media only screen and (max-device-width: 480px) {
        body {
            width: 308px !important;
            margin: auto !important;
        }

        .table {
            width: 285px;
            margin: auto !important;
        }

        .logo, .titleblock, .linkbelow, .box, .footer, .space_footer {
            width: auto !important;
            display: block !important;
        }

        .table-recap {
            width: 285px !important;
        }

        .table-recap tr td, .conf_body td {
            text-align: center !important;
        }

        .address {
            display: block !important;
            margin-bottom: 10px !important;
        }

        .space_address {
            display: none !important;
        }
    }
</style>

<body style="background-color:#fff;width:650px;font-family:Open-sans, sans-serif;color:#555454;font-size:13px;line-height:18px;margin:auto">
<?php $this->beginBody() ?>
<table class="table table-mail"
       style="width:100%;margin-top:10px;-moz-box-shadow:0 0 5px #afafaf;-webkit-box-shadow:0 0 5px #afafaf;-o-box-shadow:0 0 5px #afafaf;box-shadow:0 0 5px #afafaf;filter:progid:DXImageTransform.Microsoft.Shadow(color=#afafaf,Direction=134,Strength=5)">
    <tr>
        <td class="space" style="width:20px;border:none;padding:7px 0">&nbsp;</td>
        <td align="center" style="border:none;padding:7px 0">
            <table class="table" style="width:100%;background-color:#fff">
                <tr>
                    <td align="center" class="logo" style="border-bottom:4px solid #333333;padding:7px 0">
                        <a title="<?= $site_name ?>" href="<?= $site_url ?>" style="color:#337ff1">
                            <img src="<?= $site_logo ?>" style="width: 430px;" alt="<?= $site_name ?>"/>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td align="center" class="titleblock" style="border:none;padding:7px 0">
                        <span class="title"
                              style="font-weight:500;font-size:28px;text-transform:uppercase;line-height:33px"><?= Yii::t('mail', 'thank_u_f_shopping') ?> <?= $site_name ?>!
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="linkbelow" style="border:none;padding:7px 0">
                        <span><?= Yii::t('mail', 'dear') ?> <?= $data['user_name'] ?> (<?= $data['user_email'] ?>) <?= Yii::t('mail', 'below_is_some') ?></span>
                    </td>
                </tr>
                <tr>
                    <td class="space_footer" style="padding:0!important;border:none">&nbsp;</td>
                </tr>
                <tr>
                    <td class="box" colspan="3"
                        style="background-color:#fbfbfb;border:1px solid #d6d4d4!important;padding:10px!important">
                        <p style="margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;border-bottom:1px solid #d6d4d4!important;padding-bottom:10px">
                            <?= Yii::t('mail', 'order_details') ?>
                        </p>
                        <span style="color:#777">
			                <span style="color:#333">
                                <strong><?= Yii::t('mail', 'order') ?> #:</strong>
                            </span> <?= $data['order_id'] ?> <?= Yii::t('mail', 'placed_on') ?> <?= $data['orderDate'] ?>
                            <br/>
			                <span style="color:#333">
                                <strong><?= Yii::t('mail', 'order_status') ?>:</strong>
                            </span> <?= $data['order_status'] ?>
                            <br>
                            <span style="color:#333">
                                <strong><?= Yii::t('mail', 'delivery_method') ?>:</strong>
                            </span> <?= $data['deliveryMethod'] ?>
		                </span>
                    </td>
                </tr>
                <tr>
                    <td style="border:none;padding:7px 0">
                        <table class="table table-recap" bgcolor="#ffffff" style="width:100%;background-color:#fff">
                            <!-- Title -->
                            <thead>
                            <tr>
                                <th style="border:1px solid #DDD!important;background-color:#fbfbfb;font-family:Arial;color:#333;font-size:13px;padding:10px">
                                    <?= Yii::t('mail', 'image') ?>
                                </th>
                                <th style="border:1px solid #DDD!important;background-color:#fbfbfb;font-family:Arial;color:#333;font-size:13px;padding:10px">
                                    <?= Yii::t('mail', 'name') ?>
                                </th>
                                <th style="border:1px solid #DDD!important;background-color:#fbfbfb;font-family:Arial;color:#333;font-size:13px;padding:10px">
                                    <?= Yii::t('mail', 'quantity') ?>
                                </th>
                                <th style="border:1px solid #DDD!important;background-color:#fbfbfb;font-family:Arial;color:#333;font-size:13px;padding:10px">
                                    <?= Yii::t('mail', 'total_text') ?>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($data['products'] as $product): ?>
                                <tr class="conf_body">
                                    <td bgcolor="#fbfbfb" align="center"
                                        style="color:#333;padding:10px!important;border:1px solid #DDD!important">
                                        <img src="<?= $image_url . $product['image'] ?>" alt="image" style="width: 80px;">
                                    </td>
                                    <td bgcolor="#fbfbfb" align="center"
                                        style="color:#333;padding:10px!important;border:1px solid #DDD!important; font-size: 12px"">
                                        <a href="<?= $site_url . $product['link'] ?>" style="font-size: 16px""><?= $product['name'] ?></a>
                                        <br>
                                        <?php if($product['attributes']): ?>
                                            <?php foreach($product['attributes'] as $attr): ?>
                                                <?php if($attr['slug'] == 'color'): ?>
                                                    <strong><?= $attr['name'] ?>: </strong> <?= $attr['value_name'] ?>
                                                    <br>
                                                <?php else: ?>
                                                    <strong><?= $attr['name'] ?>: </strong><?= $attr['value'] ?>
                                                    <br>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td bgcolor="#fbfbfb" align="center"
                                        style="color:#333;padding:10px!important;border:1px solid #DDD!important">
                                        <?= $product['count'] ?>
                                    </td>
                                    <td bgcolor="#fbfbfb" align="right"
                                        style="color:#333;padding:10px!important;border:1px solid #DDD!important">
                                        <?= number_format($product['currency_price'] * $product['count']) ?><?= $data['currency'] ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <tr class="conf_body"></tr>

                            <?php foreach ($data['total_info'] as $key => $item): ?>
                                <?php if($key != 'total'): ?>
                                    <tr class="conf_body">
                                        <td bgcolor="#fbfbfb" align="right" colspan="3"
                                            style="color:#333;padding:10px!important;border:1px solid #DDD!important">
                                            <strong><?= Yii::t('mail', $key) ?></strong></td>
                                        <td bgcolor="#fbfbfb" align="right"
                                            style="color:#333;padding:10px!important;border:1px solid #DDD!important">
                                            <?= number_format($item['currencyPrice']) ?><?= $data['currency'] ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <tr class="conf_body">
                                <td bgcolor="#fbfbfb" align="right" colspan="3" class="total"
                                    style="color:#555454;padding:10px!important;border:1px solid #DDD!important;font-size:18px;font-weight:500;font-family:Open-sans, sans-serif">
                                    <strong><?= Yii::t('mail', 'total_text') ?></strong>
                                </td>
                                <td bgcolor="#fbfbfb" align="right" class="total_amount"
                                    style="color:#333;padding:10px!important;border:1px solid #DDD!important;font-size:21px;font-weight:500;font-family:Open-sans, sans-serif">
                                    <?= number_format($data['total_info']['total']['currencyPrice']) ?><?= $data['currency'] ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="space_footer" style="padding:0!important;border:none">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border:none;padding:7px 0">
                        <table class="table" style="width:100%;background-color:#fff">
                            <tr>
                                <td class="box address" width="310"
                                    style="background-color:#fbfbfb;border:1px solid #d6d4d4!important;padding:10px!important">
                                    <p style="margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;border-bottom:1px solid #d6d4d4!important;padding-bottom:10px"><?= Yii::t('mail', 'shipping_address') ?></p>
                                    <span style="color:#777">
						                <?= $data['company_address'] ?>
					                </span>
                                </td>
                                <td width="20" class="space_address" style="border:none;padding:7px 0">&nbsp;</td>
                                <td class="box address" width="310" style="background-color:#fbfbfb;border:1px solid #d6d4d4!important;padding:10px!important">
                                    <p style="margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;border-bottom:1px solid #d6d4d4!important;padding-bottom:10px">
                                        <?= Yii::t('mail', 'delivery_address') ?>
                                    </p>
                                    <span style="color:#777">
                                    <ul>
                                        <?php if($data['delivery_method_id'] == 1): ?>
                                            <li>&nbsp;</li>
                                            <li>&nbsp;</li>
                                            <li>&nbsp;</li>
                                            <li>&nbsp;</li>
                                        <?php elseif ($data['delivery_method_id'] == 2): ?>
                                            <li><?= $data['delivery_address']['first_name'] ?> <?= $data['delivery_address']['last_name'] ?></li>
                                            <li><?= Yii::t('mail', 'department_novaposhta') ?>: <?= $data['delivery_address']['novaposhta'] ?></li>
                                            <li><?= $data['delivery_address']['state'] ?>, <?= $data['delivery_address']['city'] ?></li>
                                            <li><?= $data['delivery_address']['country'] ?></li>
                                            <?php if ($data['delivery_address']['phone']): ?>
                                                <li><?= $data['delivery_address']['phone'] ?></li>
                                            <?php endif; ?>
                                        <?php elseif ($data['delivery_method_id'] == 3): ?>
                                            <li><?= $data['delivery_address']['first_name'] ?> <?= $data['delivery_address']['last_name'] ?></li>
                                            <li><?= $data['delivery_address']['address'] ?></li>
                                            <li><?= $data['delivery_address']['state'] ?>, <?= $data['delivery_address']['city'] ?></li>
                                            <li><?= $data['delivery_address']['country'] ?></li>
                                            <?php if ($data['delivery_address']['phone']): ?>
                                                <li><?= $data['delivery_address']['phone'] ?></li>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <li><?= $data['delivery_address']['first_name'] ?> <?= $data['delivery_address']['last_name'] ?></li>
                                            <li><?= $data['delivery_address']['address'] ?></li>
                                            <li><?= $data['delivery_address']['state'] ?>, <?= $data['delivery_address']['city'] ?>, <?= $data['delivery_address']['post_code'] ?></li>
                                            <li><?= $data['delivery_address']['country'] ?></li>
                                            <?php if ($data['delivery_address']['phone']): ?>
                                                <li><?= $data['delivery_address']['phone'] ?></li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                        </span>
                                </td>
                            </tr>
                            <?php if($data['delivery_address']['comment']): ?>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <strong><?= Yii::t('mail', 'comment') ?>:</strong> <?= $data['delivery_address']['comment'] ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="space_footer" style="padding:0!important;border:none">&nbsp;</td>
                </tr>

                <tr>
                    <td class="space_footer" style="padding:0!important;border:none">&nbsp;</td>
                </tr>
                <tr>
                    <td class="footer" style="border-top:4px solid #333333;padding:7px 0">
                    </td>
                </tr>
            </table>
        </td>
        <td class="space" style="width:20px;border:none;padding:7px 0">&nbsp;</td>
    </tr>
</table>
<?php $this->endBody() ?>
</body>
