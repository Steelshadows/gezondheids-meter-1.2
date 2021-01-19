<?php

function getUsersData($UID){
    $DB = new db_connection();
    $questions = [];
    $params = [$UID];
    $questions['Voeding'] = $DB->fetchQuery("SELECT AVG(user_setting.value) FROM user_setting INNER JOIN setting_type where user_setting.type_id = setting_type.id AND user_setting.user_id = ? AND setting_type.name LIKE 'Voeding_%'",$params);
    $questions['work'] = $DB->fetchQuery("SELECT AVG(user_setting.value) FROM user_setting INNER JOIN setting_type where user_setting.type_id = setting_type.id AND user_setting.user_id = ? AND setting_type.name LIKE 'work_%'",$params);
    $questions['sleep'] = $DB->fetchQuery("SELECT AVG(user_setting.value) FROM user_setting INNER JOIN setting_type where user_setting.type_id = setting_type.id AND user_setting.user_id = ? AND setting_type.name LIKE 'sleep_%'",$params);
    $questions['sport'] = $DB->fetchQuery("SELECT AVG(user_setting.value) FROM user_setting INNER JOIN setting_type where user_setting.type_id = setting_type.id AND user_setting.user_id = ? AND setting_type.name LIKE 'sport_%'",$params);
    $questions['drugs'] = $DB->fetchQuery("SELECT AVG(user_setting.value) FROM user_setting INNER JOIN setting_type where user_setting.type_id = setting_type.id AND user_setting.user_id = ? AND setting_type.name LIKE 'drugs_%'",$params);
    
    
    
    
    return $questions;
}
