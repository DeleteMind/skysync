<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\User $model */


$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="user-view">

    <h1><?= Html::encode($model->username) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            'created_at:datetime:Criado em',
            // Usar um operador ternario e o admin só pode ver os ativos e inativos
            [
                'attribute' => 'status',
                'value' => [User::STATUS_ACTIVE => 'Ativo',
                            User::STATUS_INACTIVE => 'Inativo',
                            User::STATUS_DELETED => 'Apagado']
                            [$model->status] ?? $model->status,
            ],
            'passageiro.nome',    //chama automaticamente o metodo getPassageiro() que faz a relacao entre as duas tabelas (common/models/user)
            'passageiro.tipo_documento',
            'passageiro.numero_documento:text:Número Documento',
            'passageiro.nacionalidade',
            'passageiro.contacto',
        ],

    ]) ?>

</div>







<!--<p>-->
<!--    --><?php //= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--    --><?php //= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                    'confirm' => 'Are you sure you want to delete this item?',
//                    'method' => 'post',
//            ],
//    ]) ?>
<!--</p>-->
