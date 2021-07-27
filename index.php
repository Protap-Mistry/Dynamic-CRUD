<?php 
	
	include 'include/header.php';
	include 'crud_process/employee.php'; 
?>


				<!--delete portion -->
			<?php

				if(isset($_GET['action']) && $_GET['action']=='delete')
				{
					$loop_var= new Employee();

					$id= (int)$_GET['id'];

					if($loop_var->deleteInfo($id))
					{
						echo "<span style='color: green; font-weight: bold;'> Data deleted successfully... </span>";
					}
					else
					{
						echo "<span style='color: red; font-weight: bold;'> Data deleted unsuccessfully... </span>";
					}

				}
			?>	

		<div class="panel panel-default">
			
			<div class="panel-heading">
				<h2> Employee List <a href="add.php" class="pull-right btn btn-info">Add</a></h2>
			</div>

			<div class="panel-body">
			
				<table class="table table-striped">
					<tr>
						<th>Serial</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Action(s)</th>
					</tr>

					<?php

						$db= new Employee();

						$i=0;
						foreach ($db->getInfo() as $key => $value) {
							$i++;
						

					?>

					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['email']; ?></td>
						<td><?php echo $value['phone']; ?></td>
						<td>
							<?php echo "<a href='update.php?action=update&id=".$value['id']."' class='btn btn-info'> Update </a>"; ?>

							<?php echo "<a href='index.php?action=delete&id=".$value['id']."' onclick='return confirm('Sure to delete?')'' class='btn btn-danger'> Delete </a>"; ?>
							
						</td>
					</tr>

					<?php

					}

					?>
				</table>

			</div>

		</div>

<?php include 'include/footer.php'; ?>			