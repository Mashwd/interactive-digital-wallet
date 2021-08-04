
<?php 
	include "./Include/config.php";
	require '../Controller/FileOperation/DatabaseOperations.php';
	require "../Controller/homeAction.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="./Js/search.js"></script>
	<?php include "./Include/title.php" ?>
</head>
<body style="background: #F3F3F3;">
		
	<div style="display: grid; place-items: center center"> 
		<h2 style="text-align:center; color: seagreen;"><?php echo $CURRENT_PAGE; ?></h2>
		<span>
			<?php 
				include "./Include/links.php";
				echo "<br>"; 
			?>				
		</span>
		<br>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="form" onsubmit="return isValid();" >

			    <label for="category">Select Categroy<span style="color: red;">*</span>:</label>
			    <select id="category" name="category">
				    <option value=""<?php if(!empty($_POST['category']) && $_POST['category'] == '') { echo 'selected="selected"';} ?> > Select a value</option>
				    <option value="mobileRecharge"<?php if (!empty($_POST['category']) && $_POST['category'] == 'mobileRecharge') echo 'selected="selected"'; ?> >Mobile Recharge</option>
				    <option value="merchantPay" <?php if (!empty($_POST['category']) && $_POST['category'] == 'merchantPay') echo 'selected="selected"'; ?> >Merchant Pay</option>
				    <option value="sendMoney" <?php if (!empty($_POST['category']) && $_POST['category'] == 'sendMoney') echo 'selected="selected"'; ?> >Send Money</option>
			    </select>
			    <span style="color: red;" id="error1">
			    	<?php 
			    		if(!empty($categoryErr))
			    			{echo "<br>";}
			    		echo $categoryErr; 
			    	?> 		
			    </span>
			    
			

			<br><br>
			<label for="receiver">To <span style="color: red;">*</span>: </label>
			<input type="tel" name="receiver" id="receiver" pattern="01[5,3,9,6,7,8]{1}[0-9]{8}" style="margin-left: 33px;" value="<?php echo $receiver; ?>">
			<span style="color: red;" id="error2">
			    	<?php 
			    		if(!empty($receiverErr))
			    			{echo "<br>";}
			    		echo $receiverErr; 
			    	?> 		
			    </span>
			<br><br>

			<label for="amount">Amount <span style="color: red;">*</span>: </label>
			<input type="text" name="amount" id="amount" value="<?php echo $amount; ?>">
			<span style="color: red;" id="error3">
			    	<?php 
			    		if(!empty($amountErr))
			    			{echo "<br>";}
			    		echo $amountErr; 
			    	?> 		
			    </span>
			<br><br>


			<input type="submit" name="submit" value="Submit">
			 
		</form>
		<span style="color: green;"><?php echo $successfulMessage; ?></span>
		<span style="color: red;"><?php echo $errorMessage; ?></span>

</div>
</body>
</html>

