<?php
	# Database connect
	$server = "localhost";
	$user = "root";
	$passwd = "";
	$dbname = "bookshop";
	// mysqli : MySQL DB 처리하는 클래스. $conn 객체변수
	$conn = new mysqli($server, $user, $passwd, $dbname);
	if($conn->connect_error){
		die("Bookshop DB 접속 오류");
	}
	// else echo "<h3>Bookshop DB 접속 성공</h3>";
?>