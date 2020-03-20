<?php include("../../../connection/conect.php");?>
<?php
error_reporting(0);
session_start();
		if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];
if(isset($_GET['id']))
	$id=$_GET['id'];
	
	$profile_p=$mysqli->query("select * from  user_profile_pic where user_id='$id'");
	$cover_p=$mysqli->query("select * from  user_cover_pic where user_id='$id'");
	$timeline_p=$mysqli->query("select * from  user_post where user_id='$id'");

?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>Photos</title>
	 <meta charset='utf-8'>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
		<script type="text/javascript" src="js_files/jquery.js"></script>
		<script  type="text/javascript" src="js_files/photo_javafile.js"></script>
				
	</head>
	
	
<style>
body { background-image:url(../image/Crunchify.PNG);}


#p_main{
	
	width:80%;
	height:500px;
	float:left;
	font-family:serif;
	background:;
	padding:10px 0px 0px 30px;

}
#title{
	background:#f5f5f5;
	width:95%;
	height:100px;
	box-shadow:0px 0px 25px black;
	float:left;
	font-family:algerian;
	font-weight:bolder;
	font-size:1.9em;
	float:left;
	text-transform:capitalize;
	 box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
	-webkit-transition: 2s linear;
	-webkit-transition-timing-function: linear;
	}
	
#title:hover {
	
	height:120px;
	
}		
#profile{
		background:;
		width:25%;
		height:200px;
		float:left;
		cursor:pointer;
		margin:30px 0px 0px 50px;
		
		-webkit-transition-timing-function:linear;
		
		-webkit-transition:transform 300ms linear;
		overflow:;

	}

#profile:hover .front_img{

	-webkit-transform:rotate(5deg);
	
	
}	
	
#cover_p{
		background:;
		width:25%;
		height:200px;
		margin:10px;
		float:left;
		
		cursor:pointer;
		margin:30px 0px 0px 50px;
		
		-webkit-transition:transform 300ms ease-in-out;
		overflow:;
	}
#cover_p:hover .front_img{

	-webkit-transform:rotate(5deg);
	
}	
	
#timeline{
		background:;
		width:25%;
		height:200px;
		margin:30px 0px 0px 50px;
		float:left;
		cursor:pointer;
		
		-webkit-transition:transform 3000ms ease-in-out;
		overflow:;

	}
#timeline:hover .front_img{

	-webkit-transform:rotate(-5deg);
	
}	
.front_img{
	width:100%;
	height:200px;
	padding:0px;
	 box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
	box-shadow:0px 10px 25px black;

		
}	
.back_img{
	width:20%;
	height:200px;
	padding:0px;
	border: 2px solid #ccc;
    border-radius: 4px;
	float:left;
	border-radius:4px;
	box-shadow:10px 10px 25px black;
	margin:20px;
	-webkit-transition: 2s ease-in-out;
	-webkit-transition-timing-function: ease-in-out;
	cursor:pointer;
}

.back_img:hover {
			float:left; 
			width:45%;
			height:200px;
			-webkit-transform:rotate(-5deg);
		}

		
.none_img{
	width:100%;
	height:200px;
	padding:0px;
	box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
	box-shadow:0px 10px 25px black;
		
}

#hide_profile{
	width:100%;
	height:auto;
	background:;
	display:none;
	margin:150px 0px 0px 0px;

	}
#hide_cover{
	width:100%;
	height:auto;
	background:;
	display:none;
	margin:150px 0px 0px 0px;
}
#hide_timeline{
	width:100%;
	height:auto;
	background:;
	position:;
	display:none;
	margin:150px 0px 0px 0px;
	
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
		#p_main{
	
			width:80%;
			height:auto;
			min-height:auto;
			max-height:1024px;
			float:left;
			font-family:serif;
			background:;
			padding:30px;


		}
		#title{
			width:95%;
			height:110px;
			float:left;
		}
		
		#timeline,#profile,#cover_p{
			background:;
			height:auto;
			width:35%;
			padding:10px;			
			float:left;
			margin:30px 0px 0px 50px;
			
		
		}
		
		#cover_p table,#timeline table,#profile table{
			background:;
			width:100%;
			padding:20px;
			margin:auto;
			float:left;
			height:auto;
		}
		
		#hide_profile,#hide_cover,#hide_timeline{
			width:100%;
			height:auto;
			background:;
			display:none;
			margin:10px;
			float:left;
			

		}
		.back_img{
			width:25%;
			height:200px;
			padding:0px 0px 0px 0px;
			border: 2px solid #ccc;
			border-radius: 4px;
			float:left;
			border-radius:4px;
			box-shadow:10px 10px 25px black;
			margin:10px 0px 0px 50px;
			-webkit-transition: 20ms ease-in-out;
			-webkit-transition-timing-function: ease-in-out;
			cursor:pointer;
		}
		
		.back_img:hover {
			float:left; 
			width:25%;
			height:200px;
			-webkit-transform:rotate(-5deg);

		
		}		
	
	
	
	}	
	
@media screen and (max-width: 1680px) 
	{
		body{margin:0px;padding:0px;background:;}
		#p_main{
	
			width:80%;
			height:500px;
			min-height:auto;
			max-height:500px;
			float:left;
			font-family:serif;
			background:;
			padding:30px;
			margin:auto;


		}
		#title{
			width:95%;
			height:100px;
			float:left;
		}
		
		#timeline,#profile,#cover_p{
			background:;
			height:auto;
			width:40%;
			padding:20px;			
			float:left;
			margin:30px 0px 0px 50px;
			
		
		}
		
		#cover_p table,#timeline table,#profile table{
			background:;
			width:100%;
			padding:20px;
			margin:auto;
			float:left;
			height:auto;
		}
		
		#hide_profile,#hide_cover,#hide_timeline{
			width:100%;
			height:auto;
			background:;
			display:none;
			margin:10px;
			float:left;
			

		}
		.back_img{
			width:45%;
			height:200px;
			padding:0px 0px 0px 0px;
			border: 2px solid #ccc;
			border-radius: 4px;
			float:left;
			border-radius:4px;
			box-shadow:10px 10px 25px black;
			margin:10px 0px 0px 10px;
			-webkit-transition: 20ms ease-in-out;
			-webkit-transition-timing-function: ease-in-out;
			cursor:pointer;
		}
		
		.back_img:hover {
			float:left; 
			width:45%;
			height:200px;
			-webkit-transform:rotate(-5deg);

		
		}		
	}
@media (max-width:1280px) 
	{
		body{margin:0px;padding:0px;background:;}
		#p_main{
	
			width:80%;
			height:500px;
			min-height:auto;
			max-height:500px;
			float:left;
			font-family:serif;
			background:;
			padding:30px;
			margin:auto ;

		}
		#title{
			width:95%;
			height:100px;
			float:left;
		}
		
		#timeline,#profile,#cover_p{
			background:;
			height:auto;
			width:28%;
			padding:15px;			
			float:left;
			margin:30px 0px 0px 20px;
			
		
		}
		
		#cover_p table,#timeline table,#profile table{
			background:;
			width:100%;
			padding:20px;
			margin:auto;
			float:left;
			height:auto;
		}
		
		#hide_profile,#hide_cover,#hide_timeline{
			width:100%;
			height:auto;
			background:;
			display:none;
			margin:10px;
			float:left;
			

		}
		.back_img{
			width:45%;
			height:200px;
			padding:0px 0px 0px 0px;
			border: 2px solid #ccc;
			border-radius: 4px;
			float:left;
			border-radius:4px;
			box-shadow:10px 10px 25px black;
			margin:10px 0px 0px 10px;
			-webkit-transition: 20ms ease-in-out;
			-webkit-transition-timing-function: ease-in-out;
			cursor:pointer;
		}
		
		.back_img:hover {
			float:left; 
			width:45%;
			height:200px;
			-webkit-transform:rotate(-5deg);

		
		}		

	}		

@media (max-width:1024px) 
	{
		body{margin:0px;padding:0px;background:;}	
		#p_main{
			width:100%;
			height:auto;
			min-height:auto;
			max-height:900px;
			float:left;
			font-family:serif;
			background:;
			padding:30px;
			margin:auto;
		}
		#title{
			width:100%;
			height:100px;
			float:left;
		}
		
		#timeline,#profile,#cover_p{
			background:;
			height:auto;
			width:50%;
			padding:20px;			
			float:left;
			margin:auto;
			
		
		}
		
		#cover_p table,#timeline table,#profile table{
			background:;
			width:100%;
			padding:20px;
			margin:auto;
			float:left;
			height:auto;
		}
		
		#hide_profile,#hide_cover,#hide_timeline{
			width:100%;
			height:auto;
			background:;
			display:none;
			margin:10px;
			float:left;
			

		}
		.back_img{
			width:45%;
			height:200px;
			padding:0px 0px 0px 0px;
			border: 2px solid #ccc;
			border-radius: 4px;
			float:left;
			border-radius:4px;
			box-shadow:10px 10px 25px black;
			margin:10px 0px 0px 10px;
			-webkit-transition: 20ms ease-in-out;
			-webkit-transition-timing-function: ease-in-out;
			cursor:pointer;
		}
		
		.back_img:hover {
			float:left; 
			width:45%;
			height:200px;
			-webkit-transform:rotate(-5deg);

		
		}		
		
	}	
	
@media (max-width:980px) 
	{
		body{margin:0px;padding:0px;background:;}	
		#p_main{
			width:100%;
			height:auto;
			min-height:auto;
			max-height:900px;
			float:left;
			font-family:serif;
			background:;
			padding:30px;
			margin:auto;
		}
		#title{
			width:100%;
			height:100px;
			float:left;
		}
		
		#timeline,#profile,#cover_p{
			background:;
			height:auto;
			width:50%;
			padding:20px;			
			float:left;
			margin:auto;
			
		
		}
		
		#cover_p table,#timeline table,#profile table{
			background:;
			width:100%;
			padding:20px;
			margin:auto;
			float:left;
			height:auto;
		}
		
		#hide_profile,#hide_cover,#hide_timeline{
			width:100%;
			height:auto;
			background:;
			display:none;
			margin:10px;
			float:left;
			

		}
		.back_img{
			width:45%;
			height:200px;
			padding:0px 0px 0px 0px;
			border: 2px solid #ccc;
			border-radius: 4px;
			float:left;
			border-radius:4px;
			box-shadow:10px 10px 25px black;
			margin:10px 0px 0px 10px;
			-webkit-transition: 20ms ease-in-out;
			-webkit-transition-timing-function: ease-in-out;
			cursor:pointer;
		}
		
		.back_img:hover {
			float:left; 
			width:45%;
			height:200px;
			-webkit-transform:rotate(-5deg);

		
		}		
		
		
	}	
@media (max-width:736px) 
	{
		body{margin:0px;padding:0px;background:;}	
		#p_main{
			width:100%;
			height:auto;
			min-height:auto;
			max-height:900px;
			float:left;
			font-family:serif;
			background:;
			padding:30px;
			margin:auto;
		}
		#title{
			width:100%;
			height:100px;
			float:left;
		}
		#profile,#cover_p,#timeline{
		background:;
		height:auto;
		width:100%;
		padding:0px;
		float:left;
		margin:auto;
		
		}
		#cover_p,#timeline,#profile table{
			background:;
			width:100%;
			padding:0px;
			margin:8px 0px 0px 0px;
			float:left;
			height:auto;
		}
		#hide_profile,#hide_cover,#hide_timeline{
			width:100%;
			height:auto;
			background:;
			display:none;
			margin:auto;
			float:left;

		}
		.back_img{
			width:100%;
			height:200px;
			padding:0px 0px 0px 0px;
			border: 2px solid #ccc;
			border-radius: 4px;
			float:left;
			border-radius:4px;
			box-shadow:10px 10px 25px black;
			margin:10px 0px 0px 0px;
			-webkit-transition: 20ms ease-in-out;
			-webkit-transition-timing-function: ease-in-out;
			cursor:pointer;
		}
		
		.back_img:hover {
			float:left; 
			width:100%;
			height:200px;
			-webkit-transform:rotate(-5deg);

		
		}
	
		
	}
	
@media (max-width:480px) 
	{
		body{margin:0px;padding:0px;background:;}	
		#p_main{
			width:100%;
			height:auto;
			min-height:auto;
			max-height:900px;
			float:left;
			font-family:serif;
			background:;
			padding:20px;
			margin:auto;
		}
		#title{
			width:100%;
			height:100px;
			float:left;
		}
		#profile,#cover_p,#timeline{
		background:;
		height:auto;
		width:100%;
		padding:0px;
		float:left;
		margin:auto;
		
		}
		#cover_p,#timeline,#profile table{
			background:;
			width:100%;
			padding:0px;
			margin:8px 0px 0px 0px;
			float:left;
			height:auto;
		}
		#hide_profile,#hide_cover,#hide_timeline{
			width:100%;
			height:auto;
			background:;
			display:none;
			margin:auto;
			float:left;

		}
		.back_img{
			width:100%;
			height:200px;
			padding:0px 0px 0px 0px;
			border: 2px solid #ccc;
			border-radius: 4px;
			float:left;
			border-radius:4px;
			box-shadow:10px 10px 25px black;
			margin:10px 0px 0px 0px;
			-webkit-transition: 20ms ease-in-out;
			-webkit-transition-timing-function: ease-in-out;
			cursor:pointer;
		}
		
		.back_img:hover {
			float:left; 
			width:100%;
			height:200px;
			-webkit-transform:rotate(-5deg);

		
		}
	
	
	}
	
	
@media (max-width:360px) 
	{
		body{margin:0px;padding:0px;background:;}
		#p_main{
			width:100%;
			height:auto;
			min-height:auto;
			max-height:900px;
			float:left;
			font-family:serif;
			background:;
			padding:10px;
			margin:auto;
		}
		#title{
			width:100%;
			height:100px;
			float:left;
		}
		#profile,#cover_p,#timeline{
		background:;
		height:auto;
		width:100%;
		padding:0px;
		float:left;
		margin:auto;
		
		}
		#cover_p,#timeline,#profile table{
			background:;
			width:100%;
			padding:0px;
			margin:8px 0px 0px 0px;
			float:left;
			height:auto;
		}
		#hide_profile,#hide_cover,#hide_timeline{
			width:100%;
			height:auto;
			background:;
			display:none;
			margin:auto;
			float:left;

		}
		.back_img{
			width:100%;
			height:200px;
			padding:0px 0px 0px 0px;
			border: 2px solid #ccc;
			border-radius: 4px;
			float:left;
			border-radius:4px;
			box-shadow:10px 10px 25px black;
			margin:10px 0px 0px 0px;
			-webkit-transition: 20ms ease-in-out;
			-webkit-transition-timing-function: ease-in-out;
			cursor:pointer;
		}
		
		.back_img:hover {
			float:left; 
			width:100%;
			height:200px;
			-webkit-transform:rotate(-5deg);

		
		}

	}
	
</style>

<body>
<?php include("background.php");?>
	<div id="p_main">
		<div id="title">
			<p style='padding:10px; color:gray;'><img src='image/about1.png' height='70px' style='padding:10px;'/>photo</p>
		</div>
		<!-----------profile---------------->
		<div id="hide_profile">
			<div id="back" style="width:20%;cursor:pointer; height:50px;"><img src="image/previous.gif" width="80%" height="50px" /></div>

			<?php
				while($profile_pic=$profile_p->fetch_array()){
					$image_profile=$profile_pic['image'];
				echo"<img src='../../../fb_user/$gender_fbs/$email_fbs/Profile/$image_profile' title='$image_profile' class='back_img'/>";
				}
			?>
		</div>
		<div id="profile">
			<table border='0'>
				<tr>
					<td><img src="<?php echo"../../../fb_user/$gender_fbs/$email_fbs/Profile/$image_profile"; ?>" title="<?php echo $image_profile;?>" class="front_img"/></td>
				</tr>
				<tr>
					<td><p class="names" style="color:gray; text-align:center;  font-weight:bolder;padding-top:10px; font-size:30px;text-shadow:10px 10px 10px gray; position:;">Profile</p></td>
				</tr>
			</table>
		</div>
		
		
		<!--------------cover------------->
		<div id="hide_cover">
			<div id="back_cover" style="width:20%;cursor:pointer; height:50px;"><img src="image/previous.gif" width="80%" height="50px" /></div>

			<?php
				while($cover_pic=$cover_p->fetch_array()){
					$image_cover=$cover_pic['image'];
				if($image_cover !=''){	
				echo"<img src='../../../fb_user/$gender_fbs/$email_fbs/Cover/$image_cover' title='$image_cover' class='back_img'/>";
				}
				}
			?>
		
		</div>
		
		<div id="cover_p">
			<?php if($image_cover !=''){ ?>
			<table id='cover_show' border='0'>
				<tr>
					<td><img src="<?php echo"../../../fb_user/$gender_fbs/$email_fbs/Cover/$image_cover"; ?>" title="<?php echo $image_cover;?>" class="front_img"/></td>
				</tr>
				<tr>
					<td><p style="color:gray; text-align:center; font-weight:bolder;padding-top:10px; font-size:30px; text-shadow:10px 10px 10px gray; position:;">Cover</p></td>
				</tr>
			</table>
			<?php }else{?>
			<table id='' border='0'>
				<tr>
					<td><img src="image/about1.png" class="none_img"/></td>
				</tr>
				<tr>
					<td><p style="color:gray; text-align:center; font-weight:bolder;  padding-top:10px; font-size:30px;text-shadow:10px 10px 10px gray;position:;">Cover</p></td>
				</tr>
			</table>
			<?php }?>
		</div>
		
		
		<!-------------timeline-------------->
		<div id="hide_timeline">
			<div id="back_timeline" style="width:20%;cursor:pointer; height:50px;"><img src="image/previous.gif" width="80%" height="50px" /></div>
			<?php
				while($timeline_pic=$timeline_p->fetch_array()){
					$image_timeline=$timeline_pic['post_pic'];
				if($image_timeline !=''){	
				echo"<img src='../../../fb_user/$gender_fbs/$email_fbs/Post/$image_timeline' title='$image_timeline' class='back_img'/>";
				}
				}
			?>
		
		</div>
		<div id="timeline">
			<?php if($image_timeline !=''){ ?>
			<table id='timeline_show' border='0'>
				<tr>
					<td><img src="<?php echo"../../../fb_user/$gender_fbs/$email_fbs/Post/$image_timeline"; ?>" title="<?php echo $image_timeline;?>" class="front_img"/></td>
				</tr>
				<tr>
					<td><p style="color:gray; text-align:center; font-weight:bolder;  padding-top:10px; font-size:30px;text-shadow:10px 10px 10px gray;position:;">Timeline</p></td>
				</tr>
			</table>
			<?php }else{?>
			<table id='' border='0'>
				<tr>
					<td><img src="image/about1.png" class="none_img"/></td>
				</tr>
				<tr>
					<td><p style="color:gray; text-align:center; font-weight:bolder;  padding-top:10px; font-size:30px;text-shadow:10px 10px 10px gray;position:;">Timeline</p></td>
				</tr>
			</table>
			<?php }?>
		
		</div>
	</div>



</body>
</html>

<?php }else{
	header("location:../../../index.php");

}?>
<script >

</script>	