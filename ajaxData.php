<?php
include './libs/Functions.php';
include './libs/Mails.php';
$functions = new Functions();
$mails = new Mails();
$type = $_POST['type'];

if($type === 'changecoursebydepo'){
	$collegeid = $_POST["collegeid"];
	if(isset($collegeid) && !empty($collegeid)){
			if($collegeid === 'other') {
					$providedcourses = $functions->getAllCoursesInNameOrder();
					  if($providedcourses){
							echo '<option value="">Please Select course</option>';
							foreach ($providedcourses as $course) {
								$courseid = $course['id'];
								$coursename = $course['name'];
								echo '<option value='.$courseid.'>'.$coursename.'</option>';
							}
	    		}
			}
			else{
				$collegedata = $functions->getCollegeCoursesByCollegeId($collegeid);
				$collegecourse = $collegedata[0]['courses'];
	 			$collegecourse = explode(',', $collegecourse);
				$collegecoursecount = count($collegecourse);
				echo '<option value="">Please Select course</option>';
				for($i=0;$i<$collegecoursecount;$i++){
					$courseid = $collegecourse[$i];
					$coursedatas = $functions->getCoursesById($courseid);
					foreach($coursedatas as $coursedata){
						$courseid = $coursedata['id'];
						$coursename = $coursedata['name'];
						echo '<option value='.$courseid.'>'.$coursename.'</option>';
						}
					}
			}
		}
}

if($type === 'vacancydatas') {
		$vacancyid = $_POST['vacancyid'];
		$vacancydatas = $functions->getAllVacanciesById($vacancyid);
		$depoid = $vacancydatas[0]['departmentid'];
		$job = $vacancydatas[0]['job'];
		$worktypes=$vacancydatas[0]['worktypesid'];
		$desc = $vacancydatas[0]['description'];
		$vacancies = $vacancydatas[0]['vacancies'];
		$depos = explode(',', $depoid);
		$worktypesexplode = explode(',', $worktypes);
		?>
		<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<label>Job Title</label>
				<p><?=$job?></p>
			</div>
			<div class="form-group">
				<label>Number Vacnacies</label>
				<p><?=$vacancies?></p>
			</div>
			<div class="form-group">
				<label>Job Departments</label>
				<?php for($i=0;$i<sizeof($depos);$i++){
						$depodatas = $functions->getDepartmentById($depos[$i]);
						$deponame = $depodatas[0]['name'];
					 ?>
				<p><?=$deponame.'&nbsp; '?></p>
				<?php } ?>
			</div>
			<div class="form-group">
				<label>Job worktypes</label>
				<?php for($x=0;$x<sizeof($worktypesexplode);$x++){
						$worktypesdatas = $functions->getWorkTypeById($worktypesexplode[$x]);
						$worktype = $worktypesdatas[0]['name'];
					 ?>
				<p><?=$worktype.'&nbsp; '?></p>
				<?php } ?>
			</div>
			<div class="form-group">
				<label>Job Description</label>
				<p><?=$desc?></p>
			</div>

		</div>
	</div>
<?php }

if($type === 'sendinterestmail') {
		$userid = $_POST['userid'];
		$companyid = $_POST['companyid'];
		$userdatas = $functions->getUsersById($userid);
		$companydatas = $functions->getCompanyDataById($companyid);
		$username = $userdatas[0]['name'];
		$usermail = $userdatas[0]['email'];
		$companyname= $companydatas[0]['name'];
		$companyemail = $companydatas[0]['email'];
		$checkforinsertedinterest = $functions->getCompaniesIntrestToUserById($userid,$companyid);
		if($checkforinsertedinterest){ ?>
			<div class="alert alert-warning" id='interestalreadyadded'   style="margin-top:25px;">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
	  		<strong>Sorry!</strong> You already made an interest for this user
			</div>
	<?php }else{
		$sendmail = $mails->interestExpressionMail($companyemail,$companyname,$username,$usermail);
		if($sendmail){
		$inserttointeresttable = $functions->setCompanyInterest($userid,$companyid);
		if($inserttointeresttable){ ?>
			<div class="alert alert-success"  style="margin-top:25px;">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  <strong>Success!</strong> Your interest has expressed to <?=$username?>.
			</div>
	<?php		}
			}else{ ?>
				<div class="alert alert-warning"  style="margin-top:25px;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  <strong>Failed!</strong> Mail Sending Failed
				</div>
	<?php		}
		}
}

if($type === 'addskills') {
	$userid = $_POST['userid'];
	$skills = $_POST['skills'];
	$checking = $functions-getSkillsByUserIdAndSkillName($userid,$skills);
	if($checking){ ?>
		<div class="alert alert-warning" id='interestalreadyadded'   style="margin-top:25px;">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Sorry!</strong> You already made an interest for this user
		</div>

		<?php }
		else{
			$addskills = $functions->addUserSkills($userid,$skills);
		$result = $addskills[0];
		$lastid = $addskills[1];
		if($result){?>
			<div class="col-xs-3" style="border:1px solid #e7e7e7;padding:5px;border-radius:5px">
				<div class="col-xs-10 text-center"><?=$skills?></div>
				<div class="col-xs-1 text-center deleteskill" data-skillid='<?=$lastid?>' style="color:#fff;" >
					<div style="height:20px;width:20px;background-color:#f55;border-radius:50%" class='text-center'>
							x
					</div>
				</div>
			</div>

		<?php }
	}

}



 ?>
