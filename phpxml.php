<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<div class="col-md-2"></div>
	<div class="col-md-8 well" style="margin-top:20px;">
		<h3 class="text-primary">PHP XML CRUD</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-4">
			<form method="POST" action="insert.php">
				<div class="form-group">
					<label>Member ID</label>
					<input type="text" class="form-control" name="mem_id" required="required"/>
				</div>
				<div class="form-group">
					<label>Firstname</label>
					<input type="text" class="form-control" name="firstname" required="required"/>
				</div>
				<div class="form-group">
					<label>Lastname</label>
					<input type="text" class="form-control" name="lastname" required="required"/>
				</div>
				<div class="form-group">
					<label>Address</label>
					<input type="text" class="form-control" name="address" required="required"/>
				</div>

				<center><button class="btn btn-primary" name="insert">Insert</button></center>
			</form>
		</div>
		<div class="col-md-8">
			<table class="table table-bordered" >	
				<thead class="alert-info">
					<tr>
						<th>Member ID</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Address</th>
						<th>Action</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				
					<?php
						$xml = simplexml_load_file('member.xml');
						foreach($xml->member as $member){
						?>
								<tr>
									<td><?php echo $member->mem_id?></td>
									<td><?php echo $member->firstname ?></td>
									<td><?php echo $member->lastname ?></td>
									<td><?php echo $member->address ?></td>
									<td><a href="#edit_<?php echo $member->mem_id; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                            <div class="modal fade" id="edit_<?php echo $member->mem_id; ?>" role="dialog" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<form method="POST" action="update.php">
											<div class="modal-header">
												<center><h4 class="modal-title" id="myModalLabel">Edit Member</h4></center>
											</div>
											<div class="modal-body">
												<div class="col-md-2"></div>
												<div class="col-md-8">
													<div class="form-group">
														<label >Member ID</label>
														<input type="text" class="form-control" name="id" value="<?php echo $member->mem_id; ?>" readonly="readonly" />
													</div>
													<div class="form-group">
														<label >Firstname:</label>
														<input type="text" class="form-control" name="firstname" value="<?php echo $member->firstname; ?>">
													</div>
													<div class="form-group">
														<label>Lastname:</label>
														<input type="text" class="form-control" name="lastname" value="<?php echo $member->lastname; ?>">
													</div>
													<div class="form-group">
														<label>Address:</label>
														<input type="text" class="form-control" name="address" value="<?php echo $member->address; ?>">
													</div>
												</div>
											</div>
											<br style="clear:both;"/>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
												<button name="edit" class="btn btn-warning"><span class="glyphicon glyphicon-save"></span>Update</a>
											</div>
									<td><a href="#delete_<?php echo $member->mem_id; ?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a></td>
					</tr>
<div class="modal fade" id="delete_<?php echo $member->mem_id; ?>" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete Information</h4>
			</div>
			<div class="modal-body">	
				<center><h3 class="text-danger">Are you sure you want to Delete this record?</h3></center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
				<a href="delete.php?id=<?php echo $member->mem_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
			</div>

		</div>
	</div>
</div>

								</tr>
						<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>	
</html>