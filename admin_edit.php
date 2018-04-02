<?php
    session_start();
    $regno=isset($_POST['regno_e'])?htmlspecialchars($_POST['regno_e']):0;

    if(isset($_SESSION['alogin']) && htmlspecialchars($_SESSION['alogin'])=='You are logged in,Check Requests'){
        require 'connection.php';
    }
    else{
        echo '<h1 class="title">You need to Login Again !</h1>';
        die();
    }

?>
<!DOCTYPE html>
<!--Sayan Pandey 15/IT/21-->
<html lang='en'>
	<head>
	<title>Administrators' Portal</title>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" href="admin.css">
                <script src="jquery3.3.1.js"></script>
	</head>
<body>
<!--Edit Profile-->
<div id="basic">
        <h1 class="title" style="font-size: 3em">&nbsp;&nbsp;Student Profile of : <?php echo $regno;?></h1>
        <br>
        <h1 class="title" style="font-size: 1.5em">&nbsp;&nbsp;Basic Profile</h1>
        <!--Profile Picture-->
        <img class=content src='<?PHP
                $path1 = "img/std_img/".$regno.".jpg";
                $path2 = "img/student.png";
                echo file_exists($path1) ? $path1 : $path2; 
        ?>' style="max-width:40vw;float:right"/>
        <!--Basic details-->
        <?php
        $sql="SELECT * from students where regno=".$regno;
        $result=$conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo '<a class=nav id="name">'.$row['name'].'</a>';
            echo '<div class="content" style="max-width:56vw;">
                    <img class="design" src="img/back2.png">
                    <h1>&nbsp;&nbsp;&nbsp;&nbsp;Fill up the details:</h1>
                    <form method="POST" action=reg.php>
                        <h3 class="heading">Registration<br> Number:&nbsp;<a class=detail>'.$row['regno'].'</a></h3>
                        <h3 class="heading">Branch:&nbsp;<a class=detail>'.$row['branch'].'</a></h3>
                        <h3 class="heading">Roll <br>Number:&nbsp;<a class=detail>'.$row['rollno'].'</a></h3>
                        <h3 class="heading">Name:&nbsp;<a class=detail>'.$row['name'].'</a></h3>
                        <h3 class="heading">Phone:&nbsp;<a class=detail>'.$row['phone'].'</a></h3>
                        <h3 class="heading">Email Id:&nbsp;<a class=detail>'.$row['email'].'</a></h3>
                        <br>
                    </form>
                </div>';
            }
        }
        else {
            echo "<div class='new'><div class=content><br><h1 style='margin-left: 10%;'>Something Went Wrong !!!</h1><br></div><br><br></div>";
        }
        ?>
</div>
<?php
//More datails
            $sql="SELECT * from extradetail where regno=".$regno;
                $result=$conn->query($sql);
                if($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $DOB=isset($row['DOB'])?htmlspecialchars($row['DOB']):0;
                    $fname=isset($row['fname'])?htmlspecialchars($row['fname']):0;
                    $mname=isset($row['mname'])?htmlspecialchars($row['mname']):0;
                    $gemail=isset($row['gemail'])?htmlspecialchars($row['gemail']):0;
                    $address=isset($row['address'])?htmlspecialchars($row['address']):0;
                    $m10=isset($row['m10'])?htmlspecialchars($row['m10']):0;
                    $m12=isset($row['m12'])?htmlspecialchars($row['m12']):0;
                    $ECA=isset($row['ECA'])&&$row['ECA']!=''?htmlspecialchars($row['ECA']):"N/A";
                    $Achievement=isset($row['Achievement'])&&$row['Achievement']!=''?htmlspecialchars($row['Achievement']):"N/A";
                    $hobby=isset($row['hobby'])?htmlspecialchars($row['hobby']):0;
                }
                else{
                    $DOB=$fname=$mname=$gemail=$address=$m10=$m12=$ECA=$Achievement=$hobby='N/A';
                }
            echo '<h1 class="title title2" style="font-size: 3em">&nbsp;&nbsp;Additional Details</h1>
            <div>
                <!--content-->
                <div class="content">
                    <img class="design" src="img/back2.png">
                    <h1>&nbsp;&nbsp;&nbsp;&nbsp;Personal Details:</h1>
                        <h3 class="heading">Date of Birth:&nbsp;<a class=detail>'.$DOB.'</a></h3>
                        <input type="hidden" id="dob" value="'.$DOB.'"/>
                        <h3 class="heading">Age:&nbsp<a class=detail id="age"></a></h3>
                        <h3 class="heading">Father\'s Name:&nbsp;<a class=detail>'.$fname.'</a></h3>
                        <h3 class="heading">Mother\'s Name:&nbsp;<a class=detail>'.$mname.'</a></h3>
                        <h3 class="heading">Guardian\'s email:&nbsp<a class=detail>'.$gemail.'</a></h3>
                        <h3 class="heading">Address:&nbsp;<a class=detail>'.$address.'</a></h3><br>
                        <br>
                </div>
            </div>
            <br>
            <div>
                <!--content-->
                <div class="content">
                    <img class="design" src="img/back2.png">
                    <h1>&nbsp;&nbsp;&nbsp;&nbsp;Academic Details:</h1>
                        <h3 class="heading">10th Standard marks:&nbsp;<a class=detail>'.$m10.'</a></h3>
                        <h3 class="heading">12th Standard marks:&nbsp;<a class=detail>'.$m12.'</a></h3>
                        <h3 class="heading">Extra Curricular<br>Activities:&nbsp;<a class=detail>'.$ECA.'</a></h3>
                        <h3 class="heading">Scholastic<br>Achievements:&nbsp;<a class=detail>'.$Achievement.'</a></h3>
                    </div>
                    <br>
                    <div class="content" style="min-height:70vh">
                    <img class="design" src="img/back2.png">
                        <img src="img/back2.jpg" class="hobby">
                        <h3 class="heading">Hobbies:&nbsp;<br>
                    ';
                    $hobbies=(explode(",",$hobby));
                    foreach($hobbies as $selected)
                        echo "&nbsp&nbsp<a class=detail>".$selected."</a><br>";
                    echo '</h3>
                </div>
            </div>
            <br>
            <div>
            <!--content-->
            </div>
        </div>
            ';
?>
<script>
//age
$(document).ready(function(){
    (function(){
    var dob=new Date($("#dob").val());
    var today= new Date();
    var age=today.getFullYear()-dob.getFullYear();
    if(today.getMonth() < dob.getMonth() || (today.getMonth()==dob.getMonth() && today.getDate()<dob.getDate()))
        age--; 
    $("#age").text(age);
})();
});
</script>
</body>
</html>
