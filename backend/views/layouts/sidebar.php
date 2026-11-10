<?php

use yii\helpers\Html;


$user = Yii::$app->user;


$logo = '<span class="logo-mark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 15c3-1 6-1 9 0s6 1 9 0"></path><path d="M8 11l3-7 2 1-1 6 5 1 2-2 1.5.5-1 3.5"></path></svg></span>SkySync';

?>



<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Yii::$app->homeUrl ?>" class="brand-link d-flex align-items-center">
        <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 10px 0 6px; flex-shrink:0;">
            <path d="M3 15c3-1 6-1 9 0s6 1 9 0"></path>
            <path d="M8 11l3-7 2 1-1 6 5 1 2-2 1.5.5-1 3.5"></path>
        </svg>
        <span class="brand-text font-weight-bold">SkySync</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <span class="d-block text-light"> <?= Yii::$app->user->identity->username ?> </span>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [

                    ['label' => 'Aeroportos', 'icon' => 'map-marker-alt', 'url' => ['/debug'], 'visible' => $user->can('gestor')],
                    //['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Companhias Aéreas', 'icon' => 'building', 'url' => ['/debug'], 'visible' => $user->can('admin')],
                    ['label' => 'Aviões',  'icon' => 'plane', 'url' => ['/aviao/index'], 'visible' => $user->can('gestor')],
                    ['label' => 'Voos', 'icon' => 'plane-departure', 'url' => ['/debug'], 'visible' => $user->can('gestor')],
                    ['label' => 'Escalas', 'icon' => 'route', 'url' => ['/debug'], 'visible' => $user->can('gestor')],
                    ['label' => 'Bilhetes', 'icon' => 'ticket-alt', 'url' => ['/debug'], 'visible' => $user->can('gestor')],
                    ['label' => 'Bagagens', 'icon' => 'suitcase-rolling', 'url' => ['/debug'], 'visible' => $user->can('gestor')],
                    ['label' => 'Tipos de Bagagem', 'icon' => 'tags', 'url' => ['/debug'], 'visible' => $user->can('admin')],
                    ['label' => 'Utilizadores', 'icon' => 'users', 'url' => ['/user/index'], 'visible' => $user->can('admin')],



                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>