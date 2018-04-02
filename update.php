<?php
    session_start();
    $regno=$_SESSION['regno'];
    $DOB=isset($_POST['DOB'])?htmlspecialchars($_POST['DOB']):0;
    $fname=isset($_POST['fname'])?htmlspecialchars($_POST['fname']):0;
    $mname=isset($_POST['mname'])?htmlspecialchars($_POST['mname']):0;
    $gemail=isset($_POST['gemail'])?htmlspecialchars($_POST['gemail']):0;
    $address=isset($_POST['address'])?htmlspecialchars($_POST['address']):0;
    $m10=isset($_POST['m10'])?htmlspecialchars($_POST['m10']):0;
    $m12=isset($_POST['m12'])?htmlspecialchars($_POST['m12']):0;
    $ECA=isset($_POST['ECA'])?htmlspecialchars($_POST['ECA']):NULL;
    $Achievement=isset($_POST['Ach'])?htmlspecialchars($_POST['Ach']):NULL;
    $hobby=NULL;
    if(!empty($_POST['check_list'])){
        $hobby=implode(",",$_POST['check_list']);
    }
    if(isset($_SESSION['login']) && htmlspecialchars($_SESSION['login'])=='You are logged in,Check Profile'){
        require 'connection.php';

    }
    //Update Table
    if($stmt=$conn->prepare('insert into extradetail (regno,DOB,fname,mname,gemail,address,m10,m12,ECA,Achievement,hobby) values (?,?,?,?,?,?,?,?,?,?,?)')){
		$stmt->bind_param("isssssiisss",$regno,$DOB,$fname,$mname,$gemail,$address,$m10,$m12,$ECA,$Achievement,$hobby);
                if(!($stmt->execute())){
                    if($stmt2=$conn->prepare('update extradetail set DOB=?,fname=?,mname=?,gemail=?,address=?,m10=?,m12=?,ECA=?,Achievement=?,hobby=? where regno=?')){
                        $stmt2->bind_param("sssssiisssi",$DOB,$fname,$mname,$gemail,$address,$m10,$m12,$ECA,$Achievement,$hobby,$regno);
                                if(!($stmt2->execute())){
                                    echo "Execution failed:" . $stmt2->error;
                                    die();
                                }
                                else{
                                    echo "Successfully Updated,Refresh the page";
                                    die();
                                }
                    }
                    echo "Execution failed:" . $stmt->error;
                    die();
                }
                else{
                    echo "Successfully Inserted your Additional Details,Refresh the page";
                    die();
                }
    }
    
?>