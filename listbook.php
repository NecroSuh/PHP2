<?php
	# 1. DB connection
	include_once('connect.php');
	
	# 2. SELECT SQL 작성
	$sql = "select title, price from book where pubdate between '2021.01.01' and '2021.12.31'";
	
	# 3. SQL 실행
	$result = $conn->query($sql);	// 검색된 레코드 집합을 가지는 객체변수. 레코드 포인터가 있음.
	
	# 4. 검색된 레코드 읽어오기
	if(isset($result) && $result->num_rows > 0){
		/*
		while($row = $result->fetch_assoc()){	// 레코드 하나의 컬럼에 대해 연관배열로 읽어오기
			echo $row['id']." : ".$row['title']." : ".$row['author']." : ".
			$row['pubdate']." : ".$row['price']."<br>";
		}
	}
		while($row = $result->fetch_array(MYSQLI_NUM)){	// 레코드 하나의 컬럼에 대해 인덱스배열로 읽어오기
			echo $row[0]." : ".$row[1]." : ".$row[2]." : ".
			$row[3]." : ".$row[4]."<br>";
		}
	}*/
		while($row = $result->fetch_array(MYSQLI_ASSOC)){	// 레코드 하나의 컬럼에 대해 연관배열로 읽어오기
			echo $row['title']." : ".$row['price']."<br>";
		}
	}
	else echo "<h3>검색된 레코드가 없습니다.</h3>";

?>