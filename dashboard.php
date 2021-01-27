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
    <title>Gezondheidsmeter: dashboard</title>
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

    <div>
        <a href="questions.php" class="btn btn-btn-success">Vragen invullen</a> 
        <?php include "php/template/dashboard.php"?></div>
    </div>
</body>
</html>