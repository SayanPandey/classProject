<?php
    session_start();
    $regno=isset($_POST['regno'])?htmlspecialchars($_POST['regno']):0;
    $rollno=isset($_POST['rollno'])?htmlspecialchars( $_POST['rollno']):0;
    $name=isset($_POST['name'])?htmlspecialchars($_POST['name']):0;
    $phone=isset($_POST['phone'])?htmlspecialchars($_POST['phone']):0;
    $email=isset($_POST['email'])?htmlspecialchars($_POST['email']):0;
    $pass=isset($_POST['password'])?htmlspecialchars($_POST['password']):0;
    $request=0;
    
    $servername='localhost';
    $username='root';
    $password='';
    $database='classproject';
	
	$conn = new mysqli($servername,$username,$password,$database);
	if($conn->connect_error){
		die("Fatal Connection Error !!");
	}
	
    if($stmt=$conn->prepare(' insert into students (regno,rollno,name,phone,email,pass,request) values (?,?,?,?,?,?,?)')){
		$stmt->bind_param("ississi",$regno,$rollno,$name,$phone,$email,$pass,$request);
                if(!($stmt->execute())){
                    echo "Execute failed:" . $stmt->error;
                    die();
                }
                else{
                    echo "Successfully lodged Registration Request; Use Login form from next time";
                    die();
                }
	}
?>