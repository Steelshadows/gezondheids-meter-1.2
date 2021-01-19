<?php
require_once ("php/functions/questions.php");
//var_dump($_SESSION['user']);
$UID = $_SESSION['user']["id"];
$user = getUserData( $UID );
$questions = getQuestionData();
if(isset($_POST['submit'])){
    unset($_POST['submit']);
    updateUser($_POST,$UID);
}

echo '<form method="POST" class="login">'; 

foreach($questions as $question){
    $options = json_decode($question->options,true);
    echo 
    "<div class='question'>".
    "<label>".$question->question."</label>";
    foreach($options["options"] as $option){
        echo "<br><input type='radio' required name='".$question->type."' value=  '  ".$option["value"]."'>".
        "<label>".$option["text"]."</label>";
    }
    echo "</div>";
}
echo 
    "<div class='question'>".
    "<label>dit waren alle vragen, bedankt voor uw deelnamen</label>";
    echo "</div>";
echo '<button class = "submit" type="submit" name="submit" value="submit" style = \'display:none\'>Insturen</button></form>';