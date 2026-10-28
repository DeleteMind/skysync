<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\CompanhiaAerea;

/** @var yii\web\View $this */
/** @var common\models\Aviao $model */
/** @var yii\widgets\ActiveForm $form */

$companhias = ArrayHelper::map(CompanhiaAerea::find()->orderBy('nome')->all(), 'id', 'nome');
?>


<div class="aviao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capacidade')->textInput() ?>


    <?= $form->field($model, 'companhia_aerea_id')->dropDownList($companhias, ['prompt' => 'Escolha a companhia']) ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'ativo' => 'Ativo', 'manutencao' => 'Em manutenção', 'inativo' => 'Inativo', ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
