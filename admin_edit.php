<?php
    session_start();
    $regno=isset($_POST['regno_e'])?htmlspecialchars($_POST['regno_e']):0;

    if(isset($_SESSION['alogin']) && htmlspecialchars($_SESSION['alogin'])=='You are logged in,Check Requests'){
        $server="localhost";
        $username="root";
        $password="";
        $database="classProject";

        $conn=new mysqli($server,$username,$password,$database);
        if($conn->connect_error)
            die('Fatal Connection error!!');
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
        <button class=nav id="delete">Delete Profile picture</button>
        <!--Basic details-->
        <?php
        $sql="SELECT * from students where regno=".$regno;
        $result=$conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo '<div class="content" style="max-width:56vw;">
                    <img class="design" src="img/back2.png">
                    <h1>&nbsp;&nbsp;&nbsp;&nbsp;Fill up the details:</h1>
                    <form method="POST" action=reg.php>
                        <h3 class="heading">Registration<br> Number:&nbsp;<input onblur=Validate(this) type="number" name="regno" value='.$row['regno'].' placeholder="Enter Registration number" maxlength=8 required disabled></h3>
                        <h3 class="heading">Branch:&nbsp;<input onblur=Validate(this) type="text" name="branch" value='.$row['branch'].' placeholder="Enter Branch name"required disabled></h3>
                        <h3 class="heading">Roll <br>Number:&nbsp;<input onblur=Validate(this) type="text" name="rollno" value='.$row['rollno'].' placeholder="Enter Roll number" required disabled></h3>
                        <h3 class="heading">Name:&nbsp;<input onblur=Validate(this) type="text" name="name" value="'.$row['name'].'" placeholder="Enter your name" required disabled></h3>
                        <h3 class="heading">Phone:&nbsp;<input onblur=Validate(this) type="number" name="phone" value='.$row['phone'].' placeholder="Enter your phone number" maxlength=10 required></h3>
                        <h3 class="heading">Email Id:&nbsp;<input onblur=Validate(this) type="email" name="email" value='.$row['email'].' placeholder="Enter email" required></h3>
                        <div class="wrap"><h4 id="message"></h4></div>
                        <div class="wrap">
                            <button class="nav" id="register_button" type="submit">Update</button>
                            <button class="nav" type="reset">Set</button>
                        </div>
                        <br>
                    </form>
                </div>';
            }
        }
        else {
            echo "<div class='new'><div class=content><br><h1 style='margin-left: 10%;'>No Recent Requests...</h1><br></div><br><br></div>";
        }
        ?>
</div>

        <!--More Details-->
        <h1 class="title" style="font-size: 1.5em">&nbsp;&nbsp;Additional Details</h1>
            <div>
                <!--content-->
                <div class="content">
                    <img class="design" src="img/back2.png">
                    <h1>&nbsp;&nbsp;&nbsp;&nbsp;Personal Details:</h1>
                    <form method="POST" action="reg.php">
                        <h3 class="heading">Date of Birth:&nbsp;<input type="date" name="DOB" placeholder="Enter Date of Birth" required></h3>
                        <h3 class="heading">Age:&nbsp;<input type="number" name="age" placeholder="Your age here" readonly></h3>
                        <h3 class="heading">Address:&nbsp;<input type="text" name="address" placeholder="Enter your address" required></h3>
                        <h3 class="heading">Father\'s Name:&nbsp;<input type="text" name="fname" placeholder="Enter your Father\'s name" required></h3>
                        <h3 class="heading">Mothers\'s Name:&nbsp;<input type="text" name="mname" placeholder="Enter your Mother\'s name" required></h3>
                        <h3 class="heading">Guardian\'s Email Id:&nbsp;<input type="email" name="email" placeholder="Enter email" required></h3>
                        <div class="wrap"><h4 class="message2"></h4></div>
                        <br>
                    </form>
                </div>
            </div>
            <br>
            <div>
                <!--content-->
                <div class="content">
                    <img class="design" src="img/back2.png">
                    <h1>&nbsp;&nbsp;&nbsp;&nbsp;Academic Details:</h1>
                    <form method="POST" action="reg.php">
                        <h3 class="heading">10th Standard marks:&nbsp;<input type="number" name="10m" placeholder="Class 10 percentage here" required></h3>
                        <h3 class="heading">12th Standard marks:&nbsp;<input type="number" name="12m" placeholder="Class 12 percentage here" required></h3>
                        <h3 class="heading">Extra Curricular<br>Activities:&nbsp;<input type="text" name="ECA" placeholder="Extra Curricular Activities here" required></h3>
                        <h3 class="heading">Scholastic<br>Achievements:&nbsp;<input type="number" name="Acievement" placeholder="Scholastic Achievements here" required></h3>
                        <h3 class="heading">Hobbies:&nbsp;
                            <select name="course" required>
                                <option>Select Hobby</option>
                                <option value="Painting">Painting</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Playing Guitar">Playing Guitar</option>
                                <option value="Singing">Singing</option>
                                <option value="Dancing">Dancing</option>
                                <option value="Travelling">Travelling</option>
                                <option value="Reading">Reading</option>
                                <option value="Beatboxing">Beatboxing</option>
                            </select>
                        </h3>
                        <div class="wrap"><h4 class="message2"></h4></div>
                        <br>
                    </form>
                </div>
            </div>
            <br>
            <div>
            <!--content-->
            <div class="content">
                <form method="POST" action="reg.php">
                    <br>
                    <div class="wrap"><button class="nav" id="update_button" type="submit">Update</button>
                    <button class="nav" id="set_button" type="submit">Set</button></div>
                    <br>
                </form>
            </div>
        </div>
</div>
        
</body>
</html>
