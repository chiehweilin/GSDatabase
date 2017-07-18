<?php
include 'connect.php';
$id = $_POST['Product_ID'];
$Price = $_POST['Price']; 
$conn =OpenCon();
$sql = "update products set Price = '$Price' where Product_ID= '$id'"; 
if ($conn->query($sql) === TRUE) {
	echo "Record updated successfully";
} else {
	    echo "Error updating record: " . $conn->error;
	}
?>