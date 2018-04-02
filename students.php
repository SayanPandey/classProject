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
                <h3 class="heading">Registration Number:&nbsp;<input onblur=Validate(this) type="number" name="regno" placeholder="Enter Registration number" maxlength=8 required></h3>
                <h3 class="heading">Branch:&nbsp;
                        <select name="branch" placeholder="Select your course" required>
                            <option value="Select Branch" selected>Select Branch</option>
                            <option value="CSE">Computer Science and Engineering</option>
                            <option value="IT">Information Technology</option>
                            <option value="ECE">Electronic and Communication Engineering</option>
                            <option value="ME">Mechanical Engineering</option>
                            <option value="CE">Civil Engineering</option>
                            <option value="CHE">Chemical Engineering</option>
                            <option value="EE">Electrical Engineering</option>
                            <option value="MME">Metallurgy </option>
                            <option value="BT">Biotechnology</option>
                        </select>
                </h3>
                <h3 class="heading">Roll Number:&nbsp;<input onblur=Validate(this) type="text" name="rollno" placeholder="Enter Roll number" required></h3>
                <h3 class="heading">Name:&nbsp;<input onblur=Validate(this) type="text" name="name" placeholder="Enter your name" required></h3>
                <h3 class="heading">Phone:&nbsp;<input onblur=Validate(this) type="number" name="phone" placeholder="Enter your phone number" maxlength=10 required></h3>
                <h3 class="heading">Email Id:&nbsp;<input onblur=Validate(this) type="email" name="email" placeholder="Enter email" required></h3>
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
        <div class="errorCont">
            <div id="regnoError" class="valError">This is a error</div>
            <div id="rollError" class="valError">This is a error</div>
            <div id="nameError" class="valError">This is a error</div>
            <div id="phoneError" class="valError">This is a error</div>
            <div id="emailError" class="valError">This is a error</div>
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
                
                require 'connection.php';

                $sql="SELECT * from students where regno=".$_SESSION['regno'];
                $result=$conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $name=$row["name"];
                            
                        //Profile picture
                        echo'<h1 class="title title2" style="font-size: 1.5em">&nbsp;&nbsp;Profile Picture</h1>
                        <div class="profile_back" style="background-image: url(img/std_img/'.$_SESSION['regno'].'.jpg),url(img/banner.jpg);">
                                <div id="profile_name">'.$name.'</div>
                                <form method="POST" action="upload.php" id="submit_form" enctype="multipart/form-data">
                                    <input type="file" name="file" id="file" />
                                    <a class="nav" style="bottom:100px;" type=submit onclick=$("#file").click()>Upload file</a>
                                    <input type="submit" id="file_submit"/>
                                    <a class="nav" type=submit onclick=$("#file_submit").click()>Submit Photo</a>
                                </form>
                            </div>
                            <br>';
                        //Basic Profile
                        echo '<h1 class="title title2" style="font-size: 1.5em">&nbsp;&nbsp;Basic Profile</h1>
                        <div class="content">
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
            
        
            //More datails
            $sql="SELECT * from extradetail where regno=".$_SESSION['regno'];
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
                    $ECA=isset($row['ECA'])?htmlspecialchars($row['ECA']):NULL;
                    $Achievement=isset($row['Achievement'])?htmlspecialchars($row['Achievement']):NULL;
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
                    <form method="POST" id="update_form" action="update.php">
                        <h3 class="heading">Date of Birth:&nbsp;<input type="date" class="after" name="DOB" placeholder="Enter Date of Birth" value="'.$DOB.'"required  disabled ><a class="details before">'.$DOB.'</a></h3>
                        <h3 class="heading">Age:&nbsp;<input type="number" class="after" name="age" placeholder="Your age here" disabled readonly><a class="details before" id="age"></a></h3>
                        <h3 class="heading">Father\'s Name:&nbsp;<input type="text" class="after" name="fname" placeholder="Enter your Father\'s name" value="'.$fname.'" required  disabled ><a class="details before">'.$fname.'</a></h3>
                        <h3 class="heading">Mothers\'s Name:&nbsp;<input type="text" class="after" name="mname" placeholder="Enter your Mother\'s name" value="'.$mname.'" required  disabled ><a class="details before">'.$mname.'</a></h3>
                        <h3 class="heading">Guardian\'s Email Id:&nbsp;<input type="email" class="after" name="gemail" placeholder="Enter email" required  value="'.$gemail.'"  disabled ><a class="details before">'.$gemail.'</a></h3>
                        <h3 class="heading">Address:&nbsp;<textarea class="after" name="address" placeholder="Enter your address" required disabled style="font-family:\'Arial\', Times, sans-serif;">'.$address.'</textarea><a class="details before">'.$address.'</a></h3><br>
                        <br>
                </div>
            </div>
            <br>
            <div>
                <!--content-->
                <div class="content">
                    <img class="design" src="img/back2.png" style="max-width:20%">
                    <h1>&nbsp;&nbsp;&nbsp;&nbsp;Academic Details:</h1>
                        <h3 class="heading">10th Standard marks:&nbsp;<input type="number" class="after" name="m10" placeholder="Class 10 percentage here"  value="'.$m10.'" required  disabled ><a class="details before">'.$m10.'</a></h3>
                        <h3 class="heading">12th Standard marks:&nbsp;<input type="number" class="after" name="m12" placeholder="Class 12 percentage here"  value="'.$m12.'" required  disabled ><a class="details before">'.$m12.'</a></h3>
                        <h3 class="heading">Extra Curricular<br>Activities:&nbsp;<input type="text" class="after" name="ECA" placeholder="Extra Curricular Activities here"  value="'.$ECA.'" disabled ><a class="details before">'.$ECA.'</a></h3>
                        <h3 class="heading">Scholastic<br>Achievements:&nbsp;<input type="text" class="after" name="Ach" placeholder="Scholastic Achievements here"  value="'.$Achievement.'" disabled ><a class="details before">'.$Achievement.'</a></h3>
                </div>
                <br>
                <div class="content" style="min-height:70vh">
                    <img class="design" src="img/back2.png">
                    <h1>&nbsp;&nbsp;&nbsp;&nbsp;Your Hobbies:</h1>
                    <h3 class="heading">Hobbies:&nbsp;<br>';
                    //Getting hobbies
                    $hobbies=(explode(",",$hobby));
                    foreach($hobbies as $selected)
                        echo "<a class='details before' style='z-index:-1'>&nbsp&nbsp".$selected."<br></a>";
                   
                        echo '</h3>
                        <label class=label>Painting
                            <input type="checkbox" name=check_list[] value="Painting"  disabled />
                            <span class=checkmark></span>
                        </label>
                        <label class=label>Gaming
                            <input type="checkbox" name=check_list[] value="Gaming"  disabled />
                            <span class=checkmark></span>
                        </label>
                        <label class=label>Playing Guitar
                            <input type="checkbox" name=check_list[] value="Playing Guitar" disabled />
                            <span class=checkmark></span>
                            
                        </label>
                        <label class=label>Singing
                            <input type="checkbox" name=check_list[] value="Singing" disabled />
                            <span class=checkmark></span>
                        </label>
                        <label class=label>Dancing
                            <input type="checkbox" value="Dancing" disabled />
                            <span class=checkmark></span>
                        </label>
                        <label class=label>Beatboxing
                            <input type="checkbox" name=check_list[] value="Beatboxing" disabled />
                            <span class=checkmark></span>
                        </label>
                        <label class=label>Travelling
                            <input type="checkbox" name=check_list[] value="Travelling" disabled />
                            <span class=checkmark></span>
                        </label>
                        <label class=label>Collecting items
                            <input type="checkbox" name=check_list[] value="Collecting items" disabled />
                            <span class=checkmark></span>
                        </label>
                        <label class=label>Cycling
                            <input type="checkbox" name=check_list[] value="Cycling" disabled />
                            <span class=checkmark></span>
                        </label>
                        <label class=label>Reading
                            <input type="checkbox" name=check_list[] value="Reading" disabled />
                            <span class=checkmark></span>
                        </label>
                        <label class=label>Cooking
                            <input type="checkbox" name=check_list[] value="Cooking" disabled />
                            <span class=checkmark></span>
                        </label>
                        <label class=label>Gardening
                            <input type="checkbox" name=check_list[] value="Gardening" disabled />
                            <span class=checkmark></span>
                        </label>
                        <div class="wrap"><h4 class="message2"></h4></div>
                        <br>
                    <img src="img/back2.jpg" class="hobby">
                    <div>
                        <img src="img/dancing.gif" class="hobby_image dancing">
                    </div>
                    <div>
                        <img src="img/singing.gif" class="hobby_image singing">
                    </div>
                    <div>
                        <img src="img/guitar.gif" class="hobby_image guitar">
                    </div>
                    <div>
                        <img src="img/gaming.gif" class="hobby_image gaming">
                    </div>
                    <div>
                        <img src="img/painting.gif" class="hobby_image painting">
                    </div>
                    <div>
                        <img src="img/hobbies.png" class="hobby_image hobbies">
                    </div>
                </div>
            </div>
            <br>
            <div>
            <!--content-->
            <div class="content">
                    <br>
                    <div class="wrap"><h4 id="message2" style="max-width:40%"></h4></div>
                    <div class="wrap"><a class="nav" id="update_button">Update</a>
                    <a class="nav" id="set_button" type="submit">Set</a></div>
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
        var regno="<?php echo isset($_SESSION['regno'])?$_SESSION['regno']:'img/banner.jpg';?>"
        var login="<?php echo isset($_SESSION['login'])?$_SESSION['login']:0;?>";  
    </script>
    <script src="student.js"></script>
</html>                