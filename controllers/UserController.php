<?php

namespace app\controllers;

use app\models\user\PasswordResetRequestForm;
use app\models\user\ResetPasswordForm;
use app\models\user\SignupForm;
use app\models\user\User;
use app\models\user\UserAddress;
use app\models\user\UserSearch;
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
        $searchModel = new UserSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Benutzer hinzugefügt!');
            return $this->goHome();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        $user = Yii::$app->user->identity;
        if(!($userAddress = $user->getAddress($user->id))) {
            $userAddress = new UserAddress();
            $userAddress->user_id = $user->getId();
        }

        $user->firstname = Yii::$app->request->post('User')['firstname'];
        $user->lastname = Yii::$app->request->post('User')['lastname'];
        $user->email = Yii::$app->request->post('User')['email'];
        $user->username = Yii::$app->request->post('User')['username'];
        $user->role_id = Yii::$app->request->post('User')['role_id'];
        $user->restaurant_id = Yii::$app->request->post('User')['restaurant_id'];

        $userAddress->address = Yii::$app->request->post('UserAddress')['address'];
        $userAddress->zipcode = Yii::$app->request->post('UserAddress')['zipcode'];
        $userAddress->city = Yii::$app->request->post('UserAddress')['city'];

        if($user->load(Yii::$app->request->post()) && $user->save() && $userAddress->save()) {
            Yii::$app->session->setFlash('success', 'Daten geändert');
            return $this->redirect(['/user/profile']);
        } else {
            Yii::$app->session->setFlash('error', 'ERROR');
            return $this->redirect(['/user/profile']);
        }
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

    public function actionProfile()
    {
        /** @var User $user */
        $user = Yii::$app->user->identity;
        if(!($userAddress = $user->getAddress($user->id))) {
            $userAddress = new UserAddress();
        }

        return $this->render('profile', [
            'user' => $user,
            'userAddress' => $userAddress,
        ]);
    }

    public function actionUploadUserImage()
    {

    }
}