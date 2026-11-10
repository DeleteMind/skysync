<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Utilizadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
                [
                        'attribute' => 'status', // Diz ao Yii que é sobre a coluna status do model que queremos mexer
                        'value' => function ($model) {
        
                                return $model->status == User::STATUS_ACTIVE ? 'Ativo' : 'Inativo';
                        },
                        'filterInputOptions' => ['class' => 'form-control', 'prompt' => 'Todos'], // primeira opção da lista: mostra todos

                        'filter' => [ // o Yii transforma a caixa de cima numa lista para escolher entre os três estados

                                User::STATUS_ACTIVE   => 'Ativo',
                                User::STATUS_INACTIVE => 'Inativo',

                        ],

                ],
            //'created_at',
            //'updated_at',
            //'verification_token',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
