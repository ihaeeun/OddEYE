<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "gmdmd1516!@#";
$db_name = "ODDEYE";


$con = new mysqli($db_host, $db_user, $db_password, $db_name); 

$query = "INSERT INTO IMAGE VALUES ('file_name', 123, 'car_num', 'file_route', NULL)";
$result = mysqli_query($con, $query);
//$row = mysqli_fetch_array($result);
//"INSERT INTO IMAGE VALUES ('file_name', 'date', 'car_num', '$FILE_ROUTE', NULL)"



?>
