<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Bilhete $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bilhete-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passageiro_id')->textInput() ?>

    <?= $form->field($model, 'voo_id')->textInput() ?>

    <?= $form->field($model, 'preco_total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'check_in')->textInput() ?>

    <?= $form->field($model, 'estado')->dropDownList(['reservado' => 'Reservado', 'pago' => 'Pago', 'cancelado' => 'Cancelado', 'utilizado' => 'Utilizado',]) ?>

    <?= $form->field($model, 'data_compra')->textInput() ?>

    <?= $form->field($model, 'data_check_in')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
