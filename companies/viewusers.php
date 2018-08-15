<?php
 	include './includes/header.php';
//$allusers = $functions->getAllU
	$departments = explode(',', $departments);
 	for($i=0;$i<count($departments);$i++){
		$depoid = $departments[$i];
		$allcourses = $functions->getCoursesByDepartmentId($depoid);
		foreach ($allcourses as $courses) {
			$courseid = $courses['id'];
			$allcourseid[] = $courseid ;
		}
	}
 ?>
	<div class="col-xs-12">
		<h4 class="page-header">Registered Users within same field as yours</h4>
			<?php
				for($i=0;$i<count($allcourseid);$i++){
						$cid = $allcourseid[$i];
						$userswitheducationid = $functions->getUsersByCourseId($cid);
						foreach ($userswitheducationid as $usersbycourse) {
						$userid = $usersbycourse['userid'];
						$usersdata = $functions->getUsersById($userid);
						foreach ($usersdata as $users) {
								$id = $users['id'];
								$name = $users['name'];
                $profpic = $users['profileimage'];
                $profpic = '../'.$profpic;
				?>
				<div class="col-xs-3 viewusertilecontainer" >
					<div class="col-xs-12">
						<div class="viewusertile"><img src="<?=$profpic?>" alt="" ></div>
					</div>
					<div class="col-xs-12 text-center">
						<h5 style="font-weight: 700"><?=$name?></h5>
            <h6><a href="viewuserprofile.php?id=<?=$id?>">View More Data</a></h6>
					</div>
				</div>

		<?php
						}
					}
				}
		 ?>


</div>

<?php include './includes/footer.php'; ?>
