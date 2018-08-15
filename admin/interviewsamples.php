<?php
 	include './includes/header.php';
	$allqa = $functions->getAllQa();
	$allcompanydepos = $functions->getAllCompanyTypes();
?>


<div class="col-md-12">
	<div class="row">
		<div class="col-md-12">
			<div class="content-box-header">
				<div class="panel-title">Add Sample Interview Questions</div>
			</div>
			<div class="content-box-large box-with-header">

				<form class="" action="index.html" method="post">
						<div class="form-group">
							<label>Question</label>
							<input required type="text" name="Question" class="form-control" placeholder="Enter question">
						</div>
						<div class="form-group">
							<label>Answers</label>
							<textarea required name="answers" rows="5" placeholder="Enter Answer" cols="80" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>For Department</label>
							<select required class="form-control" name="department">
								<option value="">Please select department</option>
								<option value=""></option>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-default" type="submit">Submit</button>
						</div>
				</form>

			<br /><br />
		</div>
		</div>
	</div>
	</div>

	<?php foreach ($allqa as $qa) {
			$id = $companytype['id'];
			$question = $companytype['question'];
			$answer = $companytype['answer'];
			$comapnytypeid = $qa['companydepartment'];
			$companytype = $functions->getCompanyTypesById($comapnytypeid);
		?>


							  		<div class="col-md-6">
							  			<div class="row">
							  				<div class="col-md-12">
							  					<div class="content-box-header">
								  					<div class="panel-title"><?=$companytype?></div>
														<div class="panel-options">
															<i data-toggle="modal" data-target="#editQAmodal" data-qaid="<?=$id?>" data-qaquest="<?=$question?>" data-qaans="<?=$answer?>" data-qadepo="<?=$companytype?>" class="editQAbtn fa fa-pencil"></i>
															<i data-toggle="modal" data-target="#delQAmodal" data-qaid="<?=$id?>" class="delQAbtn fa fa-trash"></i>
														</div>
									  			</div>
									  			<div class="content-box-large box-with-header">
														<div class="interviewquestionadmin">
														<span class="qaspan">QUS : &nbsp;</span><?=$question?>
														</div>
														<div class="interviewansweradmin">
															<span class="qaspan">ANS : &nbsp;</span>	<br>
															<?=$answer?>
														</div>
													</div>
							  				</div>
							  			</div>
							  		</div>

	<?php } ?>


		  	</div>
				</div>


				<!-- Modals -->
				<div class="modal fade" id="editQAmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content custommodal">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Edit Department</h4>
				      </div>
				      <div class="modal-body">
	              <form class="" action="../actions.php?action=updateQA" method="post">
	                <input required type="text" name="editQAid" class="form-control custom-field editQAid hidden">
	  							<input required type="text" name="editQAquestion" class="form-control custom-field editQAquestion">
									<textarea name="editQAanswer" rows="8" cols="80" class="form-control editQAanswer"></textarea>
									<select class="form-control" name="editQADepo">
										<option value="">Select Department</option>
										<option value="">Select Department</option>
									</select>
									<button type="submit" class="btn btn-default btn-custom">Update Department</button>
	              </form>
	            </div>
				    </div>
				  </div>
				</div>

				<div class="modal fade" id="delQAmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content custommodal">
				      <div class="modal-body text-center">
								<h4 class='text-center'>Do you really want to delete this ?</h4>
	              <form class="" action="../actions.php?action=deleteQA" method="post">
	                   <input required type="text" name="delQaId" class="form-control custom-field delQAid hidden">
				             <button type="submit" class="btn btn-default btn-custom">Delete Department</button>
	              </form>
				      </div>
				    </div>
				  </div>
				</div>



<?php include './includes/footer.php'; ?>
