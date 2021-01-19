<?php

require_once ("php/functions/dashboard.php");
$UID = $_SESSION['user']['id'];
$user = getUsersData($UID);
var_dump($user);


echo "dashboard ";
?>
<progress value="<?= $user["Voeding"]["AVG(user_setting.value)"]?>" max="100"></progress>
<progress value="<?= $user["work"]["AVG(user_setting.value)"]?>" max="100"></progress>
<progress value="<?= $user["sleep"]["AVG(user_setting.value)"]?>" max="100"></progress>
<progress value="<?= $user["sport"]["AVG(user_setting.value)"]?>" max="100"></progress>
<progress value="<?= $user["drugs"]["AVG(user_setting.value)"]?>" max="100"></progress>