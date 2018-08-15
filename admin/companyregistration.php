<?php
  include './includes/header.php';
  $allcourses = $functions->getAllCoursesInDescendingOrder();
	$alldepartments = $functions->getAllDepartmentsInDescendingOrder();
?>




		  		<div class="col-md-12">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Add Companies</div>
				  			</div>

                  <?php $forms->companyRegistrationForm() ?>


		  				</div>
		  			</div>
		  		</div>
		  	</div>



<?php include './includes/footer.php'; ?>
