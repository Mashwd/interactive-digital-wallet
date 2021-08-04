<?php 

	function connect()
	{
		$conn = new mysqli("localhost", "tester", "123", "digital-wallet");
		if($conn->connect_errno)
		{
			die("failed connection.. ". $conn->connect_errno);
		}
		return $conn;
	}

	function addTransition($category, $receiver, $amount, $time)
	{
		$conn = connect();
		$sql = $conn->prepare("INSERT INTO Transitions(category, receiver, amount, transitionTime) VALUES (?, ?, ?, ?)");
		$sql->bind_param("ssss", $category, $receiver, $amount, $time);
		return $sql->execute();
	}


	function findTransition($time)
	{
		$conn = connect();
		$sql = $conn->prepare("SELECT * FROM Transitions WHERE transitionTime LIKE ?");
		$time = $time.'%';
		$sql->bind_param("s", $time);
		$sql->execute();
		$res = $sql->get_result();
		return $res;
	}


	function getAllTransitions()
	{
		$conn = connect();
		$sql = $conn->prepare("SELECT * FROM Transitions");
		$sql->execute();
		$res = $sql->get_result();
		return $res;
	}

?>