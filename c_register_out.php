<?php require_once('connect.php');
if (isset($_POST['c_submit'])) {
    // insert to c_register table
    $q = "INSERT INTO customer (Fname,Lname,Email,Phone_no,DOB,Sex) 
					VALUES ('$_POST[c_fname]','$_POST[c_lname]','$_POST[c_email]','$_POST[c_phonenumber]','$_POST[c_dob]','$_POST[c_sex]')";
    $result = $mysqli->query($q);
    if (!$result) {
        echo 'Query error: ' . $mysqli->error;
    }
    header("location: home.php");
}
?>