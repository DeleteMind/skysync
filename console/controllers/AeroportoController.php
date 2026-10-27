<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\httpclient\Client;
use common\models\Aeroporto;

// Correr no terminal "php yii aeroporto/importar PT,ES,FR,DE,IT,GB,IE,NL,BE,LU,CH,AT,PL,CZ,DK,SE,NO,FI,IS,GR,HR,HU,RO,BG,TR,US,CA,MX,BR,AR,CL,CO,PE,CU,DO,AE,QA,SA,IL,EG,MA,TN,ZA,KE,CV,AO,MZ,CN,JP,KR,IN,TH,SG,MY,ID,VN,PH,HK,AU,NZ"
// para ir buscar os dados à API dos aeroportos
class AeroportoController extends Controller
{
    public function actionImportar(array $paises)
    {
        $client = new Client();

        $novos = 0;
        $atualizados = 0;

        foreach ($paises as $pais) {
            $response = $client->get(Yii::$app->params['aeroportosApiUrl'] . '/countries/' . $pais . '/airports', ['page[size]' => 10, 'filter[type]' => 'large_airport'])->send();

            if (!$response->isOk) {
                echo "Erro na API para $pais: {$response->statusCode}\n";
                continue;
            }

            foreach ($response->data['data'] as $item) {
                // Sem código IATA não guarda, para não haver campos a nulo
                if (empty($item['attributes']['iata_code'])) {
                    continue;
                }

                // Procura pelo código técnico: se já existe, atualiza em vez de duplicar
                $aeroporto = Aeroporto::findOne(['codigo' => $item['attributes']['code']]) ?? new Aeroporto();
                $aeroporto->isNewRecord ? $novos++ : $atualizados++;

                $aeroporto->codigo = $item['attributes']['code'];
                $aeroporto->nome = $item['attributes']['name'];
                $aeroporto->codigo_iata = $item['attributes']['iata_code'];
                $aeroporto->codigo_pais = $pais;
                $aeroporto->save();
            }
        }

        echo "Importação concluída: $novos novos, $atualizados atualizados.\n";
    }
}