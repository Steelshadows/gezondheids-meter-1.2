<?php
    session_start();
    if(!isset($_SESSION['user']['id'])){
        setcookie('error', 'Je moet eerst ingelogd zijn om deze website te bekijken.');
        header('location: index.php');
    }
    require "php/classes/DB_Connection.php";
    
    $error = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/main.css">
    <title>Gezondheidsmeter: Dashboard</title>
</head>
<body>
    <?php include "includes/html/navbar.php" ?>
    <?php if(isset($_SESSION['message'])){ ?> 
        <div class="alert alert-success">
            <?= $_SESSION['message'] ?>
        </div>
    <?php }
    unset($_SESSION['message']);
    ?>

    <?php if(isset($_SESSION['error'])){ ?> 
        <div class="alert alert-success">
            <?= $_SESSION['error'] ?>
        </div>
    <?php }
    unset($_SESSION['error'])
    ?>

    <!-- If gezondheidsmeter is on -->
    <?php if($_SESSION['user']['enabled'] == 1) { 
    $db_connection = new db_connection();
    $userId = $_SESSION['user']['id'];
    $date = $db_connection->FetchAllQuery('SELECT `date` FROM `user_setting` WHERE `user_id` = ?', [$userId]);
    $today = date('Y-m-d');

    if(!$date == $today && $date == NULL){
        echo "Je hebt vandaag de test nog niet gemaakt";
    }
    
    ?>
    <div class="inhoud" style="margin-top: 30px;display: flex;">
        <div style="width: 70%">
            <?php include "php/template/dashboard.php"?>
        </div>
        <div style="width: 30%; margin-top: 40px; font-weight: bold;font-size: 30px">
            <a href="questions.php" class="btn btn-btn-success" style="text-decoration: none">Vragen Invullen</a>
        </div>
    </div>

    

    <?php } ?>

    <!-- If gezondheidsmeter if off -->
    <?php if($_SESSION['user']['enabled'] == 0) { ?>
        <div class="inhoud" style="margin-top: 30px;display: flex;">
        <div style="width: 70%">
            Op dit moment staat de gezondheidsmeter uit en kun je geen vragen invullen.<br>
            Als je deze wilt aanzetten ga je naar je profiel en activeer je deze in je instellingen.<br>
            <a href="profile.php">Klik hier</a> om naar je profiel te gaan.
        </div>
    </div>
    <?php } ?>

    


</body>
</html>
