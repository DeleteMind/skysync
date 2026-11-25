<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Bagagem $model */

$this->title = "Bagagem do bilhete: " . $model->bilhete->numero;
$this->params['breadcrumbs'][] = ['label' => 'Bagagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Editar';

?>
<div class="bagagem-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
