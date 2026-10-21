<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\rbac\DonoBilheteRule;

/**
 * RBAC do SkySync, segundo os requisitos funcionais (Tabelas 5 a 9 do relatório).
 *
 *   php yii rbac/init                 -> cria roles, permissões e regra (APAGA tudo antes!)
 *   php yii rbac/assign admin 1       -> atribui um role a um utilizador
 *   php yii rbac/revoke gestor 2      -> retira um role a um utilizador
 *
 * Roles: admin, gestor, passageiro.
 * O Visitante não tem role: é quem não tem sessão iniciada ('?' no ACF).
 */
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll(); // apaga tudo, incluindo as atribuições de roles aos utilizadores

        // =========================================================
        // REGRA: só o dono do bilhete
        // =========================================================
        $regraDono = new DonoBilheteRule();
        $auth->add($regraDono);

        // =========================================================
        // PERMISSÕES — PASSAGEIRO (Front-Office e App mobile)
        // =========================================================

        // RF-FO-10, RF-FO-11, RF-AM-03
        $editarDadosPessoais = $auth->createPermission('editarDadosPessoais');
        $editarDadosPessoais->description = 'Inserir e editar os seus dados pessoais';
        $auth->add($editarDadosPessoais);

        // RF-FO-12 a RF-FO-16, RF-AM-07, RF-AM-08
        $comprarBilhete = $auth->createPermission('comprarBilhete');
        $comprarBilhete->description = 'Comprar e pagar bilhetes para si e para acompanhantes';
        $auth->add($comprarBilhete);

        // RF-FO-18, RF-AM-10
        $verBilhetesProprios = $auth->createPermission('verBilhetesProprios');
        $verBilhetesProprios->description = 'Consultar os seus bilhetes e o histórico de viagens';
        $auth->add($verBilhetesProprios);

        // RF-FO-17, RF-FO-25, RF-AM-12 (só os seus bilhetes)
        $exportarBilheteProprio = $auth->createPermission('exportarBilheteProprio');
        $exportarBilheteProprio->description = 'Exportar o bilhete e os dados de check-in (QR)';
        $exportarBilheteProprio->ruleName = $regraDono->name;
        $auth->add($exportarBilheteProprio);

        // RF-FO-20 a RF-FO-22, RF-AM-09 (só os seus bilhetes)
        $gerirBagagemPropria = $auth->createPermission('gerirBagagemPropria');
        $gerirBagagemPropria->description = 'Adicionar, editar e retirar bagagem dos seus bilhetes';
        $gerirBagagemPropria->ruleName = $regraDono->name;
        $auth->add($gerirBagagemPropria);

        // RF-FO-24, RF-AM-11 (só os seus bilhetes)
        // O check-in SEM conta (RF-FO-23) não usa RBAC: valida nº do bilhete + nº do documento.
        $fazerCheckInProprio = $auth->createPermission('fazerCheckInProprio');
        $fazerCheckInProprio->description = 'Fazer check-in com sessão iniciada';
        $fazerCheckInProprio->ruleName = $regraDono->name;
        $auth->add($fazerCheckInProprio);

        // =========================================================
        // PERMISSÕES — GESTOR OPERACIONAL (Back-Office)
        // =========================================================

        // RF-BO-01
        $acederBackend = $auth->createPermission('acederBackend');
        $acederBackend->description = 'Autenticar-se no back-office';
        $auth->add($acederBackend);

        // RF-BO-14 a RF-BO-16
        $gerirAeroportos = $auth->createPermission('gerirAeroportos');
        $gerirAeroportos->description = 'Importar (API externa), editar e eliminar aeroportos';
        $auth->add($gerirAeroportos);

        // RF-BO-17 a RF-BO-20
        $gerirAvioes = $auth->createPermission('gerirAvioes');
        $gerirAvioes->description = 'Registar, editar, eliminar e alterar o estado de aviões';
        $auth->add($gerirAvioes);

        // RF-BO-21 a RF-BO-24, RF-BO-28 a RF-BO-30
        $gerirVoos = $auth->createPermission('gerirVoos');
        $gerirVoos->description = 'Registar, editar, eliminar e listar voos; estado, horas reais e porta de embarque';
        $auth->add($gerirVoos);

        // RF-BO-25 a RF-BO-27
        $gerirEscalas = $auth->createPermission('gerirEscalas');
        $gerirEscalas->description = 'Adicionar, editar e remover escalas de um voo';
        $auth->add($gerirEscalas);

        // RF-BO-31, RF-BO-33
        $verBilhetesVoo = $auth->createPermission('verBilhetesVoo');
        $verBilhetesVoo->description = 'Consultar bilhetes vendidos e passageiros com check-in de um voo';
        $auth->add($verBilhetesVoo);

        // RF-BO-32 (qualquer bilhete)
        $cancelarBilhete = $auth->createPermission('cancelarBilhete');
        $cancelarBilhete->description = 'Cancelar qualquer bilhete';
        $auth->add($cancelarBilhete);

        // RF-BO-34
        $verEstatisticas = $auth->createPermission('verEstatisticas');
        $verEstatisticas->description = 'Ver o painel de estatísticas';
        $auth->add($verEstatisticas);

        // RF-FO-19, RF-AM-14 (passageiro, só os seus bilhetes).
        // É "filha" de cancelarBilhete: quem pode cancelar qualquer um também pode cancelar o seu.
        $cancelarBilheteProprio = $auth->createPermission('cancelarBilheteProprio');
        $cancelarBilheteProprio->description = 'Cancelar um bilhete seu de um voo que ainda não partiu';
        $cancelarBilheteProprio->ruleName = $regraDono->name;
        $auth->add($cancelarBilheteProprio);
        $auth->addChild($cancelarBilheteProprio, $cancelarBilhete);

        // =========================================================
        // PERMISSÕES — ADMINISTRADOR (Back-Office)
        // =========================================================

        // RF-BO-02 a RF-BO-05
        $gerirUtilizadores = $auth->createPermission('gerirUtilizadores');
        $gerirUtilizadores->description = 'Criar, listar, editar e eliminar contas de utilizadores';
        $auth->add($gerirUtilizadores);

        // RF-BO-06
        $atribuirPerfis = $auth->createPermission('atribuirPerfis');
        $atribuirPerfis->description = 'Atribuir e alterar o perfil de um utilizador';
        $auth->add($atribuirPerfis);

        // RF-BO-07
        $monitorizarSistema = $auth->createPermission('monitorizarSistema');
        $monitorizarSistema->description = 'Monitorizar a disponibilidade da API e o estado da base de dados';
        $auth->add($monitorizarSistema);

        // RF-BO-08 a RF-BO-10
        $gerirCompanhias = $auth->createPermission('gerirCompanhias');
        $gerirCompanhias->description = 'Registar, editar e eliminar companhias aéreas';
        $auth->add($gerirCompanhias);

        // RF-BO-11 a RF-BO-13
        $gerirTiposBagagem = $auth->createPermission('gerirTiposBagagem');
        $gerirTiposBagagem->description = 'Registar, editar e eliminar tipos de bagagem';
        $auth->add($gerirTiposBagagem);

        // =========================================================
        // ROLES
        // =========================================================

        // Passageiro (Front-Office + App mobile)
        $passageiro = $auth->createRole('passageiro');
        $passageiro->description = 'Passageiro';
        $auth->add($passageiro);
        $auth->addChild($passageiro, $editarDadosPessoais);
        $auth->addChild($passageiro, $comprarBilhete);
        $auth->addChild($passageiro, $verBilhetesProprios);
        $auth->addChild($passageiro, $exportarBilheteProprio);
        $auth->addChild($passageiro, $gerirBagagemPropria);
        $auth->addChild($passageiro, $fazerCheckInProprio);
        $auth->addChild($passageiro, $cancelarBilheteProprio);

        // Gestor Operacional (Back-Office)
        $gestor = $auth->createRole('gestor');
        $gestor->description = 'Gestor Operacional';
        $auth->add($gestor);
        $auth->addChild($gestor, $acederBackend);
        $auth->addChild($gestor, $gerirAeroportos);
        $auth->addChild($gestor, $gerirAvioes);
        $auth->addChild($gestor, $gerirVoos);
        $auth->addChild($gestor, $gerirEscalas);
        $auth->addChild($gestor, $verBilhetesVoo);
        $auth->addChild($gestor, $cancelarBilhete);
        $auth->addChild($gestor, $verEstatisticas);

        // Administrador (Back-Office): tudo o que o gestor faz + as suas permissões
        $admin = $auth->createRole('admin');
        $admin->description = 'Administrador de sistema';
        $auth->add($admin);
        $auth->addChild($admin, $gerirUtilizadores);
        $auth->addChild($admin, $atribuirPerfis);
        $auth->addChild($admin, $monitorizarSistema);
        $auth->addChild($admin, $gerirCompanhias);
        $auth->addChild($admin, $gerirTiposBagagem);
        $auth->addChild($admin, $gestor); // herda todas as permissões do gestor

        echo "RBAC do SkySync criado: 3 roles, 20 permissões, 1 regra.\n";
        echo "Atenção: as atribuições foram apagadas. Volta a correr php yii rbac/assign.\n";
    }

    public function actionAssign($role, $userId)
    {
        $auth = Yii::$app->authManager;
        $r = $auth->getRole($role);
        if ($r === null) {
            echo "O role '$role' não existe. Roles: admin, gestor, passageiro.\n";
            return 1;
        }
        if ($auth->getAssignment($role, $userId) !== null) {
            echo "O user $userId já tem o role '$role'.\n";
            return 0;
        }
        $auth->assign($r, $userId);
        echo "Role '$role' atribuído ao user $userId.\n";
    }

    public function actionRevoke($role, $userId)
    {
        $auth = Yii::$app->authManager;
        $r = $auth->getRole($role);
        if ($r === null) {
            echo "O role '$role' não existe.\n";
            return 1;
        }
        $auth->revoke($r, $userId);
        echo "Role '$role' retirado ao user $userId.\n";
    }
}