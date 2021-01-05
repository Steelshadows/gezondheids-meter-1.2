<?php

try {
     $db = new PDO('mysql:host=localhost;dbname=gezondheid', "niels", "niels"); 
} catch (PDOException $e) {
    echo "Failed to connect: $e";
}
    