<?php
    $regno=isset($_POST['regno'])?htmlspecialchars($_POST['regno']):NULL;
    $response=isset($_POST['response'])?htmlspecialchars($_POST['response']):NULL;
    if($regno==NULL || $response==NULL)
        header("Location:/classProject",true,303);

    require 'connection.php';
    
    $sql="update students set request=".$response." where regno=".$regno;
    echo $sql;
    $conn->query($sql);
?>