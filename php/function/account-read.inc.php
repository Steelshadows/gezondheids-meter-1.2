<?php
require_once('db.inc.php');

$id = $_SESSION["session_id"];

try {
    $stmt = $db->prepare("SELECT * FROM `user` WHERE id = ?");
    $stmt->execute([$id]);
    $result = $stmt->fetchAll();

} catch (PDOException $e) {
    echo "error: $e";
}