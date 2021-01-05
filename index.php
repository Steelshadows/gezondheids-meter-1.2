<?php
include "parts/header.php";
require_once('php/function/user.inc.php');
?>

<!-- User is uitgelogd-->
<?php if(!isset($_SESSION["session_id"])) { 
            $_SESSION["session_id"] = null;
        ?>
        <p>Welcome to the You & Me Smoelenboek!</p>
        <p>Please login or create an account first to get an overview of everyone.</p>
        <?php } ?>

<?php
include "parts/footer.php";
?>