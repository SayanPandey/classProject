<?php
    session_start();
    $user=isset($_POST['user'])?htmlspecialchars($_POST['user']):NULL;
    $pass=isset($_POST['password'])?htmlspecialchars($_POST['password']):NULL;
    $logger=isset($_POST['logger'])?htmlspecialchars($_POST['logger']):NULL;
    if($user==NULL || $pass==NULL || $logger==NULL)
        header("Location:/classProject",true,303);

    $server="localhost";
    $username="root";
    $password="";
    $database="classProject";

    $conn=new mysqli($server,$username,$password,$database);
    if($conn->connect_error)
        die('Fatal Connection error!!');
    
    //Login for admins
    if($logger=='admins'){
        $sql="select * from ".$logger." where user=? and pass=?";
        if($stmt=$conn->prepare($sql)){
            $stmt->bind_param("ss",$user,$pass);
                    if(!($stmt->execute())){
                        $_SESSION['login']="Execute failed:" . $stmt->error;
                        header("Location:/classProject/admins",true,303);
                    }
                    else{
                        $result=$stmt->get_result();
                       if($result->num_rows)
                            $_SESSION['login']="Success";
                        else
                            $_SESSION['login']="Credentials not matching !!";
                        header("Location:/classProject/admins",true,303);
                    }
        }
    }

?>