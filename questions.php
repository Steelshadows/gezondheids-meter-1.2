<?php
    
    session_start();
    require_once "php/classes/DB_Connection.php";
    require_once "php/functions/questions.php";
    $error = [];
    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/main.css">
    <title>Document</title>
</head>
<body>
<script src="js/question.js"></script>
    <?php include "includes/html/navbar.php" ?>
    <div>
    <?php include "php/template/questions.php" ?>

    </div>
    <script>revealQuestion(0)</script>
</body>
</html>