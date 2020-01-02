<?php
include("connection/conect.php");
	//error_reporting(0);

	if(isset($_POST["submit"])){
		$forget_email=$_POST["forgetemail"];
		
		$users_email=array();

		$row1=$mysqli->query("select * from users");
		while($fetch1=$row1->fetch_array()){
			$em=$fetch1['Email'];
		array_push($users_email,$em);	
		}	
		
		$index_users=array_search($forget_email,$users_email);
		
		if( $index_users !== false )
		{	
			$userforget=$users_email[$index_users];
			session_cache_limiter('tempuserforget');
			$cache_limiter = session_cache_limiter();
			session_cache_expire(1);
			$cache_expire = session_cache_expire();
			session_start();
			session_set_cookie_params(60,localhost/webapp,true,http-only);
			session_name("MY_SESSION");
			
			$_SESSION['tempuserforget']=$userforget;
			//echo"<script>alert('".$cache_expire."');</script>";
			echo"<script>window.open('Forgot_step.php', '_self')</script>";
		}
		elseif($forget_email =="" ){}
		else{echo"<script>alert('Your Email are not Match You Need To Provide a Correct Email..');</script>";}
	}
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
body{margin:0px;padding:0px;background:lightgreen;}	
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

#title_forget {
	width:100%;
	height:100px;
	background:;
	float:left;
	padding:10px;
}
#title_forget pre{
	width:100%;
	height:auto;
	background:white;
	float:left;
	text-align:left;
	font-size:2.0em;
	font-family:algerian;
	margin:20px 0px 0px 0px;
	text-shadow:10px 5px 5px lightgray;
}

#error_msj{width:80%; height:80px; text-align:left; margin:20px 0px 0px 100px; }
#error_msj tr td pre{color:red;padding:8px; font-family:serif; font-size:17px; opacity:0.9;background:pink; }


#email{
	width:100%;
	background:transparent; 
	height:auto;
	padding:10px;
	float:left;
}

#email table{ width:100%; font-family:serif; font-size:17px; }
#email table tr td {padding:8px; }

.glyphicon.glyphicon-envelope{font-size:32px; color:gray;}

input[type='text']{
	width:100%;
	height:40px;
	border-radius:4px;
	box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
	padding:8px;
}

.btn.btn-info{font-weight:bolder; background:#4267b2;width:40%; }
.btn.btn-primray{font-weight:bolder;width:40%;}




/* mobile size*/
@font-face {
	font-family: Graublauweb;
	src: url('Graublauweb.eot'); /* IE9 Compatibility Modes */
	src: url('Graublauweb.eot?') format('eot'),  /* IE6-IE8 */
	url('Graublauweb.woff') format('woff'), /* Modern Browsers */
	url('Graublauweb.ttf')  format('truetype'), /* Safari, Android, iOS */
	url('Graublauweb.svg#svgGraublauweb') format('svg'); /* Legacy iOS */
} 	

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
					margin:300px 0px 0px 490px;
					width:60%;
					height:auto;
					background:white;
					text-align:center;
					float:left;
					border-radius:10px;
					border:lightgray 1px groove;
					box-shadow:0px 0px 100px white;
				}

			#title_forget {
				width:100%;
				height:auto;
				background:;
				float:left;
				padding:10px;
			}
			#title_forget pre{
				width:100%;
				height:auto;
				background:white;
				float:left;
				text-align:left;
				font-size:3.9em;
				font-family:algerian;
				margin:20px 0px 0px 0px;
				text-shadow:10px 5px 5px lightgray;
			}

			#error_msj{width:80%; height:150px; text-align:left; margin:50px 0px 0px 100px; }
			#error_msj tr td pre{color:red;padding:18px; font-family:serif; font-size:35px; opacity:0.9;background:pink; }


			#email{
				width:100%;
				background:transparent; 
				height:auto;
				padding:15px;
				float:left;
			}

			#email table{ width:100%; font-family:serif; font-size:35px; }
			#email table tr td {padding:8px; }

			.glyphicon.glyphicon-envelope{font-size:45px; color:gray;}

			input[type='text']{
				width:100%;
				height:75px;
				border-radius:4px;
				box-sizing: border-box;
				border: 2px solid #ccc;
				padding:8px;
			}
			input[type='button']{
				width:100%;
				height:75px;
				border-radius:4px;
				box-sizing: border-box;
				border: 2px solid #ccc;
				padding:8px;
				font-size:35px;
			}
			input[type='submit']{
				width:100%;
				height:75px;
				border-radius:4px;
				box-sizing: border-box;
				border: 2px solid #ccc;
				padding:8px;
				font-size:35px;
			}

			.btn.btn-info{font-weight:bolder; background:#4267b2; width:40%; height:auto; }
			.btn.btn-primray{font-weight:bolder; width:40%; }
			
			#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
			#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:35px; font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
			#my_intro h2 a{ text-decoration:none; color:#4267b2;}
		
	}	
	
@media screen and (max-width: 1680px) 
	{
		body{margin:0px;padding:0px;background:;}
		#main_f
			{
				position:;
				margin:200px 0px 0px 300px;
				width:50%;
				height:auto;
				background:white;
				text-align:center;
				float:left;
				border-radius:10px;
				border:lightgray 1px groove;
				box-shadow:0px 0px 100px white;
			}

		#title_forget {
			width:100%;
			height:100px;
			background:;
			float:left;
			padding:10px;
		}
		#title_forget pre{
			width:100%;
			height:auto;
			background:white;
			float:left;
			text-align:left;
			font-size:2.3em;
			font-family:algerian;
			margin:20px 0px 0px 0px;
			text-shadow:10px 5px 5px lightgray;
		}

		#error_msj{width:80%; height:80px; text-align:left; margin:20px 0px 0px 100px; }
		#error_msj tr td pre{color:red;padding:8px; font-family:serif; font-size:25px; opacity:0.9;background:pink; }


		#email{
			width:100%;
			background:transparent; 
			height:auto;
			padding:10px;
			float:left;
		}

		#email table{ width:100%; font-family:serif; font-size:25px; }
		#email table tr td {padding:8px; }

		.glyphicon.glyphicon-envelope{font-size:39px; color:gray;}

		input[type='text']{
			width:100%;
			height:55px;
			border-radius:4px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			padding:8px;
		}
		
		input[type='button']{
				width:100%;
				height:auto;
				border-radius:4px;
				box-sizing: border-box;
				border: 2px solid #ccc;
				padding:2px;
				font-size:20px;
			}
			input[type='submit']{
				width:100%;
				height:auto;
				border-radius:4px;
				box-sizing: border-box;
				border: 2px solid #ccc;
				padding:2px;
				font-size:20px;
			}

		.btn.btn-info{font-weight:bolder; background:#4267b2; width:40%; }
		.btn.btn-primray{font-weight:bolder; width:40%; }
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:20px; font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
	
	
	}
@media (max-width:1280px) 
	{
		body{margin:0px;padding:0px;background:;}
		#main_f
			{
				position:;
				margin:250px 0px 0px 300px;
				width:50%;
				height:auto;
				background:white;
				text-align:center;
				float:left;
				border-radius:10px;
				border:lightgray 1px groove;
				box-shadow:0px 0px 100px white;
			}

		#title_forget {
			width:100%;
			height:100px;
			background:;
			float:left;
			padding:10px;
		}
		#title_forget pre{
			width:100%;
			height:auto;
			background:white;
			float:left;
			text-align:left;
			font-size:2.0em;
			font-family:algerian;
			margin:20px 0px 0px 0px;
			text-shadow:10px 5px 5px lightgray;
		}

		#error_msj{width:80%; height:80px; text-align:left; margin:20px 0px 0px 100px; }
		#error_msj tr td pre{color:red;padding:8px; font-family:serif; font-size:17px; opacity:0.9;background:pink; }


		#email{
			width:100%;
			background:transparent; 
			height:auto;
			padding:10px;
			float:left;
		}

		#email table{ width:100%; font-family:serif; font-size:19px; }
		#email table tr td {padding:8px; }

		.glyphicon.glyphicon-envelope{font-size:32px; color:gray;}

		input[type='text']{
			width:100%;
			height:40px;
			border-radius:4px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			padding:8px;
		}
		
		input[type='button']{
				width:100%;
				height:auto;
				border-radius:4px;
				box-sizing: border-box;
				border: 2px solid #ccc;
				padding:2px;
				font-size:17px;
			}
			input[type='submit']{
				width:100%;
				height:auto;
				border-radius:4px;
				box-sizing: border-box;
				border: 2px solid #ccc;
				padding:2px;
				font-size:17px;
			}

		.btn.btn-info{font-weight:bolder; background:#4267b2;width:40%; }
		.btn.btn-primray{font-weight:bolder;width:40%;}
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:20px; font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
	
	

	}		

@media (max-width:1024px) 
	{
		body{margin:0px;padding:0px;background:;}	
		
		#main_f{
			margin:150px 0px 0px 0px;
			width:100%;
			height:auto;
			background:white;
			text-align:center;
			float:left;
			border-radius:10px;
			border:lightgray 1px groove;
			box-shadow:0px 0px 100px white;
			font-size:1.0em;
		}
		#error_msj{width:100%; height:80px; text-align:left; margin:20px 0px 0px 0px; }
		#error_msj tr td pre{color:red;padding:8px; font-family:serif; font-size:17px; opacity:0.9;background:pink; }
		#email{
				width:100%;
				background:transparent; 
				height:auto;
				padding:0px;
				float:left;
			}
			input[type='button']{
				width:100%;
				height:auto;
				border-radius:4px;
				box-sizing: border-box;
				border: 2px solid #ccc;
				padding:2px;
				font-size:15px;
			}
			input[type='submit']{
				width:100%;
				height:auto;
				border-radius:4px;
				box-sizing: border-box;
				border: 2px solid #ccc;
				padding:2px;
				font-size:15px;
			}

		#email table{ width:80%; font-family:serif; font-size:20px; }
		#email table tr td {padding:8px; }
		
		.btn.btn-info{font-weight:bolder; background:#4267b2; width:35%;  float:; }
		.btn.btn-primray{font-weight:bolder;width:35%; float:; }
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:20px; font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
	
	
	
		
	}	
	
@media (max-width:980px) 
	{
		body{margin:0px;padding:0px;background:;}	
		
		#main_f{
			margin:150px 0px 0px 0px;
			width:100%;
			height:auto;
			background:white;
			text-align:center;
			float:left;
			border-radius:10px;
			border:lightgray 1px groove;
			box-shadow:0px 0px 100px white;
			font-size:1.0em;
		}
		#error_msj{width:100%; height:80px; text-align:left; margin:20px 0px 0px 0px; }
		#error_msj tr td pre{color:red;padding:8px; font-family:serif; font-size:17px; opacity:0.9;background:pink; }
		#email{
				width:100%;
				background:transparent; 
				height:auto;
				padding:0px;
				float:left;
			}

		#email table{ width:100%; font-family:serif; font-size:19px; }
		#email table tr td {padding:8px; }
		
		.btn.btn-info{font-weight:bolder; background:#4267b2; width:45%;  float:; }
		.btn.btn-primray{font-weight:bolder;width:45%; float:; }
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:15px; font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
	
	
	
	
	
	
	}	
	
	
@media (max-width:736px) 
	{
		body{margin:0px;padding:0px;background:;}	
		
		#main_f{
			margin:150px 0px 0px 0px;
			width:100%;
			height:auto;
			background:white;
			text-align:center;
			float:left;
			border-radius:10px;
			border:lightgray 1px groove;
			box-shadow:0px 0px 100px white;
			font-size:1.0em;
		}
		#error_msj{width:100%; height:80px; text-align:left; margin:20px 0px 0px 0px; }
		#error_msj tr td pre{color:red;padding:8px; font-family:serif; font-size:17px; opacity:0.9;background:pink; }
		#email{
				width:100%;
				background:transparent; 
				height:auto;
				padding:0px;
				float:left;
			}

		#email table{ width:100%; font-family:serif; font-size:17px; }
		#email table tr td {padding:7px; }
		
		.btn.btn-info{font-weight:bolder; background:#4267b2;width:45%;  float:left; }
		.btn.btn-primray{font-weight:bolder;width:45%; float:right; }
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:15px; font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
	
	
		
	}
	
	
@media (max-width:480px) 
	{
		body{margin:0px;padding:0px;background:;}	
		
		#main_f{
			margin:150px 0px 0px 0px;
			width:100%;
			height:auto;
			background:white;
			text-align:center;
			float:left;
			border-radius:10px;
			border:lightgray 1px groove;
			box-shadow:0px 0px 100px white;
			font-size:1.0em;
		}
		#error_msj{width:100%; height:80px; text-align:left; margin:20px 0px 0px 0px; }
		#error_msj tr td pre{color:red;padding:8px; font-family:serif; font-size:17px; opacity:0.9;background:pink; }
		#email{
				width:100%;
				background:transparent; 
				height:auto;
				padding:5px;
				float:left;
			}

		#email table{ width:100%; font-family:serif; font-size:17px; }
		#email table tr td {padding:5px; }
		
		.btn.btn-info{font-weight:bolder; background:#4267b2;width:45%; float:left; }
		.btn.btn-primray{font-weight:bolder;width:45%; float:right; }
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:15px; font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
	
	
	
	
	}
	
	
@media (max-width:360px) 
	{
		body{margin:0px;padding:0px;background:; }
		#main_f{
			margin:150px 0px 0px 0px;
			width:100%;
			height:auto;
			background:white;
			text-align:center;
			float:left;
			border-radius:10px;
			border:lightgray 1px groove;
			box-shadow:0px 0px 100px white;
			font-size:1.0em;
		}
		#error_msj{width:100%; height:80px; text-align:left; margin:20px 0px 0px 0px; }
		#error_msj tr td pre{color:red;padding:8px; font-family:serif; font-size:17px; opacity:0.9;background:pink; }
		#email{
				width:100%;
				background:transparent; 
				height:auto;
				padding:5px;
				float:left;
			}

		#email table{ width:100%; font-family:serif; font-size:15px; }
		#email table tr td {padding:2px; }
		
		.btn.btn-info{font-weight:bolder; background:#4267b2;width:45%; float:left; }
		.btn.btn-primray{font-weight:bolder;width:45%; float:right; }
		
		#my_intro{background:;width:100%; float:left; margin:20px 0px 0px 0px;}
		#my_intro h2{ width:100%; display:; color:#4267b2; padding:10px; font-size:15px;font-family:Lucida Calligraphy;  overflow:hidden; float:left;}
		#my_intro h2 a{ text-decoration:none; color:#4267b2;}
	}

</style>
<body>
<?php include("Background.php");?>
	<div id="main_f">

		<div id="title_forget">
			<pre style=''> Find Your Account </pre>
		</div>
			
			<table  border='0' id='error_msj' style=' '>
				<tr>
					<td  colspan='' id='msj' style=' display:none;'><pre>Warning...! <br />Please Fill one Filed Requried...!</pre></td>
					<td  colspan='' id='msj2' style=' display:none;'> </td>
					
				</tr>
			</table>	
		
		<div id="email">
				
			<table  border='0'>
				
				<tr>
					<td>&nbsp </td>
					<td  colspan='' style=' text-align: left; padding:10px;'>Email, Phone, Username or Full Name</td>
				</tr>
	
		<form Method="POST" onSubmit="return check();" name="Reg">
				<tr>
				
					<td><span class="glyphicon glyphicon-envelope"></td>
					<td><input type='text' name='forgetemail' id="forgetemail" placeholder='Enter Email Or Phone'/></td>
				</tr>
			</table>
			<table border='0' >
				<tr>
					<td colspan='2'> &nbsp </td>
					<td>  </td>
					<td>
						<input type='submit' name='submit'  value="Search" class="btn btn-info" />
						<a href='index.php'><input type='button' name='' value='Cancel'  class='btn btn-primray'/></a>
					</td>
		</form>
				</tr>
				
			</table>
		</div>
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
	
	function check(){
	 var email=Reg.forgetemail.value;
	//var email=document.getElementById("forgetemail").value;
		if(email ==""){
			var email=document.getElementById("msj").style.display="block";
			//document.getElementById("email").style.height="auto";
			Reg.forgetemail.focus();
			return false;
		}
	}
	
	
</script>
