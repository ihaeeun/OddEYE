<?php

session_start(); // 세션

if($_SESSION['id']==null) { // 로그인 하지 않았다면

?>


<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		body{
			background-image:url('res/imagefile/login_bg.png');
			background-color: #23211f;
			background-size: cover;
		}
	</style>
</head>
<body>
	
	<div class="header">
		<a href="/">OddEYE</a>
	</div>
	<div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<form name="login_form" action="login_check.php" method="post">
	   <input type="text" name="id" placeholder="ID">
	   <input type="password" name="pw" placeholder="PASSWORD">
	   <input type="submit" name="login" value="Login">
	</form>
	<form action="signup.php" method="post">
		<input type="submit" name="signup" value="Sign Up">
	</form>
	</div>
</body>
</html>


<?php

}else{ // 로그인 했다면
	header("Location: search.php");
#   echo "<center><br><br><br>";
#   echo $_SESSION['name']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
#   echo "&nbsp;<a href='logout.php'><input type='button' value='Logout'></a>";
#   echo "</center>";
}

?>
