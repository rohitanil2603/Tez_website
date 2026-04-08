<?php
$servername='localhost';
$username = 'u703275089_Tez_rohit';
$password = '@8920167296Rohit';
$database = 'u703275089_Tez';

// Connect to the database
$Conn = mysqli_connect($servername, $username, $password, $database);

// Check if the connection was successful
if (!$Conn) {
    die('Connection unsuccessful: ' . mysqli_connect_error() . ' (Error code: ' . mysqli_connect_errno() . ')');

}




?>