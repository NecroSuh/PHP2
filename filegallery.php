<!doctype html>
<html>
<head>
	<title>File Gallery</title>
	<meta charset="utf-8">
	<style>
		.box{
			display: : inline-block;
			text-align : center;
			margin: 0 15px;
		}
	</style>
</head>
<body>
	<h1>File Gallery</h1>
<?php
	#uploads 폴더를 스캔해서 파일들을 나열
	$images = scandir('uploads/');	//uploads 폴더의 내용으로 파일 및 디렉토리 목록이 저장
	foreach($images as $img){	// PHP : 배열 as 원소, JAVA : for(Book b : books)
		if($img=='.' || $img=='..')
			continue;
		echo "<div class='box'>";
		echo "<img src='uploads/$img' width='300'>";
		echo "<p><a href='filedownload.php?file=".urldecode($img)."'>Download</a></p>";		
		echo "</div>";
	}
?>
</body>
</html>