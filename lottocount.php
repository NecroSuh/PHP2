<?php
include_once('connect.php');
#파일 생성
$file=fopen('lottocount2022.csv', 'w'); // 기록용으로 파일 열기. 파일이 없으면 새로 생성. 있으면 데이터 삭제
#빈도수를 저장할 배열 생성
$count=[];
#1~45 숫자별 빈도수 산출하기
for($i=1; $i<=45; $i++){
	$sql="SELECT COUNT(*) FROM lotto WHERE no1 = $i OR no2 = $i OR no3 =$i OR no4=$i OR no5=$i OR no6=$i";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		$row=$result->fetch_row();
		$count[$i]=$row[0];
		echo "$i : $count[$i]<br>";
	}
	if($i<45)
		$line="$i,$count[$i]\n";
	else
		$line="$i,$count[$i]";
	fwrite($file,$line);
}

fclose($file);
?>