<?php

declare(strict_types=1);

namespace backend\controllers;

use common\models\Bilhete;
use common\models\CompanhiaAerea;
use common\models\LoginForm;
use common\models\User;
use common\models\Voo;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions(): array
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $totalUsersCount = User::getCount();
        $gestoresCount = User::getGestoresCount();
        $passageirosCount = User::getPassageirosCount();
        $companhiasCount = CompanhiaAerea::getCompanhiasCount();
        $bilhetesCount = Bilhete::getBilhetesCount();
        $voosCount = Voo::getVoosCount();

        $username = Yii::$app->user->identity->username;

        //obter a data do filtro dos voos no index
        $data = Yii::$app->request->get('data');
        $voosFiltro = Voo::getVoosFiltro($data);

        return $this->render('index',
            [
                'username' => $username,
                'totalUsersCount' => $totalUsersCount,
                'gestoresCount' => $gestoresCount,
                'passageirosCount' => $passageirosCount,
                'companhiasCount' => $companhiasCount,
                'bilhetesCount' => $bilhetesCount,
                'voosCount' => $voosCount,
                'voos' => $voosFiltro,
                'data' => $data,
            ],

        );
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin(): string|Response
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (!Yii::$app->user->can('acederBackend')) {
                Yii::$app->user->logout();
            }
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout(): Response
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
