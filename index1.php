<?php
if (isset($_COOKIE["logged_in"])) {
    $isSuperAdmin = $_COOKIE["logged_in"];
}


if (!(isset($_COOKIE["logged_in"]))) {
    header("Location:index.php");
}

if (isset($_GET['logout'])) {
    setcookie("logged_in", '', time() - (86400 * 30), "/");
    header("Location:index.php");
}

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
    <form method="get" action="index1.php">
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
                        <a href="#" class="navbar-brand" style="color:#673AB7;"> Tara Mobile Creches </a>
                    </div>
                    <div class="collapse navbar-collapse" id="collapsemenu">
                        <ul class="nav navbar-nav navbar-right">
                            <?php if ($isSuperAdmin) {
                                echo "<li class='show' ><a href = 'admin_manager.php' > Admin </a ></li >";
                            } ?>
                            <li class="show"><a href="employee_manager.php"> Employee</a>
                            <li class="dropdown show">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Employee Attendance <span
                                            class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="attendance_manager_daily.php">Daily</a></li>
                                    <li><a href="attendance_manager_monthwise.php">Monthly</a></li>
                                </ul>
                            </li>
                            <li class="dropdown show">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Attendance <span
                                            class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="attendance_admin_daily.php">Daily</a></li>
                                    <li><a href="attendance_admin_monthwise.php">Monthly</a></li>
                                </ul>
                            </li>
                            <li class="show"><a href="qr.php">Generate QR</a>
                            <li class="show1" style="padding-left:10px;">
                                <input type="submit" value="Logout" class="btn btn-default navbar-btn" name="logout">
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </form>
    <br>

    <div class="jumbotron text-center" style="margin-top:-50px;">
        <h1 class="line-1 anim-typewriter">Hello Admin</h1>
    </div>


    <footer class="navbar-default navbar-fixed-bottom" style="background-color: white; color:black;height:40px;">
        <p>© 2018<a style="color:#673AB7; text-decoration:none;" href="#"> Tara Mobile Creches</a>, All rights reserved
            2018-2019.</p>
    </footer>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    </body>
    </html>


<?php


?>