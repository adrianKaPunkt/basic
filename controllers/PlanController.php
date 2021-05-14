<?php


namespace app\controllers;


use app\models\user\User;
use yii\web\Controller;

class PlanController extends Controller
{
    public function actionIndex()
    {
        $users = User::findBySql("SELECT * FROM user ORDER BY role_id")->all();
        return $this->render('index', [
            'users' => $users
        ]);
    }
}