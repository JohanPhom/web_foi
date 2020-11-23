<?php

class Stat {

    var $current_point;
    var $nb_question;
    var $nb_answer;
}

//get user stat in object form
function get_user_stat($DB, $ID_user){

    $query = "SELECT * FROM user u 
                JOIN statistics s ON u.ID_user = s.ID_user
                WHERE u.ID_user=".$ID_user;

    $r = $DB->selectDB($query);

    if($r && mysqli_num_rows($r)==1){
        $stat = new Stat();
        $row = mysqli_fetch_array($r);
        $stat->current_point = $row['current_point'];
        $stat->nb_question = $row['nb_question'];
        $stat->nb_answer = $row['nb_answer'];
        return $stat;
    }
}

//set every stat of the user to 0 (initialization)
function set_stat($DB, $ID_user){

    $query = "INSERT INTO statistics VALUES ('$ID_user', 0, 0, 0)";
    if($DB->updateDB($query)){
        return true;
    }
    return false;
}

function delete_stat($DB, $ID_user){

    $query = "DELETE FROM statisctics WHERE ID_user=".$ID_user;
    if($DB->updateDB($query)){
        return true;
    }
}

//return an array with nb of point per question and answer
function get_points_question($DB){

    $query = "SELECT * FROM type_message";
    $array = array();
    $r = $DB->selectDB($query);

    if($r){
        $row = mysqli_fetch_array($r);
        $array['question'] = $row['point_given'];
        $row = mysqli_fetch_array($r);
        $array['answer'] = $row['point_given'];
        return $array;
    }
}

//add your number of question asked in the dtabase
function add_question($DB, $ID_user){

    $query = "UPDATE statistics SET nb_question = (SELECT count(*) FROM message WHERE ID_user=".$ID_user." AND ID_type_message = 1) WHERE ID_user='" . $ID_user . "'";
    if($DB->updateDB($query)){
        if(update_point($DB, $ID_user))
            return true;
    }
}

//add your number of answer in the database
function add_answer($DB, $ID_user){

    $query = "UPDATE statistics SET nb_answer = (SELECT count(*) FROM message WHERE ID_user=".$ID_user." AND ID_type_message = 2) WHERE ID_user='" . $ID_user . "'";
    if($DB->updateDB($query)){
        if(update_point($DB, $ID_user))
            return true;
    }
}

//update your number of point in the db
function update_point($DB, $ID_user){

    $array = get_points_question($DB);
    $query = "UPDATE statistics SET current_point = nb_question *" . $array['question'] .  " + nb_answer *" . $array['answer'] . " WHERE ID_user='" . $ID_user . "'";
    if($DB->updateDB($query)){
        return true;
    }
    return false;
}

//reset all your statistics
function reset_point($DB, $ID_user){
    
    $query = "UPDATE statistics SET current_point = 0, nb_question = 0, nb_answer = 0";
    if($DB->updateDB($query)){
        return true;
    }
    return false;
}

//update your points when buy an item
function buy_item_stat($DB, $ID_user, $item){

    $query = "UPDATE statistics SET current_point = current_point -". $item->price ." WHERE ID_user = ".$ID_user;
    if($DB->updateDB($query)){
        return true;
    }
    return false;
}


function delete_stat_user($DB, $ID_user){

    $query = "DELETE FROM statistics WHERE ID_user=".$ID_user;
    if($DB->updateDB($query))
        return true;
}