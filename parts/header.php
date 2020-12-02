<?php
include "php/function/include.php";
$userLoggedIn = isset($_SESSION['user']['id']);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Gezondheidsmeter</title>
</head>
<nav class="navbar">
    <h1>Gezondheidsmeter</h1>
    <div class="navbar-content <?=$userLoggedIn !== true ? 'justify-content-center' : 'justify-content-end'?>">
        <?php if($userLoggedIn) { ?>
            <a href="profile.php">ingelogd als: <span><?=$_SESSION['user']['username']?></span></a>
            <a class="nav-link" href="dashboard.php">dashboard</a>
            <a class="nav-link" href="logout.php">uitloggen</a>
        <?php } else { ?>
            <a href="index.php" class="nav-link">inloggen</a>
            <a href="register.php" class="nav-link">registeren</a>
        <?php }?>
    </div>
</nav>