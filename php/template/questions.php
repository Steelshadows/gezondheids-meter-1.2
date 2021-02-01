<?php
require_once ("php/functions/questions.php");
$UID = $_SESSION['user']["id"];
$user = getUserData( $UID );
$questions = getQuestionData();
if(isset($_POST['submit'])){
    unset($_POST['submit']);
    updateUser($_POST,$UID);
    //var_dump($_POST);
}

echo '<form method="POST" class="login">'; 

foreach($questions as $question){
    $options = json_decode($question->options,true);
    echo 
    "<div class='question'>".
    "<label class='questionshow'>".$question->question."</label>";
    echo "<br>";
    
    if($question->variation == 'radio'){
        foreach($options["options"] as $option){
            echo "<br><input class='answers' type='radio' required name='".$question->type."' value=  '  ".$option["value"]."'>"."<label class='ans'>".$option["text"]."</label>";
        }
    }
    else{
        foreach($options["options"] as $option){
            echo "<br><input class='answers' type='checkbox' name='".$question->type."_".$option["text"]."' value=  '  ".$option["value"]."'>"."<label class='ans'>".$option["text"]."</label>";
        }
    }
    echo "</div>";
}
echo "<div class='question'>".
     "<label class='questionshow'>dit waren alle vragen, bedankt voor uw deelnamen</label>";
    
echo "</div>";
echo "<div class = 'buttonContainer'>";
echo '<button class = "button min" type="button" style = "float:left;padding: 1%;margin-bottom: 3%;margin-left: 2%;" onclick="questionMin()">Vorige</button>';
echo '<button class = "submit" type="submit" name="submit" value="submit" style = \'display:none !important;margin-bottom: 3%;padding: 2%;\'>Insturen</button>';
echo '<button class = "button plus" type="button" style = "float:right;padding: 1%;margin-bottom: 3%;margin-right: 2%;" onclick="questionPlus()">Volgende</button>';
echo "</div>";
echo '</form>';

?>

<html>
<style>
.questionshow {
    font-size: 40px;
    font-weight: bold;
}

.question {
    min-height:300px;
}

.answers {
    margin-bottom: 3%;
}

.ans {
    font-size: 25px;
    margin-left: 2%;
}

.button:hover {
    background-color: #7896FF;
    box-shadow: 0px 5px 10px 0px #000000;
}

.submit:hover {
    background-color: #7896FF;
    box-shadow: 0px 5px 10px 0px #000000;
}


</style>    
</html>