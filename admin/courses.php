<?php
  include './includes/header.php';
  $allcourses = $functions->getAllCoursesInDescendingOrder();
	$alldepartments = $functions->getAllDepartmentsInDescendingOrder();
?>




		  		<div class="col-md-12">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Courses</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
                    <form action="../actions.php?action=addCourse" method="post">
												<label>Departments</label>
												<select class="form-control" name="department" required>
														<option value="">Please Select a Department</option>
														<?php foreach ($alldepartments as $depos) {
															$depoid = $depos['id'];
															$deponames = $depos['name'];
															?>
															<option value="<?=$depoid?>"><?=$deponames?></option>
														<?php } ?>
												</select>
												<br />
												<label>Course</label>
												<input required type="text" name="coursename" placeholder="Enter Course Name" class="form-control">
												<br />
												<label>Select course duration</label>
												<div id="myRadioGroup">

												    Year &nbsp;&nbsp;<input checked='checked' type="radio" name="durationselection"  value="yearduration"  /> &nbsp;&nbsp;&nbsp;&nbsp;
												    Semester &nbsp;&nbsp;<input type="radio" name="durationselection" value="semeseterduration" />

												    <div id="yearduration" class="durationdropdown" style="display: none;">
															<br />
															<select class="form-control" name="courseduration">
																<option value="">Select course duration in years</option>
																<?php for ($i=1; $i <= 6; $i++) { ?>
																	<option value="<?=$i.' years'?>"><?=$i?> Years</option>
																<?php 	} ?>
															</select>
												    </div>
												    <div id="semeseterduration" class="durationdropdown" style="display: none;">
															<br />
															<select class="form-control" name="courseduration">
																<option value="">Select course duration in semesters</option>
																<?php for ($i=1; $i <= 8; $i++) { ?>
																	<option value="<?=$i.' semesters'?>"><?=$i?> Semesters</option>
																<?php 	} ?>
															</select>
												    </div>
												</div>
												<input required type="text" name="insertby" value="admin" class="hidden form-control">
    										<br>
    										<button type="submit" class="btn btn-default">Add Course</button>
                    </form>

										<br>
										<table class="text-center table table-bordered" style="margin-top:15px">
											<tr>
												<td>#</td>
                        <td>Name</td>
												<td>Department</td>
												<td>Inserted By</td>
												<td>Operations</td>
											</tr>
                    <?php
                      $slno = 1;
                      foreach ($allcourses as $courses) {
                        $id = $courses['id'];
                        $coursename = $courses['name'];
												$depoid = $courses['department'];
                        $insertedby = $courses['insertby'];
												$department = $functions->getDepartmentById($depoid);
												$department = $department[0]['name'];
										 ?>
											<tr>
												<td><?=$slno++?></td>
                        <td><?=$coursename?></td>
												<td><?=$department?></td>
												<td><?=$insertedby?></td>
												<td>
													<i class="glyphicon glyphicon-pencil editcoursebtn" data-id="<?=$id?>" data-course="<?=$coursename?>" data-department="<?=$department?>" data-target="#editcoursemodal" data-toggle="modal"></i>
													<i class="glyphicon glyphicon-trash deletecoursebtn" data-id="<?=$id?>" data-target="#deletecoursemodal" data-toggle="modal"></i>
                          <?php if($insertedby !== 'admin') { ?>
                          <i class="glyphicon glyphicon-ok changestatusbtn" data-id="<?=$id?>" data-status="admin" data-target="#changeStatusModal" data-toggle="modal"></i>
                          <?php } ?>
                      	</td>
											</tr>
                      <?php }?>
                    </table>

								</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>


			<!-- Modal -->
			<div class="modal fade" id="editcoursemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content custommodal">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Edit Department</h4>
			      </div>
			      <div class="modal-body">
              <form class="" action="../actions.php?action=updatedepo" method="post">
                <input required type="text" name="courseid" class="form-control custom-field courseidfield">
                <br>
                <select class="form-control" name="department">

                </select>
                <input required type="text" name="department" class="form-control custom-field deponameeditfield">
  			        <button type="submit" class="btn btn-default btn-custom">Update Department</button>
              </form>
            </div>
			    </div>
			  </div>
			</div>

			<div class="modal fade" id="deletecoursemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content custommodal">
			      <div class="modal-body text-center">
							<h4 class='text-center'>Do you really want to delete this ?</h4>
              <form class="" action="../actions.php?action=deleteCourse" method="post">
                   <input required type="text" name="courseid" class="form-control custom-field courseiddelfield hidden">
			             <button type="submit" class="btn btn-default btn-custom">Delete Course</button>
              </form>
			      </div>
			    </div>
			  </div>
			</div>

			<div class="modal fade" id="changeStatusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content custommodal">
			      <div class="modal-body text-center">
							<h4 class=''>Do you really want to change this ?</h4>
              <form class="" action="../actions.php?action=changeStatus" method="post">
                  <input required type="text" name="insertby" class="form-control custom-field depoinsertbyfield hidden">
    							<input required type="text" name="id" class="form-control custom-field depoidfield hidden">
    			        <button type="submit" class="btn btn-default btn-custom">Change Status</button>
              </form>
			      </div>
			    </div>
			  </div>
			</div>



<?php include './includes/footer.php'; ?>
