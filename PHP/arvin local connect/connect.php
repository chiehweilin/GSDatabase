<?php
function OpenCon()
{$dbhost = "localhost";
$dbuser = "root";
$dbpass = "123ASDqwe";
$db = "grocery store";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
return $conn;
}
function CloseCon($conn)
{
$conn -> close();
}
?>