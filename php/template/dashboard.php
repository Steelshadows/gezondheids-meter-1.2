<?php

require_once ("php/functions/dashboard.php");
$UID = $_SESSION['user']['id'];
$user = getUsersData($UID);
//var_dump($user);


echo "<div style='padding: 0 10%;'>";
echo "<h1>Dashboard</h1> ";
?>
<h3>
    Hoe hoger het percentage, hoe beter u bezig bent
</h3>
<br>
<h2>
Voeding:
</h2>
<progress value="<?= $user["Voeding"]["AVG(user_setting.value)"]?>" max="100"></progress>
<h4>
    U bent <?= number_format($user["Voeding"]["AVG(user_setting.value)"])?> procent goed bezig met uw voeding
</h4>
<br>
<h2>
Werk:
</h2>
<progress value="<?= $user["work"]["AVG(user_setting.value)"]?>" max="100"></progress>
<h4>
    U bent <?= number_format($user["work"]["AVG(user_setting.value)"])?> procent goed bezig met uw werk
</h4>
<br>
<h2>
Slaap:
</h2>
<progress value="<?= $user["sleep"]["AVG(user_setting.value)"]?>" max="100"></progress>
<h4>
    U bent <?= number_format($user["sleep"]["AVG(user_setting.value)"])?> procent goed bezig met uw slaap
</h4>
<br>
<h2>
Sport:
</h2>
<progress value="<?= $user["sport"]["AVG(user_setting.value)"]?>" max="100"></progress>
<h4>
    U bent <?= number_format($user["sport"]["AVG(user_setting.value)"])?> procent goed bezig met uw beweging
</h4>
<br>
<h2>
Drugs:
</h2>
<progress value="<?= $user["drugs"]["AVG(user_setting.value)"]?>" max="100"></progress>
<h4>
    U bent <?= number_format($user["drugs"]["AVG(user_setting.value)"])?> procent goed bezig met uw drugs gebruik
</h4>
<br>
<h2>
    Alcohol:
</h2>
<progress value="<?= $user["alcohol"]["AVG(user_setting.value)"]?>" max="100"></progress>
<h4>
    U bent <?= number_format($user["alcohol"]["AVG(user_setting.value)"])?> procent goed bezig met uw drugs gebruik
</h4>

</div>