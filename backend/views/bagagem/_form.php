<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Bagagem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bagagem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bilhete_id')->textInput() ?>

    <?= $form->field($model, 'tipo_bagagem_id')->textInput() ?>

    <?= $form->field($model, 'peso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
