<?php

/** @var yii\web\View $this */
/** @var common\models\LoginForm $model */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Entrar';
?>
<!-- RF-FO-07 -->
<h1>Bem-vindo de volta</h1>
<p class="muted" style="margin: 8px 0 28px">Entre para gerir os seus bilhetes.</p>

<?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'stack'],
        'errorCssClass' => 'error',
        'fieldConfig' => [
                'options' => ['class' => 'field'],
                'inputOptions' => ['class' => 'input'],
                'errorOptions' => ['class' => 'field-msg'],
        ],
]); ?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Utilizador') ?>

<?= $form->field($model, 'password')->passwordInput()->label('Palavra-passe') ?>

<?= $form->field($model, 'rememberMe', ['options' => ['class' => '']])
        ->checkbox(['class' => '', 'label' => 'Manter sessão iniciada', 'labelOptions' => ['class' => 'check']]) ?>

<?= Html::submitButton('Entrar', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>

<?php ActiveForm::end(); ?>

<p class="small" style="text-align: right; margin-top: 12px">
    <?= Html::a('Esqueceu-se da palavra-passe?', ['site/request-password-reset'], ['style' => 'color: var(--accent); font-weight: 600']) ?>
</p>

<div class="social-sep">ou</div>
<a href="<?= Url::to(['/pagina/checkin']) ?>" class="btn btn-ghost btn-lg btn-block">
    <i data-lucide="qr-code"></i>
    Fazer check-in sem conta
</a>

<p class="small muted" style="text-align: center; margin-top: 28px">
    Ainda não tem conta?
    <?= Html::a('Criar conta', ['site/signup'], ['style' => 'color: var(--ink); font-weight: 600']) ?>
</p>
