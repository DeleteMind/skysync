<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\VooSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="voo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'aviao_id') ?>

    <?= $form->field($model, 'aeroporto_origem_id') ?>

    <?= $form->field($model, 'aeroporto_destino_id') ?>

    <?php // echo $form->field($model, 'hora_partida') ?>

    <?php // echo $form->field($model, 'hora_chegada') ?>

    <?php // echo $form->field($model, 'hora_partida_prevista') ?>

    <?php // echo $form->field($model, 'hora_chegada_prevista') ?>

    <?php // echo $form->field($model, 'preco_base') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'porta_embarque') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
