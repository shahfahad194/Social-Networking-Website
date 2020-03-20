<?php
include("../../../connection/conect.php");
	
	session_start();
	if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];
		if(isset($_GET['id']))
		$id=$_GET['id'];

		$about=$mysqli->query("select * from users where user_id='$id'");
		$about_f=$about->fetch_array();
			$user_id=$about_f['user_id'];
		
		
		if(isset($_POST['sub'])){
			$job=$_POST['job'];
			$schol=$_POST['schol'];
			
			
			 $mysqli->query("update user_info set job='$job',school_or_collage='$schol' where user_id='$user_id'");	
			
			
		}
		
		if(isset($_POST['sub_2'])){
			$city=$_POST['city'];
			$town=$_POST['town'];
			
			 $mysqli->query("update user_info set current_city='$city',hometown='$town' where user_id='$user_id'");	
			
			
		}
	if(isset($_POST['sub_3'])){
			$birth=$_POST['birth'];
			$rel=$_POST['rel'];
			
			
			 $mysqli->query("update user_info set relationship_status='$rel' where user_id='$user_id'");	
			 $mysqli->query("update users set Birthday_Date='$birth' where user_id='$user_id'");	

			
		}

	if(isset($_POST['sub_4'])){
			$phone=$_POST['phone'];
			$mobile_no_priority=$_POST['mobile_no_priority'];
			$website=$_POST['website'];
			
			
			 $mysqli->query("update user_info set mobile_no='$phone',website='$website',mobile_no_priority='$mobile_no_priority' where user_id='$user_id'");	

			
		}
	}









?>