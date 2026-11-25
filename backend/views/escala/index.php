<?php

use common\models\Escala;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\EscalaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Escalas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escala-index">



    <p>
        <?= Html::a('Criar Escala', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'voo_numero',
                'label' => 'Número do Voo',
                'value' => 'voo.numero',        // relacao getVoo do model + atributo numero
            ],
            [
                'attribute' => 'aeroporto_nome',
                'label' => 'Aeroporto',
                'value' => 'aeroporto.nome',
            ],
            'ordem',
            [
                    'attribute' => 'hora_partida',
                    'filter' => false,
            ],
            [
                'attribute' => 'hora_chegada',
                'filter' => false,  // retira a caixa de procura
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Escala $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
