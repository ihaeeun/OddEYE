<?php
session_start(); // 세션
include ("connect.php"); // DB접속

$key=$_POST['key'];
$query = "select * from image where FILE_NAME='$key'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
#$path = $row['file_path'].$row['file_name'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo("$key"); ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<div class="header">
		<a href="search.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OddEYE</a>
		<div style="float:right">
		<a href='logout.php'>logout</a>
		</div>
	</div>
	<?php echo("<img src='".$row['FILE_ROUTE'].$row['FILE_NAME']."' width='500'>");?>
	
	<p></p>
	<form action="test.php" method="POST">
		<input name="key" type=submit value="차종 조회">
		<?php echo("<input type='hidden' name='key' value='$key' />"); ?>
	</form>
</body>
</html>
