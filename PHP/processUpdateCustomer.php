<?php

include 'connect.php';

$cID = $_POST['cID'];
$datafield = $_POST['datafield'];
$new = $_POST['new']; 

$conn =OpenCon();
$sql = "UPDATE Customer SET $datafield = '$new' WHERE Customer_ID = '$cID'"; 

if ($conn->query($sql) === TRUE) {
	echo "Record updated successfully";
} else {
	    echo "Error updating record: " . $conn->error;
	}
?>