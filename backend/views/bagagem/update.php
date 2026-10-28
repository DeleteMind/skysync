<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Bagagem $model */

$this->title = 'Update Bagagem: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bagagems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bagagem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
