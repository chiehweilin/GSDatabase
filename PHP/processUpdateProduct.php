<?php

include 'connect.php';

$pID = $_POST['pID'];
$datafield = $_POST['datafield'];
$new = $_POST['new']; 

$conn =OpenCon();
$sql = "UPDATE Products SET $datafield = '$new' WHERE Product_ID = '$pID'"; 

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
        echo "Error updating record: " . $conn->error;
    }
?>