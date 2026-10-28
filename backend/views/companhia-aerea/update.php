<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CompanhiaAerea $model */

$this->title = 'Update Companhia Aerea: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Companhia Aereas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="companhia-aerea-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
