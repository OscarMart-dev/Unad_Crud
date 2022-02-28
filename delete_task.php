<?php

include("db.php");

if (isset($_GET['id'])){

	$id=$_GET['id'];

	$query="delete from data_employees where id=$id";
	$result=mysqli_query($conexion,$query);
	if (!$result){

		die("Query failed");
	}

	$_SESSION['message']='Removed succesfully';
	$_SESSION['message_type']='danger';
	header("location: index.php");

}

?>