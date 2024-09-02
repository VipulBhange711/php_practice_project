<?php include('header.php') ?>
<?php include('database.php') ?>

<h2>ALL STUDENT</h2>
<button type="button" class="btn btn-success offset-10 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
	Add student
</button>

<table class="table table-hover table-bordered table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Age</th>
			<th>Update</th>
			<th>Delete</th>

		</tr>
	</thead>
	<tbody>
		<?php $query = " select *  from `student`";

		$result =  mysqli_query($connection, $query);

		if (!$result) {
			die("query Failed" . mysqli_error());
		} else {
			while ($row = mysqli_fetch_assoc($result)) {

		?>

				<tr>
					<td><?php echo $row['id']; ?> </td>
					<td><?php echo $row['first_name']; ?></td>
					<td><?php echo $row['last_name']; ?></td>
					<td><?php echo $row['age']; ?></td>
					<th> <a	href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">update</a> </th>
					<th> <a	href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a> </th>
				</tr>


		<?php
			}
		}
		?>


	</tbody>

</table>

<!-- Modal -->
<form action="insertdata.php" method="post">
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">First Name</label>
						<input type="text" class="form-control" id="exampleInputEmail1" Name="f_name">
			
					</div>

					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Last Name</label>
						<input type="text" class="form-control" id="exampleInputPassword1" Name="l_name">
					</div>

					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Age</label>
						<input type="text" class="form-control" id="exampleInputPassword1" Name="age">
					</div>
					

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success" value="add student" Name="save_student">Save Student</button>
				</div>
			</div>
		</div>
	</div>
</form>

<?php

 if(isset($_GET['message'])){

	echo "<h6>".$_GET['message']."</h6>";

 }
?>

<?php

 if(isset($_GET['insert_msg'])){

	echo "<h6>".$_GET['insert_msg']."</h6>";

 }
?>

<?php include('footer.php') ?>