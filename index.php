<?php
include "parts/header.php";
require_once('php/function/user.inc.php');
?>

<?php if(!isset($_SESSION["session_id"])) { 
            $_SESSION["session_id"] = null;
        ?>
        <main>
            <p>Welkom bij de gezondheidsmeter!</p>
            <p>Wil jij weten of je gezond bezig bent? Maak dan nu snel een account aan en kom erachter!</p>
        </main>      
<?php } ?>
<?php if(isset($_SESSION["session_id"])) { ?>
        <main>
        <h1>Gezondheidstest</h1>
        <p>Als je vitaal wilt blijven leven is het belangrijk dat je gezond leeft. Gezond leven bestaat uit voldoende fruit
        en groente eten, genoegen beweging en rustig aandoen met roken en alchohol.<br><br>

        Wil je weten hoe jij het er in het dagelijks leven vanaf brengt? Doe dan de gezondheidstest!</p><br><br>

        <a class="test-btn" href="test.php">Doe de test!</a><br><br>

        <p>Heel veel succes!</p>
        </main>
<?php } ?>
<?php
include "parts/footer.php";
?>