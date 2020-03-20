<?php

	
		session_start();
		if(isset($_SESSION['tempfbuser'])){
			include("../../../connection/conect.php");
			$user=$_SESSION['tempfbuser'];
			$name_user=$_SESSION['tempfbusername'];
			
			$user_q=$mysqli->query("Select * from users where Email='$user'");
				$row=$user_q->fetch_array();
				$user_id=$row['user_id'];
				$gender=$row['Gender'];
			if($gender=='Male'){
				$q_male="select * from user_profile_pic where user_id='$user_id'";
				$male_q=$mysqli->query($q_male);
				$count=mysqli_num_rows($male_q);
				
			?>
<?php			
				if(isset($_POST['p1'])){
					
					$img_name=$_FILES['file']['name'];
					$img_temp_name=$_FILES['file']['tmp_name'];
					$ext = pathinfo($img_name, PATHINFO_EXTENSION);
					$proud_img_path=$img_name;
					$time= Date("g:i a");
					
					if($img_name !='')
					{
					if($_FILES['file']['size']>2000)
					{
					if($ext =='jpg'|| $ext =='JPG')
					{	
				
						$path = "../../../fb_user/Male/".$user."/Profile/";
						$path2 = "../../../fb_user/Male/".$user."/Post/";
						$path3 = "../../../fb_user/Male/".$user."/Cover/";
						mkdir($path, 755, true);
						mkdir($path2, 755, true);
						mkdir($path3, 755, true);
					
					move_uploaded_file($img_temp_name,"../../../fb_user/Male/$user/Profile/$proud_img_path");
					$mysqli->query("insert into user_profile_pic(user_id,image,date)values('$user_id','$img_name','$time')");
					header("location:../fb_step2/Secret_Question1.php");
					
					}else{echo"<script> alert('Error:Only JPG File are Accepted...!');</script>";}
					}else{echo"<script> alert('Error:The File Size is Grather Than 2MB...!');</script>";}
					}else{}	
				}
				}else{header("location:../../fb_step1/Female.php");}
?>

<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>Step1</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="" href="../fb_home/bootstrap/css/bootstrap.css"/>
		<script src="../fb_home/bootstrap/js/bootstrap.js"></script>
		<script src="../fb_home/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<style>
		#main{display:none;}
		#step_main{
			width:100%;
			height:auto;
			background:;
			float:left;
			margin:auto;
		}
		#step{
				width:10%;
				height:400px;
				background:;
				margin:100px 0px 0px 0px;
				float:left;
		}
		#img{
			
				width:50%;
				height:200px;
				background:;
				margin:100px 0px 0px 200px;
				float:left;
				overflow:hidden;
			
		}
		#img h1{
			width:auto;
			height:auto;
			padding:0px;
			margin:110px 150px 0px 50px;
			float:left;
		}
		#img img{
			
			width:20%; 
			height:170px;
			padding:10px;
			float:left;
			border:1px groove white;
			border-radius:4px;
			
		}
		#input{
			width:40%;
			height:50px;
			background:;
			margin:40px 0px 0px 200px;
			float:left;
		}
		#meter{
				width:80%;
				height:100px;
				background:;
				float:left;
				background:;
				margin:200px 0px 0px 30px;
				
		}
@media (max-width:1024px) {
	#step_main{
			width:100%;
			height:auto;
			background:;
			float:left;
			margin:auto;
			padding:auto;
		}
	#step{
			width:50%;
			height:100px;
			background:;
			margin:30px 0px 0px 0px;
			float:left;
	}
	#step1{
			width:100%;
			height:100px;
			background:;
			margin:auto;
			float:left;
	}
	#step2,#step3{display:none;}
	#img{	
			width:100%;
			height:auto;
			background:;
			margin:20px 0px 0px 0px;
			float:left;
		}
	#img img{
			
			width:30%; 
			
			
		}	
	
	#img h1{
			width:auto;
			height:auto;
			padding:20px;
			margin:auto;
			float:left;
		}
	#input{
		width:100%;
		height:auto;
		background:;
		padding:0px;
		margin:20px 0px 0px 0px;
		float:left;
	}
	#meassg{
		width:auto;
			height:auto;
			padding:20px;
			margin:auto;
			float:left;
	}
	#meter{
		width:80%;
		height:70px;
		background:;
		float:left;
		margin:100px 0px 0px 30px;
		
	}
	
}		
	</style>	
	<body>
		<?php 
			include("../../../Background.php");
		?>
		<div id='step_main'>
			<div id="step">
				<pre style="color:white; font-family:serif; line-height:2.9; text-align:center;"><h1  id='step1'style="background:lightgreen; width:100%; box-shadow:0px 0px 25px black; border-radius:0px 10px 10px 0px;">Step 1</h1>  <h1 id='step2'style="background:gray; box-shadow:0px 0px 25px black; width:100%; border-radius:0px 10px 10px 0px;">Step 2</h1> <h1 id='step3'style="background:gray; box-shadow:0px 0px 25px black; width:100%; border-radius:0px 10px 10px 0px;">Step 3</h1></pre>
			
			</div>
			<div id="img">
				<img src="image/male.jpg"  align="bottom" width=""/>
					<h1 style="color:#3B5998; font-family:serif; font-size:1.3em; text-align:center; text-transform:capitalize;"><?php echo"$name_user<br>$gender <br> $user";?></h1>
			</div>
			<div id="input">
				<form method="POST"  onSubmit="return check();" name="pic_upload" enctype="multipart/form-data">
					<input type="file" name="file" id='file' style=''/>
					<input type="submit" value="Upload" name="p1"  style="float:right; width:90px; height:30px; font-family:serif; font-weight:bolder; background:#3B5998;color:white;" />
				</form>
				<h2 id='meassg'style='display:none; font-family:serif; color:red; text-transform:capitalize; padding:10px;'>upload a profile picture..!</h2>
			</div>
			<div id="meter">
				<meter min="0" max="100" value="25" style="width:100%; box-shadow:0px 0px 25px black; height:30px;"></meter>
			</div>	
		</div>
	</body>
	</html>
	<?php
			}else
				{
					header("location:../../../index.php");
				}
	?>
	
<script> 
function check(){
	if(pic_upload.file.value==''){
		document.getElementById("meassg").style.display="block";
	return false;
	}
}

</script>	