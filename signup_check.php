<?php
	include ("connect.php");
	#include "password.php";

	$userid = $_POST['userid'];
	$userpw = $_POST['userpw'];
	$username = $_POST['name'];
	$adress = $_POST['adress'];
	$phone = $_POST['phone'];
	$grade = $_POST['grade'];

$query = "insert into CLIENT (ID,PW,NAME,ADDRESS,PHONE_NUM,GRADE) values('".$userid."','".$userpw."','".$username."','".$adress."','".$phone."','".$grade."')";
#$query = "insert into CLIENT (ID,PW,NAME,ADDRESS,PHONE_NUM,GRADE) values('".$userid."','".$userpw."','".$username."','".$adress."','".$phone."','".$grade."')";
mysqli_query($con, $query);

?>
<meta charset="utf-8" />
<script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
<script>location.href='login.php';</script>
<meta http-equiv="refresh" content="0 url=/">
