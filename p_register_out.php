<?php require_once('connect.php');
if (isset($_POST['p_submit'])){
	// insert to package table
	$q = "INSERT INTO package (Shipment_Method,Note) 
	VALUES ('$_POST[shipmentmethod]','$_POST[note]')";
	$result = $mysqli->query($q);
	if (!$result) {
		echo 'Query error: ' . $mysqli->error;
	}
	//identify input for sender table
	$q = "SELECT customer_ID FROM customer WHERE Fname ='$_POST[s_fname]' AND Lname='$_POST[s_lname]' AND Phone_no='$_POST[s_phonenumber]'";
	$custID = '-1';
	if ($result = $mysqli->query($q)) {
		while ($row = $result->fetch_array()) {
			if (isset($row[0])) {
				$custID = $row[0];
			}
		}
	} else {
		echo 'Query error: ' . $mysqli->error;
	}
	$q = "SELECT package_ID FROM package ORDER BY Package_ID DESC LIMIT 1";
	if ($result = $mysqli->query($q)) {
		while ($row = $result->fetch_array()) {
			$packID = $row[0];
		}
	} else {
		echo 'Query error: ' . $mysqli->error;
	}
	// insert to sender table
	$q = "INSERT INTO sender (Customer_ID,Package_ID,Sending_Addr,Postal_code) 
	VALUES ($custID,$packID,'$_POST[sendadd]','$_POST[s_pc]')";
	$result = $mysqli->query($q);
	if (!$result) {
		echo 'Query error: ' . $mysqli->error;
	}
	//identify input for receiver table
	$q = "SELECT customer_ID FROM customer WHERE Fname ='$_POST[r_fname]' AND Lname='$_POST[r_lname]' AND Phone_no='$_POST[r_phonenumber]'";
	$custID = '-1';
	if ($result = $mysqli->query($q)) {
		while ($row = $result->fetch_array()) {
			if (isset($row[0])) {
				$custID = $row[0];
			}
		}
	} else {
		echo 'Query error: ' . $mysqli->error;
	}
	// insert to receiver table
	$q = "INSERT INTO receiver (Customer_ID,Fname,LName,Phone_no,Receiving_Addr,Postal_code) 
	VALUES ($custID,'$_POST[r_fname]','$_POST[r_lname]','$_POST[r_phonenumber]','$_POST[recadd]','$_POST[r_pc]')";
	$result = $mysqli->query($q);
	if (!$result) {
		echo 'Query error: ' . $mysqli->error;
	}
	//identify input for sending table
	$q = "SELECT Sender_ID FROM sender ORDER BY Sender_ID DESC LIMIT 1";
	if ($result = $mysqli->query($q)) {
		while ($row = $result->fetch_array()) {
			if (isset($row[0])) {
				$senderID = $row[0];
			}
		}
	} else {
		echo 'Query error: ' . $mysqli->error;
	}

	$q = "SELECT Receiver_ID FROM receiver ORDER BY Receiver_ID DESC LIMIT 1";
	if ($result = $mysqli->query($q)) {
		while ($row = $result->fetch_array()) {
			if (isset($row[0])) {
				$receiverID = $row[0];
			}
		}
	} else {
		echo 'Query error: ' . $mysqli->error;
	}
	// insert to sending table
	$q = "INSERT INTO sending (Sender_ID,Receiver_ID,SendBranch_ID,Sending_Type) 
	VALUES ($senderID,$receiverID,$AccBranch,'$_POST[sendingtype]')";
	$result = $mysqli->query($q);
	if (!$result) {
		echo 'Query error: ' . $mysqli->error;
	}
	header("location: home.php");
}
