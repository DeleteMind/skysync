<?php

/** @var yii\web\View $this */
/** @var frontend\models\SignupForm $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Criar conta';

// Os campos do passageiro só aparecem se o SignupForm já os tiver (Turno 9)
$temPassageiro = $model->hasProperty('nome');
?>
<!-- RF-FO-06 + RF-FO-10 -->
<h1><?= Html::encode($this->title) ?></h1>
<p class="muted" style="margin: 8px 0 28px">Leva menos de um minuto.</p>

<?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'options' => ['class' => 'form-grid'],
        'errorCssClass' => 'error',
        'fieldConfig' => [
                'options' => ['class' => 'field'],
                'inputOptions' => ['class' => 'input'],
                'errorOptions' => ['class' => 'field-msg'],
        ],
]); ?>

<?php if ($temPassageiro): ?>
    <?= $form->field($model, 'nome', ['options' => ['class' => 'field full']])
            ->textInput(['placeholder' => 'Como aparece no documento'])->label('Nome completo') ?>

    <?= $form->field($model, 'tipo_documento')->dropDownList([
            'cc' => 'Cartão de Cidadão',
            'passaporte' => 'Passaporte',
            'outro' => 'Outro',
    ], ['class' => 'select', 'prompt' => 'Escolha...'])->label('Tipo de documento') ?>

    <?= $form->field($model, 'numero_documento')->textInput(['placeholder' => 'P1234567'])->label('Nº documento') ?>

    <?= $form->field($model, 'nacionalidade')->label('Nacionalidade') ?>

    <?= $form->field($model, 'contacto')->textInput(['placeholder' => '+351 912 345 678'])->label('Contacto') ?>
<?php endif ?>

<?= $form->field($model, 'username', ['options' => ['class' => 'field full']])->label('Utilizador') ?>

<?= $form->field($model, 'email', ['options' => ['class' => 'field full']])
        ->input('email', ['placeholder' => 'nome@email.com'])->label('Email') ?>

<?= $form->field($model, 'password', ['options' => ['class' => 'field full']])
        ->passwordInput(['placeholder' => 'Mínimo 8 caracteres'])->label('Palavra-passe') ?>

<?= Html::submitButton('Criar conta', ['class' => 'btn btn-primary btn-lg btn-block full', 'name' => 'signup-button']) ?>

<?php ActiveForm::end(); ?>

<p class="small muted" style="text-align: center; margin-top: 24px">
    Já tem conta? <?= Html::a('Entrar', ['site/login'], ['style' => 'color: var(--ink); font-weight: 600']) ?>
</p>
