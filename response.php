<?php
    $regno=isset($_POST['regno'])?htmlspecialchars($_POST['regno']):NULL;
    $response=isset($_POST['response'])?htmlspecialchars($_POST['response']):NULL;
    if($regno==NULL || $response==NULL)
        header("Location:/classProject",true,303);

    $server="localhost";
    $username="root";
    $password="";
    $database="classProject";

    $conn=new mysqli($server,$username,$password,$database);
    if($conn->connect_error)
        die('Fatal Connection error!!');
    $sql="update students set request=".$response." where regno=".$regno;
    echo $sql;
    $conn->query($sql);
?>