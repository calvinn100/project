<?php
	session_start();
	if(!empty($_SESSION['logintype'])){
		$logintype = $_SESSION['logintype'];
		header('Location: ./'.$logintype.'/index.php');
}

	include './includes/header.php';
	include './includes/slider.php';
	include './includes/aboutus.php';
	include './includes/loginorregister.php';
	include './includes/welcome.php';
	include './includes/activities.php';
	include './includes/counter.php';
	include './includes/contact.php';
	include './includes/footer.php';
?>
