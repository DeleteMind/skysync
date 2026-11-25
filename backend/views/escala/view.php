<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Escala $model */

$this->title = "Voo: " . $model->voo->numero;
$this->params['breadcrumbs'][] = ['label' => 'Escalas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="escala-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'voo.numero:text:Número do Voo',
            'aeroporto.nome:text:Aeroporto',
            'ordem',
            'hora_partida',
            'hora_chegada',
        ],
    ]) ?>

</div>
