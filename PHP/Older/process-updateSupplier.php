<?php

include 'connect.php';

$sID = $_POST['sID'];
$new = $_POST['new']; 
$datafield = $_POST['datafield'];

$conn =OpenCon();
$sql = "UPDATE OAR_Supplier SET $datafield = '$new' WHERE Supplier_ID = '$sID'"; 

if ($conn->query($sql) === TRUE) {
	echo "Record updated successfully";
} else {
	    echo "Error updating record: " . $conn->error;
	}
?>