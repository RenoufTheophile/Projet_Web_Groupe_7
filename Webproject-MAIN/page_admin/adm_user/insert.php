<?php
include('db.php');
include('function.php');
$first_name = isset($_POST['first_name'])?$_POST['first_name']:'';
$last_name  = isset($_POST['last_name'])?$_POST['last_name']:'';
$email			= isset($_POST['email'])?$_POST['email']:'';
$role			= isset($_POST['role'])?$_POST['role']:'';
$campus			= isset($_POST['campus'])?$_POST['campus']:'';
$cart		= isset($_POST['cart'])?$_POST['cart']:'';
$password   = isset($_POST['password'])?$_POST['password']:'';
$id 				= isset($_POST['user_id'])?$_POST['user_id']:'';
$id2 				=isset($_POST['id'])?$_POST['id']:'';

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $connection->prepare('
			INSERT INTO user (id, first_name, last_name, email, role, campus, cart, password)
			VALUES (NULL, :first_name, :last_name, :email, :role, :campus, :cart , :password)
		');
		$result = $statement->execute(
			array(
				'first_name'	=> $first_name,
				'last_name'	=> $last_name,
				'email'      => $email,
		    'role'     => $role,
		    'campus'     => $campus,
		    'cart'    => $cart,
				'password'   => $password));

		if(!empty($result))
		{
			echo 'Data Inserted';
		}

	}
	if($_POST["operation"] == "Edit")
	{

		$statement = $connection->prepare(
			'UPDATE user
			SET first_name = :first_name, last_name = :last_name, email = :email , role = :role, campus = :campus, cart = :cart, password = :password
			WHERE id = :id
			'
		);
		$result = $statement->execute(
			array(
				':first_name'	=> $first_name,
				':last_name'	=> $last_name,
				':email'      => $email,
		    ':role'     => $role,
		    ':campus'     => $campus,
		    ':cart'    => $cart,
		    ':password'   => $password,
				':id'         => $id)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>
