<?php

require_once ("php/functions/dashboard.php");
$UID = $_SESSION['user']['id'];
$user = getUsersData($UID);
//var_dump($user);


echo "<div style='padding: 0 10%;'>";
echo "<h1>dashboard</h1> ";
?>
<p>
    hoe hoger het percentage, hoe beter u bezig bent
</p>
<br>
<h5>
voeding:
</h5>
<progress value="<?= $user["Voeding"]["AVG(user_setting.value)"]?>" max="100"></progress>
<p>
    u bent <?= number_format($user["Voeding"]["AVG(user_setting.value)"])?> procent goed bezig met uw voeding
</p>
<br>
<h5>
werk:
</h5>
<progress value="<?= $user["work"]["AVG(user_setting.value)"]?>" max="100"></progress>
<p>
    u bent <?= number_format($user["work"]["AVG(user_setting.value)"])?> procent goed bezig met uw werk
</p>
<br>
<h5>
slaap:
</h5>
<progress value="<?= $user["sleep"]["AVG(user_setting.value)"]?>" max="100"></progress>
<p>
    u bent <?= number_format($user["sleep"]["AVG(user_setting.value)"])?> procent goed bezig met uw slaap
</p>
<br>
<h5>
sport:
</h5>
<progress value="<?= $user["sport"]["AVG(user_setting.value)"]?>" max="100"></progress>
<p>
    u bent <?= number_format($user["sport"]["AVG(user_setting.value)"])?> procent goed bezig met uw beweging
</p>
<br>
<h5>
drugs:
</h5>
<progress value="<?= $user["drugs"]["AVG(user_setting.value)"]?>" max="100"></progress>
<p>
    u bent <?= number_format($user["drugs"]["AVG(user_setting.value)"])?> procent goed bezig met uw drugs gebruik
</p>
</div>