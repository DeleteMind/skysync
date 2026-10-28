<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Bagagem $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bagagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bagagem-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'bilhete_id',
            'tipo_bagagem_id',
            'peso',
            'preco',
        ],
    ]) ?>

</div>
