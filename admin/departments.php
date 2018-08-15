<?php
  include './includes/header.php';
  $alldepartments = $functions->getAllDepartmentsByStatusAndOrder('admin','DESC');
?>






		  		<div class="col-md-12">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Departments</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
                    <form action="../actions.php?action=addDepartment" method="post">
                        <input required type="text" name="department" placeholder="Enter Department Name" class="form-control">
    										<input required type="text" name="insertby" value="admin" class="hidden form-control">
    										<br>
    										<button type="submit" class="btn btn-default" name="button">Add Department</button>
                    </form>
										<table class="text-center table table-bordered" style="margin-top:15px">
											<tr>
												<td>#</td>
                        <td>Name</td>
												<td>Inserted By</td>
												<td>Operations</td>
											</tr>
                    <?php
                      $slno = 1;
                      foreach ($alldepartments as $departments) {
                        $id = $departments['id'];
                        $depo = $departments['name'];
                        $insertedby = $departments['insertby'];
                     ?>
											<tr>
												<td><?=$slno++?></td>
                        <td><?=$depo?></td>
												<td><?=$insertedby?></td>
												<td>
													<i class="glyphicon glyphicon-pencil editdepobtn" data-id="<?=$id?>" data-department="<?=$depo?>" data-target="#editdepomodal" data-toggle="modal"></i>
													<i class="glyphicon glyphicon-trash deletedepobtn" data-id="<?=$id?>" data-target="#deletedepomodal" data-toggle="modal"></i>
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
			<div class="modal fade" id="editdepomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content custommodal">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Edit Department</h4>
			      </div>
			      <div class="modal-body">
              <form class="" action="../actions.php?action=updatedepo" method="post">
                <input required type="text" name="depoid" class="form-control custom-field depoideditfield hidden">
  							<input required type="text" name="department" class="form-control custom-field deponameeditfield">
  			        <button type="submit" class="btn btn-default btn-custom">Update Department</button>
              </form>
            </div>
			    </div>
			  </div>
			</div>

			<div class="modal fade" id="deletedepomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
