<?php
#lotto2022.csv 파일을 읽고 lotto 테이블에 저장하기
include_once('connect.php');
#파일이 존재하는 체크
if(!file_exists('lotto2022.csv'))
	die('lotto2022.csv 파일이 존재하지 않습니다.');
#파일을 열고 데이터 읽기
$file=fopen('lotto2022.csv', 'r');	// r: 읽기모드
if(!$conn->query('delete from lotto')){
	die('lotto 테이블 삭제 오류 : '.$conn->error);
}
while (!feof($file)) {	// 파일의 끝에 도달하기까지
	$line = fgets($file);	// 현재 가리키는 한 줄을 읽어오기
	echo "$line<br>";
	// 컴마를 중심으로 데이터 분리(토큰)
	$token = explode(',', $line);	// 분리자 기호(,)를 중심으로 토큰 분리하고 배열로 저장 
	if($token[0] > 0)
		insert_row($token);
}
echo "<script>alert('lotto2022.csv 파일을 정상적으로 읽어들였습니다.')</script>";
fclose($file);
$conn->close();

//lotto 테이블에 하나의 레코드 추가하는 함수
function insert_row($token){
	global $conn;	// 함수 밖에 선언된 전역변수를 함수 내에서 사용
	$sql="insert into lotto values($token[0],'$token[1]',$token[2],$token[3],$token[4],$token[5],$token[6],$token[7],$token[8])";
	if(!$conn->query($sql))
		die('lotto 테이블 추가 오류 : '.$conn->error);
}
?>