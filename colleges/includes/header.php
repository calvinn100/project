<?php
session_start();
$logintype = $_SESSION['logintype'];
if($logintype !== 'colleges') {
  header('Location: ../index.php');
}
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
