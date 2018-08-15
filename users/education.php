<?php include './includes/header.php';
?>
<style media="screen">
	.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
	border: 0px ;
}
</style>

<div class="col-xs-12">
	<?php
	 $page = './users/education.php';
	 $forms->userEducationForm($page);
	 ?>
</div>

<?php foreach($usereducation as $education){
	$eduid = $education['id'];
	$collegeid = $education['college'];
	$course = $education['course'];
	$certificates = $education['certificates'];
	$collegedata = $functions->getCollegeDataById($collegeid);
	$collegedata = $collegedata[0];
	$collegename = $collegedata['name'];
	$coursedata  = $functions->getCoursesById($course);
 	$coursedata  = $coursedata[0];
	$coursename = $coursedata['name'];
	$certificates = $education['certificates'];
?>
<div class="col-xs-12" style="padding-top: 15px;">
		<h4 class="page-header"><?=$coursename?><i class='fa fa-trash pull-right' data-toggle="modal" data-target="#deleteEducation"></i></h4>
		<table class="table">
			<tr>
				<td>Studied on</td>
				<td>:</td>
				<td><?=$collegename?></td>
				<td><a href="#" style="text-decoration:none" data-collegedata="<?php array($collegedata)?>" data-toggle="modal" data-target="#viewAboutCollege">View More About College</a></td>
			</tr>
			<tr>
				<td>Studied Course</td>
				<td>:</td>
				<td><?=$coursename?></td>
				<td><a href="#" data-toggle="modal" data-coursedata="<?php array($coursedata)?>" data-target="#viewAboutCourse" style="text-decoration:none">View More About Course</a></td>
			</tr>
			<tr>
				<td>Marks</td>
				<td>:</td>
				<td><a href="#" data-toggle="modal" data-target="#viewCertificates" data-certidata="<?=$certificates?>" style="text-decoration:none">View certificates</a></td>
			</tr>
		</table>
</div>
<?php } ?>



<?php include './includes/footer.php'; ?>
