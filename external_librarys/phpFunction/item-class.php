<?php

class item{

    var $ID;
    var $name;
    var $description;
    var $ID_club;
    var $ID_creator_user;
    var $quantity;
    var $price;
    var $image;
}

function insert_item($DB, $item){

    $query = "INSERT INTO item VALUES (NULL, '$item->ID_creator_user', '$item->ID_club', '$item->name', '$item->description',
                     '$item->price', '$item->quantity', '$item->image')";

    if($DB->updateDB($query)){
        
        $query = "UPDATE club SET nb_item = (SELECT count(*) FROM item WHERE ID_club=".$item->ID_club.") WHERE ID_club=".$item->ID_club;
        if($DB->updateDB($query))
            return true;
    }
    return false;
}

function item_into_object_from_form($ID_club, $ID_user){
    $item = new item();
    if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['price']) && isset($_POST['quantity'])){
        $item->name = $_POST['name'];
        $item->description = $_POST['description'];
        $item->price = $_POST['price'];
        $item->quantity = $_POST['quantity'];
        $item->image = $_POST['image'];
        $item->ID_club =  $ID_club;
        $item->ID_creator_user = $ID_user;
        return $item;
    }
    return false;
}

function get_list_item_from_DB($DB, $ID_club, $offset){

    $offset = (int)$offset * pag;
    $query = "SELECT * FROM item WHERE ID_club=".$ID_club." LIMIT ". pag ." OFFSET ".$offset;
    $r = $DB->selectDB($query);
    $array = get_item_from_DB($r);

    if($array)
        return $array;

    return false;
}

function get_list_item_from_DB1($DB, $ID_club){

    $query = "SELECT * FROM item WHERE ID_club=".$ID_club;
    $r = $DB->selectDB($query);
    $array = get_item_from_DB($r);

    if($array)
        return $array;

    return false;
}

function get_item_from_DB($r){
    $array = array();
    if($r){
        $i = 0;
        while($row = mysqli_fetch_array($r)){
            $array[$i] = new item();
            $array[$i]->ID = $row['ID_item'];
            $array[$i]->ID_club = $row['ID_club'];
            $array[$i]->name = $row['name'];
            $array[$i]->description = $row['description'];
            $array[$i]->ID_creator_user = $row['ID_creator_user'];
            $array[$i]->quantity = $row['quantity'];
            $array[$i]->price = $row['price'];
            $array[$i]->image = $row['image'];
            $i++;
        }
        return $array;
    }
    return false;
}

function delete_item($DB, $ID_item, $ID_club){

    $query = "SELECT * FROM user_has_item WHERE ID_item=".$ID_item;
    $r = $DB->selectDB($query);

    if($r){
        while($row = mysqli_fetch_array($r)){
            delete_item_profil($DB, $ID_item, $row['ID_user']);
        }
    }

    $query = "DELETE FROM item WHERE ID_item=".$ID_item;
    if($DB->updateDB($query)){
        $query = "UPDATE club SET nb_item = (SELECT count(*) FROM item WHERE ID_club=".$ID_club.") WHERE ID_club=".$ID_club;
            if($DB->updateDB($query))
                return true;
    }

    return false;
}

function buy_item($DB, $user, $ID_item, $log){

    if($user->role == 4){
        return "You have to be conected to buy an item";
    }else{
        $stat = get_user_stat($DB, $user->ID);
        $query = "SELECT * FROM item WHERE ID_item=".$ID_item;
        $item = get_item_from_DB($DB->selectDB($query))[0];

        $query = "SELECT * FROM club_member WHERE ID_user=".$user->ID." AND ID_club = (SELECT ID_club FROM item WHERE ID_item=".$ID_item.")";
        $r = $DB->selectDB($query);

        if(mysqli_num_rows($r) == 0){
            write_file($log, "FAIL : Try to buy item but not member of the club ".$item->name, $_SESSION['user']);
            return "You have to be member of this club to buy its items";
        }

        if($item->quantity > 0 && $item->price <= $stat->current_point){   
            $now = virtual;
            $query = "INSERT INTO user_has_item VALUES ('$user->ID', '$ID_item', '$now')";
            if($DB->updateDB($query)){
                $query = "UPDATE item SET quantity = quantity - 1 WHERE ID_item=".$ID_item;
                if($DB->updateDB($query)){
                    if(buy_item_stat($DB, $user->ID, $item)){
                        write_file($log, "SUCCESS : Item ".$item->name." buy", $_SESSION['user']);
                        return "Item is now in your collection";
                    }
                }
            }
            write_file($log, "FAIL : Error to buy item ".$item->name, $_SESSION['user']);
            return "You already have this item";
        }else{
            write_file($log, "FAIL : Not enough points to buy item ".$item->name, $_SESSION['user']);
            return "You don't have enough points or the item is no longer available !";
        }
    }
}

function promote_moderator($DB, $user, $ID_item, $log){

    $query = "SELECT c.ID_club, c.name, c.promote as promote, count(*) as item FROM user_has_item uhi 
    JOIN item i ON uhi.ID_item=i.ID_item
    JOIN user u ON uhi.ID_user=u.ID_user
    JOIN club c ON c.ID_club=i.ID_club
    WHERE u.ID_user=".$user->ID."
    GROUP BY c.name";

    $r = $DB->selectDB($query);
    $array = array();
    if($r){
        while($row = mysqli_fetch_array($r)){
            if($row['item'] >= $row['promote']){
                $query = "UPDATE club_member SET moderator = 1 WHERE ID_user=".$user->ID." AND ID_club=".$row['ID_club'];
                if ($DB->updateDB($query)){
                    $query = "UPDATE user SET ID_user_type= 2 WHERE ID_user=".$user->ID;
                    echo $query;
                    if($DB->updateDB($query)){
                        write_file($log, "SUCCESS : ".$user->username." is promoted moderator of ".$row['name']." (enough item)", $user->username);
                        return true;
                    }
                }
            }
        } 
    }
    return false;
    
}

function delete_item_user($DB, $ID_user){

    $query = "DELETE FROM user_has_item WHERE ID_user=".$ID_user;
    if($DB->updateDB($query))
        return true;
}

function update_item($DB, $ID_item){

    $item = item_into_object_from_form(0, 0);
    $query = "UPDATE item SET name='".$item->name."', description='".$item->description."', price='".$item->price."',
                    quantity=".$item->quantity." WHERE ID_item=".$ID_item;
    
    if($DB->updateDB($query)){
        return true;
    }
    return false;
}