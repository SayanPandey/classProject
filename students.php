<?php
    session_start();
?>
<!DOCTYPE html>
<!--Sayan Pandey 15/IT/21-->
<html lang='en'>
	<head>
	<title>Students' Portal</title>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="student.css">
        <script src="jquery3.3.1.js"></script>
	</head>
    <body>
        <div class="banner">
            <img id="logo" src="img/logo.png">
            <h1 class="bannertext">National Institute of Technology  DURGAPUR, West Bengal</h1>
            <h1 class="bannertext">Students' Portal</h1>
        </div>
        <nav>
            <a class="nav"  onclick="show('home')">Home</a>
            <a class="nav"  onclick="show('register')">Register</a>
            <a class="nav"  onclick="show('login')">Login</a>
            <a class="nav"  onclick="show('profile')">Profile</a>
            <a class="nav" href="login.php">Logout</a>
        </nav>
    <!--Home-->
    <div id="home">
        <h1 class="title" style="font-size: 3em">&nbsp;&nbsp;Home</h1>
        <!--content-->
        <div class="content">
            <h1>&nbsp;&nbsp;&nbsp;&nbsp;Welcome!! Click on the navigation buttons for following functionalities:</h1>
        </div>
        <h3>
            <dl style="padding:15px;">
                <img class="design" src="img/back2.png">
                <dt>Home:</dt>
                <dd>Click on 'Home' to return here.</dd>
                <br>
                <dt>Register:</dt>
                <dd>Click on 'Register' on the navigation bar to register yourself with this portal.</dd>
                <br>
                <dt>Login:</dt>
                <dd>Click on 'Login' on the navigation bar to register yourself with this portal.</dd>
                <br>
                <dt>Profile:</dt>
                <dd>Click on 'Profile' to check your profile (Login Required).</dd>
                <br>
                <dt>Logout:</dt>
                <dd>Click on 'Logout' to end session.</dd>
            </dl>
        </h3>
    </div>
    <!--Register-->
    <div id="register">
        <h1 class="title" style="font-size: 3em">&nbsp;&nbsp;Register</h1>
        <!--content-->
        <div class="content">
            <img class="design" src="img/back2.png">
            <h1>&nbsp;&nbsp;&nbsp;&nbsp;Fill up the details:</h1>
            <form method="POST" action='reg.php'>
                <h3 class="heading">Registration Number:&nbsp;<input type="number" name="regno" placeholder="Enter Registration number" required></h3>
                <h3 class="heading">Roll Number:&nbsp;<input type="text" name="rollno" placeholder="Enter Roll number" required></h3>
                <h3 class="heading">Name:&nbsp;<input type="text" name="name" placeholder="Enter your name" required></h3>
                <h3 class="heading">Phone:&nbsp;<input type="number" name="phone" placeholder="Enter your phone number" required></h3>
                <h3 class="heading">Email Id:&nbsp;<input type="email" name="email" placeholder="Enter email" required></h3>
                <h3 class="heading">Password:&nbsp;<input type="password" id="password" name="password" placeholder="Enter password" required></h3>
                <h3 class="heading">Confirm Password:&nbsp;<input type="password" id="conf_pass" placeholder="Re-enter password" required></h3>
                <div class="wrap"><h4 id="message"></h4></div>
                <div class="wrap">
                    <button class="nav" id="register_button" type="submit">Register</button>
                    <button class="nav" type="reset">Reset</button>
                </div>
                <br>
            </form>
        </div>
    </div>
    <!--Login-->
    <div id="login">
        <h1 class="title" style="font-size: 3em">&nbsp;&nbsp;Login</h1>
        <!--content-->
        <div class="content">
            <img style=" z-index:-999;
                float:right;
                width:auto;
                max-width: 17%; 
                position:absolute;
                right:10px;" src="img/back2.png">
            <h1>&nbsp;&nbsp;&nbsp;&nbsp;Fill up the details:</h1>
            <form action="login.php" method="POST">
                <input type="hidden" value="students" name="logger">
                <h3 class="heading">Registration Number:&nbsp;<input type="number" name="regno" placeholder="Enter Registration number" required></h3>
                <h3 class="heading">Password:&nbsp;<input type="password" name="password" placeholder="Enter password" required></h3>
                <div class="wrap"><h4 id="message1"></h4></div>
                <div class="wrap"><button class="nav" type="submit">Login</button></div>
                <br>
            </form>
        </div>
    </div>
    <!--Profile-->
    <div id="profile">
        <h1 class="title" style="font-size: 3em">&nbsp;&nbsp;Profile</h1>
        <!--content-->
        <?php
            if(isset($_SESSION['login']) && htmlspecialchars($_SESSION['login'])=='You are logged in,Check Profile'){
                $server="localhost";
                $username="root";
                $password="";
                $database="classProject";

                $conn=new mysqli($server,$username,$password,$database);
                if($conn->connect_error)
                    die('Fatal Connection error!!');
                //Basic Profile
                $sql="SELECT * from students where regno=".$_SESSION['regno'];
                $result=$conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $name=$row["name"];
                        echo '<div class="content">
                        <img style=" z-index:-999;
                            float:right;
                            width:auto;
                            max-width: 20%; 
                            position:absolute;
                            right:10px;" src="img/back2.png">
                        <h1>&nbsp;&nbsp;&nbsp;&nbsp;Basic Details:</h1>
                        <h3 class="heading">Registration Number:&nbsp;<a class="details">'.$row['regno'].'</a></h3>
                        <h3 class="heading">Roll Number:&nbsp;<a class="details">'.$row['rollno'].'</a></h3>
                        <h3 class="heading">Name:&nbsp;<a class="details">'.$row['name'].'</a></h3>
                        <h3 class="heading">Phone:&nbsp;<a class="details">'.$row['phone'].'</a></h3>
                        <h3 class="heading">Email Id:&nbsp;<a class="details">'.$row['email'].'</a></h3>
                        <br>
                    </div>
                    <br>';
                    }
                }
                else {
                    echo "<div class='new'><div class=content><br><h1 style='margin-left: 10%;'>Problem inloading Basic profile</h1><br></div><br><br></div>";
                }
                
            //Profile picture
            echo'<div class="profile_back" style="background-image: url(img/std_img/'.$_SESSION['regno'].'.jpg);">
                    <div id="profile_name">'.$name.'</div>
                    <input type="file" name="file" id="file" />
                    <a class="nav" onclick=$("#file").click()>Upload file</a>
                </div>
                <br>';
            
        
            //More datails
            echo '<div>
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
                    <img class="design" src="img/back2.png" style="max-width:20%">
                    <h1>&nbsp;&nbsp;&nbsp;&nbsp;Academic Details:</h1>
                    <form method="POST" action="reg.php">
                        <h3 class="heading">10th Standard marks:&nbsp;<input type="number" name="10m" placeholder="Class 10 percentage here" required></h3>
                        <h3 class="heading">12th Standard marks:&nbsp;<input type="number" name="12m" placeholder="Class 12 percentage here" required></h3>
                        <h3 class="heading">Course:&nbsp;
                            <select name="course" required>
                                <option>Select Course </option>
                                <option value="B.Tech">B.Tech</option>
                                <option value="M.Tech">M.Tech</option>
                                <option value="MCA">MCA</option>
                            </select>
                        </h3>
                        <h3 class="heading">Course:&nbsp;
                            <select name="course" placeholder="Select your course" required>
                            <option value="0" selected>Select Branch </option>
                            <option value="1">Computer Science and Engineering</option>
                            <option value="2">Information Technology</option>
                            <option value="3">Electronic and Communication Engineering</option>
                            <option value="4">Mechanical Engineering</option>
                            <option value="5">Civil Engineering</option>
                            <option value="6">Chemical Engineering</option>
                            <option value="7">Electrical Engineering</option>
                            <option value="8">Metallurgy </option>
                            <option value="9">Biotechnology</option>
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
                    <button class="nav" id="set_button" type="submit">Update</button></div>
                    <br>
                </form>
            </div>
        </div>
            ';
        }
        else {
            echo "<div class='new'><div class=content><br><h1 style='margin-left: 10%;'>Please LOGIN first !!</h1><br></div><br><br></div>";
        }
        ?>
    </div>
    </body>
    <script>
        var response= "<?php echo isset($_SESSION['response'])?$_SESSION['response']:0;?>";
        var login="<?php echo isset($_SESSION['login'])?$_SESSION['login']:0;?>";  
    </script>
    <script src="student.js"></script>
</html>
                        