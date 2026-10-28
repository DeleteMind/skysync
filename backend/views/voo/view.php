<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Voo $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Voos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="voo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'numero',
            'aviao_id',
            'aeroporto_origem_id',
            'aeroporto_destino_id',
            'hora_partida',
            'hora_chegada',
            'hora_partida_prevista',
            'hora_chegada_prevista',
            'preco_base',
            'estado',
            'porta_embarque',
        ],
    ]) ?>

</div>
