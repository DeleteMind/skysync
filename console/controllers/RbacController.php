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


        // REGRA: só o dono do bilhete

        $regraDono = new DonoBilheteRule();
        $auth->add($regraDono);


        // PERMISSÕES — PASSAGEIRO (Front-Office e App mobile)

        $editarDadosPessoais = $auth->createPermission('editarDadosPessoais');
        $editarDadosPessoais->description = 'Inserir e editar os seus dados pessoais';
        $auth->add($editarDadosPessoais);


        $comprarBilhete = $auth->createPermission('comprarBilhete');
        $comprarBilhete->description = 'Comprar e pagar bilhetes para si e para acompanhantes';
        $auth->add($comprarBilhete);


        $verBilhetesProprios = $auth->createPermission('verBilhetesProprios');
        $verBilhetesProprios->description = 'Consultar os seus bilhetes e o histórico de viagens';
        $auth->add($verBilhetesProprios);


        $exportarBilheteProprio = $auth->createPermission('exportarBilheteProprio');
        $exportarBilheteProprio->description = 'Exportar o bilhete e os dados de check-in (QR)';
        $exportarBilheteProprio->ruleName = $regraDono->name;
        $auth->add($exportarBilheteProprio);


        $gerirBagagemPropria = $auth->createPermission('gerirBagagemPropria');
        $gerirBagagemPropria->description = 'Adicionar, editar e retirar bagagem dos seus bilhetes';
        $gerirBagagemPropria->ruleName = $regraDono->name;
        $auth->add($gerirBagagemPropria);


        // O check-in SEM conta não usa RBAC: valida nº do bilhete + nº do documento.
        $fazerCheckInProprio = $auth->createPermission('fazerCheckInProprio');
        $fazerCheckInProprio->description = 'Fazer check-in com sessão iniciada';
        $fazerCheckInProprio->ruleName = $regraDono->name;
        $auth->add($fazerCheckInProprio);


        // PERMISSÕES — GESTOR OPERACIONAL (Back-Office)

        $acederBackend = $auth->createPermission('acederBackend');
        $acederBackend->description = 'Autenticar-se no back-office';
        $auth->add($acederBackend);


        $gerirBagagem = $auth->createPermission('gerirBagagem');
        $gerirBagagem->description = 'Gerir bagagem';
        $auth->add($gerirBagagem);


        $gerirAeroportos = $auth->createPermission('gerirAeroportos');
        $gerirAeroportos->description = 'Importar (API externa), editar e eliminar aeroportos';
        $auth->add($gerirAeroportos);


        $gerirAvioes = $auth->createPermission('gerirAvioes');
        $gerirAvioes->description = 'Registar, editar, eliminar e alterar o estado de aviões';
        $auth->add($gerirAvioes);


        $gerirVoos = $auth->createPermission('gerirVoos');
        $gerirVoos->description = 'Registar, editar, eliminar e listar voos; estado, horas reais e porta de embarque';
        $auth->add($gerirVoos);


        $gerirEscalas = $auth->createPermission('gerirEscalas');
        $gerirEscalas->description = 'Adicionar, editar e remover escalas de um voo';
        $auth->add($gerirEscalas);


        $verBilhetesVoo = $auth->createPermission('verBilhetesVoo');
        $verBilhetesVoo->description = 'Consultar bilhetes vendidos e passageiros com check-in de um voo';
        $auth->add($verBilhetesVoo);


        $cancelarBilhete = $auth->createPermission('cancelarBilhete');
        $cancelarBilhete->description = 'Cancelar qualquer bilhete';
        $auth->add($cancelarBilhete);


        $verEstatisticas = $auth->createPermission('verEstatisticas');
        $verEstatisticas->description = 'Ver o painel de estatísticas';
        $auth->add($verEstatisticas);


        // É "filha" de cancelarBilhete: quem pode cancelar qualquer um também pode cancelar o seu.
        $cancelarBilheteProprio = $auth->createPermission('cancelarBilheteProprio');
        $cancelarBilheteProprio->description = 'Cancelar um bilhete seu de um voo que ainda não partiu';
        $cancelarBilheteProprio->ruleName = $regraDono->name;
        $auth->add($cancelarBilheteProprio);
        $auth->addChild($cancelarBilheteProprio, $cancelarBilhete);


        // PERMISSÕES — ADMINISTRADOR (Back-Office)

        $gerirUtilizadores = $auth->createPermission('gerirUtilizadores');
        $gerirUtilizadores->description = 'Criar, listar, editar e eliminar contas de utilizadores';
        $auth->add($gerirUtilizadores);

        $atribuirPerfis = $auth->createPermission('atribuirPerfis');
        $atribuirPerfis->description = 'Atribuir e alterar o perfil de um utilizador';
        $auth->add($atribuirPerfis);

        $monitorizarSistema = $auth->createPermission('monitorizarSistema');
        $monitorizarSistema->description = 'Monitorizar a disponibilidade da API e o estado da base de dados';
        $auth->add($monitorizarSistema);

        $gerirCompanhias = $auth->createPermission('gerirCompanhias');
        $gerirCompanhias->description = 'Registar, editar e eliminar companhias aéreas';
        $auth->add($gerirCompanhias);

        $gerirTiposBagagem = $auth->createPermission('gerirTiposBagagem');
        $gerirTiposBagagem->description = 'Registar, editar e eliminar tipos de bagagem';
        $auth->add($gerirTiposBagagem);


        // ROLES

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
        $auth->addChild($gestor, $gerirBagagem);

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