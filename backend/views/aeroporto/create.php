<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Aeroporto $model */

$this->title = 'Create Aeroporto';
$this->params['breadcrumbs'][] = ['label' => 'Aeroportos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aeroporto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
