<?php include './includes/header.php'; ?>
    <div class="col-xs-12">
    <h3 class=" text-center">Change Password</h3>
		<br><br>
		<div class="col-xs-12" style="padding: 10px 0;"><label>Password</label></div>
		<form class="" action="../actions.php?action=changepassword" method="post">
					<input type="text" name="table" value="companies" hidden>
					<div class="col-xs-8"><input required type="password" name="oldpassword" class="form-control" placeholder="Enter Old Password"></div>
					<div class="col-xs-12" style="padding: 10px 0;"><label>New Password</label></div>
					<div class="col-xs-8"><input required type="password" name="newpassword" class="form-control" placeholder="Enter New Password"></div>
					<div class="col-xs-12" style="padding: 10px 0;"><label>Re Enter Password</label></div>
					<div class="col-xs-8"><input required type="password" name="reenterpassword" class="form-control" placeholder="Enter Re Enter Password"></div>
					<div class="col-xs-12" style="padding-top: 25px"><button type="submit" class="btn btn-default" name="button">Change Password</button></div>
		</form>
  </div>
<?php include './includes/footer.php'; ?>
