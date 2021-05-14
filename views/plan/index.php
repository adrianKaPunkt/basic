<style>
    a {
        color: black;
    }

    th {
        font-weight: normal;
        font-size: larger;
    }

    .table th, .table td {
        padding: 0.4rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    #oompa-planerTable {
        table-layout: fixed;
        width: 100%;
    }
    #calWeekHeader {
        width: 23%;
    }

    #leftArrow {
        visibility: true;
        background-image: url("/img/leftArrow.svg");
        height: 20px;
    }

    .weekdayHeader {
        width: 11%;
        text-align: center;
    }

    .profileContainer {
    //background-color: #DADBCA;
        width: 100%;
        height: 60px;
        border-radius: 4px;
        padding: 6px;
    }

    .profileContainerPic {
        border-radius: 50%;
        margin-right: 15px;
        float: left;
    }

    .profileContainerName {
        margin: -2px 0px 3px 0px;
    }

    .profileContainerRestaurantIcon {
        float: left;
        margin: 0px 4px 0px -3px;
    }

    .profileContainerRoleName {
        font-size: smaller;
    }
</style>




<?php
/** @var $this yii\web\View */

use app\models\user\User;

/** @var $users User */


function day($week, $year, $weekday) {
    $firstWeek = mktime(0, 0, 0, 1, 4, $year);
    $firstDay = mktime(0, 0, 0, 1, (date('d', $firstWeek) + (date('w', $firstWeek) == 0 ? -6 : (1 - date('w', $firstWeek)))) + $weekday, $year);
    $x = $firstDay + 604800 * ($week - 1);
    return date('d.m.', $x);
}
$calWeek = date('W');
$calYear = date('Y');
$arrMonth = [
    'January' => 'Januar',
    'February' => 'Februar',
    'March' => 'März',
    'April' => 'April',
    'May' => 'Mai',
    'June' => 'Juni',
];
?>

<table id="oompa-planerTable" class="table table-hover" width="100%">
    <thead>
        <tr>
            <th id="calWeekHeader"><a id="leftArrow" href="" onclick="changeWeek()"><</a> KW <?=$calWeek . ' - ' . $calYear;?> <a href="">></a>
            <th class="weekdayHeader">Mo. <?=day($calWeek, $calYear, 1);?></th>
            <th class="weekdayHeader">Di. <?=day($calWeek, $calYear, 2);?></th>
            <th class="weekdayHeader">Mi. <?=day($calWeek, $calYear, 3);?></th>
            <th class="weekdayHeader">Do. <?=day($calWeek, $calYear, 4);?></th>
            <th class="weekdayHeader">Fr. <?=day($calWeek, $calYear, 5);?></th>
            <th class="weekdayHeader">Sa. <?=day($calWeek, $calYear, 6);?></th>
            <th class="weekdayHeader">So. <?=day($calWeek, $calYear, 7);?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user) : ?>
        <tr class="oompa-row" id="<?=$user->id ?>">
            <td>
                <div class="profileContainer">
                    <div>
                        <img class="profileContainerPic" src="/img/user/<?=$user->id?>/thumb.jpg" height="50px" />
                    </div>
                    <!--<img class="profileContainerRoleIcon" src="/img/role/<?=$user->role_id?>u.svg" height="15px" />-->
                    <div>
                        <p class="profileContainerName"><?=$user->username?></p>
                        <p class="profileContainerRoleName"><?= User::$roles[$user->role_id] ?></p>
                    </div>
                </div>
            </td>
            <?php for($i = 1; $i <= 7; $i++) : ?>
                <td>
                    <div class="profileContainer">

                    </div>
                </td>
            <?php endfor; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>