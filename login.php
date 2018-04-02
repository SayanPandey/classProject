<?php
    session_start();
    $user=isset($_POST['user'])?htmlspecialchars($_POST['user']):NULL;
    $regno=isset($_POST['regno'])?htmlspecialchars($_POST['regno']):NULL;
    $pass=isset($_POST['password'])?htmlspecialchars($_POST['password']):NULL;
    $logger=isset($_POST['logger'])?htmlspecialchars($_POST['logger']):NULL;
    //Code for redirect and LOGOUT as well
    if($pass==NULL || $logger==NULL){
        session_unset();
        session_destroy();
        header("Location:/classProject",true,303);
    }

    require 'connection.php';
    
    //Login for admins
    if($logger=='admins'){
        $sql="select * from ".$logger." where user=? and pass=?";
        if($stmt=$conn->prepare($sql)){
            $stmt->bind_param("ss",$user,$pass);
                    if(!($stmt->execute())){
                        $_SESSION['alogin']="Execute failed:" . $stmt->error;
                        header("Location:/classProject/admins",true,303);
                    }
                    else{
                        $result=$stmt->get_result();
                       if($result->num_rows)
                            $_SESSION['alogin']="You are logged in,Check Requests";
                        else
                            $_SESSION['alogin']="Credentials not matching !!";
                        header("Location:/classProject/admins",true,303);
                    }
        }
    }
    //Login for students
    else if($logger=='students'){
        $sql="select request from ".$logger." where regno=? and pass=?";
        if($stmt=$conn->prepare($sql)){
            $stmt->bind_param("ss",$regno,$pass);
                    if(!($stmt->execute())){
                        $_SESSION['login']="Execute failed:" . $stmt->error;
                        header("Location:/classProject/admins",true,303);
                    }
                    else{
                        $result=$stmt->get_result();
                       if($result->num_rows){
                            while($row=$result->fetch_assoc())
                                switch($row['request']){
                                    case 0:
                                    $_SESSION['login']="Registration request is being validated; make sure to try again later.";
                                    break;
                                    case 1:
                                    $_SESSION['login']="You are logged in,Check Profile";
                                    $_SESSION['regno']=$regno;
                                    break;
                                    case -1:
                                    $_SESSION['login']="Registration has been rejected!!! CONTACT ADMIN.";
                                    break;
                                }
                       }
                        else
                            $_SESSION['login']="Credentials not matching !!";
                        header("Location:/classProject/students",true,303);
                    }
        }
    }
?>