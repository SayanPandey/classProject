<?php
    session_start();
    $regno=isset($_POST['regno'])?htmlspecialchars($_POST['regno']):0;
    $rollno=isset($_POST['rollno'])?htmlspecialchars( $_POST['rollno']):0;
    $name=isset($_POST['name'])?htmlspecialchars($_POST['name']):0;
    $phone=isset($_POST['phone'])?htmlspecialchars($_POST['phone']):0;
    $email=isset($_POST['email'])?htmlspecialchars($_POST['email']):0;
    $pass=isset($_POST['pass'])?htmlspecialchars($_POST['pass']):0;
    
    $servername='localhost';
    $username='root';
    $password='';
    $database='classproject';
    
    echo $regno." ".$rollno." ".$phone." ".$pass." ".$name." ".$email;
	
	$conn = new mysqli($servername,$username,$password,$database);
	if($conn->connect_error){
		die("Fatal Connection Error !!");
	}
	
    if($stmt=$conn->prepare(' insert into students (regno,rollno,name,phone,email,pass) values (?,?,?,?,?,?)')){
		$stmt->bind_param("ississ",$regno,$rollno,$name,$phone,$email,$pass);
                if(!($stmt->execute())){
                    $_SESSION['response']="Execute failed:" . $stmt->error;
                    header("Location:/classProject/students/#register",true,303);
                }
                else{
                    $_SESSION['response']="Successfully Registered";
                    header("Location:/classProject/students/#register",true,303);
                }
	}
?>