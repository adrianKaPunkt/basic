<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['user/reset', 'token' => $user->password_reset_token]);
?>
    Hello <?= $user->firstname ?>,

    Follow the link below to reset your password:

<?= $resetLink ?>