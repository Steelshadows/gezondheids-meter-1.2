<?php
//require_once "php/function/include.php";
$userLoggedIn = isset($_SESSION['user']['id']);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Gezondheidsmeter</title>
</head>
<nav class="navbar">
    <a href="dashboard.php"><h1>Gezondheidsmeter</h1></a>
    <div class="navbar-content <?=$userLoggedIn !== true ? 'justify-content-center' : 'justify-content-end'?>">
        <?php if($userLoggedIn) { ?>
            <a class="w33" href="profile.php">Ingelogd als: <span><?=$_SESSION['user']['username']?></span></a>
            <a class="nav-link w33" href="dashboard.php">Dashboard</a>
            <a class="nav-link w33" href="logout.php">Uitloggen</a>
        <?php } else { ?>
            <a href="index.php" class="nav-link w33">Inloggen</a>
            <a href="register.php" class="nav-link w33">Registeren</a>
        <?php }?>
    </div>
</nav>