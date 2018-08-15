<?php include './includes/header.php';
$allskills = $functions->getSkillsByUserId($loginid);
?>

<div class="col-xs-12">
	<div class="col-xs-12">
			<h4 class='page-header'>Add Skills</h4>
			<form class="" method="post">

			<input class='userid' hidden type="text" name="userid" value="<?=$loginid?>">
			<div class="col-xs-8">
				<input type="text" class='addskillfield form-control' placeholder="Add Your Skills" >
			</div>
			<div class="col-xs-4">
				<button type="submit" id='addskillbtn' name="button" class='btn btn-default'>Add Skills</button>
			</div>
		</form>

	</div>
</div>

<div class="col-xs-12 skillshowcontainer" style="padding-top: 25px">

<?php
	foreach ($allskills as $skills) {
		$skillid = $skills['id'];
		$skilluser = $skill['userid'];
		$skillname = $skill['skill'];
 ?>
		<div class="col-xs-3" style="border:1px solid #e7e7e7;padding:5px;border-radius:5px">
			<div class="col-xs-10 text-center"><?=$skillname?></div>
			<div class="col-xs-1 text-center deleteskill" data-skillid='<?=$skillid?>' style="color:#fff;" >
				<div style="height:20px;width:20px;background-color:#f55;border-radius:50%" class='text-center'>
						x
				</div>
			</div>
		</div>

<?php } ?>
</div>

<?php include './includes/footer.php'; ?>
