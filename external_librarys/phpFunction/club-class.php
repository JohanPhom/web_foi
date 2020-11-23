<?php

class club{
    var $ID;
    var $name;
    var $description;
    var $author;
    var $image;
    var $date_creation;
    var $image_title;
    var $has_test;
    var $nb_member;
    var $nb_moderator;
    var $nb_item;
    var $ID_creator;
    var $promote;
}

function insert_new_club($user_ID, $DB){

    $club = club_form_into_object();

    if(!$club){        
        return false;
    }
    
    $club->description = preg_replace('/\'/', " ", $club->description);
    
    $now = virtual;
    
    $query = "INSERT INTO club (ID_club, ID_creator_user, name, description, nb_member, nb_item, date_created, author, image, image_title, promote)
                VALUES (NULL, $user_ID, '$club->name', '$club->description', '0', '0', '$now', '$club->author', '$club->image', '$club->image_title', 30)"; 
    $r = $DB->updateDB($query);

    if($r){
        $query = "SELECT ID_club FROM club WHERE name='".$club->name."'";
        $r2 = $DB->selectDB($query);
        $row = mysqli_fetch_array($r2);
        $club->ID = $row['ID_club'];

        $query = "INSERT INTO club_member (ID_user, ID_club, moderator) VALUES ('$user_ID', '$club->ID', '1')";
        $r3 = $DB->updateDB($query);
        return $club->name;
    }
    
    return false;
    

}

function club_form_into_object(){
    
    if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['author']) && !empty($_POST['image']) && !empty($_POST['image_title'])){
        
        $club = new club();

        $club->name = $_POST['name'];
        $club->description = $_POST['description'];
        $club->author = $_POST['author'];
        $club->image = $_POST['image'];
        $club->image_title = $_POST['image_title'];
        return $club;
    }else{
        return false;
    }
}

//retrieve a list of club (object) from the query
function club_DB_into_object($r, $DB){

    $list_club = array();

    $i=0;

    while($club = mysqli_fetch_array($r)){
        $list_club[$i] = new club();
        $list_club[$i]->ID = $club['ID_club'];
        $list_club[$i]->name = $club['name'];
        $list_club[$i]->author = $club['author'];
        $list_club[$i]->date_creation = $club['date_created'];
        $list_club[$i]->description = $club['description'];
        $list_club[$i]->image = $club['image'];
        $list_club[$i]->image_title = $club['image_title'];
        $list_club[$i]->nb_member = $club['nb_member'];
        $list_club[$i]->nb_item = $club['nb_item'];
        $list_club[$i]->ID_creator = $club['ID_creator_user'];
        $list_club[$i]->promote = $club['promote'];

        if(isset($club['username']))
            $list_club[$i]->creator_user = $club['username'];

        //retrieve the number of moderator
        $query = "SELECT count(*) AS nb FROM club_member WHERE ID_club='".$list_club[$i]->ID."' AND moderator=1";
        $r2 = $DB->selectDB($query);

        $row = mysqli_fetch_array($r2);
        $list_club[$i]->nb_moderator = $row['nb'];
        
        if(club_has_test($DB, $list_club[$i]->ID)){
            $list_club[$i]->has_test = true;
        }else{
            $list_club[$i]->has_test = false;
        }
        $i++;
    }

    return $list_club;
}

function set_promote($DB, $ID_club, $nb){

    $query = "UPDATE club SET promote=".$nb." WHERE ID_club=".$ID_club;
    if($DB->updateDB($query))
        return true;
}

//return the club in function of th filter
function get_club_by_filtered($DB, $filter){

    $filter = strtoupper($filter);
    $query = "SELECT * FROM club WHERE UPPER(name) LIKE '%".$filter."%' LIMIT 1";
    $r = $DB->selectDB($query);
    $club = club_DB_into_object($r, $DB)[0];
    return $club;
}

//retrieve the club which has the most followers
function get_best_club($DB){

    $query = "SELECT * FROM club ORDER BY nb_member DESC LIMIT 1";
    $r = $DB->selectDB($query);
    $club = club_DB_into_object($r, $DB);
    return $club[0];
}

function get_list_test($DB, $query){

    $r = $DB->selectDB($query);
    $test_list = array();
    $i=0;
    while($row = mysqli_fetch_array($r)){
        $test_list[$i]['name'] = $row['name'];
        $test_list[$i]['image'] = $row['image_title'];
        $test_list[$i]['user'] = $row['username'];
        $test_list[$i]['success'] = $row['success'];
        $test_list[$i]['date'] = $row['date'];
        $i++;
    }

    return $test_list;
    
}

function get_list_test_club($DB, $ID_club, $filter){

    if($filter != ""){

    $query = "SELECT u.username, tu.success, tu.date, tu.nb_attempt, tu.good_answer, t.nb_question, t.ID_test FROM test t
            JOIN test_user tu ON tu.ID_test = t.ID_test
            JOIN user u ON u.ID_user = tu.ID_user
            WHERE ID_club = ".$ID_club."
        ORDER BY ".$filter." ASC";
        
    }else{   
        $query = "SELECT u.username, tu.success, tu.date, tu.nb_attempt, tu.good_answer, t.nb_question, t.ID_test FROM test t
            JOIN test_user tu ON tu.ID_test = t.ID_test
            JOIN user u ON u.ID_user = tu.ID_user
            WHERE ID_club = ".$ID_club."
        ORDER BY tu.date DESC";
    }

    $r = $DB->selectDB($query);
    if($r){

        $test_list = array();
        $i=0;
        while($row = mysqli_fetch_array($r)){
            $test_list[$i]['username'] = $row['username'];
            $test_list[$i]['nb_attempt'] = $row['nb_attempt'];
            $test_list[$i]['good_answer'] = $row['good_answer'];
            $test_list[$i]['success'] = $row['success'];
            $test_list[$i]['date'] = $row['date'];
            $test_list[$i]['nb_question'] = $row['nb_question'];
            $test_list[$i]['ID_test'] = $row['ID_test'];
            $i++;
        }
        
        return $test_list;
    }
    return false;
    
}

//retrieve a club from its ID
function get_club_from_ID($ID, $DB){

    $query = "SELECT * FROM user u JOIN club c ON c.ID_creator_user = u.ID_user WHERE ID_club=".$ID;

    $r = $DB->selectDB($query);

    $club = club_DB_into_object($r, $DB);
    if($club != ""){
        return $club[0];
    }else{
        return false;
    }
}

//create a test
function createTest($DB, $ID_club, $nb_question){
    $test_array = array();

    for($i = 1; $i<$nb_question+1; $i++){
        $numero = (string)$i;
        $question = "question";
        $answer = "answer";
        $question .= $numero;
        $answer .= $numero;
        $test_array[$question] = $_POST[$question];
        $test_array[$answer] = $_POST[$answer];
        $test_array[$question] = preg_replace('/\'/', " ", $test_array[$question]);

        if(empty($_POST[$question]) || empty($_POST[$answer])){
            return "Please fill out the test correctly";
        }
    }

    //on creer un new test
    $query = "INSERT INTO test VALUES (NULL, '$ID_club', '$nb_question')";
    if($DB->updateDB($query)){
        
        //on récupere l'ID du nouveau test 
        $query = 'SELECT ID_test FROM test WHERE ID_club='.$ID_club;        
        $r = $DB->selectDB($query);
        
        if($r){
            $row = mysqli_fetch_array($r);
            $ID_test = $row['ID_test'];
            
            for($i = 1; $i<$nb_question+1; $i++){
                
                $numero = (string)$i;
                $question = "question";
                $answer = "answer";
                $question .= $numero;
                $answer .= $numero;
                //on insere les question
                $query = "INSERT INTO question_answer VALUE (NULL, '$ID_test', '$test_array[$question]', '$test_array[$answer]')";   

                if(!$DB->updateDB($query)){
                    return "Impossible to create the test !<br>";
                }
            }

            return "";
        }
    }
    return "Impossible to create the test !<br>";
}

//return true if the club has a test
function club_has_test($DB, $ID_club){

    $query = "SELECT * FROM test WHERE ID_club=".$ID_club;
    $r = $DB->selectDB($query);

    if(mysqli_num_rows($r) >= 1){
        return true;
    }else{
        return false;
    }
}

//return the test in an array form
function get_test_from_DB($DB, $ID_club){

    $query = "SELECT ID_test, nb_question FROM test WHERE ID_club=".$ID_club;

    $r = $DB->selectDB($query);

    if($r && mysqli_num_rows($r) >=1){
        $row = mysqli_fetch_array($r);
        $ID_test = $row['ID_test'];
        $nb_question = $row['nb_question'];

        $query = "SELECT * FROM question_answer WHERE ID_test=".$ID_test;
        $r2 = $DB->selectDB($query);

        $test_array = array();
        $i = 1;
        while($row = mysqli_fetch_array($r2)){
            $numero = (string)$i;
            $question = "question";
            $answer = "answer";
            $question .= $numero;
            $answer .= $numero;

            $test_array[$question] = $row["question"];
            $i++;
        }

        return $test_array;
    }

    return false;
}

//check if the user has the answer, add an attempt to this test
function check_answer($DB, $ID_user, $ID_club){

    $now = virtual;

    $i=1;

    //we retrieve number of answer given
    while(isset($_POST['answer'.$i])){
        $i++;
    }

    $nb_answer = $i-1;
    
    //we retrieve the table test so we can have the ID of the test
    $query = "SELECT * FROM test WHERE ID_club=".$ID_club;

    $r = $DB->selectDB($query);
    if($r){
        $row = mysqli_fetch_array($r);
        $ID_test = $row['ID_test'];
        
        //we retrieve good answers from the test and compare them to those given by user
        $query = "SELECT * FROM question_answer WHERE ID_test=".$ID_test;
        $r2 = $DB->selectDB($query);
        
        if($r2){
            $i = 1;
            $points = 0;
            while($row = mysqli_fetch_array($r2)){                
                if(strtoupper($row['answer']) == strtoupper($_POST['answer'.$i]))
                    $points++;

                $i++;
            }
            
            $success = -1;
            
            //if user has more than 50% of total points, he success
            if($points >= $nb_answer/2){
                $success = 1;
            }

            //we retrive how many attempt did the user for this test
            $query = "SELECT nb_attempt FROM test_user WHERE ID_user=".$ID_user." AND ID_test=".$ID_test." ORDER BY nb_attempt DESC LIMIT 1";

            if($r3 = $DB->selectDB($query)){
                $row = mysqli_fetch_array($r3);
                $nb_attempt = $row['nb_attempt']+1;
                
            }else{
                echo $query;
                $nb_attempt = 1; 
            }

            //we add a new row to save the test passed by the user
            $query = "INSERT INTO test_user (ID_test_user, ID_user, ID_test, date, success, good_answer, nb_attempt) VALUES
                (NULL, '$ID_user', '$ID_test', '$now', '$success', '$points', '$nb_attempt')";

            if($DB->updateDB($query) && $success == 1){
                return true;
            }

            return false;
        }

    }
}

//delete a test from a club
function deleteTest($DB, $ID_club){

    $query = "SELECT ID_test, nb_question FROM test WHERE ID_club=".$ID_club;

    $r = $DB->selectDB($query);

    if($r){
        $row = mysqli_fetch_array($r);
        $ID_test = $row['ID_test'];
        $query = "DELETE FROM question_answer WHERE question_answer.ID_test=".$ID_test;
        if($DB->updateDB($query)){
            $query = "DELETE FROM test_user WHERE test_user.ID_test=".$ID_test;
            if($DB->updateDB($query)){
                $query = "DELETE FROM test WHERE ID_test=".$ID_test;
                if($DB->updateDB($query)){
                    return true;
                }
            }
        }
    }
    return false;
}

//insert a new user to club member
function add_user_to_club($DB, $ID_user, $ID_club){

    $query = "INSERT INTO club_member (ID_user, ID_club, moderator) VALUES ('$ID_user', '$ID_club', '-1')";
    if($DB->updateDB($query)){
        
        $query = "UPDATE club SET nb_member = (SELECT count(*) FROM club_member c WHERE c.ID_club =".$ID_club.") WHERE club.ID_club=".$ID_club;
        if($DB->updateDB($query)){
            return true;
        }
    }

    return false;
}

//user unfollows clubs 
function delete_club_user($DB, $ID_user){

    $query = "DELETE FROM club_member WHERE ID_user=".$ID_user;
    if($DB->updateDB($query))
        return true;
}

//delete every club members from club
function delete_club_member($DB, $ID_club){
    $query = "DELETE FROM club_member WHERE ID_club=".$ID_club;
    if($DB->updateDB($query))
        return true;
}

function unfollow_club($DB, $user, $club){

    $query = "DELETE FROM club_member WHERE ID_user=".$user->ID." AND ID_club=".$club->ID;
    if($DB->updateDB($query)){
        return true;
    }
    return false;
}

//delete every test the user passed
function delete_test_user($DB, $ID_user){
    $query = "DELETE FROM test_user WHERE ID_user=".$ID_user;
    if($DB->updateDB($query))
        return true;
}

//returns an array of club members
function get_club_member($DB, $ID_club){

    $query = "SELECT * FROM club_member c JOIN user u ON c.ID_user=u.ID_user WHERE ID_club=".$ID_club;
    $r = $DB->selectDB($query);

    if($r){
        $array = array();
        $i = 0;
        while($row = mysqli_fetch_array($r)){
            $array[$i] = new User();
            $array[$i]->moderate = 0;
            $array[$i] = getUserFromDB($row, $DB);

            if($row['moderator'] == 1){
                $array[$i]->moderate = 1;
            }
            $i++;
        }
        return $array;
    }
}

//set moderator
function set_moderator_to_fan_club($DB, $ID_club, $ID_user){

    $query = "UPDATE club_member SET moderator = 1 WHERE ID_user=".$ID_user." AND ID_club=".$ID_club;
    if($DB->updateDB($query)){
        return true;
    }
    return false;
}

//reset medorator
function reset_moderator_to_fan_club($DB, $ID_club, $ID_user){

    $query = "UPDATE club_member SET moderator = -1 WHERE ID_user=".$ID_user." AND ID_club=".$ID_club;
    if($DB->updateDB($query)){
        return true;
    }
    return false;
}

//delete a club
function delete_club($DB, $club, $log){

    //we delete every topic about this club
    $query = "SELECT * FROM forum WHERE ID_club=".$club->ID;
    $r = $DB->selectDB($query);

    if($r){

        while($forum = mysqli_fetch_array($r)){
            if(delete_forum($DB, $forum['ID_forum'])){
                write_file($log, "SUCCESS : One more forum from ".$club->name." has been deleted", $_SESSION['user']);
            }else{
                write_file($log, "FAIL : Impossible to delete one forum from ".$club->name, $_SESSION['user']);
            }
        }

        //we delete every item about this club
        $query = "SELECT * FROM item WHERE ID_club=".$club->ID;
        $r1 = $DB->selectDB($query);
        if($r1){

            while($item = mysqli_fetch_array($r1)){
                if(delete_item($DB, $item['ID_item'], $club->ID)){
                    write_file($log, "SUCCESS : One more item from ".$club->name." has been deleted", $_SESSION['user']);
                }else{
                    write_file($log, "FAIL : Impossible to delete one item from ".$club->name, $_SESSION['user']);              
                }
            }
            //we delete the test
        
            if(deleteTest($DB, $club->ID)){
                write_file($log, "SUCCESS : test from ".$club->name." has been deleted", $_SESSION['user']); 
            }

            //we delete club members
            if(delete_club_member($DB, $club->ID)){
                write_file($log, "SUCCESS : Every user from ".$club->name." are no longer members", $_SESSION['user']);
            }

            //we delete the forum
            $query = "DELETE FROM club WHERE ID_club=".$club->ID;
            if($DB->updateDB($query)){
                return true;
            }
            
        }
    }

}

function is_moderator($DB, $user, $ID_club){

    $query = "SELECT * FROM club_member WHERE ID_user=".$user->ID." AND ID_club=".$ID_club;
    $r = $DB->selectDB($query);

    if($r){
        $row = mysqli_fetch_array($r);
        if($row['moderator'] == 1){
            return true;
        }
    }
    return false;
}

function is_member($DB, $user, $ID_club){

    $query = "SELECT * FROM club_member WHERE ID_user=".$user->ID." AND ID_club=".$ID_club;
    $r = $DB->selectDB($query);

    if($r){
        if(mysqli_num_rows($r) >= 1)
            return true;
    }
    return false;
}