<!DOCTYPE html>
<html>
<head>
    <title>Doremi Pizza Mall</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
                text-align: center;
            }
            #pizza {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 70%;
                margin-left: auto;
                margin-right: auto;
            }
            #pizza td, #pizza th {
                border: 1px solid #ddd;
                padding: 8px;
            }
            #pizza tr:nth-child(even){background-color: #f2f2f2;}
            #pizza tr:hover {background-color: #ddd;}
            #pizza th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #4CAF50;
                color: white;
            }
        #pizza img {
            width: 120px;
            height: 80px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 70%;
            opacity: 0.9;
            margin-top: 10px;
        }
        .btn:hover {
            opacity: 1;
        }
    </style>
</head>
<body>
	<h1>장바구니</h1>
<?php
# cart 테이블로부터 레코드 검색해서 나열하는 프로그램.
#1. 세션시작하고 이메일 가져오기
session_start();
$email = $_SESSION['uid'];
#2. DB 연결
include_once('connect.php');
#3. SELECT SQL 작성
$sql = "select cart.*, photo from cart, mypizza where email = '$email' and cart.pizzaname = mypizza.name";
#4. SQL 실행
$result = $conn->query($sql);
#5. 레코드들을 하나씩 나열
if(!$result)
	die('검색 오류..');
if($result->num_rows > 0) {
	$no = 1;
?>
<form action="removecart.php" method="post">
	<table id="pizza">
		<tr>
			<th></th><th>NO</th><th></th><th>피자</th><th>사이즈</th><th>수량</th><th>금액</th>
		</tr>
	<?php
	while($row = $result->fetch_assoc()) {
	?>
	<tr>
		<td><input type="checkbox" name="chk[]" value="<?=$row['pizzaname']?>@<?=$row['size']?>"></td>
		<td><?=$no++?></td>
		<td><img src="images/<?=$row['photo']?>"></td>
		<td><?=$row['pizzaname']?></td>
		<td><?=$row['size']?></td>
		<td><?=$row['qty']?></td>
		<td><?=$row['price']?></td>
	</tr>
	<?php } ?>
	</table>
	<button type="submit" class="btn">장바구니삭제</button>
</form>
<?php } ?>
</body>
</html>

