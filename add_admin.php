<?php include('addadmintodb.php');


if (isset($_COOKIE["logged_in"])) {
    $isSuperAdmin = $_COOKIE["logged_in"];
}


if (!(isset($_COOKIE["logged_in"])) || $isSuperAdmin==0) {
    header("Location:index.php");
}

if (isset($_GET['logout'])) {
    setcookie("logged_in", '', time() - (86400 * 30), "/");
    header("Location:index.php");
}?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Add Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
    <script type="text/javascript"
            src="https://gc.kis.v2.scr.kaspersky-labs.com/67704677-3063-5142-AA2E-39311A24A375/main.js"
            charset="UTF-8"></script>
    <script type="text/javascript" src="validate2.js"></script>
</head>


<body>

<form method="get" action="add_admin.php">
<div class="container">
    <header class="header clearfix">
        <nav>
            <ul class="nav nav-pills float-right">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php" style="background-color:#673ab7">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_manager.php" style="color:#673ab7">Manager <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_admin.php" style="color:#673ab7">Add Admin</a>
                </li>
                <li class="show1" style="padding-left:10px;">
                    <input type="submit" value="Logout" class="btn btn-default navbar-btn" name="logout">
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Admin Adminstrator</h3>
    </header>
</form>

    <main role="main">

        <div class="row marketing">
            <div class="col-lg-12">
                <h2>Add Admin </h2>

                <form method="post" action="add_admin.php" name="data">


                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" placeholder="Enter  Username"
                               onblur="fun0();">
                       <input name="uname" type="text" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>First Name</label>
                        <input name="first_name" type="text" class="form-control" placeholder="Enter First Name"
                               onblur="fun();">
                        <input name="fname" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>Last Name</label>
                        <input name="last_name" type="text" class="form-control" placeholder="Enter Last Name"
                               onblur="fun2();">
                        <input name="lname" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>Gender</label>
                        <div class="radio">
                            <input name="gender" type="radio" class="radio" value="Male" onclick="fun7()">&nbsp
                            <label class="radio-inline">Male</label>&nbsp
                            <input name="gender" type="radio" class="radio" value="Female" onclick="fun7()">&nbsp
                            <label class="radio-inline">Female</label>&nbsp
                            <input name="gender" type="radio" class="radio" value="Other" onclick="fun7()">&nbsp
                            <label class="radio-inline">Other</label>&nbsp
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Phone Number</label>
                        <input name="phoneno" maxlength="10" type="text" class="form-control"
                               placeholder="Enter Phone Number" onblur="fun3();">
                        <input name="phno" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input name="dob" type="date" class="form-control" placeholder="Enter Date of Birth"
                               max="<?php echo date("Y-m-d"); ?>" onblur="fun101()">
                        <input name="dateval1" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>Blood Group</label>
                        <select name="bloodGroup">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="O">O</option>
                            <option value="AB">AB</option>
                        </select>

                        <select name="bloodSign">
                            <option value="+">+</option>
                            <option value="-">-</option>
                        </select>

                    </div>


                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" placeholder="Enter Address"
                                  onblur="fun11();"></textarea>
                        <input name="addressval" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>City</label>
                        <input name="city" type="text" class="form-control" placeholder="Enter City" onblur="fun4();">
                        <input name="cityval" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>State</label>
                        <input name="state" type="text" class="form-control" placeholder="Enter State" onblur="fun5();">
                        <input name="stateval" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>Zip Code</label>
                        <input name="zip" maxlength="6" type="text" class="form-control" placeholder="Enter Zip Code"
                               onblur="fun6();">
                        <input name="zipval" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>Email-ID</label>
                        <input name="email" type="email" class="form-control" placeholder="Enter Email-ID"
                               onblur="fun111();">
                        <input name="emailval" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>Password</label>
                        <input name="password1" type="password" class="form-control" placeholder="Enter Password"
                               onblur="fun112();">
                        <input name="password2val" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>Date of Joining</label>
                        <input name="doj" type="date" class="form-control" placeholder="Enter Date of Joining"
                               max="<?php echo date("Y-m-d"); ?>" onblur="fun8()">
                        <input name="dateval" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>Employee Status</label>
                        <input name="status1" type="text" class="form-control" placeholder="Enter State"
                               onblur="fun102();">
                        <input name="statusval1" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>Designation</label>
                        <input name="designation" type="text" class="form-control" placeholder="Enter State"
                               onblur="fun103();">
                        <input name="designationval1" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>Employee Status Change</label>
                        <input name="statuschange" type="text" class="form-control" placeholder="Enter State"
                               onblur="fun104();">
                        <input name="statuschangeval" type="text" class="form-control" disabled>
                    </div>

                    <!--
                    Bank Details
                    -->

                    <div class="form-group">
                        <label>Bank Name</label>
                        <input name="bankname" type="text" class="form-control" placeholder="Enter Bank Name"
                               onblur="fun105();">
                        <input name="banknameval" type="text" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Account Number</label>
                        <input name="ac" type="text" class="form-control" placeholder="Enter Account Number"
                               onblur="fun106();">
                        <input name="acval" type="text" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Bank Branch</label>
                        <input name="bbranch" type="text" class="form-control" placeholder="Enter Bank Branch"
                               onblur="fun107();">
                        <input name="bbranchval" type="text" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>IFSC Code</label>
                        <input name="ifsc" type="text" class="form-control" placeholder="Enter IFSC Code"
                               onblur="fun108();">
                        <input name="ifscval" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>MICR Code</label>
                        <input name="micr" type="text" class="form-control" placeholder="Enter MICR Code"
                               onblur="fun109();">
                        <input name="micrval" type="text" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Super Admin</label>
                        <div class="radio">
                            <input name="superadmin" type="radio" class="radio" value="1" onclick="fun7()"
                            &nbsp
                            <label class="radio-inline">Yes</label>&nbsp


                            <input name="superadmin" type="radio" class="radio" value="0" onclick="fun7()"
                            <label class="radio-inline">No</label>&nbsp

                        </div>
                    </div>

                    <input type="submit" class="btn btn-default" style="background-color:#673ab7;color:white;" value="Add Admin"/>
                </form>


            </div>


        </div>

    </main>


    <footer class="footer">
        <p>&copy; Company 2017</p>
    </footer>


</div> <!-- /container -->
</body>
</html>