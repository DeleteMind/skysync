<?php
namespace console\controllers;
use yii\console\Controller;
use common\models\Aeroporto;
use common\models\Aviao;
use common\models\Voo;
use common\models\Escala;
class SeedController extends Controller
{
    public function actionVoos()
    {
// Procurar pelo código IATA e pela matrícula, NUNCA pelo id
        $lis = Aeroporto::findOne(['codigo_iata' => 'LIS']);
        $opo = Aeroporto::findOne(['codigo_iata' => 'OPO']);
        $fnc = Aeroporto::findOne(['codigo_iata' => 'FNC']);
        $aviao = Aviao::findOne(['matricula' => 'CS-TNP']);
        if (!$lis || !$opo || !$fnc || !$aviao) {
            echo "Faltam dados. Corre primeiro: php yii migrate e php yii aeroporto/importar\n";
            return 1;
        }
        $amanha = date('Y-m-d', strtotime('+1 day'));
// Voo direto Lisboa -> Porto
        $voo1 = new Voo([
            'numero' => 'TP1940',
            'aviao_id' => $aviao->id,
            'aeroporto_origem_id' => $lis->id,
            'aeroporto_destino_id' => $opo->id,
            'hora_partida' => "$amanha 08:00:00",
            'hora_chegada' => "$amanha 09:00:00",
            'preco_base' => 49.99,
            'porta_embarque' => 'A12',
        ]);
        $voo1->save();
// Voo Porto -> Madeira com escala em Lisboa
        $voo2 = new Voo([
            'numero' => 'TP1700',
            'aviao_id' => $aviao->id,
            'aeroporto_origem_id' => $opo->id,
            'aeroporto_destino_id' => $fnc->id,
            'hora_partida' => "$amanha 10:00:00",
            'hora_chegada' => "$amanha 13:30:00",
            'preco_base' => 89.99,
        ]);
        $voo2->save();
        $escala = new Escala([
            'voo_id' => $voo2->id,
            'aeroporto_id' => $lis->id,
            'ordem' => 1,
            'hora_chegada' => "$amanha 11:00:00",
            'hora_partida' => "$amanha 11:45:00",
        ]);
        $escala->save();
        echo "Voos de teste criados.\n";
    }
}