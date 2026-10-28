<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Aviao $model */

$this->title = 'Criar Avião';
$this->params['breadcrumbs'][] = ['label' => 'Aviões', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aviao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
