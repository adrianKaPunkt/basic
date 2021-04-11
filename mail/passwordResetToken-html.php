<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\models\user\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['user/reset', 'token' => $user->password_reset_token]);
?>

<div class="password-reset">
    <p>Hallo <?= Html::encode($user->firstname) ?>,</p>
    <p>Clicke auf den Link, um das Passwort zu ändern:</p>
    <p><?= Html::a(Html::encode($resetLink), $resetLink)?></p>
</div>
