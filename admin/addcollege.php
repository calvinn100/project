<?php
  include './includes/header.php';
  $allcourses = $functions->getAllCoursesInDescendingOrder();
	$alldepartments = $functions->getAllDepartmentsInDescendingOrder();
?>




		  		<div class="col-md-12">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Add Colleges</div>
				  			</div>

                    <?php $forms->collegeRegistrationForm(); ?>

		  				</div>
		  			</div>
		  		</div>
		  	</div>



<?php include './includes/footer.php'; ?>
