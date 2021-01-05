<?php
require_once('db.inc.php');
session_start();

if(isset($_POST['login_submit'])){
    
    $email = htmlspecialchars($_POST['email_uid']);
    $password = htmlspecialchars($_POST['password_uid']);

    try {       
        $stmt = $db->prepare("SELECT * FROM `user` WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetchAll();
        
        if(password_verify($password, $user[0][2])) {
            $_SESSION['session_id'] = $user[0][0];          
        } else {
            header('location: ../../login.php');
            echo "Password not correct";
        }

        header('location: ../../index.php');
        } catch (PDOException $e) {
        echo "error: $e";
    }
} 
