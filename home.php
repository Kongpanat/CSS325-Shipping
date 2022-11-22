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
    <title>Home</title>
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
                        <h1 class="display-2 mb-4">HOMEPAGE</h1><br>
                    </div>
                    <!-- End of Section Title -->
                    <div class="row">
                        <!-- Contact Form Holder -->
                        <div class="col-md-15 contact-form-holder mt-4">
                            <form method="post" name="login-form" action="">
                                <h5>Tracking Info</h5>
                                <br>
                                <!--Begin Table-->
                                <table style="text-align: center; border-collapse: collapse; border: 1px solid black; table-layout: fixed; width: 100%;">
                                    <tr>
                                        <th style="border: 1px solid black">Sending ID</th>
                                        <th style="border: 1px solid black">Sender</th>
                                        <th style="border: 1px solid black">Customer ID (Sender)</th>
                                        <th style="border: 1px solid black">Receiver</th>
                                        <th style="border: 1px solid black">Customer ID (Receiver)</th>
                                        <th style="border: 1px solid black">Sending Type</th>
                                        <th style="border: 1px solid black">Pick-up Time</th>
                                        <th style="border: 1px solid black">Delivered Time</th>
                                        <th style="border: 1px solid black">Status</th>
                                        <th style="border: 1px solid black">Edit</th>
                                    </tr>
                                    <!--Do php in tr-->
                                    <?php
                                    //Fill Tracking Info.
                                    $q = 'SELECT x.sending_ID,c.Fname,c.Lname,s.customer_ID,r.Fname,r.Lname,r.customer_ID,x.sending_type,x.pickup_time,x.delivered_time,x.status From sending x,sender s,receiver r,customer c WHERE s.sender_ID=x.sender_ID  AND r.receiver_ID=x.receiver_ID AND s.customer_ID=c.customer_ID;';
                                    if ($result = $mysqli->query($q)) {
                                        while ($row = $result->fetch_array()) {
                                            echo "<tr>";
                                            echo "<td style='border: 1px solid black'>" . $row[0] . "</td>";
                                            echo "<td style='border: 1px solid black'>" . $row[1] . "&emsp;" . $row[2] . "</td>";
                                            echo "<td style='border: 1px solid black'>" . $row[3] . "</td>";
                                            echo "<td style='border: 1px solid black'>" . $row[4] . "&emsp;" . $row[5] . "</td>";
                                            echo "<td style='border: 1px solid black'>" . $row[6] . "</td>";
                                            echo "<td style='border: 1px solid black'>" . $row[7] . "</td>";
                                            echo "<td style='border: 1px solid black'>" . $row[8] . "</td>";
                                            echo "<td style='border: 1px solid black'>" . $row[9] . "</td>";
                                            echo "<td style='border: 1px solid black'>" . $row[10] . "</td>";
                                    ?>
                                            <td style='border: 1px solid black'><a href='edit_home.php?sendingid=<?= $row[0] ?>&pickup=<?= $row[8] ?>&delivered=<?= $row[9] ?>'>EDIT</a></td>
                                    <?php
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo 'Query error: ' . $mysqli->error;
                                    }
                                    ?>
                                </table>
                                <!--End Table-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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

<?php
if (isset($_POST['uphomesub'])) {
    $sid = $_POST["sendingid"];
    $pickup = $_POST["pickuptime"];
    $delivered = $_POST["deliveredtime"];
    $status = $_POST["status"];
    $q = "UPDATE sending SET pickup_time='$pickup',delivered_time='$delivered',status='$status' WHERE sending_id='$sid' ";
    $result = $mysqli->query($q);
    if (!$mysqli->query($q)) {
        echo "UPDATE failed. Error:" . $mysqli->error;
    }
}
?>

</html>