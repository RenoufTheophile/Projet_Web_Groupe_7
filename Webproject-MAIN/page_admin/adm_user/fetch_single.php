<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM user
		WHERE id = '".$_POST["user_id"]."'
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["first_name"] = $row["first_name"];
		$output["last_name"] = $row["last_name"];
		$output["email"] = $row["email"];
	  $output["role"] = $row["role"];
	  $output["campus"] = $row["campus"];
	  $output["cart"] = $row["cart"];
	  $output["password"] = $row["password"];
	}
	echo json_encode($output);
}
?>
