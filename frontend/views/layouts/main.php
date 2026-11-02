<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\helpers\Html;

$this->render('_head');
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100" data-bs-theme="light">
    <head>
        <!-- Template SkySync: aplica o tema guardado antes de a página aparecer (evita "piscar") -->
        <script>try{var t=localStorage.getItem("sky-theme");if(t)document.documentElement.dataset.theme=t}catch(e){}</script>
        <?php $this->head() ?>
        <title><?= Html::encode($this->title ? $this->title . ' — SkySync' : 'SkySync') ?></title>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <?= $this->render('_header') ?>

    <main id="main" class="flex-grow-1" role="main" style="padding: 32px 0 64px;">
        <div class="container">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <?= $this->render('_footer') ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>