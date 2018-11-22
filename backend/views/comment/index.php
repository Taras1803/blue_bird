<?php

use common\models\CurrentTime;
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Comment;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Комментарий';
$this->params['breadcrumbs'][] = $this->title;
$userTime = CurrentTime::getUserOffsetTime();
?>

<div class="box box-success" style="padding: 10px;">
    <div class="box-body">
        <div class="page-content-index">

            <p class="pull-right">
                <?= Html::a('Добавить комментарий', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'user_id',
                        'format' => 'raw',
                        'value' => function ($searchModel) {
                            return $searchModel->user_id;
                        }
                    ],
                    [
                        'attribute' => 'user_name',
                        'format' => 'raw',
                        'value' => function ($searchModel) {
                            return $searchModel->user_name;
                        }
                    ],
                    [
                        'attribute' => 'item_id',
                        'format' => 'raw',
                        'value' => function ($searchModel) {
                            return $searchModel->item_id;
                        }
                    ],
                    [
                        'attribute' => 'item_type',
                        'format' => 'raw',
                        'value' => function ($searchModel) {
                            return $searchModel::getTypes()[$searchModel->item_type];
                        },
                        'filter' => Comment::getTypes()
                    ],
                    [
                        'attribute' => 'lang_id',
                        'format' => 'raw',
                        'value' => function ($searchModel) {
                            return $searchModel::getLangs()[$searchModel->lang_id];
                        },
                        'filter' => Comment::getLangs()
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function ($searchModel) {
                            return $searchModel::getStatus()[$searchModel->status];
                        },
                        'filter' => Comment::getStatus()
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => 'raw',
                        'value' => function ($searchModel) use ($userTime) {
                            return date("H:i d.m.Y", $searchModel->created_at + $userTime);
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{update}&nbsp;{view}',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>