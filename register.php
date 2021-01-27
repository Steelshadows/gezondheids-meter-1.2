<?php
    require 'php/classes/DB_Connection.php';
    $db_connection = new db_connection();
    $error = [];
    if(isset($_POST['submit'])){
        $usernameLength = strlen($_POST['username']);
        if($usernameLength <= 5){
            $error['username'] = 'Je gebruikersnaam moet minimaal 5 tekens bevaten.';
        }
        if($usernameLength > 20) {
            $error['username'] ='Je gebruikersnaam mag niet langer zijn dan 20 tekens.';
        }

        $firstNameLength = strlen($_POST['first_name']);
        if($firstNameLength > 100){
            $error['first_name'] = 'Je voornaam max maximaal 100 tekens.';
        }

        $lastNameLength = strlen($_POST['last_name']);
        if($lastNameLength > 100){
            $error['last_name'] = 'Je achternaam max maximaal 100 tekens.';
        }

        $passwordLength = strlen($_POST['password']);
        if($passwordLength < 6){
            $error['password'] = 'Je wachtwoord moet minimaal 5 tekens bevaten.';
        }
        if($passwordLength > 20){
            $error['password'] = 'Je wachtwoord mag maximaal 20 tekens bevatten.';
        }

        if($_POST['password'] !== $_POST['password_repeat']){
            $error['password_repeat'] = 'De twee wachtwoorden moeten gelijk aan elkaar zijn.';
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $error['email'] = 'De email die je heb ingevuld is onjuist.';
        }
        if(sizeof($error) === 0){
            try {
                $password = htmlspecialchars($_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $firstName = htmlspecialchars($_POST['first_name']);
            $lastName = htmlspecialchars($_POST['last_name']);
            $usernameExist = (int) $db_connection->fetchQuery('SELECT count(`username`) AS `count` FROM `user` WHERE `username` = ? ', [$username])['count'];
            if($usernameExist === 1){
                $error['username'] = 'Gebruikersnaam wordt al gebruikt. Kies een andere.';
            }
            $emailExist = (int) $db_connection->fetchQuery('SELECT count(`email`) AS `count` FROM `user` WHERE `email` = ? ', [$email])['count'];
            if($emailExist === 1) {
                $error['email'] = 'Deze E-mailadres wordt al gebruikt. Kies een andere.';
            } 
            if($usernameExist !== 1 && $emailExist !== 1){
                try {
                    $db_connection->query('INSERT INTO `user` (`username`, `password`, `first_name`, `last_name`, `email`) VALUES(?,?,?,?,?)', [
                        $username,
                        $password,
                        $firstName,
                        $lastName,
                        $email
                    ]);
                    $userId = $db_connection->getLastId();
                    $user = $db_connection->fetchQuery('SELECT * FROM `user` WHERE `id` = ?', [$userId]);
                    session_start();
                    $_SESSION['user'] = $user;
                    $_SESSION['message'] = 'Account aangemaakt!';
                    header('location: dashboard.php');
                } catch(Exception $e) {
                    $error['general'] = 'Er is iets fout gegaan op de server probeer later opnieuw.';
                }
            }
            } catch(Exception $e){
                $error['general'] = 'Er is iets fout gegaan op de server probeer later opnieuw.';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/main.css">
    <title>Gezondheidsmeter: registeren</title>
</head>
<body>
    <?php include "includes/html/navbar.php" ?>
    <?php if(isset($error['general'])){ ?> 
        <div class="alert alert-danger">
            <?= $error['general'] ?>
        </div>
    <?php }  ?>
    <div class="login">
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <h1 class="text-center register-heading">Registeren</h1>

            <label for="username" maxlength="20" minlength="5" class="form-label">Gebruikersnaam:</label>
            <?php if(isset($error['username'])){ ?> 
                <label for="username" class="form-error"> <?=$error['username']?> </label> 
            <?php }  ?>
            <input type="text" name="username" id="username" required class="form-control" value="<?=isset($_POST['username']) ? $_POST['username'] : ''; ?>">

            <label for="first_name" class="form-label">Voornaam: </label>
            <?php if(isset($error['first_name'])){ ?> 
                <label for="first_name" class="form-error"> <?=$error['first_name']?> </label> 
            <?php }  ?>
            <input type="text" name="first_name" id="first_name" class="form-control" value="<?=isset($_POST['first_name']) ? $_POST['first_name'] : ''; ?>">

            <label for="last_name" class="form-label">Achternaam: </label>
            <?php if(isset($error['last_name'])){ ?> 
                <label for="last_name" class="form-error"> <?=$error['last_name']?> </label> 
            <?php }  ?>
            <input type="text" name="last_name" id="last_name" class="form-control" value="<?=isset($_POST['last_name']) ? $_POST['last_name'] : ''; ?>">

            <label for="password" class="form-label" >Wachtwoord:</label>
            <?php if(isset($error['password'])){ ?> 
                <label for="password" class="form-error"> <?=$error['password']?> </label> 
            <?php }  ?>
            <input type="password" name="password" id="password" required class="form-control">

            <label for="password_repeat" class="form-label">Herhaal Wachtwoord:</label>
            <?php if(isset($error['password_repeat'])){ ?> 
                <label for="password_repeat" class="form-error"> <?=$error['password_repeat']?></label> 
            <?php }  ?>
            <input type="password" name="password_repeat" id="password_repeat" required class="form-control">

            
            <label for="email" class="form-label">E-mailadres: </label>
            <?php if(isset($error['email'])){ ?> 
                <label for="email" class="form-error"> <?=$error['email']?> </label> 
            <?php }  ?>
            <input type="email" name="email" id="email" maxlength="255" class="form-control" required value="<?=isset($_POST['email']) ? $_POST['email'] : ''; ?>">

            <input type="submit" value="Registeren" name="submit" class="btn btn-success">
        </form>
    </div>
</body>
</html>