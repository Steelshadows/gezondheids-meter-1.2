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
    <a href="index.php"><h1>Gezondheidsmeter</h1></a>
    <div class="navbar-content <?=$userLoggedIn !== true ? 'justify-content-center' : 'justify-content-end'?>">
        <?php if($userLoggedIn) { ?>
            <a href="profile.php">ingelogd als: <span><?=$_SESSION['user']['username']?></span></a>
            <a class="nav-link" href="dashboard.php">Dashboard</a>
            <a class="nav-link" href="logout.php">Uitloggen</a>
        <?php } else { ?>
            <a class="nav-link" href="login.php">Inloggen</a>
            <a  class="nav-link" href="register.php">Registeren</a>
        <?php }?>
    </div>
</nav>