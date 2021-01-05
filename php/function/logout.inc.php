<?php 

require_once('login.inc.php');

if(isset($_POST['logout_submit'])){
    unset($_SESSION["session_id"]);
    header('location: ../../index.php');
    $_SESSION["session_id"] = null;
    die();
}



