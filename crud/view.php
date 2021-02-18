<?php
include('config.php');

$query = "select * from student";

$result = mysqli_query($conn,$query);

$total_rows = mysqli_num_rows($result);

if($total_rows!=0){
	?>

	<div class="container" width="100">

		<h1 style="text-align: center;"><a href="index.php">Add Records</a></h1>

	</div>

	<table border="1" style="width: 100%">

		<thead>
			<tr>
				<th>ID</th>
				<th>NAME</th>
				<th>GENDER</th>
				<th>AGE</th>
				<th>CLASS</th>
				<th>IMAGE</th>
				<th>EDIT</th>
				<th>DELETE</th>
			</tr>
		</thead>
       <tbody>

       	
       


	<?php

	while($row = mysqli_fetch_array($result)){?>

		<tr>

			<td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            
            <td><img src='<?php echo $row[5]; ?>'></td>
            <td><a href="update.php?id=<?php echo $row[0];?>">EDIT</a></td>
            <td><a href="delete.php?id=<?php echo $row[0];?>" onclick="return Confirmation()">DELETE</a></td>


              








		</tr>



<?php
	}

}else{

	echo "No Rows Found";
}








?>

</tbody>

</table>

<script>
	function Confirmation(){
		return confirm('Are u sure to Delete Data?');
		
	}

	</script>