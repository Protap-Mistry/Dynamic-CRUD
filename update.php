<?php 
	include 'include/header.php';

	include 'crud_process/employee.php';

	$loop_var= new Employee();

	//update data portion
				if(isset($_POST['update']))
				{
					$id= $_POST['id'];
					$name= $_POST['name'];
					$email= $_POST['email'];
					$phone= $_POST['phone'];

					$loop_var->setName($name);
					$loop_var->setEmail($email);
					$loop_var->setPhone($phone);

					if($loop_var->updateInfo($id))
					{
						echo "<span style='color: green; font-weight: bold;'> Data updated successfully... </span>";
					}
					else
					{
						echo "<span style='color: red; font-weight: bold;'> Data updated unsuccessfully... </span>";
					}

				}

?>


	<div class="panel panel-default">

		<div class="panel-heading">

			<h2>Update Employee Details
				<a href="index.php" class="pull-right btn btn-primary">Back</a>

			</h2>

		</div>

		<div class="panel-body">

			<?php

				if(isset($_GET['action']) && $_GET['action']=='update')
				{
					$id= (int)$_GET['id'];

					$result= $loop_var->helpToUpdate($id);
				
			?>
	

			<form action="update.php" method="post" accept-charset="utf-8">

				<div class="form-group">

					<label for="for_name">Employee Name</label>
					<input type="text" name="name" id="for_name" value="<?php echo $result['name']; ?>" required="1" class="form-control">

				</div>
				<div class="form-group">

					<label for="for_email">Employee E-mail</label>
					<input type="text" name="email" id="for_email" value="<?php echo $result['email']; ?>" required="1" class="form-control">

				</div>
				<div class="form-group">

					<label for="for_phone">Employee Phone Number</label>
					<input type="text" name="phone" id="for_phone" value="<?php echo $result['phone']; ?>" required="1" class="form-control">

				</div>
				<div class="form-group">

					<input type="hidden" name="id" value="<?php echo $result['id'] ?>">
					<input type="hidden" name="action" value="update">
					<input type="submit" name="update" value="Update" class="btn btn-success">
					<input type="reset" name="reset" value="Clear" class="btn btn-warning">

				</div>
					
			</form>

			<?php
				}
			?>

		</div>

	</div>

<?php include 'include/footer.php'; ?>	
