<?php
# 파일 다운로드
if(isset($_REQUEST['file'])){
	$file=urldecode($_GET['file']);
	$path='uploads/'.$file;

	if(file_exists($path)){
		// 웹 서버에 다운로드 요청
		header('Content-Descrption: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Contnet-Disposition: attachment; filename="'.basename($path).'"');
		header('Content-Length: '.filesize($path));
		readfile($path);// 파일의 내용을 읽어오기
		flush();
		exit;
	}
}

?>