<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Voo $model */

$this->title = 'Create Voo';
$this->params['breadcrumbs'][] = ['label' => 'Voos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="voo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
