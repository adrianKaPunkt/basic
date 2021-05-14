<?php
/** @var app\models\user\User $user */
/** @var app\models\user\UserAddress $userAddress */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use app\models\user\User;

?>

<br><br>

<div class="card">
    <div class="card-header">
        Persönliche Daten
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin([
            'action' => ['/user/update'],
            'method' => 'post',
            'validateOnChange' => true,
        ]);?>

        <div class="row">
            <div class="col">
                <?= $form->field($user, 'firstname') ?>
            </div>
            <div class="col">
                <?= $form->field($user, 'lastname') ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($user, 'email') ?>
            </div>
            <div class="col">
                <?= $form->field($user, 'username') ?>
            </div>
        </div>
    </div>
</div>


<br>


<!--<div class="card">
    <div class="card-header">
        Geschäftliche Daten
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <label>Restaurant</label>
                <select name="User[restaurant_id]" class="custom-select" aria-label=".form-select-sm example">
                    <?php /*for($i = 0; $i < count(User::$restaurants); $i++) : */?>
                        <?php /*if($i == $user->restaurant_id) : */?>
                            <option selected value="<?/*=$i*/?>"><?/*= User::$restaurants[$i] */?></option>
                        <?php /*else : */?>
                            <option value="<?/*=$i*/?>"><?/*= User::$restaurants[$i] */?></option>
                        <?php /*endif; */?>
                    <?php /*endfor; */?>
                </select>
            </div>
            <div class="col">
                <label>Rolle</label>
                <select name="User[role_id]" class="custom-select" aria-label=".form-select-sm example">
                    <?php /*for($i = 0; $i < count(User::$roles); $i++) : */?>
                        <?php /*if($i == $user->role_id) : */?>
                            <option selected value="<?/*=$i*/?>"><?/*= User::$roles[$i] */?></option>
                        <?php /*else : */?>
                            <option value="<?/*=$i*/?>"><?/*= User::$roles[$i] */?></option>
                        <?php /*endif; */?>
                    <?php /*endfor; */?>
                </select>
            </div>
        </div>
    </div>
</div>-->


<br>


<div class="card">
    <div class="card-header">
        Adresse
    </div>
    <div class="card-body">
        <?= $form->field($userAddress, 'address') ?>
        <div class="row">
            <div class="col">
                <?= $form->field($userAddress, 'zipcode') ?>
            </div>
            <div class="col">
                <?= $form->field($userAddress, 'city') ?>
            </div>
        </div>
    </div>
</div>
<br>
<div>
    <button class="btn btn-primary">aktualisieren</button>
</div>
<?php ActiveForm::end(); ?>
<br>
