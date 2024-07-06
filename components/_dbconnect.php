<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "users";

$conn = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_errno()) {
    print "Not able to connect to database <br>" . mysqli_connect_error();
    exit();
}
// print "successfully connected to server";

?>