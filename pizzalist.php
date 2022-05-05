<!doctpye html>
<html>
	<head>
		<title>Pizza Mall</title>
			<meta charset="utf-8">
			<style>
				img{
					width: 100px;
					height: 100px;
				}
			</style>
	</head>
	<body>
		<h1>Our Best Pizzas</h1>
<?php
#1. DB connection
	include_once('connect.php');
#2. SELECT SQL 구문 작성
	$sql = "select * from mypizza";
#3. SQL 실행하기
	$result = $conn->query($sql);
#4. mypizza 레코드 출력하기.	NO 피자명 라지가격 스몰가격 이미지
	if(!$result)	// $result가 false인 경우 체크. SQL에 오류가 있거나 실행 중에 묹가 생겼을 때
		die('SELECT 구문 실행 오류 : '.$conn->error);	// 현재 페이지 실행을 멈춤
// SELECT 정상적으로 실행된 경우
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			?>
			<p><?=$row["id"]?> : <a href="addcart.php?pizza=<?=$row["name"]?>&lprice=<?=$row["large"]?>&sprice=<?=$row["small"]?>"><?=$row["name"]?></a> :
				<?=$row["large"]?> : <?=$row["small"]?>
				<img src='images/<?=$row["photo"]?>'>
			</p>
	<?php
		}
	}
	else
		echo "검색된 데이터가 없습니다.<br>";
	?>
	</body>
</html>