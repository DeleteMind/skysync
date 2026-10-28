<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\BagagemSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bagagem-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bilhete_id') ?>

    <?= $form->field($model, 'tipo_bagagem_id') ?>

    <?= $form->field($model, 'peso') ?>

    <?= $form->field($model, 'preco') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
