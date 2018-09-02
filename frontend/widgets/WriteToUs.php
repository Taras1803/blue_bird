<?php
/**
 * Created by PhpStorm.
 * User: Taras
 * Date: 28.08.2018
 * Time: 17:16
 */

namespace frontend\widgets;


use yii\bootstrap\Widget;

class WriteToUs extends Widget
{
    public function init()
    {
    }

    public function run()
    {
        return $this->render('write-to-us/view', [

        ]);
    }
}