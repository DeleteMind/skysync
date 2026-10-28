<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Bilhete $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bilhetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bilhete-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'numero',
            'passageiro_id',
            'voo_id',
            'preco_total',
            'check_in',
            'estado',
            'data_compra',
            'data_check_in',
        ],
    ]) ?>

</div>
