<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Bilhete $model */

$this->title = 'Create Bilhete';
$this->params['breadcrumbs'][] = ['label' => 'Bilhetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bilhete-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
