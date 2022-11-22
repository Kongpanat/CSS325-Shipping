<?php require_once('connect.php');
session_unset();
session_start();
if (isset($_POST['login'])) {
	$email = $_POST["loginemail"];
	$passwd = $_POST["loginpassword"];
	$select = mysqli_query($mysqli, "SELECT * FROM staff WHERE email='$email' AND password='$passwd'") or die('query faied');
	if (mysqli_num_rows($select) > 0) {
		$row = mysqli_fetch_assoc($select);
		$sid = $row['staff_id'];

		$_SESSION['loginemail'] = $_POST['loginemail'];
		$_SESSION['loginpassword'] = $_POST['loginpassword'];
		header('location:home.php');
	} else {
		echo ("<script LANGUAGE='JavaScript'>
            window.alert('Email or password is incorrect');
            window.location.href='login.php';
            </script>");
	}
}
?>