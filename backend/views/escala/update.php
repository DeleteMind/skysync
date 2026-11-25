<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Escala $model */

$this->title = "Voo: " . $model->voo->numero;
$this->params['breadcrumbs'][] = ['label' => 'Escalas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="escala-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
