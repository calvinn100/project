<?php
include './includes/header.php';
$userprofileid = $_GET['id'];
$userprofile = $functions->getUsersByIdAndStatus($userprofileid);
$userprofileeducation = $functions->getEducationDataByUserId($userprofileid);
$userprofileintrest = $functions->getCompaniesIntrestToUserById($userprofileid,$loginid);
$userprofile = $userprofile[0];
$userprofilename = $userprofile['name'];
$userprofileemail = $userprofile['email'];
$userprofilephone = $userprofile['phone'];
$userprofilegender = $userprofile['gender'];
$userprofileimage = $userprofile['profileimage'];
require '../libs/Forms.php';
$forms = new Forms();

?>
<div class="row">
	<div class="container">

		<div class="col-xs-12">
			<h4 style="font-weight:700;padding:25px;" class='text-center'>Bio Data</h4>
		</div>
		<div class="col-xs-3">
			<div class="" style="height:250px;width:250px;background-color:#f7f7f7">
				<img src="<?='.'.$userprofileimage?>" alt="">
			</div>
		</div>
		<div class="col-xs-8">
			<div class="col-xs-12">
				<table   style="font-weight:18px;font-weight:700;">
					<tr>
						<td style='padding:10px;' >Name</td>
						<td style='padding:10px;' >:</td>
						<td style='padding:10px;' ><?=$userprofilename?></td>
					</tr>
					<tr>
						<td style='padding:10px;' >Email</td>
						<td style='padding:10px;' >:</td>
						<td style='padding:10px;' ><?=$userprofileemail?></td>
					</tr>
					<tr>
						<td style='padding:10px;' >Phone</td>
						<td style='padding:10px;' >:</td>
						<td style='padding:10px;' ><?=$userprofilephone?></td>
					</tr>
					<tr>
						<td style='padding:10px;' >Gender</td>
						<td style='padding:10px;' >:</td>
						<td style='padding:10px;' ><?=$userprofilegender?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-xs-12">
			<div class="col-xs-12" style="padding:15px 0">
				<table class='table table-bordered text-center'  style="font-weight:18px;">
					<tr style="font-weight:700">
						<td style='padding:10px;' >#</td>
						<td style='padding:10px;' >Course</td>
						<td style='padding:10px;' >College</td>
						<td style='padding:10px;' >Certificates</td>
					</tr>
					<?php
					$slno = 1;
					foreach($userprofileeducation as $education){
						$college = $education['college'];
						$course= $education['course'];
						$certificates= $education['certificates'];
						$coursedata = $functions->getCoursesById($course);
						$coursename = $coursedata[0]['name'];
						$collegedatas = $functions->getCollegeDataById($college);
						$collegename = $collegedatas[0]['name'];
					 ?>

					<tr>
						<td style='padding:10px;' ><?=$slno++?></td>
						<td style='padding:10px;' ><?=$coursename?></td>
						<td style='padding:10px;' ><?=$collegename?></td>
						<td style='padding:10px;color:blue;cursor:pointer' class='viewusercertibtn' data-course='<?=$coursename?>' data-certificates='<?=$certificates?>' data-toggle="modal" data-target='.viewusercertificates'>View certificates</td>
					</tr>
					<?php } ?>

				</table>
			</div>
		</div>

		<div class="col-xs-8">
			<button type="button" class='btn btn-primary expressintrestbtn' data-userid='<?=$userprofileid?>' data-companyid='<?=$loginid?>' name="button">Express Intrest In this profile</button>
		</div>
	</div>
</div>

<div class="col-xs-12 showalert">

</div>

<?php include './includes/footer.php'; ?>

<div class="modal fade viewusercertificates" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title usercoursename" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
				<img src="" class="usercoursecerti">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
