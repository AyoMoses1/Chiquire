<?php 

    // db connection

    $host = "localhost";
    $user="AyoMoses";
    $pass="Ayo08097137563";
    $db_name = "blog";

    $conn = mysqli_connect($host, $user, $pass, $db_name);

    if(!$conn) {
        die;
    } 

?>