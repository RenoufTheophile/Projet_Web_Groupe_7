<?php
include('db_picture.php');
include('function_picture.php');
$query = '';
$output = array();
$query .= "SELECT * FROM picture ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE picture_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR picture_description LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR likes LIKE "%'.$_POST["search"]["value"].'%" ';

}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY picture_id DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $image;
	$sub_array[] = $row["picture_name"];
	$sub_array[] = $row["picture_description"];
	$sub_array[] = $row["likes"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["picture_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["picture_id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>
