<?php

include("db.php");

if(isset($_GET['id'])){

	$id=$_GET['id'];
 	$query="Select * from data_employees where id=$id";
 	$result=mysqli_query($conexion,$query);
 	if(mysqli_num_rows($result)==1){
 		$row=mysqli_fetch_array($result);
 		$name =$row['name'];
 		$last_name =$row['last_name'];
 		$identity_document =$row['identity_document'];
 		$address =$row['address'];
 		$phone =$row['phone'];

 	}
}

if (isset($_POST['update'])){
  	$id=$_GET['id'];
  	$name=$_POST['name'];
  	$last_name=$_POST['last_name'];
  	$identity_document=$_POST['identity_document'];
  	$address=$_POST['address'];
  	$phone=$_POST['phone'];
  	$photos=addslashes(file_get_contents($_FILES['photos']['tmp_name']));

  	$query="update data_employees set name ='$name',last_name='$last_name',identity_document='$identity_document',address='$address',phone='$phone',photos='$photos' where id=$id";
  	
  	mysqli_query($conexion,$query);

  	$_SESSION['message']='Updated succesfully';
   	$_SESSION['message_type']='warning';	
  	header("location: index.php");
}
?>


<?php include("includes/header.php") ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="update name">
					</div></br>
					<div class="form-group">
						<input type="text" name="last_name" value="<?php echo $last_name; ?>" class="form-control" placeholder="update last name">
					</div>
					</br>
					<div class="form-group">
						<input type="text" name="identity_document" value="<?php echo $identity_document; ?>" class="form-control" placeholder="update identity document">
					</div>
					</br>
					<div class="form-group">
						<input type="text" name="address" value="<?php echo $address; ?>" class="form-control" placeholder="update address">
					</div>
					</br>
						<div class="form-group">
						<input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control" placeholder="update phone">
					</div>
				 	</br>
					<div>
						<td><center><img height="70px" src="data:image/jpg;base64,<?php echo base64_encode($row['photos']); ?>"/></center></td>
					</div>
					<br>

 				 	<div class="form-group">
 					 	<label for="Photo" class="col-sm-2 control-label">Photo</label>
 					 	<input type="file" required class="form-control" name="photos" accept="image/*">
 				 	</div>
 				
					</br>

					<button class="btn btn-success" name="update">
						Update
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include("includes/footer.php") ?>
