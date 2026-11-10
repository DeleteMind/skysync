<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\helpers\Html;

?>

<!-- FOOTER -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-grid d-flex justify-content-between w-100">
            <div>
                <a href="index.html" class="logo">
          <span class="logo-mark">
            <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
            >
              <path d="M3 15c3-1 6-1 9 0s6 1 9 0"></path>
              <path d="M8 11l3-7 2 1-1 6 5 1 2-2 1.5.5-1 3.5"></path>
            </svg>
          </span>
                    SkySync
                </a>
            </div>
            <?php
            $backendUrl = str_replace('/frontend/web', '/backend/web', Yii::$app->request->baseUrl);
            if (Yii::$app->user->can('acederBackend')): ?>
            <div>
                <h4>Administração</h4>
                <?= Html::a('Back-office', $backendUrl . '/index.php?r=site/login') ?>

                <!--<a href="../../backend/web/index/">Back-office</a>-->
            </div>
            <?php endif; ?>
        </div>
        <div class="footer-bottom">
            <span>© 2026 SkySync · Projeto PSI — TeSP PSI, Politécnico de Leiria</span>
        </div>
    </div>
</footer>


