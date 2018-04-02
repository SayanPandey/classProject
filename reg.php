<?php
    session_start();
    $regno=isset($_POST['regno'])?htmlspecialchars($_POST['regno']):0;
    $branch=isset($_POST['branch'])?htmlspecialchars($_POST['branch']):0;
    $rollno=isset($_POST['rollno'])?htmlspecialchars( $_POST['rollno']):0;
    $name=isset($_POST['name'])?htmlspecialchars($_POST['name']):0;
    $phone=isset($_POST['phone'])?htmlspecialchars($_POST['phone']):0;
    $email=isset($_POST['email'])?htmlspecialchars($_POST['email']):0;
    $pass=isset($_POST['password'])?htmlspecialchars($_POST['password']):0;
    $request=0;
    
    require 'connection.php';
	
    if($stmt=$conn->prepare(' insert into students (regno,branch,rollno,name,phone,email,pass,request) values (?,?,?,?,?,?,?,?)')){
		$stmt->bind_param("isssissi",$regno,$branch,$rollno,$name,$phone,$email,$pass,$request);
                if(!($stmt->execute())){
                    echo "Execution failed:" . $stmt->error;
                    die();
                }
                else{
                    echo "Successfully lodged Registration Request; Use Login form from next time";
                    die();
                }
	}
?>