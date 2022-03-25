<?php

include ("db.php");

if (isset($_POST['save_task'])){

	$name =$_POST['name'];
	$last_name =$_POST['last_name'];
	$identity_document=$_POST['identity_document'];
	$address =$_POST['address'];
	$phone =$_POST['phone'];
	$photos=addslashes(file_get_contents($_FILES['photos']['tmp_name']));

//query para ingresar un nuevo empleado
	
	$query="INSERT INTO data_employees(name,last_name,identity_document,address,phone,photos)VALUES ('$name','$last_name','$identity_document','$address','$phone','$photos')";

	$result=mysqli_query($conexion,$query);

	if (!$result){
		die("query failed");
	}
 
  	$_SESSION['message'] ='saved succesfully';
 	$_SESSION['message_type']='success';

	header("location: index.php");
}

?>