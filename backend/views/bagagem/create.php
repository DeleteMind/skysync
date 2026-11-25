<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Bagagem $model */

$this->title = 'Criar Bagagem';
$this->params['breadcrumbs'][] = ['label' => 'Bagagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bagagem-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
