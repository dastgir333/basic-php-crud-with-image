<?php

include('config.php');

$id = $_GET['id']??"";

$query = "select * from student where id='$id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php


	?>


	<form action="" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
	<input type="text" name="name" value="<?php echo $row[1]; ?>">
	
	<label>Gender</label>
	<select name="gender" required>
		<?php
		if($row[2]== "male")
		{
			echo"<option value=''>Select Gender</option>";
			echo"<option value='male'selected>Male</option>";
			echo"<option value='female'>Female</option>";
		}else{

			echo"<option value=''>Select Gender</option>";
			echo"<option value='male'>Male</option>";
			echo"<option value='female' selected>Female</option>";

		}




		?>
		<!-- <option value="">Select Gender</option>
		<option value="male">Male</option>
		<option value="female">Female</option> -->
  	</select>
  	<input type="number" min="3" max="30" name="age" value="<?php echo $row[3]; ?>">
    <input type="number" name="class" value="<?php echo $row[4]; ?>">

    <?php

    if($row[5]!="" && $row[5]!=null){?>
       <img style="width:100px;height:100px" src='<?php echo $row[5]; ?>'>
   
   <?php 	
    }


    ?>
    <input type="hidden" name="oldImage" value="<?php echo $row[5]; ?>">

    <input type="file" name="image">

    <input type="submit" value="Update" name="updateBtn" required>

	
</form>


<?php

if(isset($_POST['updateBtn'])){
	$id = $_POST['id'];
		$name = $_POST['name'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$class = $_POST['class'];
	$oldImage = $_POST['oldImage'];
	$image_name = $_FILES['image']['name'];
	$image_temp_name = $_FILES['image']['tmp_name'];
	$image_type = $_FILES['image']['type'];
	$image_size = $_FILES['image']['size'];
	$folder = "images/";

	if(is_uploaded_file($_FILES['image']['tmp_name']))
	{
		// echo "file given";
	

	if(strtolower($image_type)== "image/jpg" || strtolower($image_type)=="image/jpeg" || strtolower($image_type)== "image/png"){

		if($image_size <=1000000)
		{
          $folder =$folder.$image_name;

          $query = "update student set name='$name', gender='$gender', age='$age', class='$class', image_path='$folder' where id='$id'";
          $result = mysqli_query($conn,$query);

          if($result)
          {
          	echo "file uudateded successfully";
          	unlink($oldImage);
          	move_uploaded_file($image_temp_name,$folder);
          	echo "<script>location.href='view.php' </script";
          }else{

           echo "failed to update upload";

          }


		}else{

			echo "<script>alert('Image size not suported');
		   </script>";


		}


	}else{
		echo "<script>alert('Image Format not suported');
		window.location.htrf='update.php'</script>";


		

	}



	}else{
		// echo "file not given";

		$query = "update student set name='$name', gender='$gender', age='$age', class='$class' where id='$id'";
          $result = mysqli_query($conn,$query);

          if($result)
          {
          	echo "<script>alert('Updated successfully');
		   </script>";
		   echo "<script>location.href='view.php' </script>";
          	move_uploaded_file($image_temp_name,$folder);
          }else{

           echo "failed to update upload";

          }


		



	}
}



?>

</body>
</html>