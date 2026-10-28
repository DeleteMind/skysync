<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Bagagem $model */

$this->title = 'Create Bagagem';
$this->params['breadcrumbs'][] = ['label' => 'Bagagems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bagagem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
