<?php
    $server="localhost";
    $username="root";
    $password="";
    $database="classProject";

    $conn=new mysqli($server,$username,$password,$database);
    if($conn->connect_error)
        die('Fatal Connection error!!');
?>