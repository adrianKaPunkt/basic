<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
?>
<div class="site-login">
    <br>
    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
        <br><br>

        <div>
            <div>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'email', [
                        'inputOptions' => [
                            'class' => 'form-control form-control-user',
                            'placeholder' => 'E-mail',
                    ]
                ])->label(false)->textInput(['autofocus' => true]) ?>
                <br><br>
                <?= $form->field($model, 'password', [
                        'inputOptions' => [
                            'class' => 'form-control form-control-user',
                            'placeholder' => 'Passwort',
                            ]
                        ])->label(false)->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    <?= Html::a('Passwort vergessen?', ['user/request']) ?>
                    <br>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                <br><br><br>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>