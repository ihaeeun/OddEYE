<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "gmdmd1516!@#";
$db_name = "ODDEYE";
$con = new mysqli($db_host, $db_user, $db_password, $db_name); // 데이터베이스 접속
if ($con->connect_errno) { die('Connection Error : '.$con->connect_error); } // 오류가 있으면 오류 메세지 출력

$image_url="/var/www/html/OddEYE/images/";
$FILE_ROUTE=chunk_split(base64_encode(file_get_contents($image_url)));
$query="INSERT INTO IMAGE VALUES ('file_name', 'date', 'car_num', '$FILE_ROUTE', NULL)";
mysql_query($query) or die(mysql_error());

?>
