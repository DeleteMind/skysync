<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\rbac\DonoBilheteRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        //$auth->removeAll(); // apaga tudo, incluindo as atribuições de roles aos utilizadores


        // REGRA: só o dono do bilhete
        $regraDono = new DonoBilheteRule();
        $auth->add($regraDono);


        // PERMISSÕES — PASSAGEIRO (Front-Office e App mobile) //

        // CRUD dados pessoais
        $inserirDadosPassageiro = $auth->createPermission('verDadosPassageiro');
        $inserirDadosPassageiro->description = 'Ver os dados pessoais';
        $auth->add($inserirDadosPassageiro);

        $adicionarDadosPassageiro = $auth->createPermission('adicionarDadosPassageiro');
        $adicionarDadosPassageiro->description = 'Adicionar os dados pessoais';
        $auth->add($adicionarDadosPassageiro);

        $editarDadosPassageiro = $auth->createPermission('editarDadosPassageiro');
        $editarDadosPassageiro->description = 'Editar os dados pessoais';
        $auth->add($editarDadosPassageiro);

        $apagarDadosPassageiro = $auth->createPermission('apagarDadosPassageiro');
        $apagarDadosPassageiro->description = 'Apagar os dados pessoais';
        $auth->add($apagarDadosPassageiro);


        // Bilhete
        $comprarBilhete = $auth->createPermission('comprarBilhete');
        $comprarBilhete->description = 'Comprar e pagar bilhetes para si e para acompanhantes';
        $auth->add($comprarBilhete);
        
        /*
        $apagarBilheteProprio = $auth->createPermission('apagarBilheteProprio');
        $apagarBilheteProprio->description = 'Apagar bilhetes para si e para acompanhantes';
        $apagarBilheteProprio->ruleName = $regraDono->name;
        $auth->add($apagarBilheteProprio);
        */

        $verBilheteProprio = $auth->createPermission('verBilhetesProprio');
        $verBilheteProprio->description = 'Consultar os seus bilhetes e o histórico de viagens';
        $verBilheteProprio->ruleName = $regraDono->name;
        $auth->add($verBilheteProprio);

        $exportarBilheteProprio = $auth->createPermission('exportarBilheteProprio');
        $exportarBilheteProprio->description = 'Exportar o bilhete';
        $exportarBilheteProprio->ruleName = $regraDono->name;
        $auth->add($exportarBilheteProprio);


        // CRUD gerir Bagagem Própria
        $verBagagemPropria = $auth->createPermission('verBagagemPropria');
        $verBagagemPropria->description = 'Adicionar bagagem dos seus bilhetes';
        $verBagagemPropria->ruleName = $regraDono->name;
        $auth->add($verBagagemPropria);

        $adicionarBagagemPropria = $auth->createPermission('adicionarBagagemPropria');
        $adicionarBagagemPropria->description = 'Adicionar bagagem dos seus bilhetes';
        $adicionarBagagemPropria->ruleName = $regraDono->name;
        $auth->add($adicionarBagagemPropria);

        $editarBagagemPropria = $auth->createPermission('editarBagagemPropria');
        $editarBagagemPropria->description = 'Editar bagagem dos seus bilhetes';
        $editarBagagemPropria->ruleName = $regraDono->name;
        $auth->add($editarBagagemPropria);

        $apagarBagagemPropria = $auth->createPermission('apagarBagagemPropria');
        $apagarBagagemPropria->description = 'Apagar bagagem dos seus bilhetes';
        $apagarBagagemPropria->ruleName = $regraDono->name;
        $auth->add($apagarBagagemPropria);


        // O check-in SEM conta não usa RBAC: valida nº do bilhete + nº do documento.
        $fazerCheckInProprio = $auth->createPermission('fazerCheckInProprio');
        $fazerCheckInProprio->description = 'Fazer check-in com sessão iniciada';
        $fazerCheckInProprio->ruleName = $regraDono->name;
        $auth->add($fazerCheckInProprio);




        // PERMISSÕES — GESTOR OPERACIONAL (Back-Office) //


        $acederBackend = $auth->createPermission('acederBackend');
        $acederBackend->description = 'Autenticar-se no back-office';
        $auth->add($acederBackend);


        // CRUD - Bagagem
        $verBagagem = $auth->createPermission('verBagagem');
        $verBagagem ->description = 'Adicionar bagagem dos seus bilhetes';
        $auth->add($verBagagem );

        $adicionarBagagem= $auth->createPermission('adicionarBagagem');
        $adicionarBagagem->description = 'Adicionar bagagem dos seus bilhetes';
        $auth->add($adicionarBagagem);

        $editarBagagem = $auth->createPermission('editarBagagem');
        $editarBagagem->description = 'Editar bagagem dos seus bilhetes';
        $auth->add($editarBagagem);

        $apagarBagagem = $auth->createPermission('apagarBagagem');
        $apagarBagagem->description = 'Apagar bagagem dos seus bilhetes';
        $auth->add($apagarBagagem);


        // CRUD - AEROPORTOS
        $verAeroportos = $auth->createPermission('verAeroportos');
        $verAeroportos->description = 'Ver aeroportos gerados pela API externa';
        $auth->add($verAeroportos);



        // CRUD - AVIÕES
        $verAvioes = $auth->createPermission('verAvioes');
        $verAvioes->description = 'Ver o estado de aviões';
        $auth->add($verAvioes);

        $adicionarAvioes = $auth->createPermission('adicionarAvioes');
        $adicionarAvioes->description = 'Adicionar o estado de aviões';
        $auth->add($adicionarAvioes);

        $editarAvioes = $auth->createPermission('editarAvioes');
        $editarAvioes->description = 'Editar estado de aviões';
        $auth->add($editarAvioes);

        $apagarAvioes = $auth->createPermission('apagarAvioes');
        $apagarAvioes->description = 'Apagar o estado de aviões';
        $auth->add($apagarAvioes);



        // CRUD - VOOS
        $verVoos = $auth->createPermission('verVoos');
        $verVoos->description = 'Ver voos';
        $auth->add($verVoos);

        $adicionarVoos = $auth->createPermission('adicionarVoos');
        $adicionarVoos->description = 'Adicionar voos';
        $auth->add($adicionarVoos);

        $editarVoos = $auth->createPermission('editarVoos');
        $editarVoos->description = 'Editar voos';
        $auth->add($editarVoos);

        $apagarVoos = $auth->createPermission('apagarVoos');
        $apagarVoos->description = 'Apagar voos';
        $auth->add($apagarVoos);



        // CRUD - ESCALAS
        $verEscalas = $auth->createPermission('verEscalas');
        $verEscalas->description = 'Ver escalas de um voo';
        $auth->add($verEscalas);

        $adicionarEscalas = $auth->createPermission('adicionarEscalas');
        $adicionarEscalas->description = 'Adicionar escalas de um voo';
        $auth->add($adicionarEscalas);

        $editarEscalas = $auth->createPermission('editarEscalas');
        $editarEscalas->description = 'Editar escalas de um voo';
        $auth->add($editarEscalas);

        $apagarEscalas = $auth->createPermission('apagarEscalas');
        $apagarEscalas->description = 'Apagar escalas de um voo';
        $auth->add($apagarEscalas);



        // CRUD - BILHETES
        $verBilhetes = $auth->createPermission('verBilhetes');
        $verBilhetes->description = 'Ver bilhetes vendidos e passageiros com check-in de um voo';
        $auth->add($verBilhetes);

        $apagarBilhetes = $auth->createPermission('apagarBilhete');
        $apagarBilhetes->description = 'Apagar qualquer bilhete';
        $auth->add($apagarBilhetes);



        // VER ESTATISTICAS
        $verEstatisticas = $auth->createPermission('verEstatisticas');
        $verEstatisticas->description = 'Ver o painel de estatísticas';
        $auth->add($verEstatisticas);



        // É "filha" de apagarBilhete: quem pode apagar qualquer um também pode apagar o seu.
        $apagarBilheteProprio = $auth->createPermission('apagarBilheteProprio');
        $apagarBilheteProprio->description = 'Apagar um bilhete proprio de um voo que ainda não partiu';
        $apagarBilheteProprio->ruleName = $regraDono->name;
        $auth->add($apagarBilheteProprio);  //  aqui guarda na BD
        $auth->addChild($apagarBilheteProprio, $apagarBilhetes);



        // PERMISSÕES — ADMINISTRADOR (Back-Office)
        // CRUD - Utilizadores
        $adicionarUtilizadores = $auth->createPermission('adicionarUtilizadores');
        $adicionarUtilizadores->description = 'Adicionar conta de utilizador';
        $auth->add($adicionarUtilizadores);

        $verUtilizadores = $auth->createPermission('verUtilizadores');
        $verUtilizadores->description = 'Ver contas de utilizadores';
        $auth->add($verUtilizadores);

        $editarUtilizadores = $auth->createPermission('editarUtilizadores');
        $editarUtilizadores->description = 'Editar conta de utilizador';
        $auth->add($editarUtilizadores);

        $apagarUtilizadores = $auth->createPermission('apagarUtilizadores');
        $apagarUtilizadores->description = 'Apagar conta de utilizador';
        $auth->add($apagarUtilizadores);



        // CRUD - Atribuicao de perfis (auth-assignment)
        $adicionarPerfis = $auth->createPermission('adicionarPerfis');
        $adicionarPerfis->description = 'Adicionar o perfil de um utilizador';
        $auth->add($adicionarPerfis);

        $verPerfis = $auth->createPermission('verPerfis');
        $verPerfis->description = 'Ver o perfil de um utilizador';
        $auth->add($verPerfis);

        $editarPerfis = $auth->createPermission('editarPerfis');
        $editarPerfis->description = 'Editar o perfil de um utilizador';
        $auth->add($editarPerfis);

        $apagarPerfis = $auth->createPermission('apagarPerfis');
        $apagarPerfis->description = 'Apagar o perfil de um utilizador';
        $auth->add($apagarPerfis);



        /*
        $monitorizarSistema = $auth->createPermission('monitorizarSistema');
        $monitorizarSistema->description = 'Monitorizar a disponibilidade da API e o estado da base de dados';
        $auth->add($monitorizarSistema);
        */


        //CRUD - Companhias
        $adicionarCompanhias = $auth->createPermission('adicionarCompanhias');
        $adicionarCompanhias->description = 'Adicionar companhia aéreas';
        $auth->add($adicionarCompanhias);

        $verCompanhias = $auth->createPermission('verCompanhias');
        $verCompanhias->description = 'Ver companhia aéreas';
        $auth->add($verCompanhias);

        $editarCompanhias = $auth->createPermission('editarCompanhias');
        $editarCompanhias->description = 'Editar companhia aéreas';
        $auth->add($editarCompanhias);

        $apagarCompanhias = $auth->createPermission('apagarCompanhias');
        $apagarCompanhias->description = 'Apagar companhia aéreas';
        $auth->add($apagarCompanhias);



        // CRUD - Tipos de Bagagem
        $adicionarTiposBagagem = $auth->createPermission('adicionarTiposBagagem');
        $adicionarTiposBagagem->description = 'Adicionar tipo de bagagem';
        $auth->add($adicionarTiposBagagem);

        $verTiposBagagem = $auth->createPermission('verTiposBagagem');
        $verTiposBagagem->description = 'Ver tipo de bagagem';
        $auth->add($verTiposBagagem);

        $editarTiposBagagem = $auth->createPermission('editarTiposBagagem');
        $editarTiposBagagem->description = 'Editar tipo de bagagem';
        $auth->add($editarTiposBagagem);

        $apagarTiposBagagem = $auth->createPermission('apagarTiposBagagem');
        $apagarTiposBagagem->description = 'Apagar tipo de bagagem';
        $auth->add($apagarTiposBagagem);



        // ROLES
        // Passageiro (Front-Office + App mobile)

        $passageiro = $auth->createRole('passageiro');
        $passageiro->description = 'Passageiro';
        $auth->add($passageiro);
        $auth->addChild($passageiro, $inserirDadosPassageiro);
        $auth->addChild($passageiro, $adicionarDadosPassageiro);
        $auth->addChild($passageiro, $editarDadosPassageiro);
        $auth->addChild($passageiro, $apagarDadosPassageiro);
        $auth->addChild($passageiro, $comprarBilhete);
        $auth->addChild($passageiro, $apagarBilheteProprio);
        $auth->addChild($passageiro, $verBilheteProprio);
        $auth->addChild($passageiro, $exportarBilheteProprio);
        $auth->addChild($passageiro, $verBagagemPropria);
        $auth->addChild($passageiro, $adicionarBagagemPropria);
        $auth->addChild($passageiro, $editarBagagemPropria);
        $auth->addChild($passageiro, $apagarBagagemPropria);
        $auth->addChild($passageiro, $fazerCheckInProprio);


        // Gestor Operacional (Back-Office)

        $gestor = $auth->createRole('gestor');
        $gestor->description = 'Gestor Operacional';
        $auth->add($gestor);
        $auth->addChild($gestor, $acederBackend);
        $auth->addChild($gestor, $verBagagem);
        $auth->addChild($gestor, $adicionarBagagem);
        $auth->addChild($gestor, $editarBagagem);
        $auth->addChild($gestor, $apagarBagagem);
        $auth->addChild($gestor, $verAeroportos);
        $auth->addChild($gestor, $verAvioes);
        $auth->addChild($gestor, $adicionarAvioes);
        $auth->addChild($gestor, $editarAvioes);
        $auth->addChild($gestor, $apagarAvioes);
        $auth->addChild($gestor, $adicionarVoos);
        $auth->addChild($gestor, $verVoos);
        $auth->addChild($gestor, $editarVoos);
        $auth->addChild($gestor, $apagarVoos);
        $auth->addChild($gestor, $adicionarEscalas);
        $auth->addChild($gestor, $verEscalas);
        $auth->addChild($gestor, $editarEscalas);
        $auth->addChild($gestor, $apagarEscalas);
        $auth->addChild($gestor, $verBilhetes);
        $auth->addChild($gestor, $apagarBilhetes);
        $auth->addChild($gestor, $verEstatisticas);



        // Administrador (Back-Office): tudo o que o gestor faz + as suas permissões
        $admin = $auth->createRole('admin');
        $admin->description = 'Administrador de sistema';
        $auth->add($admin);
        $auth->addChild($admin, $adicionarUtilizadores);
        $auth->addChild($admin, $verUtilizadores);
        $auth->addChild($admin, $editarUtilizadores);
        $auth->addChild($admin, $apagarUtilizadores);
        $auth->addChild($admin, $adicionarPerfis);
        $auth->addChild($admin, $verPerfis);
        $auth->addChild($admin, $editarPerfis);
        $auth->addChild($admin, $apagarPerfis);
        $auth->addChild($admin, $adicionarCompanhias);
        $auth->addChild($admin, $verCompanhias);
        $auth->addChild($admin, $apagarCompanhias);
        $auth->addChild($admin, $editarCompanhias);
        $auth->addChild($admin, $adicionarTiposBagagem);
        $auth->addChild($admin, $verTiposBagagem);
        $auth->addChild($admin, $editarTiposBagagem);
        $auth->addChild($admin, $apagarTiposBagagem);

        $auth->addChild($admin, $gestor); // herda todas as permissões do gestor


        // Atribuição de perfis
        $auth->assign($admin, 1);

    }

}