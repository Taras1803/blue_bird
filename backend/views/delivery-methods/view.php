<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */

$this->title = 'Способ доставки №' .$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Способы доставки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$userTime = \common\models\CurrentTime::getUserOffsetTime();
?>
<div class="box box-success" style="padding: 10px;">
    <div class="box-body">
        <div class="col-lg-8 col-lg-offset-2">

            <p class="pull-right">
                <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'slug',
                    'title_ru',
                    'title_uk',
                    'descriptio_ru',
                    'descriptio_uk',

                ],
            ]) ?>

        </div>
    </div>
</div>

