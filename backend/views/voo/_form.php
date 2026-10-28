<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use common\models\Aviao;
use common\models\Aeroporto;

/** @var yii\web\View $this */
/** @var common\models\Voo $model */
/** @var common\models\Aviao $model */
/** @var common\models\Aeroporto $model */
/** @var yii\widgets\ActiveForm $form */

    $avioes = ArrayHelper::map(Aviao::find()->where(['estado' => 'ativo'])->all(), 'id',
        fn($a) => $a->matricula . ' — ' . $a->modelo);


    $aeroportos = ArrayHelper::map(
        Aeroporto::find()->where(['not', ['codigo_iata' => null]])->orderBy('nome')->all(), 'id',
        fn($a) => $a->codigo_iata . ' — ' . $a->nome);

?>

<div class="voo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aviao_id')->dropDownList($avioes, ['prompt' => 'Escolha o avião']) ?>

    <?= $form->field($model, 'aeroporto_origem_id')->dropDownList($aeroportos, ['prompt' =>  'Origem']) ?>

    <?= $form->field($model, 'aeroporto_destino_id')->dropDownList($aeroportos, ['prompt' => 'Destino']) ?>

    <?= $form->field($model, 'hora_partida')->textInput(['placeholder' => 'AAAA-MM-DD HH:MM:SS']) ?>

    <?= $form->field($model, 'hora_chegada')->textInput(['placeholder' => 'AAAA-MM-DD HH:MM:SS']) ?>

    <?= $form->field($model, 'hora_partida_prevista')->textInput(['placeholder' => 'AAAA-MM-DD HH:MM:SS']) ?>

    <?= $form->field($model, 'hora_chegada_prevista')->textInput(['placeholder' => 'AAAA-MM-DD HH:MM:SS']) ?>

    <?= $form->field($model, 'preco_base')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList([
            'agendado' => 'Agendado', 'embarque' => 'Embarque', 'partiu' => 'Partiu',
            'aterrou' => 'Aterrou', 'atrasado' => 'Atrasado', 'cancelado' => 'Cancelado',
    ]) ?>

    <?= $form->field($model, 'porta_embarque')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
