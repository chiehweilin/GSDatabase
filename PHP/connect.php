<?php

function OpenCon()
{
    $dbhost = "sql3.freemysqlhosting.net";
    $dbuser = "sql3185607";
    $dbpass = "3tVRcgeKWR";
    $db = "sql3185607";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or 
            die("Connect failed: %s\n". $conn -> error);
    return $conn;
}

function CloseCon($conn)
{
    $conn -> close();
}

?>
