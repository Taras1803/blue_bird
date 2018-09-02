<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'user_name')->textInput() ?>

    <?= $form->field($model, 'item_type')->dropDownList($model::getTypes()) ?>

    <?= $form->field($model, 'item_id')->textInput() ?>

    <?= $form->field($model, 'lang_id')->dropDownList($model::getLangs()) ?>

    <?= $form->field($model, 'status')->dropDownList($model::getStatus()) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 4]) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success pull-right']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
