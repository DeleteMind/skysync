<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\BilheteSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bilhete-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'passageiro_id') ?>

    <?= $form->field($model, 'voo_id') ?>

    <?= $form->field($model, 'preco_total') ?>

    <?php // echo $form->field($model, 'check_in') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'data_compra') ?>

    <?php // echo $form->field($model, 'data_check_in') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
