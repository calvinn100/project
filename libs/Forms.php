<?php

require_once('Common.php');
class Forms extends Common {

	public function companyRegistrationForm() {
		$pagelocandsize = $this->assignActionPageLocation();
		$actionpath = $pagelocandsize[0];
		$size = $pagelocandsize[1];
		$currentpage = $pagelocandsize[2];
		$typeofuser = $pagelocandsize[3];
		if($typeofuser === 'admin') {$status='approved';}
		else{$status='pending';}
		$companydepartments = $this->getAllDepartmentsByStatusAndOrder();
		?>
				<div class="col-xs-12 formcontainer">
					<form id="companyform" action="<?=$actionpath?>?action=registerCompany" method="post" enctype="multipart/form-data">

					<input type="text" name="currentpage" value="<?=$currentpage?>"  class="form-control hidden	">
					<input type="text" name="status" value="<?=$status?>"  class="form-control hidden	">

					<div class="form-group">
						<label>Name</label>
						<input required type="text" name="name" placeholder="Enter Company Name" class="form-control">
					</div>
					<div class="form-group">
						<label>company description</label>
						<textarea required name="description" rows="8" cols="80" class="form-control" placeholder="Enter a small description about company"></textarea>
					</div>
					<div class="form-group">
						<label>company proof</label>
						<input required type="file" name="companyproof" class="form-control">
					</div>
					<div class="form-group">
						<label>company display image</label>
						<input required type="file" name="companydp" class="form-control">
					</div>

					<div class="col-xs-12 checkboxmaincontainer">
						<div class="col-xs-12 checkboxheadingdiv"><label>company departments</label></div>
		<?php foreach ($companydepartments as $departments) {
											$deponame = $departments['name'];
											$depoid   = $departments['id']; ?>
						<div class="col-xs-3 checkboxcontainer companydepocheckboxdiv">
							<input data-dname='<?=$deponame?>' data-did='<?=$depoid?>' type="checkbox" class="companydepocheckbox"  name="companydepos[]" value="<?=$depoid?>"> &nbsp;
							<div><?=$deponame?></div>
						</div>
					<?php } ?>

					</div>

					<div class="col-xs-12 checkboxmaincontainer">
						<div class="col-xs-12 checkboxheadingdiv "><label>Works Handling in the company</label></div>
								<?php
								foreach ($companydepartments as $departments) {
										$deponame = $departments['name'];
										$depoid   = $departments['id'];
										$workTypesDivId = $depoid.'_'.$deponame;
							 ?>
								<div class="form-group workstypemaincontainer" id='<?=$workTypesDivId?>'>
									<div class="col-xs-12" style="padding: 25px 0 0;">
											<div class="checkboxheadingdiv" style="opacity:0.5"><label><?=$deponame?></label></div>
									</div>
										<?php
												$companyworktype = $this->getApprovedWorkTypeByDepo($depoid);
												foreach ($companyworktype as $worktype) {
															$worktypeid = $worktype['id'];
															$worktypename = $worktype['name']; ?>
													<div class="col-xs-3 checkboxcontainer workstypecheckboxcontainer">
															<input type="checkbox"  name="worktypes[]" value="<?=$worktypeid?>"> &nbsp;
															<div><?=$worktypename?></div>
													</div>
											<?php } ?>
								</div>
							<?php } ?>
					</div>

					<div class="form-group">
						<label>company phone</label>
						<input required type="text" name="companyphone" placeholder="Enter Company office number" class="form-control">
					</div>

					<div class="form-group">
						<label>company email</label>
						<input required type="email" name="companyemail" placeholder="Enter Company mail id" class="form-control">
					</div>

					<div class="form-group">
						<label>company full address</label>
						<textarea required name="companyaddress" rows="5" cols="50" style="resize:none" placeholder="Enter full address" class="form-control"></textarea>
					</div>
					<div class="form-group">
				    <label>company hq location</label>
						<?php $this->locationSelectorFieldOnly('hqlocation'); ?>
				</div>
				<div class="form-group">
          <label>city</label>
          <input required readonly placeholder="City" name="city_fieldonly" id="citylocation_fieldonly" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>State</label>
          <input required readonly placeholder="State" name='state_fieldonly' type="text" id="statelocation_fieldonly" class="form-control">
        </div>
        <div class="form-group">
          <label>country</label>
          <input required readonly placeholder="Country" name='country_fieldonly' type="text" id="countrylocation_fieldonly" class="form-control">
        </div>


			<div class="col-xs-12" style="padding: 10px 0 0">
					<div class="form-group">
						<button type="submit" class="btn btn-default" id="companyRegistrationSubmitBtn" name="button">Submit</button>
					</div>
				</div>

			</form>
	</div> <?php 	}

	public function collegeRegistrationForm() {
				$pagelocandsize = $this->assignActionPageLocation();
				$actionpath = $pagelocandsize[0];
				$size = $pagelocandsize[1];
				$currentpage = 'collegeregistration.php';
				$typeofuser = $pagelocandsize[3];
				if($typeofuser === 'admin') {$status='approved';}else{$status='pending';}
				$collegedepartments = $this->getAllDepartmentsByStatusAndOrder();
				$collegetypes = $this->getAllApprovedCollegeTypes();
			?>
				<div class="col-xs-12 formcontainer">
					<form id="collegeform" action="<?=$actionpath?>?action=registercollege" method="post" enctype="multipart/form-data">

					<input required type="text" name="currentpage" value="<?=$currentpage?>"  class="form-control hidden	">
					<input required type="text" name="status" value="<?=$status?>"  class="form-control hidden	">

					<div class="form-group">
						<label>College Name</label>
						<input required type="text" name="name" placeholder="Enter College Name" class="form-control">
					</div>
					<div class="form-group">
						<label>College Type</label>
						<select class="form-control" name="collegetype">
						<option value="">Select College Type</option>
							<?php foreach ($collegetypes as $types) {
												$id = $types['id'];
												$type = $types['type']
										?>
										<option value="<?=$id?>"><?=$type?></option>
							<?php		} ?>
						</select>
					</div>
					<div class="form-group">
						<label>College description</label>
						<textarea required name="description" rows="8" cols="80" class="form-control" placeholder="Enter a small description about College"></textarea>
					</div>
					<div class="form-group">
						<label>College Affliation Copy</label>
						<input required type="file" name="collegeproof" class="form-control">
					</div>
					<div class="form-group">
						<label>College display image</label>
						<input required type="file" name="collegedp" class="form-control">
					</div>
					<div class="form-group">
						<label>College phone</label>
						<input required type="text" name="collegephone" placeholder="Enter College office number" class="form-control">
					</div>
					<div class="form-group">
						<label>College email</label>
						<input required type="email" name="collegeemail" placeholder="Enter College mail id" class="form-control">
					</div>
					<div class="form-group">
						<label>College full address</label>
						<textarea required name="collegeaddress" rows="5" cols="50" style="resize:none" placeholder="Enter full address" class="form-control"></textarea>
					</div>

					<div class="col-xs-12 checkboxmaincontainer">
						<div class="col-xs-12 checkboxheadingdiv"><label>College departments</label></div>
							<?php foreach ($collegedepartments as $departments) {
																$deponame = $departments['name'];
																$depoid   = $departments['id']; ?>
							<div class="col-xs-3 checkboxcontainer collegeDepoCheckBoxDiv">
								<input data-dname='<?=$deponame?>' data-did='<?=$depoid?>' type="checkbox" class="companydepocheckbox"  name="colegedepos[]" value="<?=$depoid?>"> &nbsp;
								<div><?=$deponame?></div>
							</div>
						<?php } ?>
					</div>

					<div class="col-xs-12 checkboxmaincontainer">
						<div class="col-xs-12 checkboxheadingdiv "><label>Courses</label></div>
								<?php
								foreach ($collegedepartments as $departments) {
										$deponame = $departments['name'];
										$depoid   = $departments['id'];
										$courseTypesId = $depoid.'_'.$deponame;
							 ?>
								<div class="form-group workstypemaincontainer" id='<?=$courseTypesId?>'>
									<div class="col-xs-12" style="padding: 25px 0 0;">
											<div class="checkboxheadingdiv" style="opacity:0.5"><label><?=$deponame?></label></div>
									</div>
										<?php
												$courses = $this->getApprovedCoursesInDescendingOrder($depoid);
												foreach ($courses as $course) {
															$courseid = $course['id'];
															$coursename = $course['name']; ?>
													<div class="col-xs-3 checkboxcontainer courseCheckBoxContainer">
															<input type="checkbox"  name="courses[]" value="<?=$courseid?>"> &nbsp;
															<div><?=$coursename?></div>
													</div>
											<?php } ?>
								</div>
							<?php } ?>
					</div>


					<div class="form-group">
						<label>College location</label>
						<?php $this->locationSelectorFieldOnly('collegelocation'); ?>
					</div>

					<div class="form-group">
	          <label>city</label>
	          <input required readonly placeholder="City" name="city_fieldonly" id="citylocation_fieldonly" type="text" class="form-control">
	        </div>
	        <div class="form-group">
	          <label>State</label>
	          <input required readonly placeholder="State" name='state_fieldonly' type="text" id="statelocation_fieldonly" class="form-control">
	        </div>
	        <div class="form-group">
	          <label>country</label>
	          <input required readonly placeholder="Country" name='country_fieldonly' type="text" id="countrylocation_fieldonly" class="form-control">
	        </div>




					<div class="form-group">
						<button id="collegeSubmitBtn" type="submit" class="btn btn-default" name="button">Submit</button>
					</div>

					</form>
				</div>
				<?php }

	public function userRegistrationForm() {
		$pagelocandsize = $this->assignActionPageLocation();
		$actionpath = $pagelocandsize[0];
		$size = $pagelocandsize[1];
		$currentpage = $pagelocandsize[2];
		$typeofuser = $pagelocandsize[3];
		if($typeofuser === 'admin') {$status='approved';}
		else{$status='pending';}
		?>
		<div class="col-xs-12 formcontainer">
			<form action="<?=$actionpath?>?action=registeruser" method="post" enctype="multipart/form-data">

			<input type="text" name="currentpage" value="userregistration"  class="form-control hidden	">
			<input type="text" name="status" value="<?=$status?>"  class="form-control hidden	">

			<div class="form-group">
				<label>Full Name</label>
				<input required type="text" name="name" placeholder="Enter College Name" class="form-control">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input required type="email" name="email" placeholder="Enter College office number" class="form-control">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input required type="text" name="phone" placeholder="Enter College mail id" class="form-control">
			</div>
				<div class="form-group">
					<label>Gender</label>
					<div class="col-xs-12">
						<div class="col-xs-3">Male  <input type='radio' name='gender' value='male' ></div>
						<div class="col-xs-3">Female  <input type='radio' name='gender' value='female' ></div>
					</div>
			</div>
<br>
			<div class="form-group">
				<label>Profile Image</label>
				<input required type="file" name="profilepic" class="form-control">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default" name="button">Submit</button>
			</div>

			</form>
		</div>
		<?php }

	public function knowledgeCenterAddingForm() {
			$pagelocandsize = $this->assignActionPageLocation();
			$actionpath = $pagelocandsize[0];
			$size = $pagelocandsize[1];
			$currentpage = $pagelocandsize[2];
			$typeofuser = $pagelocandsize[3];
			if($typeofuser === 'admin') {$status='approved';}
			else{$status='pending';}
			?>
			<div class="col-xs-12 formcontainer">
				<form action="<?=$actionpath?>?action=registeruser" method="post" enctype="multipart/form-data">

				<input type="text" name="currentpage" value="<?=$currentpage?>"  class="form-control hidden	">
				<input type="text" name="status" value="<?=$status?>"  class="form-control hidden	">

				<div class="form-group">
					<label>Heading</label>
					<input type="text" name="heading" placeholder="Enter Heading" class="form-control">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea name="description" class="form-control" placeholder="Enter a small description" rows="8" cols="80"></textarea>
				</div>
				<div class="form-group">
					<label>File Attachment</label>
					<input type="file" name="fileattachment" class="form-control">
				</div>
				<div class="form-group">
					<label>Profile Image</label>
					<input type="file" name="profilepic" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default" name="button">Submit</button>
				</div>

				</form>
			</div>
		<?php	}

public function userEducationForm($page) {
		$allcolleges =  $this->getAllApprovedColleges();
		$loginid = $_SESSION['id'];
?>
		<form action="../actions.php?action=addusereducation" method="post" enctype="multipart/form-data">
			<div class="form-group hidden">
				<label>User Id</label>
				<input type="text" name="userid" value="<?=$loginid?>" required class="form-control">
			</div>
			<div class="form-group hidden">
				<label>Current Page</label>
				<input type="text" name="currentpage" value="<?=$page?>" required class="form-control">
			</div>
			<div class="form-group">
				<label>College</label>

			<select class="form-control text-capitalize addeducationcolleges"  name="college" required >
				<option value="">Please Select college</option>
					<?php foreach($allcolleges as $colleges){
							$collegeid = $colleges['id'];
							$collegename = $colleges['name'];
 						?>
					<option value="<?=$collegeid;?>"><?php echo $collegename;?></option>
					<?php } ?>
					<option value="other">Other College</option>
			</select>

			</div>
			<div class="form-group">
				<label>Course</label>
				<select class="form-control text-capitalize addeducationcourses" required name="course">
					<option value="">Select the course</option>
				</select>
			</div>
			<div class="form-group">
				<label>Upload Course Certificate</label>
				<input type="file" name="coursecertificate" class="form-control " required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default" name="submit">Submit</button>
			</div>
		</form>
<?php }


}
