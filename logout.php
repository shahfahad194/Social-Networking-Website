<?php
 
include("connection/conect.php");

	if(isset($_GET['logout'])){
	session_start();

	$user=$_SESSION['fbuser'];
	$count1=$mysqli->query("select * from users where Email='$user'");
	$out=$count1->fetch_array();
		$userid=$out[0];
	
	$mysqli->query("update user_status set status='offline' where user_id='$userid'");
	unset($_SESSION['fbuser']);
	
	session_destroy();
	echo"<script>window.open('../../../index.php','_self')</script>";
	exit();
	
}

?>