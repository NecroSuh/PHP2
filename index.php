<!doctype html>
<html>
	<head>
		<title>Apple Pizza</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
				body {
				  background: #e2e1e0;
				  text-align: center;
				}
				h1 {
					text-align: center;
					padding: 32px;
				}
				.card {
				  background: #fff;
				  border-radius: 2px;
				  display: inline-block;
				  height: 540px;
				  margin: 10px;
				  /*position: relative;*/
				  width: 300px;
					border: 1px solid #999;
				}
				img {
					width: 100%;
					height: 400px;
					margin-top: 0;
				}
				.card-1 {
				  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
				  /*transition: all 0.3s cubic-bezier(.25,.8,.25,1);*/
					overflow: hidden;
				}
				.card-1 img {
					object-fit: cover;
					display: block;
					width: 100%;
					height: 60%;
					transition: .3s transform ease-out;
				}
				.card-1:hover img{
				  /*box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);*/
				  transform: scale(1.15);
				}
				.card-1:hover h3 {
					color: navy;
					text-shadow: 1px 1px 1px darkorange;
					border-bottom: 1px dotted gray;
				}
				.card-1 .text {
					margin-top: 50px;
				}
				/* Add a black background color to the top navigation */
				.topnav {
					background-color: #333;
					overflow: hidden;
				}
	 
				/* Style the links inside the navigation bar */
				.topnav a {
				  float: left;
				  color: #f2f2f2;
				  text-align: center;
				  padding: 14px 16px;
				  text-decoration: none;
				  font-size: 17px;
				}
	 
				/* Change the color of links on hover */
				.topnav a:hover {
				  background-color: #ddd;
				  color: black;
				}
	 
				/* Add a color to the active/current link */
				.topnav a.active {
				  background-color: #4CAF50;
				  color: white;
				}
	 
				/* Right-aligned section inside the top navigation */
				.topnav-right {
				  float: right;
				}        
		</style>
	</head>
	<body>
		<?php
			session_start();
			$logged = false;
			if(isset($_SESSION['uid'])) {  // 세션에 uid 키가 정의되어 있으면 
				$uid = $_SESSION['uid'];
				$uname = $_SESSION['uname'];
				//echo "$uid : $uname<br>";
				$logged = true;
			}
			#1. Database connection
			include_once('connect.php');
			if($logged) { // log in 상태 
				// 장바구니 검색
				$sql = "select count(*) rowcnt from cart where email = '$uid'";
				$result = $conn->query($sql);
				//$row = $result->fetch_array(MYSQLI_NUM);
				$row = $result->fetch_assoc();
			}
		?>
		<div class="topnav">
		<?php
			if(!$logged) {
				echo "<a href='signup.html'>회원가입</a>";
				echo "<a href='signin.html'>로그인</a>";
			}
			else {
				echo "<a href=''>{$uname}님 환영합니다.</a>";
				echo "<a href='signout.php'>로그아웃</a>";
				echo "<a href='signmodify.php'>회원정보수정</a>";
				echo "<a href='signdel.php'>회원탈퇴</a>";
				echo "<a href='showcart.php'>장바구니(".$row['rowcnt'].")</a>";
			}
		?>
		</div>
		<h1>Pizza Mall</h1>
	<?php	
	#2. SELECT SQL문 : mypizza 테이블의 전체 레코드 검색하는 구문
	$sql = "select * from mypizza";
	#3. SQL 실행하기
	$result = $conn->query($sql); 
	#4. 실행결과 레코드들을 화면에 보이기
	if(!$result)
		die('피자 데이터 검색에 오류가 발생했습니다. Error : '.$conn->error);
	?>
	<?php
	while($row = $result->fetch_array(MYSQLI_NUM)) {
	?>
	<div class="card card-1">
		<a href="addcart.php?pizza=<?=$row[1]?>&lprice=<?=$row[2]?>&sprice=<?=$row[3]?>">
			<img src="images/<?=$row[4]?>"></a>
		<div class="">
			<h3><?=$row[1]?></h3>
			<h3><?=$row[2]?></h3>
			<h3><?=$row[3]?></h3>
		</div>
	</div>
	<?php } //<?php} 안됨 ?>
		
	</body>
</html>
