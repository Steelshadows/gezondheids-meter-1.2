<?php

function getQuestionData(){
    $DB = new db_connection();
    $DB_questions = $DB->fetchAllQuery(
        "SELECT question.id,`question`,`options`,setting_type.name as 'type_id', variation , `vervolg` , `vervolg_trigger` FROM `question` INNER JOIN `setting_type` ON question.type_id=setting_type.id"
    );
    $questions = [];
    
    foreach($DB_questions as $dbq){
        $question = (object)[];
        $question->id = $dbq["id"];
        $question->type = $dbq["type_id"];
        $question->question = $dbq["question"];
        $question->options = $dbq["options"];
        $question->variation = $dbq["variation"];
        $question->vervolg = $dbq["vervolg"];
        $question->vervolg_trigger = $dbq["vervolg_trigger"];
        array_push($questions,$question);
    }
    
    
    
    return $questions;
}
function getUserData( $UID ){
    //: change to a sql query
    $user = (object)[];
    $user->id = $UID;
    $user->uses = (object)[];
    $user->uses->alcohol = true;
    $user->uses->drugs = true;
    $user->uses->work = true;
    
    if($user->uses->alcohol == true){
        $user->alcohol = (object)[];
        $user->alcohol->use = "severe";
        $user->alcohol->type = ["rum","beer"];
    }
    if($user->uses->drugs == true){
        $user->drugs = (object)[];
        $user->drugs->use = "minor";
        $user->drugs->type = ["weed"];
    }
    if($user->uses->work == true){
        $user->work = (object)[];
        $user->work->place = "bad";
        $user->work->times = "bad";
        $user->work->pressure = "bad";
    }
    
    $user->sport = (object)[];
    $user->sport->durationH = "5"; //hours
    $user->sport->durationM = "5"; //minutes
    $user->sport->walked = true;
    $user->sport->bike = true;
    
    $user->food = (object)[];
    $user->food->vegetables = true;
    $user->food->fruit = false;
    $user->food->meat = true;
    $user->food->fats = false;
    $user->food->dairy = false;
    $user->food->ate = ["groente"=>"5 gram","vlees"=>"100 gram"];
    
    $user->slaapU = "3";//hours 
    
    return $user;
}
function updateUser($postData, $UID){
    $DB = new db_connection();
   //echo "<pre>";
   //var_dump($postData);
   foreach($postData as $key => $post){


        $type_id = $DB->fetchQuery("SELECT `id` FROM `setting_type` WHERE `name` = ?",[$key]);
        if ($type_id != false){
            $type_id = $type_id["id"];
        }else{
            $db_questions = $DB->Query("INSERT INTO `setting_type` (`name`) VALUES ( ? )",[$key]);
            $type_id = $DB->fetchQuery("SELECT `id` FROM `setting_type` WHERE `name` = ?",[$key])["id"];
        }
        $db_questions = $DB->Query("INSERT INTO `user_setting` (`user_id`,`type_id`, `value`) VALUES (?,?,?)",[(int)$UID,(int)$type_id,(int)$post]);
        //var_dump([(int)$UID,(int)$type_id,(int)$post,$db_questions]);

       
    }
    //echo "</pre>";
}