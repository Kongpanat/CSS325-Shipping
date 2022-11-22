<?php
$mysqli = new mysqli('localhost', 'root', '', 'project css325');
if ($mysqli->connect_errno) {
   echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
}
?>