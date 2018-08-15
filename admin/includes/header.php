<?php
session_start();
$logintype = $_SESSION['logintype'];
if($logintype !== 'admin') {
  header('Location: ../index.php');
}

  include '../libs/Functions.php';
  include '../libs/Common.php';
  include '../libs/Forms.php';
  $functions = new Functions();
  $common = new Common();
  $forms = new Forms();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Career Guidance Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="../assets/bootstrap/js/jquery.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/map.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/admin.js"></script>

    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <link href="../assets/css/admin.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
    <link href="../assets/css/location.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBi9iGKL01Roy-7MZIOFFA4USHDykfUP8Q&v=3.exp&libraries=places"></script>

  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.html">Career Guidance Management</a></h1>
	              </div>
	           </div>


	           <div class="col-md-2 pull-right">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html">Profile</a></li>
	                          <li><a href="../actions.php?action=logout">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

<!-- navigation -->
<?php include './includes/navbar.php' ?>

<div class="col-md-10">
	<div class="row">
