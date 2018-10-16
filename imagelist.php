<?php

session_start(); // 세션
include ("connect.php"); // DB접속

$carnum = $_POST['carnum'];
$query = "select * from image where CAR_NUM='$carnum'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if(!$row){
	echo "<script>window.alert('없는 번호입니다.');</script>";
	echo "<script>location.href='search.php';</script>";
}else if($carnum != NULL){
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo("$carnum")?></title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body> 
	<div class="header">
		<a href="search.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OddEYE</a>
		<div style="float:right">
		<a href='logout.php'>logout</a>
		</div>
	</div>
	<h4><?php echo "$carnum"?></h4>
	<div class="thumbnail">
		<table>
		<tr>
			<?php
				for($i=0; $i<7; $i++){
					while ($row=$result->fetch_assoc()){
						$key=$row['FILE_NAME'];
						echo("<form method='POST' action='view.php'>");
						echo("<input type='image' src='".$row['FILE_ROUTE'].$row['FILE_NAME']."' />");
						echo("<input type='hidden' name='key' value='$key' /></form>");
					}
				}
			?>
		</tr>	
		</table>
	</div>
</body>
</html>
<?php } 
else{
	echo "<script>window.alert('차량 번호를 입력해주세요.');</script>";
	echo "<script>location.href='search.php';</script>";
}?>
