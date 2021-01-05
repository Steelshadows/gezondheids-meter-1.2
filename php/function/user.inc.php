<?php
require_once('db.inc.php');

if(isset($_SESSION['session_id'])){
    try {
        $stmt = $db->prepare("SELECT * FROM `user` WHERE id = ?");
        $stmt->execute([$_SESSION['session_id']]);
        $user = $stmt->fetch();
    } catch (PDOException $e) {
        echo "error: $e";
    } 
    
    if(!isset($_SESSION['session_id'])){
        $_SESSION['session_id'] = null;
    }
                                                  
}
