<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Categories */

$this->title = 'Категория №' . $model->id;
if($model->parent == 0)
    $this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
else
    $this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index', 'parent_id' => $model->parent]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success" style="padding: 10px;">
    <div class="box-body">
        <div class="col-lg-8 col-lg-offset-2">

            <p class="pull-right">
                <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <div class="clearfix"></div>

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <?php foreach ($langs as $key => $item): ?>
                        <li class="<?= ($key == 0) ? 'active' : '' ?>">
                            <a href="#tab_<?= $key ?>" data-toggle="tab"><?= $item->name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="tab-content">
                    <?php foreach ($langs as $key => $item): ?>
                        <div class="tab-pane <?= ($key == 0) ? 'active' : '' ?>" id="tab_<?= $key ?>">
                            <p><h3 style="text-align: center;"><?= $descriptions[$key]->name ?></h3></p>
                            <p><b>Описание: </b> <br><?= $descriptions[$key]->description ?></p>
                            <p><b>Meta Заголовок: </b> <br><?= $descriptions[$key]->meta_title ?></p>
                            <p><b>Meta описание: </b> <br><?= $descriptions[$key]->meta_description ?></p>
                            <p><b>Meta Ключевые слова: </b> <br><?= $descriptions[$key]->meta_keywords ?></p>
                        </div>
                        <!-- /.tab-pane -->
                    <?php endforeach; ?>
                </div>
            </div>

            <table id="w0" class="table table-striped table-bordered detail-view">
                <tbody>
                <tr>
                    <th>Ссылка</th>
                    <td><?= $model->slug ?></td>
                </tr>
                <tr>
                    <th>Родительская</th>
                    <td><?= $model->getParent() ?></td>
                </tr>
                <tr>
                    <th>Порядок сортировки</th>
                    <td><?= $model->sort ?></td>
                </tr>
                <tr>
                    <th>Статус</th>
                    <td><?= $model::getStatus()[$model->status] ?></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
