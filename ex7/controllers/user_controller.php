<?php

require_once '../models/User.php';


function user_single($login, $password) {
    $user = User::getone($login, $password);
    /*
    if ($article['title'] =="") {
        header("Location: /ex3/");
        die();
    }
     
     */
    return $user;
}

function user_all() {
    $user = User::getall();
    return $user;
}

?>