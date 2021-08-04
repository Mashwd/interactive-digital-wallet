<?php
	require './FileOperation/DatabaseOperations.php';

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$search = $_GET['search'];

		if(empty($search))
		{
			
			$fileData = getAllTransitions();
		}
		else
		{
			$fileData = findTransition($search);		
		}

		if($fileData->num_rows > 0)
		{

			echo "<table border = 2px>";
			echo "<tr>";
			echo "<th>";
			echo "Transition ID";
			echo "</th>";
			echo "<th>";
			echo "Category";
			echo "</th>";
			echo "<th>";
			echo "To";
			echo "</th>";
			echo "<th>";
			echo "Amount";
			echo "</th>";
			echo "<th>";
			echo "Transition Time";
			echo "</th>";
			echo "</tr>"; 

			foreach($fileData as $item) {
				echo "<tr>";
				echo "<td>";
				echo $item['Id'];
				echo "</td>";
				echo "<td>";
				echo $item['category'];
				echo "</td>";
				echo "<td>";
				echo $item['receiver'];
				echo "</td>";
				echo "<td>";
				echo $item['amount'];
				echo "</td>";
				echo "<td>";
				echo $item['transitionTime'];
				echo "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else
		{
			echo "No history found.";
		}
	}
	
?>
