<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Escala $model */

$this->title = 'Update Escala: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Escalas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="escala-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
