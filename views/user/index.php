<?php
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$data = $dataProvider->models;
$dataSize = $dataProvider->getTotalCount();
$this->registerCssFile('@web/css/oompa-table.css', ['depends' => [yii\bootstrap4\BootstrapAsset::className()]]);
$this->registerJsFile('@web/js/oompa-userTable.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>


<h1>Benutzer</h1>

<br><br>

<div>
<input id="restaurantCheck1" class="restaurantCheck" type="checkbox" onchange="filterme()" name="restaurant" value="1" />
<label for="restaurantCheck1" onclick="changeRestIcon(1)"><img id="restaurant1Img" src="/img/restaurant/1u.png" height="20px" /></label>
<input id="restaurantCheck2" class="restaurantCheck" type="checkbox" onchange="filterme()" name="restaurant" value="2">
<label for="restaurantCheck2" onclick="changeRestIcon(2)"><img id="restaurant2Img" src="/img/restaurant/2u.png" height="20px" /></label>
<input id="restaurantCheck3" class="restaurantCheck" type="checkbox" onchange="filterme()" name="restaurant" value="3">
<label for="restaurantCheck3" onclick="changeRestIcon(3)"><img id="restaurant3Img" src="/img/restaurant/3u.png" height="20px" /></label>
</div>
<div>
<input id="roleCheck1" class="roleCheck" type="checkbox" onchange="filterRole()" name="role" value="1" />
<label for="roleCheck1" onclick="changeRoleIcon(1)"><img id="role1Img" src="/img/role/1u.svg" height="20px" /></label>
<input id="roleCheck2" class="roleCheck" type="checkbox" onchange="filterRole()" name="role" value="2" />
<label for="roleCheck2" onclick="changeRoleIcon(2)"><img id="role2Img" src="/img/role/2u.svg" height="20px" /></label>
<input id="roleCheck3" class="roleCheck" type="checkbox" onchange="filterRole()" name="role" value="3" />
<label for="roleCheck3" onclick="changeRoleIcon(3)"><img id="role3Img" src="/img/role/3u.svg" height="20px" /></label>
</div>

<table id="oompa-table" class="table table-hover" width="100%">
    <thead>
    <tr>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">Nickname</th>
        <th scope="col">Vorname</th>
        <th scope="col">E-Mail</th>
    </tr>
    </thead>
    <tbody>
    <?php for($i = 0; $i < $dataSize; $i++) : ?>
    <?php
        $id = $data[$i]->id;
        $role = $data[$i]->role_id;
        $restaurant = $data[$i]->restaurant_id;
        $username = $data[$i]->username;
        $firstname = $data[$i]->firstname;
        $email = $data[$i]->email;
    ?>
    <tr class="oompa-row" id="<?=$id?>">
        <td style="text-align: center"><img src="<?='/img/restaurant/' . $restaurant . '.png'?>" height="20px"/><span style="display: none"><?=$restaurant?></span></td>
        <td style="text-align: center"><img src="<?='/img/role/' . $role . '.svg'?>" height="20px" /><span style="display: none"><?=$role?></span></td>
        <td><?=$username?></td>
        <td><?=$firstname?></td>
        <td><?=$email?></td>
    </tr>
    <?php endfor; ?>
    </tbody>
</table>





<br><br><br><br><br><br><br><br><br><br>

<script>

</script>