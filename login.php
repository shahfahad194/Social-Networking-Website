<?php 
	include("connection/conect.php");
?>
<?php

if (isset($_POST['login'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	if(empty($email)){echo"<script>window.open('forgotten_attmp.php', '_self')</script>"; return;}
	if(empty($password)){echo"<script>window.open('forgotten_attmp.php', '_self')</script>"; return; }
		$count1=$mysqli->query("select * from users where Email='$email' and Password='$password'");
		$count3=mysqli_num_rows($count1);
		
		if($count3==1){
			while($chk=$count1->fetch_array()){
				$em=$chk['Email'];
				$pass=$chk['Password'];
				
				
			}
			
			
			if($em==$email and $pass==$password ){
				//session_start();
				$_SESSION['fbuser']=$email;
				$count2=$mysqli->query("select * from users where Email='$email'");
				$us=$count2->fetch_array();
				$user_id=$us[0];
				$mysqli->query("update user_status set status='online' where user_id='$user_id'");
				
				echo"<script>window.open('fb_files/fb_home/Home/Home.php', '_self');</script>";
				//header("location:fb_files/fb_home/Home/Home.php");
			}
			else{
				echo"<script>window.open('forgotten_1.php', '_self');</script>";
				return;		
			}	
			
		}
	
	else{
		echo"<script>window.open('forgotten_1.php', '_self');</script>" ;
		return;
		
		
	}
}
?>