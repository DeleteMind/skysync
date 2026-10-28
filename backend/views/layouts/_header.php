<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use common\models\Aviao;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;

$user = Yii::$app->user;

$items = [
    [
        'label' => 'Home',
        'url' => ['/site/index'],
    ],
    [
        'label' => 'Login',
        'url' => ['/site/login'],
        'visible' => Yii::$app->user->isGuest,
    ],

    // operacoes gestor/admin
    [
        'label' => 'Aviões',
        'url' => ['/aviao/index'],
        'visible' => $user->can('gerirAvioes'),
    ],
    [
        'label' => 'Bilhetes',
        'url' => ['/bilhete/index'],
        'visible' => $user->can('verBilhetesVoo'),
    ],
    [
        'label' => 'Voos',
        'url' => ['/voo/index'],
        'visible' => $user->can('gerirVoos'),
    ],
    [
        'label' => 'Escalas',
        'url' => ['/escala/index'],
        'visible' => $user->can('gerirEscalas'),
    ],
    [
        'label' => 'Aeroportos',
        'url' => ['/aeroporto/index'],
        'visible' => $user->can('gerirAeroportos'),
    ],
    [
        'label' => 'Bagagem',
        'url' => ['/bagagem/index'],
        'visible' => $user->can('gerirBagagem'),
    ],

    // operacoes admin
    [
        'label' => 'Companhia Aerea',
        'url' => ['/companhia-aerea/index'],
        'visible' => $user->can('gerirCompanhias'),
    ],
    [
        'label' => 'Tipo Bagagem',
        'url' => ['/tipo-bagagem/index'],
        'visible' => $user->can('gerirTiposBagagem'),
    ],

    [
        'label' => 'Logout (' . Html::encode(Yii::$app->user->identity?->username) . ')',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post',
            'class' => 'logout',
        ],
        'visible' => !Yii::$app->user->isGuest,
    ],
];
?>
<header id="header">
    <?php NavBar::begin(
        [
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
        ],
    ) ?>
    <?= Nav::widget(
        [
            'options' => ['class' => 'navbar-nav me-auto'],
            'encodeLabels' => false,
            'items' => $items,
        ],
    ) ?>
    <?= Html::button(
        '&#127769;',
        [
            'id' => 'theme-toggle',
            'class' => 'btn btn-link nav-link fs-5',
            'aria-label' => 'Switch to dark mode',
        ],
    ) ?>
    <?php NavBar::end() ?>
</header>
