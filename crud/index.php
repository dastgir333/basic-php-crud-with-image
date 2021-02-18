<?php
include('config.php');

if(isset($_POST['insertBtn'])){
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$class = $_POST['class'];
	$image_name = $_FILES['image']['name'];
	$image_temp_name = $_FILES['image']['tmp_name'];
	$image_type = $_FILES['image']['type'];
	$image_size = $_FILES['image']['size'];
	$folder = "images/";

	if(strtolower($image_type)== "image/jpg" || strtolower($image_type)=="image/jpeg" || strtolower($image_type)== "image/png"){

		if($image_size <=1000000)
		{
          $folder =$folder.$image_name;

          $query = "insert into student(name,gender,age,class,image_path) values('$name','$gender','$age','$class','$folder')";
          $result = mysqli_query($conn,$query);

          if($result)
          {
          	echo "file uploaded";
          	move_uploaded_file($image_temp_name,$folder);
          	echo "<script>location.href='view.php'</script>";
          }else{

           echo "failed to upload";

          }


		}else{

			echo "<script>alert('Image size not suported');
		window.location.htrf='index.php'</script>";


		}


	}else{
		echo "<script>alert('Image Format not suported');
		window.location.htrf='index.php'</script>";


		

	}

}


?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
	
	<input type="text" name="name" placeholder="Enter Your Name" required>
	<label>Gender</label>
	<select name="gender" required>
		<option value="">Select Gender</option>
		<option value="male">Male</option>
		<option value="female">Female</option>
  	</select>
  	<input type="number" min="3" max="30" name="age" placeholder="Enter Your Age" required>
    <input type="number" name="class" placeholder="Enter Your Class" required>
    <input type="file" name="image">

    <input type="submit" value="Insert" name="insertBtn" required>

	
</form>
</body>
</html>