<!DOCTYPE html>
<?php
require_once('connect.php');
session_start();
if (isset($_SESSION['loginemail']) && isset($_SESSION['loginemail'])) {
    $loginemail = $_SESSION['loginemail'];
    $loginpassword = $_SESSION['loginpassword'];
} else {
    header('location:login.php');
}
//identify account info. that login
$q = "SELECT Fname,Lname,Branch_ID FROM staff WHERE Email ='$loginemail' AND Password='$loginpassword'";
if ($result = $mysqli->query($q)) {
    while ($row = $result->fetch_array()) {
        if (isset($row[2])) {
            $AccFname = $row[0];
            $AccLname = $row[1];
            $AccBranch = $row[2];
        }
    }
} else {
    echo 'Query error: ' . $mysqli->error;
} ?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer Register</title>
    <meta name="description" content="Core HTML Project">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- External CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/lightcase/lightcase.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Work+Sans:300,400,700" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href="https://file.myfontastic.com/7vRKgqrN3iFEnLHuqYhYuL/icons.css" rel="stylesheet">

    <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

</head>

<body data-spy="scroll" data-target="#navbar-nav-header" class="static-layout">
    <div class="boxed-page">
        <nav id="gtco-header-navbar" class="navbar navbar-expand-lg py-4">
            <div class="container">
                <p style="font-size:18px;"><?php echo ('<b>User</b> : ' . $AccFname . '&emsp;' . $AccLname . '&emsp;<b>Branch</b> : ' . $AccBranch); ?></p>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav-header" aria-controls="navbar-nav-header" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="lnr lnr-menu"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-nav-header">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home&emsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="c_register.php">Customer Register&emsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="p_register.php">Package Register&emsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section id="gtco-contact-form" class="bg-white">
            <div class="container">
                <div class="section-content">
                    <!-- Section Title -->
                    <div class="title-wrap">
                        <br>
                        <h1 class="display-2 mb-4">CUSTOMER REGISTERATION</h1><br>
                    </div>
                    <!-- Detail -->

                    <div class="row">
                        <!-- film Content Holder -->
                        <div class="col-md-8 offset-md-2 mt-4">
                            <form method="post" name="customer-register-form" action="c_register_out.php">
                                <div class="row">
                                    <div class="col-md-6 form-input">
                                        <input type="text" class="form-control" id="c_fname" name="c_fname" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6 form-input">
                                        <input type="text" class="form-control" id="c_lname" name="c_lname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-input">
                                        <input type="text" class="form-control" id="c_email" name="c_email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-input">
                                        <input type="text" class="form-control" id="c_phonenumber" name="c_phonenumber" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="row">
                                    <p>Date of birth:</p>
                                    <div class="col-md-9 form-input">
                                        <input type="date" class="form-control" id="c_dob" name="c_dob">
                                    </div>
                                </div>

                                Gender:&emsp;
                                <input type="radio" id="male" name="c_sex" value="Male">
                                <label for="male">Male&emsp;</label>
                                <input type="radio" id="female" name="c_sex" value="Female">
                                <label for="female">Female&emsp;</label>
                                <input type="radio" id="other" name="c_sex" value="Other">
                                <label for="other">Other&emsp;</label>

                                <div class="col-md-8 offset-md-2 contact-form-holder mt-4">
                                    <div class="col-md-12 form-btn text-center">
                                        <input class="btn btn-block btn-secondary btn-red" type="submit" name="c_submit" value="SUBMIT">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End of film content Holder-->
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Form Section -->

        <footer class="mastfoot mb-3 bg-white py-4 border-top">
            <div class="row">
                <p style="font-size:20px">&emsp;&emsp;CSS 325 Database Systems : Shipping Management System</p>
            </div>
        </footer>
    </div>

    <!-- External JS -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <script src="vendor/bootstrap/popper.min.js"></script>
    <script src="vendor/bootstrap/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js "></script>
    <script src="vendor/owlcarousel/owl.carousel.min.js"></script>
    <script src="vendor/isotope/isotope.min.js"></script>
    <script src="vendor/lightcase/lightcase.js"></script>
    <script src="vendor/waypoints/waypoint.min.js"></script>
    <script src="vendor/countTo/jquery.countTo.js"></script>

    <!-- Main JS -->
    <script src="js/app.min.js "></script>
    <script src="//localhost:35729/livereload.js"></script>
</body>

</html>