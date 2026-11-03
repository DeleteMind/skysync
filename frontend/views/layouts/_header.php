<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;

$user = Yii::$app->user;

// Links do meio (como no template)
$items = [
        [
                'label' => 'Voos',
                'url' => ['/voo/index'],
        ],

        [
                'label' => 'Partidas & Chegadas',
                'url' => [''],
        ],
        [
                'label' => 'Check-In',
                'url' => [''],
        ],

        [
                'label' => 'Os meus bilhetes',
                'url' => ['/bilhete/index'],
                'visible' => !$user->isGuest,
        ],

];

// Botões da direita
$itemsDireita = [
        [
                'label' => 'Entrar',
                'url' => ['/site/login'],
                'visible' => $user->isGuest,
        ],
        [
                'label' => 'Criar conta',
                'url' => ['/site/signup'],
                'linkOptions' => ['class' => 'btn btn-primary btn-sm'],
                'visible' => $user->isGuest,
        ],
        [
                'label' => 'Terminar sessão (' . Html::encode($user->identity?->username) . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post'],
                'visible' => !$user->isGuest,
        ],
];

// Logótipo do template
$logo = '<span class="logo-mark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 15c3-1 6-1 9 0s6 1 9 0"></path><path d="M8 11l3-7 2 1-1 6 5 1 2-2 1.5.5-1 3.5"></path></svg></span>SkySync';
?>
<header id="header">
    <?php NavBar::begin([
            'brandLabel' => $logo,                          // logo do SkySync
            'brandUrl' => Yii::$app->homeUrl,               // ao clicar no logo, vai para a página inicial
            'brandOptions' => ['class' => 'logo'],          // classe do logo no template
            'options' => ['class' => 'site-header navbar-expand-md'],   // classe do header no template
            'innerContainerOptions' => ['class' => 'container'],
    ]) ?>

    <?= Nav::widget([
            'options' => ['class' => 'nav navbar-nav me-auto'],
            'encodeLabels' => false,
            'items' => $items,
    ]) ?>

    <?= Nav::widget([
            'options' => ['class' => 'navbar-nav header-actions'],
            'encodeLabels' => false,
            'items' => $itemsDireita,
    ]) ?>

    <?= Html::button('<i data-lucide="moon"></i>', [
            'class' => 'btn btn-text btn-icon btn-sm',
            'data-theme-toggle' => true,
            'aria-label' => 'Mudar tema',
    ]) ?>

    <?php NavBar::end() ?>
</header>