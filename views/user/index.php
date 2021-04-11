<?php

?>
<?php if(Yii::$app->session->hasFlash('addedUser')) : ?>
    <div class="info">
        HURRA - Benutzer angelegt
    </div>
<?php endif; ?>

<h1>Benutzer</h1>

<div>
    <a href="user/add"><button class="btn btn-primary">++++</button></a>
</div>
<div>

</div>