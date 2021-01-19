<?php
    session_start();
    if(!isset($_SESSION['user']['id'])){
    setcookie('error','Je moet ingelogd zijn om deze pagina te zien');
    header('location: index.php');
    }

require 'vendor/autoload.php';
    require 'php/classes/db_connection.php';
    $db_connection = new db_connection();
    if(isset($_POST['submit'])){
        $sql = 'UPDATE `user` SET `username`= ? ,`email`= ? ,`first_name`= ? ,`last_name`= ?  WHERE `id` = ?';
        $db_connection->query($sql, [
            htmlspecialchars($_POST ['username']),
            htmlspecialchars($_POST['email']),
            htmlspecialchars($_POST['first_name']),
            htmlspecialchars($_POST['last_name']),
            htmlspecialchars($_SESSION['user']['id']),
        ]);
        $_SESSION ['user']['username'] = htmlspecialchars( $_POST['username']);
        $_SESSION['user']['first_name'] = htmlspecialchars($_POST['first_name']);
        $_SESSION['user']['last_name'] = htmlspecialchars($_POST['last_name']);
        $_SESSION['user']['email'] = htmlspecialchars($_POST['email']);
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="dist/css/main.css">
    <title>Document</title>

</head>
<body>

    <?php include "includes/html/navbar.php" ?>
    <form action="" method="post" class="login">
        <label>Gebruikersnaam</label>
        <input type="text" name="username" id="" value="<?=$_SESSION['user']['username']?>" class="form-control">
        <label>Naam</label>
        <input type="text" name="first_name" id="" value="<?=$_SESSION['user']['first_name']?>" class="form-control">
        <label>Achternaam</label>
        <input type="text" name="last_name" id="" value="<?=$_SESSION['user']['last_name']?>" class="form-control">
        <label>E-mail</label>
        <input type="text" name="email" id="" value="<?=$_SESSION['user']['email']?>" class="form-control">
        <input type="submit" name="submit" value="verzenden" class="btn-success">
    </form>
</body>
</html>
