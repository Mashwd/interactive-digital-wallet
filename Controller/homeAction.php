<?php

$receiver = $amount = $category = "";
$receiverErr = $amountErr = $categoryErr =  "";
$successfulMessage = $errorMessage = "";
$flag = false;

if($_SERVER['REQUEST_METHOD'] === "POST") {
	$category = $_POST['category'];
	$receiver = $_POST['receiver'];
	$amount = $_POST['amount'];


	if(empty($category)) {
	        $categoryErr = "Category can not be empty!";
	        $flag = true;
	}
	if(empty($receiver)) {
	        $receiverErr = "Receiver can not be empty!";
	        $flag = true;	       
	    }	        
		if(empty($amount)) {
	        $amountErr = "Amount can not be empty!";
	        $flag = true;
	}
	else if ($amount < 0) {
		  	$amountErr = "Please enter a valid amount";
		  	$flag = true;
		}

	if(!$flag) {
	        $category = test_input($category);
	        $receiver = test_input($receiver);
	        $amount = test_input($amount);
	        
	      	date_default_timezone_set('Asia/Dhaka');
	        $result1 = addTransition($category, $receiver, $amount, date('d-m-y h:i:s'));
	        if($result1) {
	        	$successfulMessage = "Successfully saved.";
	        }
	        else {
	        	$errorMessage = "Error while saving.";
	        }	
	}
}

        function test_input($data) {
	        $data = trim($data);
	        $data = stripslashes($data);
	        $data = htmlspecialchars($data);
	        return $data;
        }
        
	?>