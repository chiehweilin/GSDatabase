<?php

include 'connect.php';

$sID = $_POST['sID'];
$datafield = $_POST['datafield'];
$new = $_POST['new']; 

$conn =OpenCon();
$sql = "UPDATE OAR_Supplier SET $datafield = '$new' WHERE Supplier_ID = '$sID'"; 

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
        echo "Error updating record: " . $conn->error;
    }
?>