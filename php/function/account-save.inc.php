<?php
require_once('db.inc.php');
require_once('account-read.inc.php');

if(isset($_POST['save_submit'])){    
    $id = $_SESSION["session_id"];
    $email = htmlspecialchars($_POST['email_uid']);
    $password = htmlspecialchars($_POST['password_uid']);
    $password_confirm = htmlspecialchars($_POST['password_confirm']);
    $firstname = htmlspecialchars($_POST['firstname_uid']);
    $lastname = htmlspecialchars($_POST['lastname_uid']);

    try {
        $stmt = $db->prepare("UPDATE `user` SET email = ? , password = ? , first_name = ? , last_name = ? WHERE id = ?");
        $stmt->execute([$email, $password, $firstname, $lastname, $id]);
    } catch (PDOException $e) {
        echo "error: $e";
    }

    header('location: ../../account.php');
}