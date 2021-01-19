<?php
session_start();
if(!isset($_SESSION['user']['id'])){
    setcookie('error','Je moet ingelogd zijn om deze pagina te zien');
    header('location: index.php');
} else {
    session_destroy();
    setcookie('message', 'Je bent successvol uitglogd.');
    header('location: index.php');
}