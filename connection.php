<?php
$servername = "localhost";
$dbname = "cmm007";
$username="root";
$password="";



$conn =  mysqli_connect($servername, $username, $password, $dbname);


if(!$conn) {
die ("Connection failed: ".mysqli_connect_error);
}
?>