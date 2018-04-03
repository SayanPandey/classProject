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
            <a class="nav"  href="login.php">Logout</a>
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
            <form action="login.php" method="POST">
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
            if(isset($_SESSION['alogin']) && htmlspecialchars($_SESSION['alogin'])=='You are logged in,Check Requests'){
                require 'connection.php';
                //New Requests
                $sql="SELECT * from students where request=0";
                $result=$conn->query($sql);
                $new=$result->num_rows;
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class=new><div class='content'>
                            <img style='z-index:-999;float:right;width:auto;max-width: 17%;position:absolute;right:40px;top:10px;' src=img/back2.png>
                            <h3 class=heading>Registration no: <a class='detail regno'>" . $row["regno"]."</a></h3>". 
                            "<h3 class=heading>Branch: <a class=detail>" . $row["branch"]."</a></h3>".
                            "<h3 class=heading>Roll no: <a class=detail>" . $row["rollno"]."</a></h3>".  
                            "<h3 class=heading>Name: <a class=detail>" . $row["name"]."</a></h3>". 
                            "<h3 class=heading>Phone: <a class=detail>".$row["phone"]."</a></h3>". 
                            "<h3 class=heading>Email Id: <a class=detail>".$row["email"]."</a></h3>
                            <button class=accept onclick=accept(this)>Accept</button>
                            <button class=reject onclick=reject(this)>Reject</button>
                            <form method=post action=admin_edit.php target=inspectFrame".$row["regno"].">
                                <input type=hidden name=regno_e value=".$row["regno"].">
                                <button type=submit class=look onclick=look(this)>Inspect Profile</button><br>
                            </form>
                            <div class=wrap><iframe name=inspectFrame".$row["regno"]." src=admin_edit.php></iframe></div>
                            <br>
                            </div><br><br></div>";
                    }
                }
                else {
                    echo "<div class='new'><div class=content><br><h1 style='margin-left: 10%;'>No Recent Requests...</h1><br></div><br><br></div>";
                }
                //Rejected Requests
                $sql="SELECT * from students where request=-1";
                $result=$conn->query($sql);
                $rejected=$result->num_rows;
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class=rejected><div class='content'>
                            <img style='z-index:-999;float:right;width:auto;max-width: 17%;position:absolute;right:50px;top:50px;' src=img/reject.png>
                            <h3 class=heading>Registration no: <a class='detail regno'>" . $row["regno"]."</a></h3>".
                            "<h3 class=heading>Branch: <a class=detail>" . $row["branch"]."</a></h3>". 
                            "<h3 class=heading>Roll no: <a class=detail>" . $row["rollno"]."</a></h3>". 
                            "<h3 class=heading>Name: <a class=detail>" . $row["name"]."</a></h3>". 
                            "<h3 class=heading>Phone: <a class=detail>".$row["phone"]."</a></h3>". 
                            "<h3 class=heading>Email Id: <a class=detail>".$row["email"]."</a></h3>
                            <button class=accept onclick=accept(this)>Accept</button>
                            <button class=reject onclick=reject(this)>Reject</button>
                            <form method=post action=admin_edit.php target=inspectFrame".$row["regno"].">
                                <input type=hidden name=regno_e value=".$row["regno"].">
                                <button type=submit class=look onclick=look(this)>Inspect Profile</button><br>
                            </form>
                            <div class=wrap><iframe name=inspectFrame".$row["regno"]." src=admin_edit.php></iframe></div>
                            <br>
                            </div><br><br></div>";
                    }
                }
                else {
                    echo "<div class='rejected'><div class=content><br><h1 style=' margin-left: 10%;'>No Rejected Requests...</h1><br></div><br><br></div>";
                }
                //Accepted Requests
                $sql="SELECT * from students where request=1";
                $result=$conn->query($sql);
                $accepted=$result->num_rows;
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class=accepted><div class='content'>
                            <img style='z-index:-999;float:right;width:auto;max-width: 17%;position:absolute;right:50px;top:50px;' src=img/accept.png>
                            <h3 class=heading>Registration no: <a class='detail regno'>" . $row["regno"]."</a></h3>". 
                            "<h3 class=heading>Branch: <a class=detail>" . $row["branch"]."</a></h3>".
                            "<h3 class=heading>Roll no: <a class=detail>" . $row["rollno"]."</a></h3>". 
                            "<h3 class=heading>Name: <a class=detail>" . $row["name"]."</a></h3>". 
                            "<h3 class=heading>Phone: <a class=detail>".$row["phone"]."</a></h3>". 
                            "<h3 class=heading>Email Id: <a class=detail>".$row["email"]."</a></h3>
                            <button class=accept onclick=accept(this)>Accept</button>
                            <button class=reject onclick=reject(this)>Reject</button>
                            <form method=post action=admin_edit.php target=inspectFrame".$row["regno"].">
                                <input type=hidden name=regno_e value=".$row["regno"].">
                                <button type=submit class=look onclick=look(this)>Inspect Profile</button><br>
                            </form>
                            <div class=wrap><iframe name=inspectFrame".$row["regno"]." src=admin_edit.php></iframe></div>
                            <br>
                            </div><br><br></div>";
                    }
                }
                else {
                    echo "<div class='accepted'><div class=content><br><h1 style=' margin-left: 10%;'>No Accepted Requests...</h1><br></div><br><br></div>";
                }
            }
            else
                echo "<div class=content><br><h1 style=' margin-left: 10%;'>You need to LOGIN first !!</h1><br></div>";
        ?>
        <div id="request_select">
            <a class="head">Sort Request By:</a>
            <a class="r" onclick="display('rejected')">Rejected&nbsp;<div class="badge" style="display:inline-block;min-width:40px">&nbsp;<?php echo $rejected;?>&nbsp;</div></a>
            <a class="n" onclick="display('new')">New&nbsp;<div class="badge" style="display:inline-block;min-width:40px">&nbsp;<?php echo $new;?>&nbsp;</div></a>
            <a class="a" onclick="display('accepted')">Accepted&nbsp;<div class="badge" style="display:inline-block;min-width:40px">&nbsp;<?php echo $accepted;?>&nbsp;</div></a>
        </div>
    </div>
    </body>
    <script>var response="<?php echo isset($_SESSION['alogin'])?$_SESSION['alogin']:0; ?>";</script>
    <script src="admin.js"></script>
    <script src="jquery3.3.1.js"></script>
</html>