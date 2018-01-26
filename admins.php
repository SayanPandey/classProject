<?php
    session_start();
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
        <div class="banner">
            <img id="logo" src="img/logo.png">
            <h1 class="bannertext">National Institute of Technology  DURGAPUR, West Bengal</h1>
            <h1 class="bannertext">Administrators' Portal</h1>
        </div>
        <nav>
            <a class="nav" onclick="show('home')">Home</a>
            <a class="nav" onclick="show('register')">Register</a>
            <a class="nav" onclick="show('login')">Login</a>
            <a class="nav" >Profile</a>
            <a class="nav" >Logout</a>
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
                <div class="wrap"><button class="nav" id="register_button" type="submit">Register</button></div>
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
            <form>
                <h3 class="heading">Registration Number:&nbsp;<input type="number" name="regno" placeholder="Enter Registration number" required></h3>
                <h3 class="heading">Password:&nbsp;<input type="password" name="password" placeholder="Enter password" required></h3>
                <div class="wrap"><button class="nav" type="submit">Login</button></div>
                <br>
            </form>
        </div>
    </div>
    </body>
    <script>var response= "<?php echo isset($_SESSION['response'])?$_SESSION['response']:0; ?>"</script>
    <script src="admin.js"></script>
    <script src="jquery3.3.1.js"></script>
</html>
<?php
session_unset();
session_destroy();
?>