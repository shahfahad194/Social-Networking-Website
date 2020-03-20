<?php
include("../../connection/conect.php");

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
<link rel="stylesheet"  href="bootstrap/css/bootstrap.css"/>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="Profile/js_files/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>	
<link rel="stylesheet" type="" href="css/Background.css"/>

<!--google aadss-->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({
	google_ad_client: "ca-pub-2589843701748129",
	enable_page_level_ads: true
	});
	</script>
	<!--google aadss-->	
</head>
<style>
input[type=search] {
    width: 150px;
	height:40px;
	margin:5px 0px 0px 30px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url(image/srh.png);
	background-size:30px;
    background-position: 10px 2px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=search]:focus {
    width: 30%;
}
#main_msj{
	width:100%;
	max-height:100%;
	min-height:50%;
	height:667px;
	
}
#left_msj{
	
	width:18%;
	height:610px;
	background:lightgray;
	position:fixed;
	border:groove 1px gray;
	float:left;
	top:8%;
	box-sizing:border-box;
	border: 2px solid #ccc;
	border-radius: 4px;
	}
#feeds{
	width:80%;
	height:150px;
	background:;
	font-family:serif;
	
	}
#feeds table tr td a{
	text-decoration:none;
	text-transform:capitalize;
	}
#feeds table tr td{
	padding:5px;
	border:;
	
}
	
#center_msj{
	background-image:url('image/Background-4.jpg');
	width:45%;
	height:667px;
	left:20%;
	position:fixed;
	border:groove 1px gray;
	float:left;
	box-sizing:border-box;
	border: 2px solid #ccc;
	border-radius: 4px;
}
#right_msj{
	top:8%;
	width:20%;
	left:80%;
	overflow:auto;
	background:lightgray;
	height:610px;
	background:;
	position:fixed;
	float:;
	box-sizing:border-box;
	border: 2px solid #ccc;
	border-radius: 4px;
}
#msj_area{
	width:100%;
	margin-top:3px;
	height:auto;
	background:white;
	position:;
	overflow:;
	border-top-style:groove;
	border-width:thin;
	float:left;
	background-image:url('image/Background-4.jpg');

}
#msj_area table{
	width:100%;
	height:auto;

}
#msj_area table tr td{
	
	padding:3px;
	
}
textarea {
	border-radius:5px;
	padding: 10px 10px 10px 10px;
}
/* Scrollbar styles */
::-webkit-scrollbar {
width: 12px;
height: 12px;
}

::-webkit-scrollbar-track {
box-shadow: inset 0 0 10px olivedrab;
border-radius: 10px;
}

::-webkit-scrollbar-thumb {
border-radius: 10px;
background: yellowgreen; 
box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}

::-webkit-scrollbar-thumb:hover {
background: #7bac10;
}
</style>
<body>
<nav class="navbar navbar-default navbar-fixed-top" style="float:left;background:#3B5998;">
		  <div class="container-fluid" style='height:40px;'>
			<div class="navbar-header">
			  <a class="navbar-brand" href="#" style="text-shadow:0px 0px 25px black; font-family:sans-serif; font-weight:bolder; color:white;">FriendsBook</a>
			
			</div>
				<form method="POST">
					<input type="search" class="head_srch" name="search" placeholder="Search People.." style='font-weight:bolder; float:left;' ></li>
					<!--<input type="submit"class="head_srch" name="submit" Value="Search" style='display:none;font-weight:bolder; float:left;  margin:0px 0px 0px 0px ;'class="btn btn.primary" ></li>-->
				</form>
				<ul class="nav navbar-nav" style="float:right; background:; ">
					<li style='float:; list-style:none; color:white; '><a href='Profile/Profile.php?id=<?php echo $u_id;?>' style=' font-weight:bolder; color:white; text-transform:capitalize;'><?php echo $name;?></a></li>
					<li style='float:; list-style:none; color:white; '><a href='Home.php' style=' font-weight:bolder; color:white; text-transform:capitalize;'>Home</a></li>
					<!--<li style="float:;"><a href="#"><span class="glyphicon glyphicon-user .badge" class="badge" style="color:white; font-size:1.2em;"><?php //echo"7";?> </span></a></li>
					<li style="float:;"><a href="#"><span class="glyphicon glyphicon-globe .badge"  style="color:white; font-size:1.2em;">2</span></a></li> 
					<li style="float:;"><a href="#"><span class="glyphicon glyphicon-comment .badge"  style="color:white; font-size:1.2em;">12</span></a></li>--> 
					<li style="float:;"><a href="#" id="msj_click"><span class="glyphicon glyphicon-comment .badge"  style="color:white; font-size:1.2em;"></span></a></li> 
					
				</ul>
					<li id="head_pic"style='list-style:none; color:white;'><a href='Profile/Profile.php?id=<?php echo $u_id;?>' ><img src='<?php if($gender=='Male' || $gender=='Female'){echo"../../fb_user/$gender/$email/Profile/$image";}?>' width='' height='35px' style=' border:1px solid white;  box-shadow:0px 0px 25px lightblue; border-radius:3px; margin:5px 0px 0px 0px;float:right;'/></a></li>

				
		  </div>
		  		<div class="container-fluid_2" style="width:100%;height:50px;float:left;background:lightgray;">
				<table width='100%'>
					<td><a href='Profile/Profile.php?id=<?php echo $u_id;?>'><span class="glyphicon glyphicon-user .badge" title='Profile'  style="color:white; font-size:1.2em;"></span></a></td>
					<td><a href="msj.php" id="msj_click"><span class="glyphicon glyphicon-comment .badge" title='Message' style="color:white; font-size:1.2em;"></span></a></td> 
					<td><a href="#" id=""><span class="glyphicon glyphicon-th-list" title='List' style="color:white; font-size:1.2em;"></span></a></td> 
					
				</table>
				</div>

		</nav>
	<div id="main_msj">
		<div id="left_msj">
			<div id='feeds'>
				<table  rules="" align="center" width='100%' class=''>
				
				<tr>
					<td><img src='image/newsfeed.png' width='20px'/></td>
					<td style='text-align:left;'><a href='Home.php'>News feed</a></td>
				</tr>
				<tr>
					<td><img src='image/timeline.png' width='20px'/></td>
					<td style='text-align:left;'><a href="Profile/Profile.php?id=<?php echo $u_id;?>">Timeline</a></td>
				</tr>
				<tr>
					<td><img src='image/my_videos.png' width='20px'/></td>
					<td style='text-align:left;'> <a href='Profile/Photo.php?id=<?php echo $u_id;?>'>photo&video</a> </td>
				</tr>
				<tr>
					<td><img src='image/about.png' width='20px'/></td>
					<td style='text-align:left;'> <a href='Profile/about.php?id=<?php echo $u_id;?>'>about</a> </td>
				</tr>
				<tr>
					<td><img src='image/settings2.png' width='20px'/></td>
					<td style='text-align:left;'> <a href=''>setting </a></td>
				</tr>
				
				
				</table>
			</div>
		
		
		</div>
		<div id="center_msj">
			<div id='get_mjs' style='width:100%; overflow:auto; height:72%;float:left; margin:11% 0px 0px 0px; padding:10px;background:;'>
			
			</div>
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
		<div id="right_msj">
		<?php include("chatlist.php");?>
		</div>
	
	
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
Get_msj();
setInterval("Get_msj()",3000);

</script>
<?php  }?>