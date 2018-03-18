<?php
$con = mysqli_connect("taramobilecrechespune.org", "httptara_ngouser", "ngouser", "httptara_employee");
// Check connection

if (isset($_COOKIE["logged_in"])) {
    header("Location:index1.php");
}
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ((isset($_POST['username_one'])) && (isset($_POST['password_one']))) {
    $usr = $_POST['username_one'];
    $pass = md5($_POST['password_one']);
    $type = $_POST["group101"];

    $sql = "SELECT Username,Password, super_admin FROM persons";
    $isSuperAdmin = 0;


    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_array($result)) {
            if (($row['Username'] == $usr) && ($row['Password'] == $pass)) {
                $isSuperAdmin = $row["super_admin"];


                if (($type == "admin" && !$isSuperAdmin) or ($type == "superAdmin" && $isSuperAdmin)) {
                    setcookie('logged_in', $isSuperAdmin, time() + (86400 * 30), "/");
                    header('Location:index1.php');
                }


            }
        }
    }
    // Free result set
    mysqli_free_result($result);

}
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min1.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>TMC</title>
</head>
<body>
<!-- Nav Bar-->

<div class="bg">

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapsemenu"
                        aria-expanded="false"
                        style="background-color:transparent;border:none;margin:10px;position:relative;float:right;">
                    <span class="sr-only"> Toggle Navigation</span>
                    <span class="icon-bar" style="background-color:#673AB7;"></span>
                    <span class="icon-bar" style="background-color:#673AB7;"></span>
                    <span class="icon-bar" style="background-color:#673AB7;"></span>
                </button>
                <a href="#" class="navbar-brand"  style="color:#673AB7;"> Tara Mobile Creches </a>
            </div>
            <div class="collapse navbar-collapse" id="collapsemenu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" data-toggle="modal" href="#myModal"><a href="#" id="show login"> Login </a></li>
                    <li class="show"><a href="#"> Contact Us</a>
                    <li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron text-center" style="margin-top:-20px;">
        <h1>Welcome</h1>
        <p>Lorem Lipsum</p>
    </div>


    <!-- Login Form-->
    <div id="myModal" class="modal modal-lg fade" role="dialog">
        <div class="modal-dialog">
            <!--Modal Content-->
            <div class="form show" id="loginform">
                <div class="container">
                    <div class="row" style="padding-top:50px;">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background:#673AB7;color:white;"><strong
                                            class="">LOGIN</strong>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="post" action="index.php">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label"
                                                   style="font-family:open sans;" required>Username</label>
                                            <div class="col-sm-9">
                                                <input type="username" class="form-control" id="inputUsername3"
                                                       name="username_one" placeholder="Username" style="opacity:0.5;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label"
                                                   style="font-family:open sans;" required>Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="inputPassword3"
                                                       name="password_one" placeholder="Password" style="opacity:0.5;">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9" style="padding-left:30px;">
                                                <div class="form-group radio-green">
                                                    <input name="group101" type="radio" id="radio1" value="admin"
                                                           checked>
                                                    <label for="radio103">Admin</label>
                                                    <input name="group101" type="radio" id="radio2" value="superAdmin">
                                                    <label for="radio104">Super-Admin</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group last">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-default btn-md" id="btntwo">Sign
                                                    in
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<footer class="navbar-default navbar-fixed-bottom" style="background-color: white; color:black;height:40px;">
    <p>© 2018<a style="color:#673AB7; text-decoration:none;" href="#"> Tara Mobile Creches</a>, All rights reserved 2018-2019.</p>
</footer>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>