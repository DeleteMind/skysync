<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Escala $model */

$this->title = 'Create Escala';
$this->params['breadcrumbs'][] = ['label' => 'Escalas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escala-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
