<!DOCTYPE html>
<html>
<head>
    <title>Doremi Pizza</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body, html {
        height: 100%;
        font-family: Arial, Helvetica, sans-serif;
    }
    * {
        box-sizing: border-box;
    }
    .bg-img {
        /* The image used */
        background-image: url("images/pizza.jpg");
        min-height: 380px;
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    /* Add styles to the form container */
    .container {
        position: absolute;
        right: 0;
        margin: 20px;
        max-width: 300px;
        padding: 16px;
        background-color: white;
    }
    /* Full-width input fields */
    input[type=text], input[type=number] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
    }
    input[type=text]:focus, input[type=number]:focus {
        background-color: #ddd;
        outline: none;
    }
    input[type=radio] {
        margin: 5px 0;
    }
    /* Set a style for the submit button */
    .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }
    .btn:hover {
        opacity: 1;
    }
    .title {
        position: absolute;
        top: 10px;
        left: 40px;
        color: white;
    }
     </style>
</head>
<body>
<?php
	#1. pizzalist.php에서 전달되는 데이터 가져오기
	$pizza = $_GET['pizza'];
	$lprice = $_GET['lprice'];
	$sprice = $_GET['sprice'];
?>
	<div class="bg-img">
	<div class="container">
	<form action="addcartproc.php" method="post">
		<input type="text" name="pizza" value="<?=$pizza?>" readonly><br>
		<input type="radio" name="size" value="L" checked>Large(<?=$lprice?>)
		<input type="radio" name="size" value="S">Small(<?=$sprice?>)<br>
		<input type="number" name="qty" value="1" min="1" max="20">
		<br>
		<button type="submit" class="btn">Add to cart</button>
	</form>
	</div>
	</div>
</body>
</html>



















