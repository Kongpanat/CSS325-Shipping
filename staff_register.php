<?php
error_reporting (E_ALL ^ E_NOTICE);
require_once('connect.php');
session_start();
if (isset($_POST['signup'])) {
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $email = $_POST["email"];
    $passwd = $_POST["password"];
    $addr = $_POST["staffadd"];
    $dob = $_POST["DOB"];
    $phone = $_POST["staffphone"];
    $branch = $_POST["branch"];

    $errors = array();
    $x = 0;
    //errors case
    if (empty($email) || empty($firstname) || empty($lastname) || empty($passwd) || empty($addr) || empty($dob) || empty($phone) || !isset($branch)) {
        $x = 1;

        echo ("<script LANGUAGE='JavaScript'>
					window.alert('Please fill all the detail');	
					</script>");
    }
    
    if ($x == 1) {
        echo ("<script LANGUAGE='JavaScript'>
					window.location.href='http://localhost/css325/signup.php';
					</script>");
    }
    //insert data
    else {
        $q = "INSERT INTO staff (Branch_ID, Fname, Lname, Staff_Addr, DOB, Email, Password, Phone_no) VALUES ('$_POST[branch]','$_POST[fname]','$_POST[lname]','$_POST[staffadd]','$_POST[DOB]','$_POST[email]','$_POST[password]','$_POST[staffphone]')";
        $result = $mysqli->query($q);
        if (!$result) {
            echo 'Query error: ' . $mysqli->error;
        }
        header("Location: login.php"); //redirect
        if (!$result) {
            echo "INSERT failed. Error: " . $mysqli->error;

            return false;
        }
    }
}
