<?php include('includes/database.php'); ?>
<?php


if (isset($_COOKIE["logged_in"])) {
    $isSuperAdmin = $_COOKIE["logged_in"];

}

if (!(isset($_COOKIE["logged_in"])) || $isSuperAdmin==0) {
    header("Location:index.php");
}

if (isset($_GET['logout'])) {
    setcookie("logged_in", '', time() - (86400 * 30), "/");
    header("Location:index.php");
}

if(!isset($_GET['user'])){
    echo "<center><h1>ID not found</h1></center>";
    exit(0);
}

$usr = $_GET['user'];

$query = "SELECT fname, lname FROM persons WHERE Username = '$usr'";

$result = $mysqli->query($query) or die ($mysqli->error." ".__LINE__);
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $first_name = $row["fname"];
        $last_name = $row["lname"];
    }
}

if (isset($_POST['Yes'])){

    $query = "DELETE FROM persons WHERE Username = '$usr'";
    $mysqli ->query($query) or die($mysqli->error. " ".__LINE__);



    $msg = "Admin Removed";
    header("Location:admin_manager.php?msg=".urlencode($msg)."");
    exit;

}


if (isset($_POST['No'])){

    $msg = "Admin Not Removed";
    header("Location:admin_manager.php?msg=".urlencode($msg)."");
    exit;

}

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>CManager | Remove Admmin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/67704677-3063-5142-AA2E-39311A24A375/main.js" charset="UTF-8"></script></head>


<body>
<form method="get" action="delete_admin.php">
<div class="container">
    <header class="header clearfix">
        <nav>
            <ul class="nav nav-pills float-right">
                <li class="nav-item">
                    <a class="nav-link" href="index.php " style="color:#673ab7">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_manager.php" style="color:#673ab7">Admin Manager <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="add_admin.php" style="color:#673ab7">Add Admin</a>
                </li>
                <li class="show1">
                    <input type="submit" value="Logout" class="btn btn-default navbar-btn" name="logout">
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Store CManager</h3>
    </header>
</form>

    <main role="main">


        <div class="row marketing">
            <div class="col-lg-12">
                <h2>Remove Employee </h2>

                <form method="post" action="delete_admin.php?user=<?php echo $usr; ?>">


        <br><br>

        <h3> Do you want to remove <b><?php echo @$first_name ?></b>?  </h3>
                    <form action="delete_admin.php" method="post">
                    <input type="submit" name="Yes" value="Yes" class="btn-success" style="border:none">
                    <input type="submit" name="No" value="No" class="btn-link" style="border:none">
                    </form>

            </div>
        </div>

    </main>
</div>
</body>

</html>
