<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TipoBagagem $model */

$this->title = 'Create Tipo Bagagem';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Bagagems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-bagagem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
