<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Voo;
use common\models\Aeroporto;

/** @var yii\web\View $this */
/** @var common\models\Escala $model */
/** @var common\models\Voo $model */
/** @var common\models\Aeroporto $model */
/** @var yii\widgets\ActiveForm $form */

    $voos = ArrayHelper::map(Voo::find()->orderBy('hora_partida')->all(), 'id',
            fn($v) => $v->numero . ' — ' . $v->hora_partida);
    $aeroportos = ArrayHelper::map(
            Aeroporto::find()->where(['not', ['codigo_iata' => null]])->orderBy('nome')->all(), 'id',
            fn($a) => $a->codigo_iata . ' — ' . $a->nome);
    ?>

<div class="escala-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php if($model->isNewRecord): ?>
        <?= $form->field($model, 'voo_id')
            ->dropDownList($voos, ['prompt' => 'Escolha o voo'])
        ->label('Voo') ?>
    <?php endif; ?>


    <?= $form->field($model, 'aeroporto_id')
            ->dropDownList($aeroportos, ['prompt' => 'Escolha o Aeroporto'])
            ->label('Aeroporto') ?>


    <?= $form->field($model, 'ordem')
            ->textInput() ?>


    <?= $form->field($model, 'hora_partida')
            ->input('datetime-local') ?>


    <?= $form->field($model, 'hora_chegada')
            ->input('datetime-local') ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
