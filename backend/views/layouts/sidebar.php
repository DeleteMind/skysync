<?php

use yii\helpers\Html;


$user = Yii::$app->user;

?>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block"> <?= Yii::$app->user->identity->username ?> </a>
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

                    ['label' => 'Aeroportos', 'icon' => 'th'],
                    //['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Companhias Aéreas', 'icon' => 'bug', 'url' => ['/debug'], 'visible' => $user->can('admin')],
                    ['label' => 'Aviões',  'icon' => 'file-code', 'url' => ['/aviao/index'], 'visible' => $user->can('gestor')],
                    ['label' => 'Voos', 'icon' => 'bug', 'url' => ['/debug'], 'visible' => $user->can('gestor')],
                    ['label' => 'Escalas', 'icon' => 'bug', 'url' => ['/debug'], 'visible' => $user->can('gestor')],
                    ['label' => 'Bilhetes', 'icon' => 'bug', 'url' => ['/debug'], 'visible' => $user->can('gestor')],
                    ['label' => 'Bagagens', 'icon' => 'bug', 'url' => ['/debug'], 'visible' => $user->can('gestor')],
                    ['label' => 'Tipos de Bagagem', 'icon' => 'bug', 'url' => ['/debug'], 'visible' => $user->can('admin')],
                    ['label' => 'Utilizadores', 'icon' => 'bug', 'url' => ['/user/index'], 'visible' => $user->can('admin')],



                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>