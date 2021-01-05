<?php
include "php/function/include.php";
require_once('php/function/login.inc.php'); 

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Gezondheidsmeter</title>
</head>
<nav class="navbar">
    <a href="index.php"><h1>Gezondheidsmeter</h1></a>
    <div class="navbar-content">
        <?php if(isset($_SESSION["session_id"])) { ?>
            <a class="nav-link" href="account.php">My account</a>
            <a class="nav-link" href="dashboard.php">Dashboard</a>
            <form action="../php/function/logout.inc.php" method="post">
                <button class="nav-link" type="submit" class="logout_button" name="logout_submit">Logout</button>
            </form>
        <?php } ?>

        <?php if(!isset($_SESSION["session_id"])) { ?>
            <a class="nav-link" href="login.php">Inloggen</a>
            <a  class="nav-link" href="register.php">Registeren</a>
        <?php } ?>
    </div>
</nav>