<?php
session_start();
$id = $_GET[''];
require_once('connect.php');
if (isset($rental_id)) {
	$q = "DELETE FROM  where =$id";
	if (!$mysqli->query($q)) {
		echo "DELETE failed. Error: " . $mysqli->error;
	}
	$mysqli->close();
	//redirect
	header("Location: home.php");
}
?>