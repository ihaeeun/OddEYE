<?php

session_start(); // 세션
include ("connect.php"); // DB접속



$id = $_POST['id']; // 아이디
$pw = $_POST['pw']; // 패스워드

$query = "select * from CLIENT where ID='$id' and PW='$pw'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);



if($id==$row['ID'] && $pw==$row['PW']){ // id와 pw가 맞다면 login

   $_SESSION['id']=$row['ID'];
   $_SESSION['name']=$row['name'];
   echo "<script>location.href='login.php';</script>";

}else{ // id 또는 pw가 다르다면 login 폼으로

   echo "<script>window.alert('잘못된 ID 또는 PASSWORD 입니다.');</script>"; // 
   echo "<script>location.href='login.php';</script>";

}

?>
