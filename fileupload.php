<?php  
# 파일 선택을 했는지 확인
if(!isset($_FILES['imgfile']) || $_FILES['imgfile']['error']!=0){
	die('오류: 파일을 선택하지 않았거나 전송 중 오류가 발생했습니다.');
}
$target_dir='uploads/';	// 현재 php 파일이 있는 폴더의 하위 폴더인 uploads에 저장
$target_file=$target_dir.basename( $_FILES['imgfile']['name']);	// uploads/pizza1.jpg
$upload_ok=1;

#조건 확인
if(file_exists($target_file)){	// 같은 이름의 파일이 존재하는 경우
	echo "오류: 같은 이름의 파일이 존재합니다.";
	$upload_ok=0;
}
if($_FILES['imgfile']['size']>500000000){	// 파일 크기가 500MB 초과하는 경우
	echo "오류: 파일 크기가 500MB를 초과하였습니다.";
	$upload_ok=0;
}
$imgtype=strtolower(pathinfo($target_file, PATHINFO_EXTENSION));	// 파일의 확장자

if($imgtype != 'jpg' && $imgtype !='jpeg' && $imgtype !='png'){
	echo "오류: 이미지 파일 포맷은 jpg, jpeg, png여야 합니다.";
	$upload_ok=0;
}

# 업로드 된 임시 파일을 업로드 포더로 이동
if($upload_ok==0){
	echo "파일업로드를 종료합니다.";
}
else{
	if(move_uploaded_file($_FILES['imgfile']['tmp_name'], $target_file)){
		echo "파일 ".basename($_FILES['imgfile']['name'])."을 업로드하였습니다.";
	}
	else
		echo "임시 파일을 이동 중에 오류가 발생했습니다.";
}
?>