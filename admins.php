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
            <a class="nav" onclick="show('login')">Login</a>
            <a class="nav" onclick="show('request')">Requests</a>
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
                <dt>Login:</dt>
                <dd>Click on 'Login' on the navigation bar to register yourself with this portal.</dd>
                <br>
                <dt>Requests:</dt>
                <dd>Click on 'Requests' on the navigation bar to browse registration requests.</dd>
                <br>
                <dt>Logout:</dt>
                <dd>Click on 'Logout' to end session.</dd>
            </dl>
        </h3>
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
            <form action="login" method="POST">
                <input type="hidden" value="admins" name="logger">
                <h3 class="heading">Username:&nbsp;<input type="text" name="user" placeholder="Enter Username" required></h3>
                <h3 class="heading">Password:&nbsp;<input type="password" name="password" placeholder="Enter password" required></h3>
                <div class="wrap"><h4 id="message"></h4></div>
                <div class="wrap"><button class="nav" type="submit">Login</button></div>
                <br>
            </form>
        </div>
    </div>
    <!--Requests-->
    <div id="request">
        <h1 class="title" style="font-size: 3em">&nbsp;&nbsp;Requests</h1>
        <!--content-->
        <?php
            if(isset($_SESSION['login']) && htmlspecialchars($_SESSION['login'])=='Success'||1){
                $server="localhost";
                $username="root";
                $password="";
                $database="classProject";

                $conn=new mysqli($server,$username,$password,$database);
                if($conn->connect_error)
                    die('Fatal Connection error!!');
                //New Requests
                $sql="SELECT * from students where request=0";
                $result=$conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='content new'>
                            <img style='z-index:-999;float:right;width:auto;max-width: 17%;position:absolute;right:40px;top:10px;' src=img/back2.png>
                            <h3 class=heading>Registration no: <a class='detail regno'>" . $row["regno"]."</a></h3>". 
                            "<h3 class=heading>Roll no: <a class=detail>" . $row["rollno"]."</a></h3>". 
                            "<h3 class=heading>Name: <a class=detail>" . $row["name"]."</a></h3>". 
                            "<h3 class=heading>Phone: <a class=detail>".$row["phone"]."</a></h3>". 
                            "<h3 class=heading>Email Id: <a class=detail>".$row["email"]."</a></h3>
                            <button class=accept onclick=accept(this)>Accept</button>
                            <button class=reject onclick=reject(this)>Reject</button>
                            </div><br>";
                    }
                }
                else {
                    echo "No Recent Requests ....";
                }
                //Rejected Requests
                $sql="SELECT * from students where request=-1";
                $result=$conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='content accepted'>
                            <img style='z-index:-999;float:right;width:auto;max-width: 17%;position:absolute;right:40px;top:10px;' src=img/reject.png>
                            <h3 class=heading>Registration no: <a class='detail regno'>" . $row["regno"]."</a></h3>". 
                            "<h3 class=heading>Roll no: <a class=detail>" . $row["rollno"]."</a></h3>". 
                            "<h3 class=heading>Name: <a class=detail>" . $row["name"]."</a></h3>". 
                            "<h3 class=heading>Phone: <a class=detail>".$row["phone"]."</a></h3>". 
                            "<h3 class=heading>Email Id: <a class=detail>".$row["email"]."</a></h3>
                            <button class=accept onclick=accept(this)>Accept</button>
                            <button class=reject onclick=reject(this)>Reject</button>
                            </div><br>";
                    }
                }
                else {
                    echo "No Recent Requests ....";
                }
                //Accepted Requests
                $sql="SELECT * from students where request=1";
                $result=$conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='content rejected'>
                            <img style='z-index:-999;float:right;width:auto;max-width: 17%;position:absolute;right:40px;top:10px;' src=img/accept.png>
                            <h3 class=heading>Registration no: <a class='detail regno'>" . $row["regno"]."</a></h3>". 
                            "<h3 class=heading>Roll no: <a class=detail>" . $row["rollno"]."</a></h3>". 
                            "<h3 class=heading>Name: <a class=detail>" . $row["name"]."</a></h3>". 
                            "<h3 class=heading>Phone: <a class=detail>".$row["phone"]."</a></h3>". 
                            "<h3 class=heading>Email Id: <a class=detail>".$row["email"]."</a></h3>
                            <button class=accept onclick=accept(this)>Accept</button>
                            <button class=reject onclick=reject(this)>Reject</button>
                            </div><br>";
                    }
                }
                else {
                    echo "No Recent Requests ....";
                }
            }
            else
                echo "<h1 class=content>You need to Login First !!</h1>";
        ?>
        <div id="request_select">
            <a class="head">Sort Request By:<a>
            <a class="r" onclick=display(rejected)>Rejected</a>
            <a class="n" onclick=display(new)>New</a>
            <a class="a" onclick=display(accepted)>Accepted</a>
        </div>
    </div>
    </body>
    <script>var response= "<?php echo isset($_SESSION['login'])?$_SESSION['login']:0; ?>";</script>
    <script src="admin.js"></script>
    <script src="jquery3.3.1.js"></script>
</html>
<?php
session_unset();
session_destroy();
?>