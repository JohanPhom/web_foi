<?php

class MyDatabase
{

    const server = "localhost";
    const username = "root";
    const password = "";
    const db_name = "WebDiP2019x100";

    private $connection = null;
    private $myError = '';

    function connectToDB()
    {
        $this->connection = new mysqli(self::server, self::username, self::password, self::db_name);
        if ($this->connection->connect_errno) {
            echo "Error during connection: " . $this->connection->connect_errno . ", " .
                $this->connection->connect_error;
            $this->myError = $this->connection->connect_error;
        }
        $this->connection->set_charset("utf8");
        if ($this->connection->connect_errno) {
            echo "Error during connection: " . $this->connection->connect_errno . ", " .
                $this->connection->connect_error;
            $this->myError = $this->connection->connect_error;
        }
        return $this->connection;
    }

    function closeDB()
    {
        $this->connection->close();
    }

    function selectDB($query)
    {
        $result = $this->connection->query($query);
        if ($this->connection->connect_errno) {
            echo "Error on query: {$query} - " . $this->connection->connect_errno . ", " .
                $this->connection->connect_error;
            $this->myError = $this->connection->connect_error;
        }
        if (!$result) {
            $result = null;
        }
        return $result;
    }

    function updateDB($query, $script = '')
    {
        $result = $this->connection->query($query);
        if ($this->connection->connect_errno) {
            echo "Error on query: {$query} - " . $this->connection->connect_errno . ", " .
                $this->connection->connect_error;
            $this->myError = $this->connection->connect_error;
        } else {
            if ($script != '') {
                header("Location: $script");
            }
        }

        return $result;
    }

    function showMyErrorDB()
    {
        if ($this->myError != '') {
            return true;
        } else {
            return false;
        }
    }
}


function empty_field_update($field)
{
    $r = '';

    if ($_POST[$field] != "") {
        $r .= $field . " = '" . $_POST[$field] . "', ";
    }

    return $r;
}

function print_virtual_time($folder){

    $url = MAIN_PATH."/json/config.json";
    $f = fopen($url, "r");
    $text = fread($f, filesize($url));
    $json = json_decode($text, false);
    $hour = $json->config->time;
    fclose($f);

    $virtual_time = time() + ($hour*60*60);
    return date("Y.m.d H:i:s", $virtual_time);
}

function set_virtual_time($log, $user){

    if(isset($_POST['format'])){
        $format = $_POST['format'];
        switch($format){
            case "json" :
                
                $url = "http://barka.foi.hr/WebDiP/pomak_vremena/pomak.php?format=json";
                if($source = fopen($url, 'r')){
                    $text = fread($source, 10000);
                    $json = json_decode($text, false);
                    $hours = $json->WebDiP->vrijeme->pomak->brojSati;
                    $hours = (is_numeric($hours)) ? $hours : 0;

                    $var['config']['time'] = $hours;
                    $config_string = json_encode($var);

                    $f = fopen(MAIN_PATH."/".$format."/config.".$format, "w");
                    fwrite($f, $config_string);
                    fclose($f);
                    write_file($log, "SUCCESS : virtual time shift is now ".$hours, $user->username);
                }else{
                    echo "error with barka service";
                    write_file($log, "FAIL : Impossible to set virtual time shift", $user->username);
                    exit();
                }
            break;
        }
    }

}

//count the number of row in a table
function count_table($DB, $table){

    $query = "SELECT count(*) AS nb FROM ".$table;
    $r = $DB->selectDB($query);
    if($r){
        $row = mysqli_fetch_array($r);
        return $row['nb'];
    }
}

//count the number of row  corresponding to a club in the table
function count_table_club($DB, $table, $ID_club){

    $query = "SELECT count(*) AS nb FROM ".$table." WHERE ID_club=".$ID_club;
    $r = $DB->selectDB($query);
    if($r){
        $row = mysqli_fetch_array($r);
        return $row['nb'];
    }    
}

//check if pagination is set in the DB, if not, it is set to 7
function settings_initialization($DB){

    $query = "SELECT * FROM setting";
    $r = $DB->selectDB($query);
    if(mysqli_num_rows($r) == 0){

        $query = "INSERT INTO setting VALUES (7, 2, 7, 2)";
        $DB->updateDB($query);
    }
}

//get pagination from DB
function get_pagination($DB){
    $query = "SELECT * FROM setting";
    $r = $DB->selectDB($query);
    if($r){
        $row = mysqli_fetch_array($r);
        return $row['pagination'];
    }else{
        return 7;
    }
}

function get_cookie_duration($DB){

    $query = "SELECT * FROM setting";
    $r = $DB->selectDB($query);
    if($r){
        $row = mysqli_fetch_array($r);
        return $row['cookie_duration'];
    }else{
        return 2;
    }
}

function get_email_duration($DB){

    $query = "SELECT * FROM setting";
    $r = $DB->selectDB($query);
    if($r){
        $row = mysqli_fetch_array($r);
        return $row['valid_email'];
    }else{
        return 7;
    }
}

function get_log_time($DB){

    $query = "SELECT * FROM setting";
    $r = $DB->selectDB($query);
    if($r){
        $row = mysqli_fetch_array($r);
        return $row['log_time'];
    }else{
        return 2;
    }
}

function set_settings($DB, $log, $user){

    if(isset($_POST['pagination'])){
        $pag = $_POST['pagination'];

        $query = "UPDATE setting SET pagination =".$pag;
        if($DB->updateDB($query)){
            write_file($log, "SUCCESS : pagination set to ".$pag, $user->username);
        }
    }

    if(isset($_POST['cookie_duration'])){
        $duration = $_POST['cookie_duration'];

        $query = "UPDATE setting SET cookie_duration =".$duration;
        if($DB->updateDB($query)){
            write_file($log, "SUCCESS : cookie duration set to ".$duration, $user->username);
        }

    }
    
    if(isset($_POST['valid_email'])){
        $duration = $_POST['valid_email'];

        $query = "UPDATE setting SET valid_email =".$duration;
        if($DB->updateDB($query)){
            write_file($log, "SUCCESS : email duration set to ".$duration, $user->username);
        }

    }
    
    if(isset($_POST['log_time'])){
        $duration = $_POST['log_time'];

        $query = "UPDATE setting SET log_time =".$duration;
        if($DB->updateDB($query)){
            write_file($log, "SUCCESS : log set to ".$duration, $user->username);
        }

    }
    
    if(isset($_POST['pts_question'])){
        $pts_question = $_POST['pts_question'];
        $pts_answer = $_POST['pts_answer'];

        $query = "UPDATE type_message SET point_given =".$pts_question." WHERE name = 'question'";
        if($DB->updateDB($query)){
            write_file($log, "SUCCESS : points for question set to ".$pts_question, $user->username);
            
            $query = "UPDATE type_message SET point_given =".$pts_answer." WHERE name = 'answer'";
            if($DB->updateDB($query)){  
                write_file($log, "SUCCESS : points for answer set to ".$pts_answer, $user->username);
            }
        }

    }


}