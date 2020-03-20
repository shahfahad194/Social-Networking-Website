<?php
include("../../../connection/conect.php");
include("../../../logout.php");

//error_reporting(0);
session_start();
if(isset($_SESSION['fbuser']))
{
	$user=$_SESSION['fbuser'];
	
	$row1=$mysqli->query("select * from users where Email='$user'");
		$fetch1=$row1->fetch_array();
		$u_id=$fetch1['user_id'];
		$name=$fetch1['Name'];
		$email=$fetch1['Email'];
		$gender=$fetch1['Gender'];
		//fcth 2nd for pic
	$row2=$mysqli->query("select * from  user_profile_pic where user_id='$u_id'");
		$fetch2=$row2->fetch_array();
		$image=$fetch2['image'];	

	if(isset($_GET['message_id'])){
	$message_id=$_GET['message_id'];
	Setcookie('message_id',$message_id);}
	
	if (isset($_COOKIE['message_id'])) 
			$friend_id=$_COOKIE['message_id'];	
	
			
	

?>
<html>
<head>
	<title>Message</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"  href="../bootstrap/css/bootstrap.css"/>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../Profile/js_files/jquery.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>	
<!--<link rel="stylesheet" type="" href="../css/Background.css"/>-->

</head>
<style>
body{
	
	margin:0px;
	padding:0px;
   background-image:url(../image/Crunchify.png);
	
}
.navbar-header a{  font-size:2.0em;}
.head_srch {
    width: 150px;
	height:40px;
	margin:5px 0px 0px 30px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color:white;
     background-image: url(../image/srh.PNG);
	background-size:30px;
    background-position: 10px 2px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 50px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

.head_srch:focus {width:35%;}

#main_msj{width:50%; height:1024px; border:2px white solid; float:left;background-image:url('../image/Background-4.jpg'); margin:0px 0px 0px 470px;}
	
#center_msj{
	background-image:url('../image/Background-4.jpg');
	width:100%;  height:auto; float:left; background:; position:;  
	float:left;
	border-radius:4px;
}
#right_nav{display:none;}
	
#msj_area{
	background:white;
	position:;
	overflow:;
	float:left;
	background-image:url('../image/Background-4.jpg');
	width:100%; margin:auto; float:left; height:auto;
}

#msj_area table{width:100%;height:auto;}
#msj_area table tr td{padding:3px;}

#get_mjs{width:100%; overflow:auto; float:left;  padding:10px; background:; height:auto;  margin-top:100px; }

textarea {border-radius:5px;padding: 10px 10px 10px 10px;}


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
		
		#main_msj{width:50%; height:1024px; float:left;background:; margin:0px 0px 0px 470px;}
		
		#msj_area{width:100%; margin:auto; float:left; height:auto; background:;}
		
		.navbar.navbar-default.navbar-fixed-bottom{width:50%; margin:0px 0px 0px 470px; float:left;}
		
		#center_msj{width:100%;  height:auto; float:left; background:; position:;  left:0px;}
		
		#center_msj ::-webkit-scrollbar {width:8px; height:2px;}
		
		#get_mjs{width:100%; float:left; height:auto;  margin-top:100px; background:;}
		
		::-webkit-scrollbar {width: 0px; height:0px;}
		
		.navbar-header a{  font-size:2.0em;}
		.head_srch {
			width: 150px;
			height:40px;
			margin:5px 0px 0px 30px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			background-color:white;
			 background-image: url(../image/srh.PNG);
			background-size:30px;
			background-position: 10px 2px;
			background-repeat: no-repeat;
			padding: 12px 20px 12px 50px;
			-webkit-transition: width 0.4s ease-in-out;
			transition: width 0.4s ease-in-out;
		}

		.head_srch:focus {
			width:35%;
		}
		
		
	}
@media screen and (max-width: 1680px) 
	{
		body{margin:0px;padding:0px;background:;}

		#main_msj{width:50%; height:1024px; float:left;background:; margin:0px 0px 0px 280px;}
		
		#msj_area{width:100%; margin:auto; float:left; height:auto; background:;}
		
		.navbar.navbar-default.navbar-fixed-bottom{width:50%; margin:0px 0px 0px 280px; float:left;}
		
		#center_msj{width:100%;  height:auto; float:left; background:; position:;  left:0px;}
		
		#center_msj ::-webkit-scrollbar {width:8px; height:2px;}
		
		#get_mjs{width:100%; float:left; height:auto;  margin-top:100px; background:;}
		
		::-webkit-scrollbar {width: 0px; height:0px;}
		
		.navbar-header a{  font-size:2.0em;}
		.head_srch {
			width: 150px;
			height:40px;
			margin:5px 0px 0px 30px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			background-color:white;
			 background-image: url(../image/srh.PNG);
			background-size:30px;
			background-position: 10px 2px;
			background-repeat: no-repeat;
			padding: 12px 20px 12px 50px;
			-webkit-transition: width 0.4s ease-in-out;
			transition: width 0.4s ease-in-out;
		}

		.head_srch:focus {
			width:35%;
		}
		
	}
	
@media (max-width:1280px) 
	{
		body{margin:0px;padding:0px;background:;}

		#main_msj{width:50%; height:1024px; float:left;background:; margin:0px 0px 0px 280px;}
		
		#msj_area{width:100%; margin:auto; float:left; height:auto; background:;}
		
		.navbar.navbar-default.navbar-fixed-bottom{width:50%; margin:0px 0px 0px 280px; float:left;}
		
		#center_msj{width:100%;  height:auto; float:left; background:; position:;  left:0px;}
		
		#center_msj ::-webkit-scrollbar {width:8px; height:2px;}
		
		#get_mjs{width:100%; float:left; height:auto;  margin-top:100px; background:;}
		
		::-webkit-scrollbar {width: 0px; height:0px;}
		
		.navbar-header a{  font-size:2.0em;}
		.head_srch {
			width: 150px;
			height:40px;
			margin:5px 0px 0px 30px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			background-color:white;
			 background-image: url(../image/srh.PNG);
			background-size:30px;
			background-position: 10px 2px;
			background-repeat: no-repeat;
			padding: 12px 20px 12px 50px;
			-webkit-transition: width 0.4s ease-in-out;
			transition: width 0.4s ease-in-out;
		}

		.head_srch:focus {
			width:35%;
		}
	}	

@media (max-width:1024px) 
	{
		body{margin:0px;padding:0px;background:green;}	
	
		#main_msj{width:100%; height:1024px; background:; margin:auto;}
		
		#msj_area{width:100%; margin:auto; height:auto; background:;}
		
		.navbar.navbar-default.navbar-fixed-bottom{width:100%; margin:0px 0px 0px 0px; float:left;}
		
		#center_msj{width:100%;  height:auto;  background:; position:;  left:0px;}
		
		#center_msj ::-webkit-scrollbar {width:8px; height:2px;}
		
		#get_mjs{width:100%;  height:auto;  margin-top:100px; background:;}
		
		::-webkit-scrollbar {width: 0px; height:0px;}
		
		.navbar-header a{ font-size:1.6em;}
	
		.head_srch {
			width: 60%;
			height:30px;
			margin:0px 0px 0px 10px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			background-color: white;
			background-image: url(../image/srh.PNG);
			background-size:20px;
			background-position: 8px 2px;
			background-repeat: no-repeat;
			padding: 10px 20px 12px 30px;
		 
		}
	   .head_srch:focus {width:60%;}
	}
	
@media (max-width:980px) 
	{
		body{margin:0px;padding:0px;background:gray;}	
	
		#main_msj{width:100%; height:1024px; background:; margin:auto;}
		
		#msj_area{width:100%; margin:auto; height:auto; background:;}
		
		#center_msj{width:100%;  height:auto;   position:;  left:0px;}
		
		.navbar.navbar-default.navbar-fixed-bottom{width:100%; margin:0px 0px 0px 0px; float:left;}

		
		#center_msj ::-webkit-scrollbar {width: 8px; height:2px;}
		
		#get_mjs{width:100%;  height:auto;  margin-top:100px; background:;}
		
		::-webkit-scrollbar {width: 0px; height:0px;}
		
		.navbar-header a{  font-size:1.6em;}
	
		.head_srch {
			width: 60%;
			height:30px;
			margin:0px 0px 0px 10px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			background-color: white;
			background-image: url(../image/srh.PNG);
			background-size:20px;
			background-position: 8px 2px;
			background-repeat: no-repeat;
			padding: 10px 20px 12px 30px;
		 
		}
	   .head_srch:focus {width:60%;}
	
	}
	
	
	
@media (max-width:736px) 
	{
		body{margin:0px;padding:0px;background:red;}	
	
		#main_msj{width:100%; height:1024px; background:; margin:auto; }
		
		#msj_area{width:100%; margin:auto; height:auto; background:;}
		
		#center_msj{width:100%; height:auto;  position:;  left:0px;}
		
		.navbar.navbar-default.navbar-fixed-bottom{width:100%; margin:0px 0px 0px 0px; float:left;}
		
		#center_msj ::-webkit-scrollbar {width: 8px; height:2px;}
		 
		#get_mjs{width:100%;  height:auto;  margin-top:90px; background:;}
		
		::-webkit-scrollbar {width: 0px; height:0px;}
		
		.navbar-header a{  font-size:1.3em;}
	
		.head_srch {
			width: 60%;
			height:28px;
			margin:0px 0px 0px 10px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			background-color: white;
			background-image: url(../image/srh.PNG);
			background-size:17px;
			background-position: 8px 2px;
			background-repeat: no-repeat;
			padding: 10px 20px 12px 30px;
		 
		}
	   .head_srch:focus {width:50%;}
	}


	
@media (max-width:480px) 
	{
		body{margin:0px;padding:0px;background:lightgreen;}	
		
		#main_msj{width:100%; height:1024px; background:;margin:auto;}
		
		#msj_area{width:100%;margin:auto;height:auto;background:;}
		
		.navbar.navbar-default.navbar-fixed-bottom{width:100%; margin:0px 0px 0px 0px; float:left;}
		
		#center_msj{width:100%; height:auto; position:;  left:0px;}
		
		#center_msj ::-webkit-scrollbar {width: 8px; height:2px;}
		
		#get_mjs{width:100%;  height:auto;  margin-top:90px; background:;}
		
		::-webkit-scrollbar {width: 0px; height:0px;}
		
		.navbar-header a{  font-size:1.0em;}
	
		.head_srch {
			width: 60%;
			height:25px;
			margin:0px 0px 0px 10px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			background-color: white;
			background-image: url(../image/srh.PNG);
			background-size:15px;
			background-position: 8px 2px;
			background-repeat: no-repeat;
			padding: 10px 20px 12px 30px;
		 
		}
	   .head_srch:focus {width:50%;}
	
	}
	
@media (max-width:360px) 
	{
		body{margin:0px;padding:0px;background:pink;}

		#main_msj{width:100%; height:1024px; background:; margin:auto; }
		
		#msj_area{width:100%; margin:auto; height:auto; background:;}
		
		#center_msj{width:100%; height:auto; position:; background:; left:0px;}
		
		#center_msj ::-webkit-scrollbar {width: 8px; height:2px;}
		
		.navbar.navbar-default.navbar-fixed-bottom{width:100%; margin:0px 0px 0px 0px; float:left;}
		
		#get_mjs{width:100%;  height:auto;  margin-top:90px; background:;}
		
		::-webkit-scrollbar {width: 0px; height:0px;}
		
		.navbar-header a{ font-size:0.9em;}
	
		.head_srch {
			width: 60%;
			height:20px;
			margin:0px 0px 0px 10px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 12px;
			background-color: white;
			background-image: url(../image/srh.PNG);
			background-size:16px;
			background-position: 8px 2px;
			background-repeat: no-repeat;
			padding: 10px 20px 12px 30px;
		 
		}
	   .head_srch:focus {width:50%;}
	
	}	
</style>
<body onload='Get_msj();'>
<?php include("../Home/Background.php");?>
	<div id="main_msj">
		<div id="center_msj">
			<div id='get_mjs' style=''></div>
			<nav class="navbar navbar-default navbar-fixed-bottom" style="float:left;">
				<div id="msj_area">
					<table>
						<tr>
							<td width='90%'><textarea  name="txt" id='txt' rows="auto" cols="64" placeholder="Type Message Here..."style="background:; width:100%; "></textarea></td>
						</tr>
						<tr>
							<td align="right"><input type="submit" name="submit" Value="Send" style='font-weight:bolder;  background:#0b43b9;font-family:serif;width:20%;'class="btn btn-primary" /></td>
						<?php
						//print date("m/d/y G.i:s<br>", time());
						// print "Today is ";
						// print date("j of F Y, \a\\t g:i a", time());
						?>
						</tr>
					</table>
					
				</div>
			</nav>	
			<?php 
			
			if(isset($_POST['msj_send'])){
				$msj_post=$_POST['msj_post'];
				 $time=date("g:i a");
				if($friend_id !=''){
				$mysqli->query("insert into chat(user_id,friend_id,msj,time_chat) values('$u_id','$friend_id','$msj_post','$time')").$mysqli->error;
				}
			}
			?>
		</div>
		<div style='float:left; width:100%; height:100px;'></div>
	</div>

</body>
</html>
<script>
$(document).ready(function(){
$('.btn.btn-primary').click(function(){
	var msj= $('#txt').val();
		//alert('You pressed a "enter" key in textbox');
		if(msj=='')
		{
		alert("Enter some text..");
		$("#txt").focus();
		}
		else
		{
		//$("#flash").show();
		//$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
		$.ajax({
			
			url:'Msj.php',
			data:{	msj_send:1,
					msj_post:msj,
					
					
					},
			type:'POST',
		
			success:function(){
				//alert(msj);
			//$('#show_comment').after(html);
			$('#txt').val("");
			//$("#flash").fadeOut('slow');
			$("#txt").focus();
			Get_msj();
			}
			
		});
		}


	
});
});




</script>
<script>		
function Get_msj(){

	$.ajax({

		url:'Get_msj.php',
		type:'GET',
		success: function (data){
		
		$('#get_mjs').html(data);

		}

	});
}

setInterval("Get_msj()",3000);

</script>
<?php  }?>