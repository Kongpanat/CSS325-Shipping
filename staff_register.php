<?php
require_once('connect.php');
if (!(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['staffadd']) || empty($_POST['DOB']) || empty($_POST['staffphone']) || empty($_POST['email']) || empty($_POST['password']))) {
    // insert to staff table
    $q = "INSERT INTO staff (Branch_ID, Fname, Lname, Staff_Addr, DOB, Email, Password, Phone_no) VALUES ('$_POST[branch]','$_POST[fname]','$_POST[lname]','$_POST[staffadd]','$_POST[DOB]','$_POST[email]','$_POST[password]','$_POST[staffphone]')";
    $result = $mysqli->query($q);
    if (!$result) {
        echo 'Query error: ' . $mysqli->error;
    }
    header("Location: login.php"); //redirect
} else {
    echo "Please fill in all the details";
}
?>