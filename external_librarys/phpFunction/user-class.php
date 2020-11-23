<?php

class User {
    var $ID;
    var $role;
    var $name;
    var $surname;
    var $username;
    var $email;
    var $genre;
    var $phone;
    var $password;
    var $is_locked;
    var $registration_date;
    var $last_log;
    var $stat;
    var $moderate;
}

//update the user with new information from registration page
function updateUser($username, $DB){
    $name = empty_field_update('name');
    $surname = empty_field_update('surname');
    $username1 = empty_field_update('username');
    $phone = empty_field_update('phone');
    $email = empty_field_update('email');
    $password = empty_field_update('password');

    $query = "UPDATE user SET $name $surname $username1 $email $phone
                $password WHERE user.username = '$username'";

    $query = preg_replace('/,\s+WHERE/', " WHERE", $query);

    $r = $DB->updateDB($query);

    if($password != ''){
        $password = $_POST['password'];
        $salt = "mqodrhgmgiowdjlgn4wmd5455";
        $passwordH = $password.$salt;
        $passwordH = sha1($passwordH);
        $query = "UPDATE user SET password_hash ='".$passwordH."' WHERE username='".$username."'";
        $DB->updateDB($query);
    }

    if($r){
        return true;
    }else{
        return false;
    }
}

//retrieve a user from database, $row is result of myrqli_fetch_array
function getUserFromDB($row, $DB){
    $userUpdate = new User();
    $userUpdate->stat = new Stat();
    $userUpdate->ID = $row['ID_user'];
    $userUpdate->role = $row['ID_user_type'];
    $userUpdate->name = $row['name'];
    $userUpdate->surname = $row['surname'];
    $userUpdate->username = $row['username'];
    $userUpdate->email = $row['email'];
    $userUpdate->genre = $row['genre'];
    $userUpdate->phone = $row['phone'];
    $userUpdate->password = $row['password'];
    $userUpdate->registration_date = $row['registration_date'];
    $userUpdate->last_log = $row['last_log'];
    $userUpdate->stat = get_user_stat($DB, $userUpdate->ID);

    $locked = $row['locked'];
    if($locked < 2){
        $userUpdate->is_locked = -1;
    }else{
        $userUpdate->is_locked = 1;
    }

    return $userUpdate;
}

//get user from the form
function getUserFromForm(){
    $user = new User();
    $user->name = $_POST['name'];
    $user->surname = $_POST['surname'];
    $user->username = $_POST['username'];
    $user->email = $_POST['email'];
    $user->genre = $_POST['genre'];
    $user->phone = $_POST['phone'];
    $user->password = $_POST['password'];
    return $user;
}

//get list of all users in the database
function getListUsers($DB){

    $query = "SELECT * FROM user ORDER BY registration_date DESC";
    $r = $DB->selectDB($query);
    if($r){
        $list_user = array();
        $i = 0;
        while($row = mysqli_fetch_array($r)){
            $list_user[$i] = new User();
            $list_user[$i] = getUserFromDB($row, $DB);
            $i++;
        }
        return $list_user;
    }
    return false;
}

//insert a new user in the database
function insertNewUser($user, $DB, $valid_email){
    
    $now = virtual;
    $salt = "mqodrhgmgiowdjlgn4wmd5455";
    $passwordH = $user->password.$salt;
    $passwordH = sha1($passwordH);

    if(!checkIfUserExist($user->username, $user->email, $DB)){
        return false;
    }

    $code = send_email_code($user->email);
    if($code == false){
        return false;
    }

    $query = "SELECT ADDDATE('".virtual."', INTERVAL ".$valid_email." HOUR) AS hour";
    $r = $DB->selectDB($query);
    if($r){
        $row = mysqli_fetch_array($r);
        $date_code = $row['hour'];
    }

    $query = "INSERT INTO user (ID_user, ID_user_type, name, surname, username, password, password_hash, email, genre, phone, registration_date, locked, code, date_code)
                VALUES (NULL, '4', '$user->name', '$user->surname', '$user->username', '$user->password', '$passwordH', '$user->email', '$user->genre', '$user->phone', '$now', '-1', '$code', '$date_code')";
    
    $r = $DB->updateDB($query);

    if($r){
        $ID_user = get_user_ID_from_username($DB, $user->username);

        if(set_stat($DB, $ID_user)){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

//send an email to the user and return the code if the sending succeed
function send_email_code($email){

    $random_alpha = md5(rand());
    $code = substr($random_alpha, 0, 6);

    $message = "Welcome in our community ! To validate your account you have to enter the activation code on our web site. Here is 
                    your activation code : ".$code."
                You can activate it on the following link : http://barka.foi.hr/WebDiP/2019_projekti/WebDiP2019x100/index.php?page=activation";

    if(mail($email, "Activation code for JOOX", $message, "From: Joox@foi.hr")){
        return $code;
    }else{
        return false;
    }
}

function send_new_password($DB, $username){

    $query = "SELECT * FROM user WHERE username='".$username."'";
    $r = $DB->selectDB($query);
    if($r){
        $row = mysqli_fetch_array($r);
        $email = $row['email'];

        $random_alpha = md5(rand());
        $new_password = substr($random_alpha, 0, 6);

        $salt = "mqodrhgmgiowdjlgn4wmd5455";
        $passwordH = $new_password.$salt;
        $passwordH = sha1($passwordH);
        
        $query = "UPDATE user SET password='".$new_password."', password_hash='".$passwordH."' WHERE username='".$username."'";
        if($DB->updateDB($query)){
            
            $message = "Here is your new password : ".$new_password;

            if(mail($email, "Forgotten password", $message, "From: Joox@foi.hr")){
                return true;
            }
        }
    }
    return false;
}

//return true if the user exists in the database
function checkIfUserExist($username, $email, $DB){

    $query = "SELECT * FROM user WHERE username = '".$username."' OR email = '".$email."'";
    $r = $DB->selectDB($query);

    if(mysqli_num_rows($r) >= 1){
        return false;
    }else{
        return true;
    }
}

//check if every field from the registration form are fill out, return boolean
function checkfield(){

    if(empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['phone']) || empty($_POST['genre'])){
            return false;
    }

    return true;
}

//return the ID of the logged user 
function getUserID($session, $DB){
    $user = $session->getUser($DB);
    $query = "SELECT ID_user FROM user WHERE username = '".$user->ID."'";

    $r = $DB->selectDB($query);

    if($r){
        $row = mysqli_fetch_array($r);
        return $row['ID_user'];
    }else{
        return false;
    }
}

function get_user_ID_from_username($DB, $username){

    $query = "SELECT ID_user FROM user WHERE username='".$username."'";
    $r = $DB->selectDB($query);
    
    if($r){
        $row = mysqli_fetch_array($r);
        return $row['ID_user'];
    }
}

//retrive a list of club followed by the user
function get_list_club_followed($DB, $ID_user){

    $query = "SELECT c.name, c.ID_club FROM club_member cm JOIN club c ON cm.ID_club = c.ID_club WHERE ID_user=".$ID_user;
    $r = $DB->selectDB($query);
    $list_club = array();
    $i=0;
    if($r){
        while($row = mysqli_fetch_array($r)){
            $list_club[$i]['name'] = $row['name'];
            $list_club[$i]['ID'] = $row['ID_club'];
            $i++; 
        }
        return $list_club;
    }
    return false;
}

//retrieve list of club moderated by the user 
function get_list_club_moderated($DB, $ID_user){

    $query = "SELECT c.name, c.ID_club FROM club_member cm JOIN club c ON cm.ID_club = c.ID_club WHERE ID_user=".$ID_user." AND moderator = 1";
    $r = $DB->selectDB($query);
    $list_club = array();
    $i=0;
    if($r){
        while($row = mysqli_fetch_array($r)){
            $list_club[$i]['name'] = $row['name'];
            $list_club[$i]['ID'] = $row['ID_club'];
            $i++; 
        }
        return $list_club;
    }
    return false;
}

//retrieve list of item owned
function get_list_item_owned($DB, $ID_user){

    $query = "SELECT * FROM user_has_item u JOIN item i ON u.ID_item = i.ID_item WHERE u.ID_user=".$ID_user;
    $r = $DB->selectDB($query);
    $list_item = array();
    $i = 0;

    if($r){
        $list_item = get_item_from_DB($r);
        if($list_item)
            return $list_item;
    }

}

//add 1 to the number of try for loggin in the DB
function lock_account($DB, $username, $log){

    $query = "UPDATE user SET locked = locked + 1 WHERE username='".$username."'";
    $DB->updateDB($query);
    $query = "SELECT locked FROM user WHERE username='".$username."'";
    $r = $DB->selectDB($query);
    $row = mysqli_fetch_array($r);
    $nb_try = ($row['locked']*-1)+2;
    if($nb_try <= 0){
        write_file($log, "Account locked", $username);
        $error = "You account is locked ...";
    }else{
        $error = "You still have ".$nb_try." try !";
    }
    return $error;

}

//unlock the user
function unlock($DB, $ID_user){
    $query = "UPDATE user SET locked = -1 WHERE ID_user =".$ID_user;
    if($DB->updateDB($query)){
        return true;
    }else{
        return false;
    }
}

//lock the user
function lock($DB, $ID_user){
    $query = "UPDATE user SET locked = 2 WHERE ID_user =".$ID_user;
    if($DB->updateDB($query)){
        return true;
    }else{
        return false;
    }
}

//update the last loggin field when the user log in
function successLogin($DB, $username){

    $now = virtual;
    $query = "UPDATE user SET last_log = '".$now."' WHERE username = '".$username."'";
    if($DB->updateDB($query)){
        return true;
    }
    return false;
}

//delete item from the user collection
function delete_item_profil($DB, $ID_item, $ID_user){

    $query = "DELETE FROM user_has_item WHERE ID_item=".$ID_item." AND ID_user=".$ID_user;
    if($DB->updateDB($query)){
        return true;
    }
    return false;
}

function delete_user($DB, $ID_user){

        if(delete_message_user($DB, $ID_user))
        if(delete_forum_user($DB, $ID_user))
        if(delete_item_user($DB, $ID_user))
        if(delete_club_user($DB, $ID_user))
        if(delete_stat_user($DB, $ID_user))
        if(delete_test_user($DB, $ID_user)){

            $query = "DELETE FROM user WHERE ID_user=".$ID_user;
            if($DB->updateDB($query))
                return true;
        }
        return false;

}
    
//function which valide the account if the code entered is correct. Returns the username if success
function check_code($DB, $code){

    $query = "SELECT * FROM user WHERE code='".$code."'";
    $r = $DB->selectDB($query);

    if($r){
        if(mysqli_num_rows($r) == 1){
         
            $row = mysqli_fetch_array($r);
            $username = $row['username'];

            $query = "SELECT TIMESTAMPDIFF(MINUTE, '".virtual."', (SELECT date_code FROM user WHERE username='".$username."')) AS difference";
            $r1 = $DB->selectDB($query);

            if($r1){
                $row = mysqli_fetch_array($r1);
                if($row['difference'] < 0){
                    return false;
                }
            }
        
            $query = "UPDATE user SET ID_user_type=3, code=0 WHERE code='".$code."'";
            if($DB->updateDB($query)){
                return $username;
            }
        }
    }
    return false;
}

//check since how many time the user is connected, return true if the user's session will be destroyed
function check_log($DB, $user, $log_time){

    $query = "SELECT TIMESTAMPDIFF(MINUTE, (SELECT last_log FROM user WHERE ID_user=".$user->ID."), '".virtual."') AS difference";
    $log_time *= 60;

    $r = $DB->selectDB($query);
    if($r){
        $row = mysqli_fetch_array($r);
        $time = $row['difference'];
        
        if($time > $log_time){
            return true;
        }
        return false;
    }
}