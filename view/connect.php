<?php
$server_username = "vohai";
$server_password = "12345678";
$server_host = "localhost";
$database = 'project_group2';

$conn = mysqli_connect($server_host,$server_username,$server_password,$database);
mysqli_select_db($conn,'project_group2');






