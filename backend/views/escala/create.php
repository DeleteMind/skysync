<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Escala $model */

$this->title = 'Criar Escala';
$this->params['breadcrumbs'][] = ['label' => 'Escalas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escala-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
