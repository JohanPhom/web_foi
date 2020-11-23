<?php

class Message
{
    var $ID;
    var $user;
    var $ID_forum;
    var $club;
    var $question; //equal to 1 if it is a question, 0 if it's an answer
    var $text;
    var $date;
    var $best_answer; // equel to 1 if it is the best answer
    var $nb_answer;
    var $image;
    var $terms;
}

function createForum($DB, $ID_user, $ID_club)
{
    $question = $_POST['question'];
    $question = transform_message($question);
    $now = virtual;
    $query = "INSERT INTO forum VALUES (NULL, '$ID_club', '$ID_user', 0)";
    if ($DB->updateDB($query)) {

        $query = "SELECT ID_forum FROM forum ORDER BY ID_forum DESC LIMIT 1";
        $r = $DB->selectDB($query);

        if ($r) {
            $row = mysqli_fetch_array($r);
            $ID_forum = $row['ID_forum'];

            $query = "INSERT INTO message VALUES (NULL, '$ID_user', 1, '$ID_forum', '$question', '$now', -1, '', -1)";
            if ($DB->updateDB($query)) {

                if(add_question($DB, $ID_user))
                    return true;
            }
        }
    }

    return false;
}

//get the list of every forum 
function get_list_forum($DB)
{
    $query = "SELECT * FROM message m 
                    JOIN user u ON m.ID_user = u.ID_user
                    JOIN forum f ON m.ID_forum=f.ID_forum
                    JOIN club c ON f.ID_club=c.ID_club
                WHERE ID_type_message = 1";

    $r = $DB->selectDB($query);
    $array = array();
    $i = 0;
    if ($r) {

        while ($row = mysqli_fetch_array($r)) {
            $array[$i] = new Message();
            $array[$i]->club = new Club();

            $array[$i]->ID_forum = $row['ID_forum'];
            $array[$i]->text = $row['text_message'];
            $array[$i]->date = $row['date'];
            $array[$i]->user = $row['username'];
            $array[$i]->nb_answer = get_number_answer($DB, $row['ID_forum']);

            if ($row['ID_type_message'] == 1) {
                $array[$i]->question = 1;
            } else {
                $array[$i]->question = -1;
            }

            if ($row['best_answer'] == 1) {
                $array[$i]->best_answer = 1;
            } else {
                $array[$i]->best_answer = -1;
            }

            //we retrieve the club in form of object
            $ID_club = $row['ID_club'];
            $array[$i]->club = get_club_from_ID($ID_club, $DB);

            $i++;
        }
        return $array;
    }
}

//remove the character '
function transform_message($text)
{
    $text = preg_replace('/\'/', " ", $text);
    return $text;
}

//get every answer from a discussion, return an array of message
function get_discussion($DB, $ID_forum)
{

    $query = "SELECT * FROM message m JOIN user u ON m.ID_user = u.ID_user WHERE ID_forum=" . $ID_forum . " AND ID_type_message = 2 ORDER BY best_answer DESC, date ASC";
    $r = $DB->selectDB($query);

    if ($r) {

        $i = 0;
        $array = array();

        while ($row = mysqli_fetch_array($r)) {
            $array[$i] = new Message();
            $array[$i] = get_message($row);
            $i++;
        }

        return $array;
    }
    return false;
}

//get every answer from a discussion, return an array of message
function get_stat_club($DB, $ID_club, $filter)
{
    
    $query = "SELECT * FROM message m 
                JOIN forum f ON m.ID_forum=f.ID_forum
                JOIN user u ON m.ID_user=u.ID_user
                WHERE ID_club=" . $ID_club;
    
    if($filter != ""){
        $query .= " ORDER BY ".$filter;
    }

    $r = $DB->selectDB($query);
    if ($r) {
        $i = 0;
        $array = array();
        $nb_question = 0;
        $nb_answer = 0;
        while ($row = mysqli_fetch_array($r)) {
            $array[$i] = new Message();
            $array[$i] = get_message($row);
            if($array[$i]->question == 1){
                $nb_question++;
            }else{
                $nb_answer++;
            }
            $i++;
        }
        
        return $array;
    }
    return false;
}

//returns an array with 2 keys : question and answers with the number of them
function get_nb_question_answers($stats)
{
    $array = array("question" => 0, "answer" => 0);
    foreach($stats as $stat){
        if($stat->question == 1){
            $array['question']++;
        }else{
            $array['answer']++;
        }
    }
    return $array;
}

//return only the topic of the forum
function get_topic($DB, $ID_forum)
{

    $query = "SELECT * FROM message m
         JOIN user u ON m.ID_user = u.ID_user
         JOIN forum f on m.ID_forum = f.ID_forum 
    WHERE m.ID_forum=" . $ID_forum . " AND ID_type_message = 1";

    $r = $DB->selectDB($query);
    if ($r) {
        $row = mysqli_fetch_array($r);
        $topic = get_message($row);
        $club = get_club_from_ID($row['ID_club'], $DB);
        $topic->club = $club;
        return $topic;
    }
    return false;
}

//get any message from DB
function get_message($row)
{

    $message = new Message();
    $message->ID = $row['ID_message'];
    $message->user = $row['username'];
    $message->ID_forum = $row['ID_forum'];
    $message->text = $row['text_message'];
    $message->date = $row['date'];
    $message->image = $row['path_image'];
    $message->terms = $row['terms'];

    if ($row['best_answer'] == 1) {
        $message->best_answer = 1;
    } else {
        $message->best_answer = -1;
    }

    if ($row['ID_type_message'] == 1) {
        $message->question = 1;
    } else {
        $message->question = -1;
    }

    return $message;
}

function new_message($DB, $ID_user, $ID_forum)
{
    $now = virtual;
    $answer = $_POST['answer'];
    $answer = transform_message($answer);
    $path_image = "";
    $terms= -1;
    if(!empty($_POST['image'])){
        $path_image = $_POST['image'];
        if(isset($_POST['terms'])){
            $terms = 1;
        }
    }

    $query = "INSERT INTO message VALUES (NULL, '$ID_user', 2, '$ID_forum', '$answer', '$now', -1, '$path_image', '$terms')";

    if ($DB->updateDB($query)) {

        $query = "UPDATE forum SET number_answer = (SELECT count(*) FROM message WHERE ID_forum=".$ID_forum." AND ID_type_message=2) WHERE ID_forum=".$ID_forum;
        if ($DB->updateDB($query)){

            if(add_answer($DB, $ID_user))
                return true;
        }
    }
    return false;
}

function delete_message($DB, $ID_message)
{
    $query = "SELECT f.ID_forum FROM message m JOIN forum f ON m.ID_forum = f.ID_forum WHERE ID_message=".$ID_message;
    $r = $DB->selectDB($query);

    if ($r) {
        $row = mysqli_fetch_array($r);
        $ID_forum = $row['ID_forum'];

        $query = "DELETE FROM message WHERE ID_message=" . $ID_message;
        if ($DB->updateDB($query)) {

            $query = "UPDATE forum SET number_answer = (SELECT count(*) FROM message WHERE ID_forum=".$ID_forum." AND ID_type_message=2) WHERE ID_forum=".$ID_forum;
            if($DB->updateDB($query))
                return true;
        }
    }
    return false;
}

function delete_forum($DB, $ID_forum)
{

    $query = "DELETE FROM message WHERE ID_forum=" . $ID_forum;
    $query2 = "DELETE FROM forum WHERE ID_forum=" . $ID_forum;

    $r = $DB->updateDB($query);
    if ($r) {
        $r1 = $DB->updateDB($query2);
        if ($r1) {
            return true;
        }
    }
    return false;
}

function get_number_answer($DB, $ID_forum)
{

    $query = "SELECT number_answer FROM forum WHERE ID_forum=" . $ID_forum;
    $r = $DB->selectDB($query);

    if ($r) {
        $row = mysqli_fetch_array($r);
        return $row['number_answer'];
    }
    return false;
}

//return every forum from a particular fan club
function get_forum_fan_club($DB, $ID_club){

    $query = "SELECT * FROM message m 
                    JOIN user u ON m.ID_user = u.ID_user
                    JOIN forum f ON m.ID_forum=f.ID_forum
                    JOIN club c ON f.ID_club=c.ID_club
                WHERE ID_type_message = 1 AND f.ID_club=".$ID_club." ORDER BY f.number_answer DESC";

    $r = $DB->selectDB($query);
    $array = array();
    $i = 0;
    if ($r) {

        while ($row = mysqli_fetch_array($r)) {
            $array[$i] = new Message();
            $array[$i]->club = new Club();

            $array[$i]->ID_forum = $row['ID_forum'];
            $array[$i]->text = $row['text_message'];
            $array[$i]->date = $row['date'];
            $array[$i]->user = $row['username'];
            $array[$i]->nb_answer = get_number_answer($DB, $row['ID_forum']);

            if ($row['ID_type_message'] == 1) {
                $array[$i]->question = 1;
            } else {
                $array[$i]->question = -1;
            }

            if ($row['best_answer'] == 1) {
                $array[$i]->best_answer = 1;
            } else {
                $array[$i]->best_answer = -1;
            }

            //we retrieve the club in form of object
            $ID_club = $row['ID_club'];
            $array[$i]->club = get_club_from_ID($ID_club, $DB);

            $i++;
        }
        return $array;
    }
}

//set the message as best answer
function set_best_answer($DB, $ID_message){

    $query = "SELECT ID_forum FROM message WHERE ID_message=".$ID_message;
    $r = $DB->selectDB($query);

    if($r){
        $row = mysqli_fetch_array($r);
        $ID_forum = $row['ID_forum'];
    }

    $query = "UPDATE message SET best_answer = 1 WHERE ID_message=".$ID_message." OR (ID_forum= ".$ID_forum." AND ID_type_message=1)";
    if($DB->updateDB($query)){
        return true;
    }
    return false;
}

//reset best answer 
function reset_best_answer($DB, $ID_message){

    $query = "UPDATE message SET best_answer = -1 WHERE ID_message=".$ID_message;
    if($DB->updateDB($query)){
        if(update_best_answer($DB, $ID_message));
            return true;
    }
    return false;
}

//update the best answer 
function update_best_answer($DB, $ID_message){

    $query = "SELECT ID_forum FROM message WHERE ID_message=".$ID_message;
    $r = $DB->selectDB($query);

    if($r){
        $row = mysqli_fetch_array($r);
        $ID_forum = $row['ID_forum'];

        //we check if the forum still has a best answer
        $query = "SELECT * FROM message WHERE ID_forum=".$ID_forum." AND ID_type_message = 2 AND best_answer = 1";
        $r1 = $DB->selectDB($query);

        if(mysqli_num_rows($r1) == 0){

            $query = "UPDATE message SET best_answer = -1 WHERE ID_forum=".$ID_forum." AND ID_type_message = 1";
            if($DB->updateDB($query)){
                return true;
            }
        }
    }
    return false;
}

//delete every message from user 
function delete_message_user($DB, $ID_user){
    $query = "DELETE FROM message WHERE ID_user=".$ID_user;
    if($DB->updateDB($query))
        return true;
}

//delete every forum created by user 
function delete_forum_user($DB, $ID_user){

    $query = "DELETE FROM forum WHERE ID_creator_user=".$ID_user;
    if($DB->updateDB($query))
        return true;
}