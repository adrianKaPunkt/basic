<?php

namespace app\controllers;

use app\models\user\PasswordResetRequestForm;
use app\models\user\ResetPasswordForm;
use app\models\user\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionAdd()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }

    public function actionRequest()
    {
        $model = new PasswordResetRequestForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Checke deine E-Mail :-)');
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Leider hat es nicht geklappt. Adrian fragen.');
            }
        }
        Yii::$app->layout = 'blank';
        return $this->render('request', [
            'model' => $model,
        ]);
    }

    public function actionReset($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch(\InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage);
        }

        if($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', '...');
            return $this->goHome();
        }
        Yii::$app->layout = 'blank';
        return $this->render('reset', [
            'model' => $model,
        ]);
    }
}