<?
session_start();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>차량 번호 조회</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<div class="header">
		<a href="search.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OddEYE</a>
		<div style="float:right">
		<a href='logout.php'>logout</a>
		</div>
	</div>
	<h4>차량 번호 입력</h4>
	<div class="search">
		<form action="" method="POST">
			<input type="text" placeholder="차량 번호 입력" name="carnum">
			<input type="submit" value="사진" onClick="this.form.action='imagelist.php'">
			<input type="submit" value="영상" onClick="this.form.action='videolist.php'">
			<input type="submit" value="로그" onClick="this.form.action='loglist.php'">
		</form>
	</div>
</body>
</html>