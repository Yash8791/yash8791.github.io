<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "chat_server";

    $conn = mysqli_connect($server, $username, $password, $db);

    if(!$conn){
        die("Connection Error: " . mysqli_connect_error());
    }

?>