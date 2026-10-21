<?php
namespace common\rbac;

use yii\rbac\Rule;
use common\models\Passageiro;

/**
 * Verifica se o bilhete pertence ao utilizador autenticado.
 * Uso: Yii::$app->user->can('cancelarBilheteProprio', ['bilhete' => $bilhete])
 */
class DonoBilheteRule extends Rule
{
    public $name = 'isDonoBilhete';

    public function execute($user, $item, $params)
    {
        if (!isset($params['bilhete'])) {
            return false;
        }
        $bilhete = $params['bilhete'];

        // Se o bilhete guardar quem o comprou (necessário para os acompanhantes)
        if ($bilhete->hasAttribute('user_id')) {
            return (int) $bilhete->user_id === (int) $user;
        }

        // Caso contrário: o passageiro do bilhete tem de ser o do utilizador
        $passageiro = Passageiro::findOne(['user_id' => $user]);
        return $passageiro !== null && (int) $bilhete->passageiro_id === (int) $passageiro->id;
    }
}