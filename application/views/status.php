<!DOCTYPE html>
<html>
	<?php include CURR_VIEW_PATH.'templates/header.php'; ?>
	<body>
		<div id="main">
			<?php include CURR_VIEW_PATH.'templates/top_bar.php'; ?>
			
				<h2 style="text-align:center;margin-top: 10px;">Employee Status Dashboard - 
					<?php if ($_SESSION['team_name'] == "business_solutions"){
							echo "Business Solutions";}
						else{
							echo "Business Improvement";
						}
					?>
				</h2>
			<div class="container">
			    <div class="row employees">
					<div class="col-sm-2">made some changes</div>
					<div class="col-sm-2">Name</div>
					<div class="col-sm-2">Status</div>
					<div class="col-sm-2">All Day</div>
					<div class="col-sm-2">Location</div>
					<div class="col-sm-2">Date Out</div>
					<div class="col-sm-2">Date In</div>
				</div>
				<div class="row">
					<?php foreach ($employees as $e) { ?>
						<div id="<?php echo $e['id'] ?>">
							<div class="col-sm-2"><?php echo $e['name'] ?></div>
							<div class="col-sm-2">
								<label class="switch">
									<input id="status-<?php echo $e['id'] ?>" type="checkbox" <?php if ($e['status']) { echo "checked"; } ?> disabled><span class="slider round"></span>
								</label>
							</div>
							<div class="col-sm-2">
							    <input id="all_day-<?php echo $e['id'] ?>" type="checkbox" disabled <?php if ($e['all_day']) { echo "checked"; } ?> >								  
							</div>
							<div class="col-sm-2">
								<p><?php echo $e['location'] ?></p>
							</div>
							<div class="col-sm-2">
								<?php 
									if(isset($e['date_out'])) {
										echo date_format(date_create($e['date_out']), "d/m/Y");
									} else { echo null;}
								?>
							</div>
							<div class="col-sm-2">
								<?php 
									if(isset($e['date_in'])) {
										echo date_format(date_create($e['date_in']), "d/m/Y");
									}
								?>
							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-success btn-xs updateBtn" data-toggle="modal" data-target="#updateModal" id="<?php echo $e['id'] ?>" empName="<?php echo $e['name'] ?>" empLocation="<?php echo $e['location'] ?>" empStatus="<?php echo $e['status'] ?>" empAllDay="<?php echo $e['all_day'] ?>" empDateOut="<?php echo date_format(date_create($e['date_out']), "d/m/Y") ?>" empDateIn="<?php echo date_format(date_create($e['date_in']), "d/m/Y") ?>">
										<span class="glyphicon glyphicon-edit"></span> Update
								</button>
							</div>
						</div>
					<?php } ?>
				</div>
				</br>
				</br>
				<h3 style="text-align:center;margin-top: 10px;">Absent Employees</h3>
				<div class="row employees">
					<div class="col-sm-2">Name</div>
					<div class="col-sm-2">Status</div>
					<div class="col-sm-2">All Day</div>
					<div class="col-sm-2">Location</div>
					<div class="col-sm-2">Date Out</div>
					<div class="col-sm-2">Date In</div>
				</div>
				<div class="row">
					<?php foreach ($absentEmployees as $e) { ?>
						<div id="<?php echo $e['id'] ?>">
							<div class="col-sm-2"><?php echo $e['name'] ?></div>
							<div class="col-sm-2">
								<label class="switch">
									<input id="status-<?php echo $e['id'] ?>" type="checkbox" 
											<?php if ($e['status']) { echo "checked"; } ?> disabled>
								  			<span class="slider round"></span>
								</label>
							</div>
							<div class="col-sm-2">
							    <input id="all_day-<?php echo $e['id'] ?>" type="checkbox" disabled
								 	<?php if ($e['all_day']) { echo "checked"; } ?> >								  
							</div>
							<div class="col-sm-2">
								<p><?php echo $e['location'] ?></p>
							</div>
							<div class="col-sm-2">
								<?php 
									if(isset($e['date_out'])) {
										echo date_format(date_create($e['date_out']), "d/m/Y");
									}
								?>
							</div>
							<div class="col-sm-2">
								<?php 
									if(isset($e['date_in'])) {
										echo date_format(date_create($e['date_in']), "d/m/Y");
									}
								?>
							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-success btn-xs updateBtn" data-toggle="modal" data-target="#updateModal" id="<?php echo $e['id'] ?>" empName="<?php echo $e['name'] ?>" empLocation="<?php echo $e['location'] ?>" empStatus="<?php echo $e['status'] ?>" empAllDay="<?php echo $e['all_day'] ?>" empDateOut="<?php echo date_format(date_create($e['date_out']), "d/m/Y") ?>" empDateIn="<?php echo date_format(date_create($e['date_in']), "d/m/Y") ?>">
									<span class="glyphicon glyphicon-edit"></span> Update
								</button>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h3 class="modal-title" id="exampleModalLabel">Update Status</h3>
			      </div>
			      <div class="modal-body">
			      	<form action="index.php?c=Employee&a=updateEmployee" id="updateEmployeeForm" method="post">
			      	  <input type="hidden" id="empID" name="id">
			      	  <div class="form-group row">
			      	    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
			      	    <div class="col-sm-10">
			      	       <span id="empName"></span>
			      	    </div>
			      	  </div>
			      	  <div class="form-group row">
			      	    <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
			      	    <div class="col-sm-10">
							<label class="switch">
					 			<input id="empStatus" type="checkbox" name = "status" value ="off" >
					  			<span class="slider round"></span>
							</label>
			      	    </div>
			      	  </div>
			      	  <div class="form-group row">
			      	    <label for="inputPassword" class="col-sm-2 col-form-label">Location</label>
			      	    <div class="col-sm-10">
							<select id="empLocation" class="form-control locationBox" style="width:250px;" name="location">
								<?php foreach ($locations as $key => $value) { ?>
									<option value="<?php echo $value ?>"
										<?php if($e['location'] == $value) { echo "selected"; } ?> >
										<?php echo $value ?>
									</option>
								<?php } ?>
							</select>
			      	    </div>
			      	  </div>
			      	  <div class="form-group row">
			      	    <label for="inputPassword" class="col-sm-2 col-form-label">All Day</label>
			      	    <div class="col-sm-10">
							<input id="empAllDay" type="checkbox" name = "all_day" value= "yes">			
			      	    </div>
			      	  </div>
			      	  <div class="form-group row" id = "date_out_container">
			      	    <label for="inputPassword" class="col-sm-2 col-form-label">Date Out</label>
			      	    <div class="col-sm-10">
							<input id="empDateOut" type="text" class= datepicker name = "date_out">			
			      	    </div>
			      	  </div>
			      	  <div class="form-group row" id = "date_in_container">
			      	    <label for="inputPassword" class="col-sm-2 col-form-label">Date In</label>
			      	    <div class="col-sm-10">
							<input id="empDateIn" type="text" class= datepicker name = "date_in">		
			      	    </div>
			      	  </div>				      	  				      	  			      	  
			      	</form>
			        
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary" id="saveBtn">Save</button>
			      </div>
			    </div>
			  </div>
			</div>
			<div class="row">
				<div class="footer col-sm-12">
	  				<span><i>- by Business Solutions Team - IM</i></span>
				</div>
			</div>
		</div>
	</body>
</html>