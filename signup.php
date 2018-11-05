<?php 
	#include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>회원가입</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<form method="post" action="signup_check.php">
		<h1>회원가입</h1>
			<!--<fieldset>
				<legend>입력사항</legend>-->
					<table align="center">
						<tr>
							<td>아이디</td>
							<td><input type="text" size="35" name="userid" placeholder="아이디"></td>
						</tr>
						<tr>
							<td>비밀번호</td>
							<td><input type="password" size="35" name="userpw" placeholder="비밀번호"></td>
						</tr>
						<tr>
							<td>이름</td>
							<td><input type="text" size="35" name="name" placeholder="이름"></td>
						</tr>
						<tr>
							<td>주소</td>
							<td><input type="text" size="35" name="adress" placeholder="주소"></td>
						</tr>
						<tr>
							<td>전화번호</td>
							<td><input type="text" size="11" name="phone" placeholder="전화번호"></td>
						</tr>
						<tr>
							<td>유형<br><br><br></td>
							<td>
								<input type="radio" name="grade" value="1">개인
								<input type="radio" name="grade" value="2">사업자
								<input type="radio" name="grade" value="3">공공기관			<br><br><br>				
							</td>
						</tr>
						
						<tr>
							<td>차량 등록</td>
							<td>
								<input name="등록" type="file">
							</td>
						</tr>
					</table>
				<br><br>
		<form action="signup_check.php" method="post">
		<input type="submit" value="가입하기" />
	</form>
				
				<input type="reset" value="다시쓰기" />
			
		<!--</fieldset>-->
	</form>
</body>
</html>