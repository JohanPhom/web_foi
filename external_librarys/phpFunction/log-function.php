<?php

function open_file($path){

    $log = fopen($path, 'r+');
    fseek($log, 0, SEEK_END);
    return $log;
}

//write the message, the date and the user connected into the file
function write_file($log, $message, $user){

    if($user == ""){
        $user = "Visitor";
    }

    $now = virtual;
    $line = $now ." /   ". $user . "    /   ". $message . "\n";
    fputs($log, $line);
}

//read the file
function read_file($file, $path){
    
    fseek($file, 0);
    $array_line_file = array();
    $i=0;
    while($line = fgets($file, filesize($path))){
        $array_line_file[$i] = $line;
        $i++;
    }
    return $array_line_file;
}

function read_file_filtered($file, $path, $keyword){

    fseek($file, 0);
    $array_line_file = array();
    $array_keyword = string_into_word($keyword);
    $i=0;
    $size = count($array_keyword);
    while($line = fgets($file, filesize($path))){
        $compteur = 0;
        for($j = 0; $j < $size; $j++){

            $pattern = "#".$array_keyword[$j]."#";
            $pattern = strtolower($pattern);
            $line = strtolower($line);

            if(preg_match($pattern, $line)){
                $compteur++;
            }
        }
        if($compteur == $size)
            $array_line_file[$i] = $line;
            
        $i++;
    }
    return $array_line_file;

}

function read_file_filtered_strict($file, $path, $keyword){

    fseek($file, 0);
    $array_line_file = array();
    $i=0;
    while($line = fgets($file, filesize($path))){
       
        $pattern = "#".$keyword."#";
        $pattern = strtolower($pattern);
        $line = strtolower($line);

        if(preg_match($pattern, $line)){
            $array_line_file[$i] = $line;
        }
        
        $i++;
    }
    return $array_line_file;

}

function string_into_word($string){

    $i = 0;
    $j = 0;
    $word = array();
    $size = strlen($string);

    for($i = 0; $i < strlen($string); $i++){
        $space = $string[$i];
        if($space == " "){
            $word[$j] = substr($string, 0, $i);
            $string = substr($string, $i, strlen($string));
            $j++;
            $i=0;
        }
    }
    $word[$j] = substr($string, 0, strlen($string));
    return $word;
}