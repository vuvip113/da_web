<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "phpshop";

$con = mysqli_connect($host, $username, $password, $database);

//check
if (!$con) {
    die("Ket noi loi: " . mysqli_connect_error());
}