<?php
include "parts/header.php";
require_once('php/function/user.inc.php');
?>

<main>

    <p>Wat heb je vandaag gedronken?</p><br><br>
    <div class="test-container">
        <form action="/test.inc.php">
            <input type="radio" name="input1" value="input1">
            <label>Voornamelijk water</label><br>
            <input type="radio" name="input2" value="input2">
            <label>Koffie en andere cafeinehoudende dranken</label><br>
            <input type="radio" name="input3" value="input3">
            <label>Alcohol en suikerhoudende dranken</label><br><br>
            <button type="submit" name="next_question">Verder</button>
        </form> <br><br>
        <a class="test-btn" href="google.com">1</a>
    </div>  
</main>


<?php
include "parts/footer.php";
?>