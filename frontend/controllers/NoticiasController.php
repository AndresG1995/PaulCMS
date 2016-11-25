<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\controllers;

use Yii;
//use yii\base\InvalidParamException;
//use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;

//use common\models\LoginForm;
//use frontend\models\PasswordResetRequestForm;
//use frontend\models\ResetPasswordForm;
//use frontend\models\SignupForm;
//use frontend\models\ContactForm;
/**
 * Description of NoticiasController
 *
 * @author jdev
 */
class NoticiasController extends Controller{
//put your code here {

    //public $layout = 'mainEstudiantes';


    public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    // Roles ? => Visitante , @ => Usuario logeado, superadmin=> super administrador , admin => docentes
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'noticia'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
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

    public function actionIndex() {
        $query = \common\models\Noticia::find();

        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
        ]);

        
        
        

        $noticias = $query->orderBy('id desc')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        $categorias = \common\models\Categoria::find()->all();

        return $this->render(
                        'index', [
                    'categorias' => $categorias,
                    'pagination' => $pagination,
                    'noticias' => $noticias,
                        ]
        );
    }


//    public function actionSidebar() {
//        $categorias = \common\models\Categoria::find()->all();
//
//        return $this->render(
//                        'sidebar', [
//                    'categorias' => $categorias,
//                        ]
//        );
//    }






}
