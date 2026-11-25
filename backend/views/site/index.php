<?php

use common\models\CompanhiaAerea;
use common\models\User;
use common\models\Aeroporto;
use common\models\Voo;
use common\models\Bilhete;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;


$this->title = 'Administração';
$this->params['breadcrumbs'] = [['label' => $this->title]];

?>
<div class="container-fluid">



    <div class="row">
        <div class="col-12">
            <h3>Bem vindo, <?= $username ?>!</h3>
        </div>
    </div>

    <!-- Pessoas -->
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Utilizadores do Sistema',
                    'number' => $totalUsersCount,
                    'icon' => 'fas fa-users',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Gestores Operacionais',
                    'number' => $gestoresCount,
                    'theme' => 'success',
                    'icon' => 'fas fa-user-tie',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Passageiros',
                    'number' => $passageirosCount,
                    'theme' => 'info',
                    'icon' => 'fas fa-user',
            ]) ?>
        </div>
    </div>

    <!-- Operação -->
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Companhias Aéreas',
                    'number' => $companhiasCount,
                    'icon' => 'fas fa-plane',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Voos',
                    'number' => $voosCount,
                    'theme' => 'warning',
                    'icon' => 'fas fa-plane-departure',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                    'text' => 'Bilhetes Vendidos',
                    'number' => $bilhetesCount,
                    'theme' => 'danger',
                    'icon' => 'fas fa-ticket-alt',
            ]) ?>
        </div>

    </div>

    <h3>Voos</h3>

    <div class="card mb-3">
        <div class="card-body">

            <?= Html::beginForm(['index'], 'get', ['class' => 'd-flex justify-content-between align-items-end']) ?>
            <div>
                <label for="data" class="form-label mb-1">Data de partida</label>
                <input type="date" id="data" name="data" value="<?= $data ?>" class="form-control">
            </div>

            <div class="d-flex" style="gap: 15px;">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <?= Html::a('Limpar', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
            </div>

            <?= Html::endForm() ?>
        </div>
    </div>
    
    <table class="table table-striped">

        <?php if (empty($voos)): ?>
            <tr><td colspan="6">Sem voos com a data escolhida</td></tr>

        <?php else: ?>
        <tr>
            <th>Voo</th>
            <th>Origem</th>
            <th>Destino</th>
            <th>Partida</th>
            <th>Chegada</th>
            <th>Estado</th>
        </tr>

        <?php foreach ($voos as $voo): ?>
            <tr>
                <td><?= $voo->numero ?></td>
                <td><?= $voo->aeroportoDestino->nome ?></td>
                <td><?= $voo->aeroportoOrigem->nome ?></td>
                <td><?= $voo->hora_partida ?></td>
                <td><?= $voo->hora_chegada ?></td>
                <td><?= $voo->estado ?></td>
            </tr>
        <?php endforeach; ?>

        <?php endif; ?>

    </table>

</div>