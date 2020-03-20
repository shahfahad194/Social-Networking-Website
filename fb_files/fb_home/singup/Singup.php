
<?php 
	include("connection/conect.php");
?>
<?php   
	if(isset($_POST['singup'])){
			
					$email=$_POST['email'];
					$chk="select * from users where email='$email'";
					$chk_email=$mysqli->query($chk);
					$count1=mysqli_num_rows($chk_email);
		if($count1>1){
			echo"
			<script>
				alert('This Is an Existing Account associated with this Email...')
			</script>";
			
		}
		else{
			
			
			
			$name=$_POST['f_name'].' '.$_POST['l_name'];
			$pass=$_POST['pass'];
			$dob=$_POST['dob'];
			$gen=$_POST['gen'];
			$fb_join_date=date("d-m-y");
			
			
			$sing="insert into users(Name,Email,Password,Gender,Birthday_Date,FB_Join_Date)values('$name','$email','$pass','$gen','$dob','$fb_join_date')";
			$a=$mysqli->query($sing).$mysqli->error;
		
				session_start();
				
				$_SESSION['tempfbuser']=$email;
				$_SESSION['tempfbusername']=$name;
				
				if($gen=='Male'){
					echo"<script>window.open('fb_files/fb_step/fb_step1/Male.php', '_self');</script>" ;
					//header("location:fb_files/fb_step/fb_step1/Male.php");
				}
				else{
					//header("location:fb_files/fb_step/fb_step1/Female.php");
					echo"<script>window.open('fb_files/fb_step/fb_step1/Female.php', '_self');</script>" ;

				}
	
	
		}
	}
?>