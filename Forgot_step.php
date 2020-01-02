<?php	
		
		session_start();
		include("connection/conect.php");
		if(isset($_SESSION["tempuserforget"])){
		$forget_email=$_SESSION["tempuserforget"];
		
		
		
		$row1=$mysqli->query("select * from users where Email='$forget_email'");
		
		if(mysqli_num_rows($row1)>0){
		$fetch1=$row1->fetch_array();
		$u_id=$fetch1['user_id'];
			$name=$fetch1['Name'];
			$em=$fetch1['Email'];
			$gen=$fetch1['Gender'];
			$pasw=md5($fetch1['Password']);
			//fcth 2nd for pic
		$row2=$mysqli->query("select * from  user_profile_pic where user_id='$u_id'");
		$fetch2=$row2->fetch_array();
			$im=$fetch2['image'];
	
	$qu1=$mysqli->query("select * from user_secret_quotes where user_id='$u_id'");
		
		$fetch3=$qu1->fetch_array();
		$qus1=$fetch3['Question1'];
		$qus2=$fetch3['Question2'];
		$an1=$fetch3['Answer1'];
		$an2=$fetch3['Answer2'];
?>		
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>Forgotten account</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="" href="fb_files/fb_home/bootstrap/css/bootstrap.css"/>
		<script src="fb_files/fb_home/bootstrap/js/bootstrap.js"></script>
		<script src="fb_files/fb_home/bootstrap/js/bootstrap.min.js"></script>
		<script src="fb_files/fb_home/Profile/js_files/jquery.js"></script>

	</head>
	
<style>
#main_f
	{
		position:;
		margin:250px 0px 0px 300px;
		width:50%;
		height:380px;;
		background:white;
		text-align:center;
		float:left;
		border-radius:10px;
		border:lightgray 1px groove;
		box-shadow:0px 0px 100px white;
	}
#pass{
		
		margin:auto;
		width:100%;
		height:400px;
		background:transparent;
		text-align:center;	
		display:;
		border-radius:5px 5px 5px 5px ;
		float:left;
	}

#img{
	float:left;
	height:120px;
	width:100%;
	background:transparent;
	overflow:hidden;

	float:left;
}
#img img{
	border-radius:100px;
	height:120px;
	width:20%;
	background:transparent;
	overflow:hidden;
	box-shadow:0px 2px 25px black;
	border:1px gray solid;
}
#qus{
	margin-top:20px;
	float:left;
	height:auto;
	width:100%;
	background:transparent;
	float:left;
}
#qus table tr td{padding:8px; text-align:left;}
input[type='text']{
	width:100%;
	height:40px;
	border-radius:4px;
	box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
	padding:8px;
}

#req1{display:none; padding:0px;color:red; text-align:; }
#req2{display:none; padding:0px;color:red; text-align:; }

#excute{
		margin:auto;
		width:100%;
		height:400px;
		background:transparent;
		text-align:center;
		border-radius:5px 5px 5px 5px ;
		float:left;
}
#e_title{
		width:80%;
		height:40px;
		background:transparent;
		text-align:center;
		font-size:1.4em;
		font-weight:bolder;
		margin-left:10%;
		padding:10px;
		border-bottom-style:solid; 
		border-bottom-width:thin;
		color:lightgray;
		text-transform:capitalize;
}
#e_pass{
		width:100%;
		height:auto;
		background:transparent;
		text-align:center;
		font-size:1.4em;
		font-weight:bolder;
		margin-top:20px;
		float:left;
}




/* mobile size*/


@-ms-viewport {
		width: device-width;
	}

	body {
		-ms-overflow-style: scrollbar;
	}
	
@media screen and (max-width:2560px) 
	{
		body{margin:0px;padding:0px;background:; }
		#main_f
		{
			position:;
			margin:250px 0px 0px 280px;
			width:60%;
			height:auto;
			background:white;
			text-align:center;
			float:left;
			border-radius:10px;
			border:lightgray 1px groove;
			box-shadow:0px 0px 100px white;
			}
		#pass{
				
				margin:auto;
				width:100%;
				height:400px;
				background:transparent;
				text-align:center;	
				display:;
				border-radius:5px 5px 5px 5px ;
				float:left;
				font-size:20px;
			}
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:20px; font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
			
	
	
	}	
	
@media screen and (max-width: 1680px) 
	{
		body{margin:0px;padding:0px;background:;}
		
		#main_f
		{
			position:;
			margin:250px 0px 0px 280px;
			width:60%;
			height:auto;
			background:white;
			text-align:center;
			float:left;
			border-radius:10px;
			border:lightgray 1px groove;
			box-shadow:0px 0px 100px white;
			}
		#pass{
				
				margin:auto;
				width:100%;
				height:400px;
				background:transparent;
				text-align:center;	
				display:;
				border-radius:5px 5px 5px 5px ;
				float:left;
				font-size:17px;
			}
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:18px; font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
		
		
		
	}
@media (max-width:1280px) 
	{
		body{margin:0px;padding:0px;background:;}
		
		#main_f
		{
			position:;
			margin:250px 0px 0px 250px;
			width:60%;
			height:auto;
			background:white;
			text-align:center;
			float:left;
			border-radius:10px;
			border:lightgray 1px groove;
			box-shadow:0px 0px 100px white;
			}
		#pass{
				
				margin:auto;
				width:100%;
				height:400px;
				background:transparent;
				text-align:center;	
				display:;
				border-radius:5px 5px 5px 5px ;
				float:left;
				font-size:17px;

			}
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:15px;font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
		
		
		
	}	
	

@media (max-width:1024px) 
	{
		body{margin:0px;padding:0px;background:;}	
		#main_f
		{
			
			margin:150px 0px 0px 0px;
			width:100%;
			height:auto;
			background:white;
			text-align:center;
			float:left;
			border-radius:10px;
			border:lightgray 1px groove;
			box-shadow:0px 0px 100px white;
			padding:10px 0px 0px 30px;
		}
		#pass{
			
			margin:auto;
			width:90%;
			height:auto;
			background:;
			text-align:center;	
			border-radius:5px 5px 5px 5px ;
			float:left;
			font-size:17px;

		}
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:15px;font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
		
		
		
	}	
		

	
@media (max-width:980px) 
	{
		body{margin:0px;padding:0px;background:;}	
		#main_f
		{
			
			margin:150px 0px 0px 0px;
			width:100%;
			height:auto;
			background:white;
			text-align:center;
			float:left;
			border-radius:10px;
			border:lightgray 1px groove;
			box-shadow:0px 0px 100px white;
			padding:10px 0px 0px 0px;
		}
		#pass{
			
			margin:auto;
			width:100%;
			height:auto;
			background:;
			text-align:center;	
			border-radius:5px 5px 5px 5px ;
			float:left;
			font-size:15px;
		}
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:15px;font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
		
		
		
	}	
@media (max-width:736px) 
	{
		body{margin:0px;padding:0px;background:;}	
		#main_f
		{
			
			margin:150px 0px 0px 0px;
			width:100%;
			height:auto;
			background:white;
			text-align:center;
			float:left;
			border-radius:10px;
			border:lightgray 1px groove;
			box-shadow:0px 0px 100px white;
			padding:10px 0px 0px 0px;
		}
		#pass{
			
			margin:auto;
			width:auto;
			height:auto;
			background:;
			text-align:center;	
			border-radius:5px 5px 5px 5px ;
			float:left;
			font-size:15px;
		}
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:15px;font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
		
		
		
		
		
		
	}
@media (max-width:480px) 
	{
		body{margin:0px;padding:0px;background:;}	
		#main_f
		{
			
			margin:150px 0px 0px 0px;
			width:100%;
			height:auto;
			background:white;
			text-align:center;
			float:left;
			border-radius:10px;
			border:lightgray 1px groove;
			box-shadow:0px 0px 100px white;
			padding:10px 0px 0px 0px;
		}
		#pass{
			
			margin:auto;
			width:auto;
			height:auto;
			background:;
			text-align:center;	
			border-radius:5px 5px 5px 5px ;
			float:left;
			font-size:13px;

		}
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:15px;font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
		
	
	
	
	
	}
	
	
@media (max-width:360px) 
	{
		body{margin:0px;padding:0px;background:; font-size:auto;}
		#main_f
		{
			
			margin:150px 0px 0px 0px;
			width:100%;
			height:auto;
			background:white;
			text-align:center;
			float:left;
			border-radius:10px;
			border:lightgray 1px groove;
			box-shadow:0px 0px 100px white;
			padding:10px 0px 0px 0px;
		}
		#pass{
			
			margin:auto;
			width:auto;
			height:auto;
			background:;
			text-align:center;	
			border-radius:5px 5px 5px 5px ;
			float:left;
			font-size:13px;

		}
		#excute{
			margin:auto;
			width:100%;
			height:400px;
			background:transparent;
			text-align:center;
			border-radius:5px 5px 5px 5px ;
			float:left;
		}
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:15px;font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
		
	}



</style>
<body>
<?php include("Background.php");?>
<div id="main_f">
<?php	
		echo"
		
		<div id='pass' >	
			<div id='img'>
				<img src='fb_user/$gen/$em/Profile/$im'/>
			</div>
			<div id='qus'>
				<form method='POST'  onSubmit='return checkqus();' name='Qust' >
				<table border='0' width='100%' style=' margin-left:;font-family:serif;font-size:1.2em; '>
					<tr>
						<td>Secret Question 1:</td>
						<td >$qus1</td>
						<td>&nbsp </td>	
					</tr>
					<tr>
						<td>Your Ans:</td>
						<td>
							<input type='text' placeholder='Type Ans Here' id='ans1' name='ans1' style=''/>
						</td>
						<td id='req1'>&nbsp *</td>
					</tr>
					<tr>
						<td>Secret Question 2:</td>
						<td>$qus2</td>
						<td>&nbsp </td>
						
					</tr>
					<tr>
						<td>Your Ans:</td>
						<td>
							<input type='text' placeholder='Type Ans Here' name='ans2' id='ans2'  style=''/>
						</td>
						<td id='req2'>&nbsp *</td>
					</tr>
					<tr>
						<td>&nbsp </td>
						
						<td>
							<input type='submit'  name='next' class='btn btn-info' style='float:right; width:100px; height:30px; font-family:serif; font-weight:bolder; background:#3B5998;color:white;' />
						</td>
						<td>&nbsp </td>
						
					</tr>
				</table>
				</form>
			</div>
			<div id=''></div>
		</div>";
		}
	?>
	<?php
	
	if(isset($_POST['next'])){
			$ans1=$_POST['ans1'];
			$ans2=$_POST['ans2'];
			
		if($ans1==$an1 && $ans2==$an2 ){
			echo"
			<style>
			#pass{display:none;}
			</style>
			<div id='excute'>
				<div id='e_title'>
					<p> Your password</p>
				</div>
				<div id='e_pass'>
					<form method='POST'  onSubmit='return checkpass();' name='reset_pass' >
					<table border='0' width='90%' height='300px' style=' margin-left:10px;font-family:serif; text-align:left; '>
						<tr><td>Password</td><td>&nbsp</td></tr>
						<tr>
							<td>
								<input type='text' value='$pasw' disabled style='width:100%; height:30px; border-radius:5px; font-family:serif;'/>
							</td>
							<td>&nbsp</td>
						</tr>
						<tr><td>New Password</td><td>&nbsp</td></tr>
						<tr>
							<td>
								<input type='password' placeholder='New Password' id='newpass' name='newpass' style='width:100%; height:35px; border-radius:5px;font-family:serif;'/>
							</td>
							<td id='passchk' style='display:none; color:red; text-align:center;padding:5px;'>*</td>
						</tr>
						<tr><td>Retype Password</td><td>&nbsp</td></tr>
						<tr>
							<td>
								<input type='password' placeholder='Retype Password' name='repass' id='repass'  style='width:100%; height:35px; border-radius:5px;font-family:serif;'/>
							</td>
							<td id='repasschk'  style='display:none; color:red; text-align:center; padding:5px;'>*</td>
						</tr>
						<tr>
						
							<td>
								<input type='submit'  name='rest_pass' value='Submit' class='btn btn' style='float:right; width:30%; border-radius:5px; height:35px; font-family:serif; font-weight:bolder; background:#3B5998;color:white;' />
							</td>
						<td>&nbsp</td>
						</tr>
						<tr>
							<td id='nosame'  style='display:; color:red;'>&nbsp</td>
							<td>&nbsp</td>
						</tr>
						
					</table>
					</form>
				</div>
			</div>
			";
		}
	}
	
		if(isset($_POST['rest_pass'])){
			$repass=$_POST['repass'];
			$mysqli->query("update users set Password='$repass' where Email='$em'");
			
			unset($_SESSION['tempuserforget']);
			echo"<script>window.open('index.php','_self')</script>";exit();
		}
?>
		<div id="my_intro">
		
			<h2>Developer -&nbsp <a href="http:\\my-portfolio.comeze.com" target='_blank' style=''>Shah&nbspFahad</a></h2>
		
		</div>
</div>
	<div  style=' width:100%; height:100px;background:transparent; float:left; margin-top:10px;'></div>

</body>
</html>
<script>	
	function checkqus(){
	 var qus1=Qust.ans1.value;
	 var qus2=Qust.ans2.value;
	 
	 if(qus1 =="" && qus2 ==""){
			document.getElementById("req1").style.display="block";
			document.getElementById("qus").style.height="auto";
			document.getElementById("req2").style.display="block";
			Qust.ans1.focus();
			return false;
		}
		if(qus1 =="" && qus2 !=""){
			document.getElementById("req1").style.display="block";
			document.getElementById("qus").style.height="auto";
			document.getElementById("req2").style.display="none";
			Qust.ans1.focus();
			return false;
		}
		if(qus1 !="" && qus2 ==""){
			document.getElementById("req2").style.display="block";
			document.getElementById("qus").style.height="auto";
			document.getElementById("req1").style.display="none";
			Qust.ans2.focus();
			return false;
		}
		
	}
	
function checkpass(){
	 var npass=reset_pass.newpass.value;
	 var rpass=reset_pass.repass.value;
	 
	 if(npass =="" && rpass ==""){
			document.getElementById("passchk").style.display="block";
			document.getElementById("repasschk").style.display="block";
			reset_pass.newpass.focus();
			return false;
		}
		if(npass =="" && rpass !=""){
			document.getElementById("passchk").style.display="block";
			document.getElementById("repasschk").style.display="none";
			reset_pass.newpass.focus();
			return false;
		}
		if(npass !="" && rpass ==""){
			document.getElementById("repasschk").style.display="block";
			document.getElementById("passchk").style.display="none";
			reset_pass.repass.focus();
			return false;
		}
		
		if(npass != rpass){
			document.getElementById("nosame").innerHTML="Password Does Not Match..";
			document.getElementById("passchk").style.display="none";
			document.getElementById("repasschk").style.display="none";
			reset_pass.newpass.focus();
			return false;
		}
		if(npass.length<=8){
			document.getElementById("nosame").innerHTML="Your Password Must be atleast 8 Charachter..";
			document.getElementById("passchk").style.display="none";
			document.getElementById("repasschk").style.display="none";
			reset_pass.newpass.focus();
			return false;
		}

	}
</script>	
	<?php }
	//else{
		//echo"<script>window.open('index.php','_self')</script>";
		//}?>
