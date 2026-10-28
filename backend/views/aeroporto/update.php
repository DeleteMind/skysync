<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Aeroporto $model */

$this->title = 'Update Aeroporto: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aeroportos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aeroporto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
