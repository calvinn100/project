<?php
  include './includes/header.php';
  $alltypes = $functions->getAllApprovedCollegeTypes();
?>




		  		<div class="col-md-12">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Work Types</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
                    <form action="../actions.php?action=addCollegeType" method="post">
                        <input required type="text" name="type" placeholder="Enter College Type" class="form-control">
                        <input required type="text" name="status" value="approved" class="hidden form-control">
    										<br>
    										<button type="submit" class="btn btn-default" name="button">Add Company Type</button>
                    </form>
										<table class="text-center table table-bordered" style="margin-top:15px">
											<tr>
												<td>#</td>
                        <td>Types</td>
  											<td>Operations</td>
											</tr>
                    <?php
                      $slno = 1;
                      foreach ($alltypes as $types) {
                        $id = $types['id'];
                        $companydepartment = $types['department'];
                        $departmentname = $functions->getApprovedDepartmentById($companydepartment);
                        $departmentname = $departmentname[0]['name'];
                        $companytypes = $types['name'];
                        $status = $types['status'];
                     ?>
											<tr>
												<td><?=$slno++?></td>
                        <td><?=$companytypes?></td>
                        <td><?=$departmentname?></td>
												<td><?=$status?></td>
												<td>
													<i class="glyphicon glyphicon-pencil editdepobtn" data-id="<?=$id?>" data-department="<?=$companytypes?>" data-target="#editcompanytype" data-toggle="modal"></i>
													<i class="glyphicon glyphicon-trash deletectypebtn" data-id="<?=$id?>" data-target="#deletecompanytypesmodal" data-toggle="modal"></i>
                          <?php if($status !== 'approved') { ?>
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
			<div class="modal fade" id="editdepomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content custommodal">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Edit Company Type</h4>
			      </div>
			      <div class="modal-body">
              <form class="" action="../actions.php?action=updatedepo" method="post">
                <input required type="text" name="depoid" class="form-control custom-field depoideditfield hidden">
  							<input required type="text" name="department" class="form-control custom-field deponameeditfield">
  			        <button type="submit" class="btn btn-default btn-custom">Update Company type</button>
              </form>
            </div>
			    </div>
			  </div>
			</div>

			<div class="modal fade" id="deletecompanytypesmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content custommodal">
			      <div class="modal-body text-center">
							<h4 class='text-center'>Do you really want to delete this ?</h4>
              <form class="" action="../actions.php?action=deletedepo" method="post">
                   <input required type="text" name="depoid" class="form-control custom-field depoiddelfield hidden">
			             <button type="submit" class="btn btn-default btn-custom">Delete Department</button>
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
