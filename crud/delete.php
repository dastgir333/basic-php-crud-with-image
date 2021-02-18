<?php

include('config.php');

$id = $_GET['id'];
$query2 = "select * from student where id = '$id'";
$result2 = mysqli_query($conn,$query2);
while($row=mysqli_fetch_array($result2)){
	$img = $row[5];
	unlink($img);
}



$query = "delete from student where id = '$id'";

$result = mysqli_query($conn,$query)or die("query failed");

if($result= true){

	echo "<script>alert('Data Deleted successfully');
		   </script>";

		   echo "<script>location.href='view.php'</script>";
}


?>