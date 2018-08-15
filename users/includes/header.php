<?php
session_start();
require '../libs/Functions.php';
require '../libs/Forms.php';
$functions = new Functions();
$forms = new Forms();
$logintype = $_SESSION['logintype'];
$loginid = $_SESSION['id'];
if($logintype !== 'users') { header('Location: ../index.php'); }
$table = 'users';
$userdata = $functions->getUserDataById($loginid);
$usereducation = $functions->getEducationDataByUserId($loginid);
$userdata = $userdata[0];
$name = $userdata['name'];
$email = $userdata['email'];
$phone = $userdata['phone'];
$profimage = $userdata['profileimage'];
$status = $userdata['status'];
$mailverification = $userdata['mailverification'];

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <title>Simple Sidebar - Start Bootstrap Template</title>
		<script src="../assets/bootstrap/js/jquery.js"></script>
		<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="../assets/js/users.js"></script>
		<!-- Menu Toggle Script -->
		<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/bootstrap/css/simple-sidebar.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet" rel="stylesheet">

        <?php
          $functions->changeToNewPassword($loginid,$table,$mailverification);
          $functions->statusModal($status);
        ?>

        <script type="text/javascript">
        <?php
          if(!$usereducation) {?>
            $(document).ready(function(){
                  $('#addusereducation').modal({
                      backdrop: 'static',
                      keyboard: false
                  });
                    $('#addusereducation').modal('show');
                });
          <?php } ?>
        </script>

          <div class="modal fade" id="addusereducation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">
                <?php
                $page = 'index.php';
                $forms->userEducationForm($page); ?>
                </div>
              </div>
            </div>
          </div>


</head>

<body>

	<div id="wrapper">

		<?php include './includes/navbar.php'; ?>
    <div class="menuiconcontainer">
      <i class="fa fa-bars" id="menu-toggle"></i>
    </div>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
