<?php
require_once "php/function/include.php";
$error = null;
if(isset($_COOKIE['error'])) {
    $error = $_COOKIE['error'];
   setcookie('error', null, -1);
}
$message = null;
if(isset($_COOKIE['message'])) {
    $message = $_COOKIE['message'];
   setcookie('message', null, -1);
}
$db_connection = new db_connection();
$result = [];
if(isset($_POST['submit'])){
    $password = $_POST['password'];
    $username = $_POST['username'];
    $storedPW = null;
    $query = "SELECT * FROM `user` WHERE `username` = ?";
    $params = [$username];
    if($result = $db_connection->fetchQuery($query, $params)){
        if(password_verify($password,$result["password"])){
            session_start();
           $_SESSION['user'] = $result;

            header("Location: index.php");
        }
        else
        {
            $error = "Gebruikersnaam en/of wachtwoord is verkeerd.";
        }
    } else {
        $error = "Gebruikersnaam en/of wachtwoord is verkeerd."; 
    }
}
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/main.css">
    <title>Gezondheidsmeter: login</title>
</head>
<body>
    <?php include "parts/header.php"; ?>
    <?php if(isset($message)){ ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php } ?>  
    <div class="login">
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <?php if($error !== null){ ?>
                <label class="form-error"><?= $error ?></label>
           <?php } ?>
            <label for="username" class="form-label">Gebruikersnaam:</label>
            <input type="text" name="username" id="username" class="form-control">
            <label for="password_repeat" class="form-label">Wachtwoord:</label>
            <input type="password" name="password" id="password" class="form-control">
            <input type="submit" value="inloggen" name="submit" class="btn btn-success">
        </form>
    </div>
</body>
</html>