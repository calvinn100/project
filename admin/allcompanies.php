<?php
  include './includes/header.php';
  $allcompanies = $functions->getAllCompanies('DESC');
	function companydata($type,$phone,$email) {?>
		<div class="col-xs-12 nopadding">
			<div class="col-xs-2">Type</div><div class="col-xs-1 text-center">:</div><div class="col-xs-8"><?=$type?></div>
			<div class="col-xs-2">Phone</div><div class="col-xs-1 text-center">:</div><div class="col-xs-8"><?=$phone?></div>
			<div class="col-xs-2">Email</div><div class="col-xs-1 text-center">:</div><div class="col-xs-8"><?=$email?></div>
		</div>
<?php }


?>

<style media="screen">
	.btn {
font-size:12px;padding:2px 3px;
}

.modal-content{
border-radius: 0px;
}
</style>


<?php foreach ($allcompanies as $companies) {
	$name = $companies['name'];
	$desc = $companies['companydescription'];
	$proof = $companies['proof'];
	$depos = $companies['departments'];
	$worktypeids = $companies['worktypes'];
	$phone = $companies['phone'];
	$email = $companies['email'];
	$status = $companies['status'];
	$location = $companies['hqlocation'];
	$latitude = $companies['hqlatitude'];
	$longitude = $companies['hqlongitude'];
	$depos = explode(',', $depos);

?>

	  		<div class="col-md-4" style="height: 300px;padding-bottom: 0px">

								  			<div class="content-box-large">
								  				<div class="panel-heading">
													<div class="panel-title"><?=$name?></div>
												</div>
								  				<div class="panel-body">
														<?php
															companydata('IT', 'jas@sa.c','+941 9542542');
														?>
														<div class="col-xs-12" style="padding: 20px 0 0;">
															<div class="col-xs-4"><a href="#" class="companymorebtn"  data-toggle="modal" data-target="#companiesMoreData">View More</a></div>
															<div class="col-xs-4"><a href="#" data-mapurl="https://maps.google.com/maps?q=<?=$latitude?>,<?=$longitude?>&hl=es;z=14&amp;output=embed"  class="companymapbtn" data-latitude="" data-longtitude="" data-toggle="modal" data-target="#companiesViewInMap">View location</a></div>
															<div class="col-xs-4"><a href="#" class="companyproofbtn" data-proof="" data-toggle="modal" data-target="#companiesProof">View proof</a></div>
														</div>
														<div class="col-xs-12" style="padding: 20px 0 0;">
															<div class="col-xs-6">
																<?php if($status !== 'approved') { ?>
																<a href="../actions.php?action=changeStatus&status=approve" style="text-decoration=none;color: #fafafa;">
																	<button type="button" name="button" class="btn btn-success">Approve</button>
																</a>
																<?php  }else{ ?>
																<a href="../actions.php?action=changeStatus&status=block" style="text-decoration=none;color: #fafafa;">
																	<button type="button" name="button" class="btn btn-warning">Block</button>
																</a>
																<?php  } ?>
														</div>
															<div class="col-xs-6">
																<button type="button" name="button" class="btn btn-danger" >Delete</button>
															</div>
														</div>

								  				</div>
								  			</div>
								  		</div>

<?php } ?>



											<div class="modal fade" id="companiesMoreData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											        <h4 class="modal-title" id="myModalLabel">About <span class='headingcompanyname'></span></h4>
											      </div>
											      <div class="modal-body">
															<h4>Company Description</h4>
															<p class="modalcompanydesc"></p>
															<h4>Company Departments</h4>
															<p>
																 (1)&nbsp;&nbsp;Depo Name <br>
																 (1)&nbsp;&nbsp;Depo Name
															</p>
															<h4>Type of works</h4>
															<p>
																 (1)&nbsp;&nbsp;Type 1 <br>
																 (1)&nbsp;&nbsp;Type 2
															</p>
															<h4>Phone</h4>
															<p class="modalphone"></p>
															<h4>Email</h4>
															<p class="modalemail">asd@c.x</p>
															<h4>Address</h4>
															<p class="modaladdrs"></p>
															<h4>City</h4>
															<p class="modalcity"></p>
															<h4>State</h4>
															<p class="modalstate"></p>
															<h4>Country</h4>
															<p class="modalcountry"></p>
															<h4>Status</h4>
															<p class="modalstatus"></p>
											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											      </div>
											    </div>
											  </div>
											</div>

											<div class="modal fade" id="companiesViewInMap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
											      </div>
											      <div class="modal-body">
															<iframe class="mapmodal" src="" height="450" frameborder="0" style="width:100%" allowfullscreen></iframe>      </div>
											        <button style="margin-bottom:5px;margin-left:15px" type="button" class="btn btn-default modalcancelbtn" data-dismiss="modal">Close</button>
											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											        <button type="button" class="btn btn-primary">Save changes</button>
											      </div>
											    </div>
											  </div>
											</div>

											<div class="modal fade" id="companiesProof" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
											      </div>
											      <div class="modal-body">
											        <img src="" alt="">
											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											        <button type="button" class="btn btn-primary">Save changes</button>
											      </div>
											    </div>
											  </div>
											</div>


<?php include './includes/footer.php'; ?>
