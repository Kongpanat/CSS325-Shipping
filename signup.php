<!DOCTYPE html>
<?php require_once('connect.php'); ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Signup</title>
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
        <!-- Login Form Section -->
        <section id="gtco-contact-form" class="bg-white">
            <div class="container">
                <div class="section-content">
                    <!-- Section Title -->
                    <div class="title-wrap">
                        <h1 class="display-2 mb-4">SIGNUP</h1><br>
                    </div>
                    <!-- End of Section Title -->
                    <div class="row">
                        <!-- sign up Form Holder -->
                        <div class="col-md-8 offset-md-2 contact-form-holder mt-4">
                            <form method="post" name="login-form" action="staff_register.php">
                                <h1 style="font-size:28px;position:relative;">Account Information</h1><br>
                                <div class="row">
                                    <div class="col-md-6 form-input">
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6 form-input">
                                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-12 form-input">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="col-md-12 form-input">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <h1 style="font-size:28px;position:relative;">Staff Information</h1>
                                <div class="row">
                                    <p>Address:</p>
                                    <div class="col-md-12 form-input">
                                        <textarea type="text" class="form-control" style="height:12em;" id="staffadd" name="staffadd"></textarea>
                                    </div>
                                    <p>Date of Birth:</p>
                                    <div class="col-md-12 form-input">
                                        <input type="date" class="form-control" id="DOB" name="DOB">
                                    </div>
                                    <p>Phone Number:</p>
                                    <div class="col-md-12 form-input">
                                        <input type="text" class="form-control" id="staffphone" name="staffphone" placeholder="0XX-XXX-XXXX">
                                    </div>
                                    <p>Branch:</p>
                                    <div class="col-md-12 form-input">
                                        <select class="form-control" name='branch'>
                                            <option value="" disabled selected>Select Branch</option>
                                            <?php
                                            // select the BranchID 
                                            $q = 'SELECT Branch_ID FROM branch;';
                                            if ($result = $mysqli->query($q)) {
                                                while ($row = $result->fetch_array()) {
                                                    echo '<option value="' . $row[0] . '">' . $row[0] . '</option>';
                                                }
                                            } else {
                                                echo 'Query error: ' . $mysqli->error;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-12 form-btn text-center">
                                        <input class="btn btn-block btn-secondary btn-red" type="submit" name="signup" value="SIGNUP">
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center justify-content-md-start justify-content-center">
                                        <a href="login.php">
                                            LOGIN
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End of sign up Form Holder -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End of sign up Form Section -->
        <footer class="mastfoot mb-3 bg-white py-4 border-top">
            <div class="row">
                <p style="font-size:20px">&emsp;&emsp;CSS 325 Database Systems : Shipping Management System</p>
            </div>
        </footer>
    </div>

</body>

</html>