<?php 
	include "./Include/config.php"; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="./Js/search.js"></script>
	<style type="text/css">
		input[type="submit"]{
			cursor: pointer;
			transition: 0.3s;
		}
		input[type="submit"]:hover{
			background-color: forestgreen;
			color: white;
		}
	</style>
	<?php include "./Include/title.php" ?>
</head>
<body style="background: #F3F3F3;">
	
	<div style = "display: grid; place-items: center center"> 
		<h2 style="text-align:center; color: seagreen;"><?php echo $CURRENT_PAGE; ?></h2>
		<span>
			<?php 
				include "./Include/links.php";
				echo "<br>"; 
			?>	
			<br>			
		</span>
		<div style="color: red; text-align: center;">**Search-Field should strictly follow the Format**</div><br>

		<form action="../Controller/history.php" onsubmit="return Submit(this)" name="form" method="GET">
			<label for="id">Enter transition date:</label>
			<input type="datetime" name="id" id="searchId" placeholder="dd-mm-yy h:m:s">
			<input type="submit" name="search" value="search">
		</form>

		<br>

		<div id="result">
			
		</div>

</div>
	
</body>
</html>