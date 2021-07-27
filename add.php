<?php 

include 'include/header.php';
include 'crud_process/employee.php';

 ?>

 <?php
	
				$loop_var= new Employee();

				//insert data portion
				if(isset($_POST['submit']))
				{
					$name= $_POST['name'];
					$email= $_POST['email'];
					$phone= $_POST['phone'];

					$loop_var->setName($name);
					$loop_var->setEmail($email);
					$loop_var->setPhone($phone);

					if($loop_var->insertInfo())
					{
						echo "<span style= 'color: green; font-weight: bold;'> Data inserted successfully... </span>";
					}
					else
					{
						echo "<span style= 'color: red; font-weight: bold;'> Data inserted unsuccessfully... </span>";
					}
				}
	?>
	
	<div class="panel panel-default">

		<div class="panel-heading">

			<h2>Insert Into Employee List 
				<a href="index.php" class="pull-right btn btn-primary">Back</a>

			</h2>

		</div>

		<div class="panel-body">

			<form action="add.php" method="post" accept-charset="utf-8">

				<div class="form-group">

					<label for="for_name">Employee Name</label>
					<input type="text" name="name" id="for_name" required="1" class="form-control">

				</div>
				<div class="form-group">

					<label for="for_email">Employee E-mail</label>
					<input type="text" name="email" id="for_email" required="1" class="form-control">

				</div>
				<div class="form-group">

					<label for="for_phone">Employee Phone Number</label>
					<input type="text" name="phone" id="for_phone" required="1" class="form-control">

				</div>
				<div class="form-group">

					
					<input type="submit" name="submit" value="Insert" class="btn btn-success">
					<input type="reset" name="reset" value="Clear" class="btn btn-warning">

				</div>
					
			</form>

		</div>

	</div>

<?php include 'include/footer.php'; ?>	
