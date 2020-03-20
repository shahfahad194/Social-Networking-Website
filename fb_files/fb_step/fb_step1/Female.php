<?php

	
		session_start();
		include("../../../connection/conect.php");
		if(isset($_SESSION['tempfbuser'])){
			
			$user=$_SESSION['tempfbuser'];
			$user_q=$mysqli->query("Select * from users where Email='$user'");
			$row=$user_q->fetch_array();
			$user_id=$row['user_id'];
			$gender=$row['Gender'];
			if($gender=='Female'){
				$q_fmale="select * from user_profile_pic where user_id='$user_id'";
				$fmale_q=$mysqli->query($q_fmale);
				$count=mysqli_num_rows($fmale_q);
				if($count==0)
				{
			?>
<?php			
				if(isset($_POST['file']) && ($_POST['file']=='Upload')){
					
					$img_name=$_FILES['file']['name'];
					$ext = pathinfo($img_name, PATHINFO_EXTENSION);
					$img_temp_name=$_FILES['file']['tmp_name'];
					$proud_img_path=$img_name;
					$time= Date("g:i a");
					if($img_name !=''){
					
					if($_FILES['file']['size']>2000)
					{
					if($ext =='jpg'|| $ext =='JPG')
					{	
					$path = "../../../fb_user/Female/".$user."/Profile/";
					$path2 = "../../../fb_user/Female/".$user."/Post/";
					$path3 = "../../../fb_user/Female/".$user."/Cover/";
					mkdir($path, 755, true);
					mkdir($path2, 755, true);
					mkdir($path3, 755, true);
				
				
				
					move_uploaded_file($img_temp_name,"../../../fb_user/Female/$user/Profile/$proud_img_path");
					$mysqli->query("insert into user_profile_pic(user_id,image,date)values('$user_id','$img_name','$time')");
					header("location:../fb_step2/Secret_Question1.php");
					}else{echo"<script> alert('Error:Only JPG File are Accepted...!');</script>";}
					}else{echo"<script> alert('Error:The File Size is Grather Than 2MB...!');</script>";}
					}else{echo"<script>alert('Upload Profile Picture...')</script>";}	
				}	
					
					
					
				}else
					{
						header("location:../fb_step2/Secret_Question1.php");
					}
				}else
				{
					header("location:../fb_step/fb_step1/Male.php");
				}
		
		
		
		
		
?>
<!DOCTYPE HTML>
<html lang="en-US">
		<head>
			<title>Step1</title>
			<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
			<img src="image/Female.jpg" width="100%"/>
				<h1 style="color:#3B5998; font-family:serif; text-align:center text-transform:capitalize;"><?php echo"$user";?></h1>
		</div>
		<div id="input">
			<form method="POST" enctype="multipart/form-data">
				<input type="file" name="file" />
				<input type="submit" value="Upload" name="file"  style="float:right; width:100px; height:30px; font-family:serif; font-weight:bolder; background:#3B5998;color:white;" />
			</form>
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