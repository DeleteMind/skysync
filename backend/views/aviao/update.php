<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Aviao $model */

$this->title = 'Update Aviao: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aviaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aviao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
