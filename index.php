<?php

//inclusion of smarty framework and set the directory
define('MAIN_PATH', getcwd());
require(MAIN_PATH . '/external_librarys/smarty/smarty-3.1.34/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->addTemplateDir(MAIN_PATH);

//inclusion of files and connection to database
require_once 'external_librarys/phpFunction/database.class.php';
$DB = new MyDatabase();
$DB->connectToDB();

require_once "external_librarys/phpFunction/club-class.php";
require_once "external_librarys/phpFunction/item-class.php";
require_once 'external_librarys/phpFunction/user-class.php';
require_once 'external_librarys/phpFunction/forum-class.php';
require_once 'external_librarys/phpFunction/statistic-class.php';
require_once 'external_librarys/phpFunction/log-function.php';
require_once 'external_librarys/phpFunction/session-class.php';
require_once 'recaptcha/autoload.php';

$log = open_file('log/log.txt');

date_default_timezone_set("Europe/Zagreb");

define('time', date("Y.m.d H:i:s"));
define('virtual', print_virtual_time(MAIN_PATH."json/config.json"));
$smarty->assign("time", virtual);

//inclusion of session class
$session = new Session();
$user = new User();

$user = $session->getUser($DB);
$smarty->assign('user', $user);

settings_initialization($DB);
set_settings($DB, $log, $user);
define('pag', get_pagination($DB));

$log_time = get_log_time($DB);
$smarty->assign('log_time', $log_time);
$smarty->assign('valid_email', get_email_duration($DB));
$smarty->assign('cookie_duration', get_cookie_duration($DB));
$smarty->assign('pagination', pag);
$smarty->assign('point_array', get_points_question($DB));

if($user->role < 4){
    $unlog = check_log($DB, $user, $log_time);
    if($unlog){
        write_file($log, "Logout (connected for too long)", $user->username);
        $session->deleteSession();
    }
}

if($user->is_locked == 1){
    write_file($log, "Logout (account locked)", $user->username);
    $session->deleteSession();
}


//smarty choose the page to display in function of the parameters in the URL
if (isset($_GET['page'])) {

    $page = $_GET['page'];
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
    }else{
        //header("Location: https://barka.foi.hr/WebDiP/2019_projekti/WebDiP2019x100/index.php?page=".$page);
    }
    
    
        //---------------------------------------------------       OTHER PAGES       -------------------------------------------------------------------------

    if ($page === 'listPassword') {

        $listUser = getListUsers($DB);
        header("Content-Type:application/xml");
        echo '<?xml version="1.0" encoding="utf-8"?>';
        echo "<listUser>";
        for($i = 0; $i < sizeof($listUser); $i++){
            echo "<user>";
            echo "<username>" . $listUser[$i]->username . "</username>";
            echo "<email>" . $listUser[$i]->email . "</email>";
            echo "<password>" . $listUser[$i]->password . "</password>";
            echo "</user>";
        }
        echo "</listUser>";
    }
    elseif ($page === 'statForum') {

        if(isset($_GET['graph'])){
            $stat = get_stat_club($DB, $_GET['graph'], '');
            $stat_message = get_nb_question_answers($stat);

            header("Content-Type:application/xml");
            echo '<?xml version="1.0" encoding="utf-8"?><forum>';
            echo "<question>" . $stat_message['question'] . "</question>";
            echo "<answer>" . $stat_message['answer'] . "</answer>";
            echo "</forum>";

        }else{
            if(!isset($_GET['ID'])){
                header("Location: index.php");
            }

            if($user->role != 1 && !(is_moderator($DB, $user, $_GET['ID']))){
                header('Location: index.php');
            }
            
            $filter = "";
            if(isset($_GET['filter'])){
                $filter = $_GET['filter'];
            }

            $club = get_club_from_ID($_GET['ID'], $DB);
            $stat = get_stat_club($DB, $club->ID, $filter);
            $stat_message = get_nb_question_answers($stat);
            
            if($stat == false)
                header("Location: index.php");
                
            $smarty->assign('club', $club);
            $smarty->assign('stat_message', $stat_message);
            $smarty->assign('stat', $stat);
            $smarty->display('club/statForum.php');
        }
    }
    elseif ($page === 'era') {

        if ($user->role != 1) {
            header("Location: index.php");
        }
        $smarty->display('other/era.php');
    }
    elseif ($page === 'doc') {

        $smarty->display('other/documentation.php');
    }
    elseif ($page === 'time') {
        
        if($user->role != 1){
            header("Location: index.php");
        }
        set_virtual_time($log, $user);
        $smarty->display('other/time.php');
    }
    elseif ($page === 'forgotten') {

        if(isset($_POST['username'])){
            $username = $_POST['username'];
            if(send_new_password($DB, $username)){
                $smarty->assign("success", "We send your new password by email");
                write_file($log, "SUCCESS : User ".$username." has forgotten his password. A new one has been send by email ", $user->name);
            }else{
                $smarty->assign("error", "Impossible to send you a new password");
                write_file($log, "ERROR : User ".$username." is not in the database", $user->name);
            }
        }
        
        $smarty->display('other/forgotten_password.php');
    }
    elseif ($page === 'activation') {

        if(isset($_POST['code'])){

            $code = $_POST['code'];
            $username = check_code($DB, $code);
            if($username != false)
            {
                $smarty->assign('success', "Your account is now activated ! You will be redirected to the login page ...");
                write_file($log, "SUCCESS : ".$username." has activated his account successfuly", $user->username);
                header( "refresh:7; url=index.php?page=login" );
            }else{
                $smarty->assign('error', "Error with the code, try again");
            }
        }
        $smarty->display('other/activation.php');
    }

    //-----------------------------------------------------------------LOG PAGE-----------------------------------------------------------------------------
    elseif ($page === 'log') {

        if($user->role != 1){
            header("Location: index.php");
        }

        if(isset($_POST['search'])){

            $keyword = $_POST['search'];
            if(isset($_POST['strict'])){
                $file = read_file_filtered_strict($log, "log/log.txt", $keyword);
            }else{
                
                $file = read_file_filtered($log, "log/log.txt", $keyword);
            }

        }else{
            $file = read_file($log, "log/log.txt");
        }
        $nb_ligne = count($file);
        
        $pagination = 0;
        if(isset($_GET['pagination'])){
            $pagination = $_GET['pagination'];
        }
        $file = array_reverse($file);
        $smarty->assign('nb_ligne', $nb_ligne);
        $smarty->assign('log_pagination', $pagination);
        $smarty->assign('log_file', $file);
        $smarty->display('other/log.php');

    } elseif ($page === 'navigation') {

        if ($user->role != 1) {
            header("Location: index.php");
        }
        $smarty->display('other/navigationDiagram.php');
    } elseif ($page === 'author'){
        $smarty->display('other/author.php');
    }

    //------------------------------------------------------DISCUTION PAGE------------------------------------------------------------------------
     elseif ($page === 'discussion'){

        //the must have the ID of the forum otherwise the user is redirected
        if(!isset($_GET['ID']))
            header("Location: index.php");

        if(isset($_GET['del'])){
            if(delete_message($DB, $_GET['del'])){
                write_file($log, "SUCCESS : message ID(".$_GET['del'].") deleted, ID forum (".$_GET['ID'].")", $user->username);
                $smarty->assign('success', "Message deleted successfuly !");
            }
        }

        if(isset($_GET['best_answer'])){
            if(set_best_answer($DB, $_GET['best_answer']))
                write_file($log, "SUCCESS : message ID(".$_GET['best_answer'].") is the best answer from topic ID(".$_GET['ID'].")", $user->username);
        }
        
        if(isset($_GET['reset'])){
            if(reset_best_answer($DB, $_GET['reset']))
                write_file($log, "SUCCESS : message '".$_GET['reset']." is not no longer the best answer from topic ID(".$_GET['ID'].")", $user->username);
        }

        //topic is the question asked, it is an message object and has a club object as a member
        $topic = get_topic($DB, $_GET['ID']);

        //this is the case where the user entered an answer to the topic
        if(isset($_POST['answer']) && !empty($_POST['answer'])){
            if(new_message($DB, $user->ID, $_GET['ID'])){
                write_file($log, "SUCCESS : message '".$_POST['answer']."' added to topic ID(".$_GET['ID'].")", $user->username);
            }else{
                write_file($log, "FAIL : impossible to post message '".$_POST['answer']." to topic ID(".$_GET['ID'].")", $user->username);
                $smarty->assign('error', "Impossible to post the message ...");
            }
        }

        //list message is the list of all the answers that got topic
        $list_message = get_discussion($DB, $_GET['ID']);

        $smarty->assign('moderate', is_moderator($DB, $user, $topic->club->ID));
        $smarty->assign('member', is_member($DB, $user, $topic->club->ID));
        $smarty->assign('topic', $topic);
        $smarty->assign('list_message', $list_message);
        $smarty->display('club/discussion.php');
    }
    //------------------------------------------------------------------FORUM PAGE------------------------------------------------------------------------
    elseif ($page === 'forum'){

        if(isset($_GET['del'])){

            if(delete_forum($DB, $_GET['del'])){
                write_file($log, "SUCCESS : topic ID(".$_GET['del'].") deleted", $user->username);
                $smarty->assign('success', "Topic has been deleted sucessfuly !");
            }else{
                write_file($log, "FAIL : impossible to delete topic ID(".$_GET['del'].")", $user->username);
                $smarty->assign('error', "Impossible to delete the topic !");
            }
        }

        if(isset($_POST['search'])){
           $club = get_club_by_filtered($DB, $_POST['search']);
           $array = get_forum_fan_club($DB, $club->ID);
        }else{
            $array = get_list_forum($DB);
        }

        
        
        $smarty->assign("list_forum", $array);
        $smarty->display('club/forum.php');
    }

    //-----------------------------------------------------------------LIST USERS----------------------------------------------------------------------------
    elseif ($page === 'listUser'){

        if($user->role != 1){
            header('Location: index.php');
        }

        if(isset($_GET["unlock"])){
            $ID_user = $_GET["unlock"];
            if(unlock($DB, $ID_user)){
                write_file($log, "SUCCESS : account ID(".$ID_user.") unlocked", $user->username);
               $smarty->assign("success", "The account has been unlocked successuly !"); 
            }
        }

        if(isset($_GET['lock'])){
            $ID_user = $_GET["lock"];
            if(lock($DB, $ID_user)){
                write_file($log, "SUCCESS : account ID(".$ID_user.") locked", $user->username);
               $smarty->assign("success", "The account has been locked successuly !"); 
            }

        }

        if(isset($_GET['del'])){
            if(delete_user($DB, $_GET['del'])){
                write_file($log, "SUCCESS : user ID( ".$_GET['del'].") deleted", $user->username);
            }else{                
                write_file($log, "FAIL : impossible to delete user ID( ".$_GET['del'].")", $user->username);
            }
        }

        if($list = getListUsers($DB)){
            $smarty->assign("list_users", $list);
        }        

        $smarty->display('other/listUser.php');
    }

    //------------------------------------------------------------PROFIL PAGE-----------------------------------------------------------
    elseif ($page === 'profil'){

        if(isset($_GET['del'])){
            if(delete_item_profil($DB, $_GET['del'], $user->ID)){
                write_file($log, "SUCCESS : item ID( ".$_GET['del'].") deleted from user collection", $user->username);
                $smarty->assign("success", "The item has been deleted successfuly !");
            }else{
                write_file($log, "FAIL : impossible to delete item ID(".$_GET['del'].") from user collection", $user->username);
                $smarty->assign("error", "Impossible to delete the item !");
            }
        }

        if(isset($_GET['reset'])){
            if(reset_point($DB, $user->ID)){
                write_file($log, "SUCCESS : statistics reseted", $user->username);
                header("Location: index.php?page=profil&ID=".$user->ID);
            }else{
                write_file($log, "FAIL : impossible to reset statistics", $user->username);
            }
        }

        $club_followed = get_list_club_followed($DB, $user->ID);
        $club_moderated = get_list_club_moderated($DB, $user->ID);
        $list_item_owned = get_list_item_owned($DB, $user->ID);

        if($list_item_owned)
            $smarty->assign('list_item', $list_item_owned);

        if($club_followed)
            $smarty->assign('club_followed', $club_followed);
            
        if($club_moderated)
            $smarty->assign('club_moderated', $club_moderated);
        
        $smarty->display('other/profil.php');
    }
    //---------------------------------------------------------------NEW ITEM-----------------------------------------------------------
    elseif ($page === 'newItem'){

        if($user->role != 1 && !(is_moderator($DB, $user, $_GET['ID']))){
            header("Location: index.php");
        }

        if(isset($_GET['ID'])){
            $club = get_club_from_ID($_GET['ID'], $DB);
            
            if(isset($_GET['new'])){
                $item = item_into_object_from_form($_GET['ID'], $user->ID);
                
                if($item){   
                    if(insert_item($DB, $item)){
                        write_file($log, "SUCCESS : item ".$item->name." added to club ".$club->name, $user->username);
                        $smarty->assign("success", "Item has been uploaded successfully !");
                    }else{
                        write_file($log, "FAIL : Impossible to add item ".$item->name." to club ".$club->name, $user->username);
                        $smarty->assign("error", "Impossible to upload item.");
                    }
                }else{
                    write_file($log, "FAIL : empty field for adding new item to club ".$club->name, $user->username);
                    $smarty->assign("error", "Please fill out correctly.");
                }
            }

            if(isset($_GET['validateUpdate'])){
                if(update_item($DB, $_GET['update'])){
                    $smarty->assign('success', "Item updated successfuly");
                    write_file($log, "SUCCESS : item (".$_GET['update'].") updated ", $user->username);
                }else{
                    $smarty->assign('error', "Impossible to update this item");
                }
                
            }
            if(isset($_GET['update'])){
                $query = "SELECT * FROM item WHERE ID_item=".$_GET['update'];
                $r = $DB->selectDB($query);
                $item = get_item_from_DB($r)[0];
                $smarty->assign('item', $item);
            }

            $list_item = get_list_item_from_DB1($DB, $club->ID);
            $smarty->assign('list_item', $list_item);
            $smarty->assign('club', $club);
            $smarty->display('club/newitem.php');
        }else{
            header("Location : index.php");
        }
    }

    //--------------------------------------------------------LIST OF TEST PASSED---------------------------------------------------------------------------
    elseif ($page === 'listTest'){

        //search in the list
        if (!empty($_POST['search'])) {

            $search = $_POST['search'];
            write_file($log, "search in list of test passed filtered by ".$search, $user->username);

            if (is_numeric($search)) {
                $search = strtoupper($search);
                $query = "SELECT c.name, image_title, u.username, tu.success, tu.date FROM club c 
                JOIN test t ON c.ID_club = t.ID_club
                JOIN test_user tu ON tu.ID_test = t.ID_test
                JOIN user u ON u.ID_user = tu.ID_user
                WHERE tu.date LIKE '%$search%'
            ORDER BY c.nb_member DESC, tu.date ASC";
            } else {
                $search = strtoupper($search);
                $query = "SELECT c.name, image_title, u.username, tu.success, tu.date FROM club c 
                JOIN test t ON c.ID_club = t.ID_club
                JOIN test_user tu ON tu.ID_test = t.ID_test
                JOIN user u ON u.ID_user = tu.ID_user
                WHERE UPPER(c.name) LIKE '%$search%' OR UPPER(u.username) LIKE '%$search%'
            ORDER BY c.nb_member DESC, tu.date ASC";
            }
        } else {
            $query = "SELECT c.name, image_title, u.username, tu.success, tu.date FROM club c 
            JOIN test t ON c.ID_club = t.ID_club
            JOIN test_user tu ON tu.ID_test = t.ID_test
            JOIN user u ON u.ID_user = tu.ID_user
        ORDER BY c.nb_member DESC, tu.date DESC";
        }
        
        $list_test = get_list_test($DB, $query);
        $smarty->assign('list_test', $list_test);
        $smarty->display('club/listTest.php');
    }
    elseif ($page === 'listTestClub'){

        if(isset($_GET['ID'])){
            
            $filter = "";
            if(isset($_GET['filter'])){
                $filter = $_GET['filter'];
            }

            $testPagination = 0;
            if(isset($_GET['pagination'])){
                $testPagination = $_GET['pagination'];
            }
            $smarty->assign('testPagination', $testPagination);
            
            $club = get_club_from_ID($_GET['ID'], $DB);
            $list_test = get_list_test_club($DB, $club->ID, $filter);

            $nb_test = count($list_test);
            
            $smarty->assign('nb_test', $nb_test);

            $smarty->assign('club', $club);
            $smarty->assign('list_test', $list_test);
            $smarty->display('club/listTestClub.php');
        }else{
            header("Location: index.php");
        }
        
    }
    //-------------------------------------------------------FAN CLUB PAGE------------------------------------------------------------------------
    elseif ($page === 'fanPage'){

        if(isset($_GET['ID'])){

            if(isset($_POST['set_promote'])){
                set_promote($DB, $_GET['ID'], $_POST['set_promote']);
            }

            $club = get_club_from_ID($_GET['ID'], $DB);
            
            if(isset($_GET['unfollow'])){
                if(unfollow_club($DB, $user, $club)){
                    write_file($log, "SUCCESS : User unfollow the club ".$club->name, $user->username);
                }
            }

            if(club_has_test($DB, $club->ID)){
                $club->has_test = true;
            }else{
                $club->has_test = false;
            }

            //delete fanclub
            if(isset($_GET['deleteClub'])){
                delete_club($DB, $club, $log);
                header("Location: index.php");
            }

            //buy an item
            if(isset($_GET['buy'])){
                $result = buy_item($DB, $user, $_GET['buy'], $log);
                if(is_moderator($DB, $user, $club->ID) == false){
                    if(promote_moderator($DB, $user, $_GET['buy'], $log)){
                        $smarty->assign('success', "You have collected enough item, you are promoted moderator for this fan club !");
                    }
                }                
                $smarty->assign('notice', $result);
            }

            //add a new topic
            if(isset($_POST['question'])){
                if(!empty($_POST['question'])){
                    createForum($DB, $user->ID, $club->ID);
                    write_file($log, "SUCCESS : Topic created for ".$club->name, $user->username);
                }else{
                    write_file($log, "FAIL : Error create topic for club ".$club->name, $user->username);
                    $smarty->assign('error', "Please enter a question");
                }
            }
            
            //assign new moderator
            if(isset($_GET['moderate'])){
                if($user->role == 1 || is_moderator($DB, $user, $club->ID)){
                    if(set_moderator_to_fan_club($DB, $club->ID, $_GET['moderate'])){
                        write_file($log, "SUCCESS : User ID(".$_GET['moderate'].") is now moderator of club ". $club->name, $user->name);
                    }
                }
            }
            
            //delete a moderator
            if(isset($_GET['unmoderate'])){
                if(reset_moderator_to_fan_club($DB, $club->ID, $_GET['unmoderate'])){
                    write_file($log, "SUCCESS : User ID(".$_GET['unmoderate'].") is no longer moderator of club ". $club->name, $user->name);
                }
            }
            
            //if a test has been deleted you come here
            if(isset($_GET['deleteTest'])){
                if(deleteTest($DB, $_GET['ID'])){
                    write_file($log, "SUCCESS : Test ID (".$_GET['ID'].") deleted", $user->username);
                    $smarty->assign('success', "The test has been deleted !");
                }else{
                    write_file($log, "FAIL : Impossible to delete test ID (".$_GET['ID'].")", $user->username);
                    $smarty->assign('error', "Impossible to delete the test");
                }
            }

            if(isset($_GET['deleteItem'])){
                if(delete_item($DB, $_GET['deleteItem'], $club->ID)){
                    write_file($log, "SUCCESS : Item ID (".$_GET['deleteItem'].") from club ".$club->name." deleted", $user->username);
                    $smarty->assign('success', "The item has been deleted !");
                    header("Location: index.php?page=fanPage&ID=".$club->ID."#menu_fan_page");
                }else{
                    write_file($log, "FAIL : Impossible to delete item ID (".$_GET['deleteItem'].") from club ".$club->name, $user->username);
                }
            }
            
            //if a user passed a test he comes here
            if(isset($_GET['user'])){
                $ID_user = getUserID($session, $DB);
                if(check_answer($DB, $user->ID, $club->ID)){
                    write_file($log, "SUCCESS : success the test for club ".$club->name, $user->username);
                    if(add_user_to_club($DB, $user->ID, $club->ID)){
                        write_file($log, "SUCCESS : user added to club ".$club->name, $user->username);
                        $smarty->assign('success', "You secceed the test. Welcome to the club ".$user->username.". Now you can chat in forum and buy items");
                    }else{
                        write_file($log, "FAIL : error adding new club member to ".$club->name, $user->username);
                    }
                }else{
                    write_file($log, "SUCCESS : fail the test for club ".$club->name, $user->username);
                    $smarty->assign('error', "You failed the test");
                }
            }

            //list of the forum about this fan club
            if($array = get_forum_fan_club($DB, $club->ID)){
                $smarty->assign('list_forum', $array);
            }

            $nb_item = count_table_club($DB, "item", $club->ID);
            $offset = 0;
            if(isset($_GET['offset']))
                $offset = $_GET['offset'];

            $list_item = get_list_item_from_DB($DB, $club->ID, $offset);
            $list_member = get_club_member($DB, $club->ID);

            if($list_item)
                $smarty->assign('list_item', $list_item);

            
            $smarty->assign('moderate', is_moderator($DB, $user, $club->ID));
            $smarty->assign('offset', $offset);
            $smarty->assign('list_member', $list_member);
            $smarty->assign('club', $club);
            $smarty->display('club/fanPage.php');
        }else{
            header("Location: index.php");
        }
    }
    //---------------------------------------------------------TEST PAGE------------------------------------------------------------------------------
    elseif ($page === 'test'){

        if(!empty($_GET['ID_club']) && !empty($_GET['user'])){

            $club = get_club_from_ID($_GET['ID_club'], $DB);
            $test = get_test_from_DB($DB, $club->ID);

            if($test){
                $smarty->assign('test', $test);
            }

            $smarty->assign('club', $club);
            $smarty->display('club/test.php');
        }else{
            header("Location: index.php");
        }
    }
    //----------------------------------------------------------NEW CLUB PAGE------------------------------------------------------------------------------
    elseif ($page === 'newclub'){

        if($user->role != 1){
            header("Location: index.php");
        }

        if(!empty($_POST)){         
            $userID = getUserID($session, $DB);
            $name_club = insert_new_club($user->ID, $DB);

            if($name_club != false){
                $success = "Club ".$name_club." has been created successfully";
                write_file($log, "SUCCESS : ".$name_club." club created ", $user->username);
                $smarty->assign('success', $success);
            }else{                
                $error = "Error adding new club";
                write_file($log, "FAIL : Impossible to create club ".$_POST['name'], $user->username);
                $smarty->assign('error', $error);
            }
        }
        $smarty->display('club/newclub.php');
    }
    //---------------------------------------------------------NEW TEST------------------------------------------------------------------------------
    elseif ($page === 'newtest'){

        //they must be an ID in URL so it correspond to a fan club
        if(!empty($_GET['ID'])){
        
            $club = new club();
            $club = get_club_from_ID($_GET['ID'], $DB);

            if(!club_has_test($DB,$club->ID)){
                       
                //if we submit the new test
                if(!empty($_POST)){
                    $nb_question = $_GET['nbquestion'];
                    $error = createTest($DB, $club->ID, $nb_question);
                    
                    if($error == ""){
                        $club->has_test = true;
                        $smarty->assign('success', "Test created successfully !");
                        write_file($log, "SUCCESS : test created for ".$club->name, $user->username);
                    }else{
                        write_file($log, "FAIL : impossible to create test for ".$club->name, $user->username);
                        $smarty->assign("error", $error);
                    }
                }
            }else{
                write_file($log, "FAIL : creating new test for club ".$club->name, $user->username);
                $smarty->assign("error", "Test already exist for this Fan club !");
            }
            $smarty->assign('club', $club);
            $smarty->display('club/newtest.php');
        }
        else{
            header("Location: index.php");
        }
    }
    elseif ($page === 'multimedia') {

        if ($user->role > 2) {
            header("Location: index.php");
        }
        $smarty->display('other/multimedia.php');

        //---------------------------------------------------       LOGIN PAGE       -------------------------------------------------------------------------


    } elseif ($page === 'login') {

        if(isset($_GET['username'])){

            $query = "SELECT * FROM user WHERE username = '".$_GET['username']."'";
                $r = $DB->selectDB($query);

                if ($r) {
                    $row = mysqli_fetch_array($r);
                    $userCookie = getUserFromDB($row, $DB);
                    
                    header("Content-Type:application/xml");
                    echo '<?xml version="1.0" encoding="utf-8"?><user>';
                    echo "<username>" . $userCookie->username . "</username>";
                    echo "<password>" . $userCookie->password . "</password>";
                    echo "</user>";
                }
        }else{ 

            $error_username = "";
            $error_password = "";

            //if there is a password and a username
            if (isset($_POST['username']) && isset($_POST['password'])) {
                if (!empty($_POST['username'] && !empty($_POST['password']))) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $query = "SELECT * FROM user WHERE username = '" . $username . "'";
                    $r = $DB->selectDB($query);

                    //if the username is valid
                    if ($r && mysqli_num_rows($r) == 1) {
                        $query = "SELECT locked, code FROM user WHERE username='".$username."'";
                        $r1 = $DB->selectDB($query);
                        $row1 = mysqli_fetch_array($r1);

                        //we check if the account is not locked and activated
                        if($row1['locked'] < 2 && $row1['code'] == 0){
                            $row = mysqli_fetch_array($r);
                            $salt = "mqodrhgmgiowdjlgn4wmd5455";
                            $passwordH = sha1($password.$salt);
                            if ($row['password_hash'] === $passwordH) {

                                $session->createUser($username, $row["ID_user_type"]);
                                successLogin($DB, $username);
                                $query = "UPDATE user SET locked = -1 WHERE username='".$username."'";
                                $DB->updateDB($query);
                                write_file($log, "SUCCESS LOGIN", $username);
                                header("Location: index.php");
                            } else {
                                $error_username = "class='errorField' ";
                                $error_password = "class='errorField' ";
                                $error = lock_account($DB, $username, $log);
                                $smarty->assign('error', $error);
                                write_file($log, "Login failed", $username);
                            }
                        }else{
                            write_file($log, "Try to login but account locked", $username);
                            $smarty->assign('error', "Your account is locked ...");
                        }
                    }
                } else {
                    $error_username = "class='errorField' ";
                    $error_password = "class='errorField' ";
                    write_file($log, "Try to login but empty field", $user->username);       
                    $smarty->assign('error', "Please fill out the fields correctly");
                }
            }
            $smarty->assign('errorU', $error_username);
            $smarty->assign('errorP', $error_password);
            $smarty->display('forms/login.php');
        }

        //---------------------------------------------------       REGISTRATION PAGE       -------------------------------------------------------------------------

    } elseif ($page === 'registration') {

        if (isset($_POST['submit'])) {

            $mode = $_POST['submit'];
            $recaptcha = new \ReCaptcha\ReCaptcha('6LcrSAAVAAAAAN4CSRQAZeqFTcnsHZJMv2ZSZrd5');
            $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
            if ($resp->isSuccess()) {
            } else {
                $errors = $resp->getErrorCodes();
            }

                //if we want to validate the update 
                if ($mode == "UpdateValidate") {
                    if (checkfield() == true) {
                        if (updateUser($_POST['username'], $DB))
                            write_file($log, "Update account success", $_POST['username']);
                            $smarty->assign("successUpdate", $_POST['username'] . "'s account has been updated successfully !");
                    } else {
                        write_file($log, "Fail update account", $_POST['username']);
                        $smarty->assign("failUpdate", "Please fill out all the fields");
                    }
                    //if we want to inserts a new user
                } else if ($mode == "submit") {

                    if (checkfield() == true) { 

                        $user = getUserFromForm();

                        //if the user has been added successufly
                        $valid_email = get_email_duration($DB);
                        if (insertNewUser($user, $DB, $valid_email)) {
                            $smarty->assign("successUpdate", $_POST['username'] . "'s account has been created successfully ! We sent you an e-mail
                                        with activation code to validate your account");
                            write_file($log, "User created", $_POST['username']);
                            header( "refresh:7; url=index.php?page=activation" );

                        } else {
                            write_file($log, "Fail create new user : email or username already in the database", $_POST['username']);
                            $smarty->assign("failUpdate", "Email or username already in the database !");
                        }
                    } else {
                        write_file($log, "Fail create new user : empty field", $_POST['username']);
                        $smarty->assign("failUpdate", "Please fill out all the fields");
                    }
                }
        }

        //check if the username exists in DB
        if (!empty($_GET['username'])) {
            $query = "SELECT * FROM user WHERE username = '" . $_GET['username'] . "'";
            $r = $DB->updateDB($query);

            $username = "";

            if ($r) {
                $row = mysqli_fetch_array($r);
                $username = $row['username'];
            }

            $data = array();
            $data["username"]  = $username;
            echo json_encode($data);
        }

        //check if the email exists in DB
        else if (!empty($_GET['email'])) {

            $query = "SELECT * FROM user WHERE email = '" . $_GET['email'] . "'";
            $r = $DB->updateDB($query);

            $email = "";

            if ($r) {
                $row = mysqli_fetch_array($r);
                $email = $row['email'];
            }

            header("Content-Type:application/xml");
            echo '<?xml version="1.0" encoding="utf-8"?><user>';
            echo "<email>" . $email . "</email>";
            echo "</user>";

        }else if (!empty($_GET['mail'])) {
        
            $email = $_GET['mail'];
                $query = "SELECT * FROM user WHERE email = '" . $email . "'";
                $r = $DB->selectDB($query);

                if ($r) {
                    $row = mysqli_fetch_array($r);
                    $userUpdate = getUserFromDB($row, $DB);
                    
                    header("Content-Type:application/xml");
                    echo '<?xml version="1.0" encoding="utf-8"?><user>';
                    echo "<name>" . $userUpdate->name . "</name>";
                    echo "<surname>" . $userUpdate->surname . "</surname>";
                    echo "<username>" . $userUpdate->username . "</username>";
                    echo "<email>" . $userUpdate->email . "</email>";
                    echo "<genre>" . $userUpdate->genre . "</genre>";
                    echo "<phone>" . $userUpdate->phone . "</phone>";
                    echo "<password>" . $userUpdate->password . "</password>";
                    echo "</user>";
                }
        
        }else {
            $smarty->display('forms/registration.php');
        }
    }
    
    $DB->closeDB();
    fclose($log);

} //---------------------------------------------------       INDEX PAGE       -------------------------------------------------------------------------
else {

    if(isset($_GET['get_cookie'])){
        $duration = get_cookie_duration($DB).
        header("Content-Type:application/xml");
        echo '<?xml version="1.0" encoding="utf-8"?><cookie>';
        echo "<duration>" . $duration . "</duration>";
        echo "</cookie>";
    }else{

        if (isset($_GET['destroy']) && $_GET['destroy'] == 1) {
            write_file($log, "Logout", $user->username);
            $session->deleteSession();
            header("Location: index.php");
        }

        $query = "SELECT * FROM club";
        $r = $DB->selectDB($query);
        $list_club = club_DB_into_object($r, $DB);

        $indexPagination = 0;
        if(isset($_GET['pagination'])){
            $indexPagination = $_GET['pagination'];
        }

        

        $best_club = get_best_club($DB);
        $nb_club = count($list_club);
        $smarty->assign('indexPagination', $indexPagination);        
        $smarty->assign('nb_club', $nb_club);        
        $smarty->assign('best_club', $best_club);        
        $smarty->assign('list_club', $list_club);    

        $smarty->display('other/homepage.php');
        }
}



//check if the form is valid, return error message if it's not
function checkForm()
{
    $error = "";

    $phone = checkPhone($_POST['phone_number']);
    if (!$phone) {
        $error .= "*Wrong phone number !<br>";
    }

    $URL = checkURL($_POST['URL']);
    if (!$URL) {
        $error .= "*Wrong URL !<br>";
    }

    $error .= empty_field('name');
    $error .= empty_field('URL');
    $error .= empty_field('year_released');
    $error .= empty_field('running_time');

    if (!isset($_POST['checkbox1']) || !isset($_POST['checkbox2']))
        $error .= "You must agree the terms<br>";

    $i = 0;

    if (isset($_POST['option'])) {
        foreach ($_POST['option'] as $a) {
            $i++;
        }
    }

    if ($i < 2)
        $error .= "You must choose at least 2 options<br>";

    return $error;
}

//if the field is empty, the function return an error message
function empty_field($field)
{
    if ($_POST[$field] == "")
        return "Fill out " . $field . "!<br>";
}

//return false if the phone number is wrong
function checkPhone($phone)
{
    $length = strlen($phone);

    if ($length >= 14 || $length == 0) {
        return false;
    }

    for ($i = 1; $i < $length; $i++) {
        if ($phone[$i] < '0' || $phone[$i] > '9') {
            return false;
        }
    }

    if ($phone[0] != '0' && $phone[0] != '+') {
        return false;
    }

    if ($phone[0] == '0' && $phone[1] != '0') {
        return false;
    }

    return true;
}

//returns false if the URL is wrong
function checkURL($URL)
{
    if (preg_match("/^(http|https):\/\/[^.].*(.hr)$/", $URL)) {
        for ($i = 0; $i < strlen($URL) - 1; $i++) {
            if ($URL[$i] == '.' && $URL[$i + 1] == '.') {
                return false;
            }
        }
        return true;
    }
    return false;
}
