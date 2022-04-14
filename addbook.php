<?php
	# 1. DB 연결
	include_once('connect.php');
	# 2. 데이처 읽어오기
	$bid = $_POST['bid'];
	$title = $_POST['title'];
	$author = $_POST['author'];
	$pdate = $_POST['pdate'];
	$price = $_POST['price'];
	
	# 3. INSERT 구문 작성하기
	$sql = "insert into book values($bid,'$title','$author','$pdate',$price)";
	# 4. SQL 실행하기
	if($conn->query($sql))	// query 메소드가 MySQL 서버에게 SQL 질의어를 전달하고 실행 요청
		echo "<h3>도서 등록 성공</h3>";
	else echo "<h3>도서 등록 실패</h3>";

?>