<?php
require_once('db.inc.php');

if(isset($_POST['register_submit'])){
    $email = htmlspecialchars($_POST['email_uid']);
    $password = htmlspecialchars($_POST['password_uid']);
    $password_confirm = htmlspecialchars($_POST['password_confirm']);
    $firstname = htmlspecialchars($_POST['firstname_uid']);
    $lastname = htmlspecialchars($_POST['lastname_uid']);

    if($password === $password_confirm) {
        try {
            
            $dbName = 'gezondheid';
            $tbName = 'user';
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt= $db->prepare("INSERT INTO $dbName.$tbName (email, password, first_name, last_name) VALUES (?,?,?,?)");
            $stmt->execute([$email, $password, $firstname, $lastname]);

            $db = null;
        } catch (PDOException $e) {
            echo "error: $e";
        }
        header('location: ../../index.php');
    } else {
        header('location: ../../register.php');
    }
}
