<?php
# form.html의 데이터 받아서 처리하기
	$uid = $_POST['uid'];	
	$uname = $_POST['uname'];
	$birth = $_POST['birth'];
	$grade = $_POST['grade'];
	//$skill = $_POST['skill'];
	if(isset($_POST['skill'])) $skill=$_POST['skill'];
	
	echo "<h3>$uid</h3>";
	echo "<h3>$uname</h3>";
	echo "<h3>$birth</h3>";
	echo "<h3>$grade</h3>";
	//var_dump($skill);
	if(isset($skill))
		foreach($skill as $e) echo "$e ";
	echo "<br>";
?>