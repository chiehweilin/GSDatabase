<?php
include 'connect.php';
$id = $_POST['Customer_ID'];
$tmp = $_POST['tmp']; 
$colName = $_POST['colName']; 
$conn =OpenCon();
$sql = "update customer set $colName = '$tmp' where Customer_ID = '$id'"; 
if ($conn->query($sql) === TRUE) {
	echo "Record updated successfully";
} else {
	    echo "Error updating record: " . $conn->error;
	}
?>