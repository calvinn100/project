<?php
  require '../libs/Functions.php';
  $functions = new Functions();
  session_start();
  $logintype = $_SESSION['logintype'];
  $loginid = $_SESSION['id'];
  if($logintype !== 'companies') {
    header('Location: ../index.php');
  }
  $table = 'companies';
  $userdata = $functions->getCompanyDataById($loginid);
  $userdata = $userdata[0];
  $name = $userdata['name'];
  $description = $userdata['companydescription'];
  $proof = $userdata['proof'];
  $profilepic = $userdata['profilepic'];
  $departments = $userdata['departments'];
  $worktypes = $userdata['worktypes'];
  $phone = $userdata['phone'];
  $email = $userdata['email'];
  $password = $userdata['password'];
  $address = $userdata['address'];
  $hqlocation = $userdata['hqlocation'];
  $hqlatitude = $userdata['hqlatitude'];
  $hqlongitude = $userdata['hqlongitude'];
  $city = $userdata['city'];
  $state = $userdata['state'];
  $country = $userdata['country'];
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
    <link href="../assets/main/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/bootstrap/css/simple-sidebar.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet" rel="stylesheet">

    <?php
      $functions->changeToNewPassword($loginid,$table,$mailverification);
      $functions->statusModal($status);
    ?>

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
