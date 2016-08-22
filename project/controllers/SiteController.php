<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\ConductExperiment;
use app\models\Experiment;
use app\models\Result;

class SiteController extends Controller
{

    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'index',
                            'about',
                            'registr',
                            'login',
                            'captcha',],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionConductExperiment()
    {
        $model = new ConductExperiment;
        $name = Yii::$app->user->identity->username;
        $model->playerName = $name;
        $model->recordExperiment();
        $model->throwBones();
        $model->recordResult();
        return $this->render('conduct-experiment', ['model' => $model,]);
    }

    public function actionShowAllExperiments()
    {
        $query = Experiment::find();
        $pagination = new Pagination(['defaultPageSize' => 10, 'totalCount' => $query->count(),]);
        $experimentsAll = $query
            ->orderBy('id_exp')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('show-all-experiments', [
            'pagination' => $pagination,
            'experimentsAll' => $experimentsAll]);
    }

    public function actionShowOneExperiment()
    {
        $get = Yii::$app->request->get();
        $oneExperimentId = $get['id'];
        $queryResults = Result::find();
        $oneExperimentResults = $queryResults->where(array('id_exp' => $oneExperimentId))->all();
        $queryExperiment = Experiment::find();
        $oneExperimentInfo = $queryExperiment->where(array('id_exp' => $oneExperimentId))->all();
        return $this->render('show-one-experiment', [
            'oneExperimentResults' => $oneExperimentResults,
            'oneExperimentInfo' => $oneExperimentInfo,
        ]);
    }

}
