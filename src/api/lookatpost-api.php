<?php 
    require_once("../db_config.php");

    $username = $_SESSION["username"];

    $result = $dbh->showPostorderByDate($username);

    if(empty($result)){
        $result = false;
    }

    header('Content-Type: application/json');
    echo json_encode($result);
?>
