<?php
include("../../../connection/conect.php");
//error_reporting(0);
session_start();
if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];
		
		if(isset($_GET['group_id']))
		$group_id=$_GET['group_id'];
		
		Setcookie('group_id',$group_id);
		
		
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
			
			
		
	?>
<script>


</script>


<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>Groups</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.min.css"/>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/glyphicons-halflings-regular.ttf"/>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
		<!--<link rel="stylesheet" type="text/css" href="../css/Background.css"/>-->
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../Profile/js_files/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="Groups.js"></script>
	</head>
<style>
body{
	 background-image:url(../image/Crunchify.PNG);
	}

	#side_nav{display:none;}
	#right_nav{display:none;}
		
#groups_menu_side{
			
	width:17%;
	height:10000px;
	min-height:auto;
	max-height:1000px;
	float:left;
	position:fixed;	
	max-height:auto;
	border-right-style:solid;
	border-color:lightgray;
	border-width:2px;
	box-shadow:0px 10px 25px black;
	box-sizing: border-box;
			
	}
		
#group_side_nav{
	width:80%;	
	text-align:;
	margin:0px 0px 0px 20px;
	font-family:algerian;
	border-bottom-style:groove;
	border-color:white;
	border-width:thin
	}
#group_side_nav tr:hover td{
		background:#e5e5e5;
		border-radius:4px;
	}
#group_side_nav tr td{
	padding:15px;
	cursor:pointer;
}

#group_main{
	width:63%;
	height:1000px;
	background:;
	float:left;
	margin:0px 0px 0px 250px ;
	
}
#cover_group{
	width:100%;
	height:350px;
	max-height:auto;
	mix-height:auto;
	
	background:black;
	float:left;
	margin:50px 0px 0px 0px ;
	border:0.5px solid white;
	
}

#cover_user_group{
	width:100%;
	height:300px;
	border:1px solid white;
	float:left;
}
#cover_bottom{
	width:100%;
	height:50px;
	background:;
	float:left;
	border:1px solid lightgray;
	}
#cover_bottom button{
	font-family:algerian;
	font-weight:bolder;
	font-size:1.2em;
	margin:5px 0px 0px 5px;
	color:gray;
	background:white;
	border:1px solid lightgray;
}
#cover_bottom button:hover{
	
	color:white;
	background:#2196f3;
}
#cover_bottom label{
	font-family:algerian;
	font-weight:bolder;
	font-size:1.2em;
	margin:5px 0px 0px 5px;
	color:gray;
	background:white;
	border:1px solid lightgray;
}
#cover_bottom label:hover{
	color:white;
	background:#2196f3;
}
#cover_bottom table tr td{float:left;}
#posting_area_group{
	padding:20px 0px 0px 0px;
	width:62%;
	height:auto;
	float:left;
	background:;
}
#upload_mobile_h{
	width:100%; display:; 
	border-radius:5px; height:auto; 
	float:left;
	margin:0px 0px 0px 0px; 
	box-shadow:0px 0px 5px black; 
	border:groove 1px lightgray; 
	background:transparent; text-align:;
}
#group_details{
	width:33%;
	height:auto;
	background:;
	float:left;	
	margin:0px 0px 0px 0px ;	
	padding:0px 0px 10px 10px ;
}
#members_addand_desc{
	width:100%;
	min-height:auto;
	max-height:auto;
	background:;
	float:left;	
	margin:25px 0px 0px 3px ;
	border-radius:4px;
	padding:10px;
	border:1px solid lightgray;
	
	
}
#creat_group_desc{
	width:100%;
	height:auto;
	background:;
	float:left;	
	margin:10px 0px 0px 0px ;
	border-radius:4px;
	padding:10px;
	border:1px solid lightgray;
	color:gray;
	
	
}
#add_member_group{
	width:100%;
	height:200px;
	overflow:hidden;
	background:;
	float:left;	
	margin:10px 0px 0px 3px ;
	border-radius:4px;
	padding:0px;
	border:1px solid lightgray;

}
#menu{
	display:none;		
	}
#menu_mobile{
	display:none;		
	}
#menu{
	display:none;		
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
	}	
	
@media screen and (max-width: 1680px) 
	{
		body{margin:0px;padding:0px;background:;}
		#group_main{
			width:63%;
			height:1000px;
			background:;
			float:left;
			margin:10px 0px 0px 250px ;
			padding:10px;
			}
	}
@media (max-width:1280px) 
	{
		body{margin:0px;padding:0px;background:;}
		#group_main{
			width:60%;
			height:1000px;
			background:;
			float:left;
			margin:10px 0px 0px 230px ;
			padding:10px;
			}
	}		

@media (max-width:1024px) 
	{
		body{margin:0px;padding:0px;background:;}	
		#groups_menu_side{display:none;}
		#group_main{
			background:;
			float:left;
			margin:110px 0px 0px 0px;
			width:100%;
			}
		#cover_group{
			float:left;
			margin:0px;
			width:100%;
			
		}
		#cover_bottom table{display:none;}
		#menu_mobile{
			display:block;	
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			width:100%;
			color:gray;
			background:white;
			border:1px solid lightgray;
			cursor:pointer;
			text-align:center;
			
		}	
		#menu{
			width:100%;
			height:auto;
			background:;
			margin:auto;
			float:left;
			background:lightgray;
			display:none;		
			border-bottom-style:groove;
			border-bottom-width:thin;
		}
		#menu table tr td{
			width:100%;
			background:;
			margin:10px 0px 0px 0px ;
			float:left;
			display:block;
		}
		#menu table tr td button{
			width:100%;
			background:;
			margin:10px 0px 0px 0px ;
			float:left;
			display:block;
		}
		
		#menu button{
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			margin:5px 0px 0px 5px;
			color:gray;
			background:white;
			border:1px solid lightgray;
		}
		#menu button:hover{
			color:white;
			background:#2196f3;
		}
		#menu label{
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			width:100%;
			color:gray;
			background:white;
			border:1px solid lightgray;
		}
		#menu label:hover{
			color:white;
			background:#2196f3;
		}
		
		#posting_area_group{width:100%;}
		#upload_1{width:100%;}
		#upload_mobile_h{
			width:100%; 
			border-radius:5px; height:auto; 
			float:left;
			margin:10px 0px 0px 0px; 
			box-shadow:0px 0px 5px black; 
			background:; text-align:;
			padding:0px;
			}
		#group_details{display:none;}
		#members_addand_desc{display:none;}
		#creat_group_desc{display:none;}
		#add_member_group{display:none;}

	}	
	
@media (max-width:980px) 
	{
		body{margin:0px;padding:0px;background:;}
		#groups_menu_side{display:none;}
		#group_main{
			background:;
			float:left;
			margin:110px 0px 0px 0px;
			width:100%;
			}
		#cover_group{
			float:left;
			margin:0px;
			width:100%;
			
		}
		#cover_bottom table{display:none;}
		#menu_mobile{
			display:block;	
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			width:100%;
			color:gray;
			background:white;
			border:1px solid lightgray;
			cursor:pointer;
			text-align:center;
			
		}	
		#menu{
			width:100%;
			height:auto;
			background:;
			margin:auto;
			float:left;
			background:lightgray;
			display:none;		
			border-bottom-style:groove;
			border-bottom-width:thin;
		}
		#menu table tr td{
			width:100%;
			background:;
			margin:10px 0px 0px 0px ;
			float:left;
			display:block;
		}
		#menu table tr td button{
			width:100%;
			background:;
			margin:10px 0px 0px 0px ;
			float:left;
			display:block;
		}
		
		#menu button{
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			margin:5px 0px 0px 5px;
			color:gray;
			background:white;
			border:1px solid lightgray;
		}
		#menu button:hover{
			color:white;
			background:#2196f3;
		}
		#menu label{
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			width:100%;
			color:gray;
			background:white;
			border:1px solid lightgray;
		}
		#menu label:hover{
			color:white;
			background:#2196f3;
		}
		
		#posting_area_group{width:100%;}
		#upload_1{width:100%;}
		#upload_mobile_h{
			width:100%; 
			border-radius:5px; height:auto; 
			float:left;
			margin:10px 0px 0px 0px; 
			box-shadow:0px 0px 5px black; 
			background:; text-align:;
			padding:0px;
			}
		#group_details{display:none;}
		#members_addand_desc{display:none;}
		#creat_group_desc{display:none;}
		#add_member_group{display:none;}

		
	}	
@media (max-width:736px) 
	{
		body{margin:0px;padding:0px;background:;}
		#groups_menu_side{display:none;}
		#group_main{
			background:;
			float:left;
			margin:110px 0px 0px 0px;
			width:100%;
			}
		#cover_group{
			float:left;
			margin:0px;
			width:100%;
			
		}
		#cover_bottom table{display:none;}
		#menu_mobile{
			display:block;	
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			width:100%;
			color:gray;
			background:white;
			border:1px solid lightgray;
			cursor:pointer;
			text-align:center;
			
		}	
		#menu{
			width:100%;
			height:auto;
			background:;
			margin:auto;
			float:left;
			background:lightgray;
			display:none;		
			border-bottom-style:groove;
			border-bottom-width:thin;
		}
		#menu table tr td{
			width:100%;
			background:;
			margin:10px 0px 0px 0px ;
			float:left;
			display:block;
		}
		#menu table tr td button{
			width:100%;
			background:;
			margin:10px 0px 0px 0px ;
			float:left;
			display:block;
		}
		
		#menu button{
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			margin:5px 0px 0px 5px;
			color:gray;
			background:white;
			border:1px solid lightgray;
		}
		#menu button:hover{
			color:white;
			background:#2196f3;
		}
		#menu label{
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			width:100%;
			color:gray;
			background:white;
			border:1px solid lightgray;
		}
		#menu label:hover{
			color:white;
			background:#2196f3;
		}
		
		#posting_area_group{width:100%;}
		#upload_1{width:100%;}
		#upload_mobile_h{
			width:100%; 
			border-radius:5px; height:auto; 
			float:left;
			margin:10px 0px 0px 0px; 
			box-shadow:0px 0px 5px black; 
			background:; text-align:;
			padding:0px;
			}
		#group_details{display:none;}
		#members_addand_desc{display:none;}
		#creat_group_desc{display:none;}
		#add_member_group{display:none;}


		
	}
@media (max-width:480px) 
	{
	body{margin:0px;padding:0px;background:;}	
		#groups_menu_side{display:none;}
		#group_main{
			background:;
			float:left;
			margin:110px 0px 0px 0px;
			width:100%;
			}
		#cover_group{
			float:left;
			margin:0px;
			width:100%;
			
		}
		#cover_bottom table{display:none;}
		#menu_mobile{
			display:block;	
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			width:100%;
			color:gray;
			background:white;
			border:1px solid lightgray;
			cursor:pointer;
			text-align:center;
			
		}	
		#menu{
			width:100%;
			height:auto;
			background:;
			margin:auto;
			float:left;
			background:lightgray;
			display:none;		
			border-bottom-style:groove;
			border-bottom-width:thin;
		}
		#menu table tr td{
			width:100%;
			background:;
			margin:10px 0px 0px 0px ;
			float:left;
			display:block;
		}
		#menu table tr td button{
			width:100%;
			background:;
			margin:10px 0px 0px 0px ;
			float:left;
			display:block;
		}
		
		#menu button{
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			margin:5px 0px 0px 5px;
			color:gray;
			background:white;
			border:1px solid lightgray;
		}
		#menu button:hover{
			color:white;
			background:#2196f3;
		}
		#menu label{
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			width:100%;
			color:gray;
			background:white;
			border:1px solid lightgray;
		}
		#menu label:hover{
			color:white;
			background:#2196f3;
		}
		
		#posting_area_group{width:100%;}
		#upload_1{width:100%;}
		#upload_mobile_h{
			width:100%; 
			border-radius:5px; height:auto; 
			float:left;
			margin:10px 0px 0px 0px; 
			box-shadow:0px 0px 5px black; 
			background:; text-align:;
			padding:0px;
			}
		#group_details{display:none;}
		#members_addand_desc{display:none;}
		#creat_group_desc{display:none;}
		#add_member_group{display:none;}
	
	}
	
	
@media (max-width:360px) 
	{
		body{margin:0px;padding:0px;background:pink;}
	
		#groups_menu_side{display:none;}
		#group_main{
			background:;
			float:left;
			margin:110px 0px 0px 0px;
			width:100%;
			}
		#cover_group{
			float:left;
			margin:0px;
			width:100%;
			
		}
		#cover_bottom table{display:none;}
		#menu_mobile{
			display:block;	
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			width:100%;
			color:gray;
			background:white;
			border:1px solid lightgray;
			cursor:pointer;
			text-align:center;
			
		}	
		#menu{
			width:100%;
			height:auto;
			background:;
			margin:auto;
			float:left;
			background:lightgray;
			display:none;		
			border-bottom-style:groove;
			border-bottom-width:thin;
		}
		#menu table tr td{
			width:100%;
			background:;
			margin:10px 0px 0px 0px ;
			float:left;
			display:block;
		}
		#menu table tr td button{
			width:100%;
			background:;
			margin:10px 0px 0px 0px ;
			float:left;
			display:block;
		}
		
		#menu button{
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			margin:5px 0px 0px 5px;
			color:gray;
			background:white;
			border:1px solid lightgray;
		}
		#menu button:hover{
			color:white;
			background:#2196f3;
		}
		#menu label{
			font-family:algerian;
			font-weight:bolder;
			font-size:1.2em;
			width:100%;
			color:gray;
			background:white;
			border:1px solid lightgray;
		}
		#menu label:hover{
			color:white;
			background:#2196f3;
		}
		
		#posting_area_group{width:100%;}
		#upload_1{width:100%;}
		#upload_mobile_h{
			width:100%; 
			border-radius:5px; height:auto; 
			float:left;
			margin:10px 0px 0px 0px; 
			box-shadow:0px 0px 5px black; 
			background:; text-align:;
			padding:0px;
			}
		#group_details{display:none;}
		#members_addand_desc{display:none;}
		#creat_group_desc{display:none;}
		#add_member_group{display:none;}
	}	
	
	
	

</style>
<body onload="Discussion()">
<?php include("../Home/Background.php");?>
	<div id="groups_menu_side">
		<?php
			$row_group=$mysqli->query("select * from groups where  group_id='$group_id'");
				$fetch_group=$row_group->fetch_array();
				$g_id=$fetch_group['group_id'];
				$g_user_id=$fetch_group['user_id'];
				$g_name=$fetch_group['group_name'];
				$g_desc=$fetch_group['group_description'];
			
			$row_group_posting=$mysqli->query("select * from users where user_id='$g_user_id'");
				$fetch_group_posting=$row_group_posting->fetch_array();
				$name_posting =$fetch_group_posting['Name'];
				$email_posting =$fetch_group_posting['Email'];
				$gender_posting=$fetch_group_posting['Gender'];	

			echo"
			<p style='font-family:serif; text-align:center;font-size:2.0em; word-warp:break-all; padding:30px; margin-top:100px;'> $g_name</p>
			<table id='group_side_nav' border='0'>
				<tr  style='border:1px solid lightgray; cursor:pointer; border-radius:4px; background-color:#e5e5e5;' onclick='Discussion()'><td>Discussion</td></tr>
				<tr onclick='member()'><td>Members</td></tr>
				<tr ><td>Videos</td></tr>
				<tr onclick='Group_Photo()'><td>Photos</td></tr>
			
			</table>";
		?>
	</div>
	<div id="group_main">
		<div id="cover_group"> 
			<?php 
				$row_group_cover=$mysqli->query("select * from group_post where post_user_id='$g_user_id'  AND group_post_text='added a Cover photo..' AND group_id='$g_id'");
					while($fetch_group_cover=$row_group_cover->fetch_array()){
					$group_post_pic=$fetch_group_cover['group_post_pic'];						
					}
					$row_c=$mysqli->query("select * from users where user_id='$g_user_id'");
						$fetch_c=$row_c->fetch_array();
						$name_cover=$fetch_c['Name'];
						$email_cover=$fetch_c['Email'];
						$gender_cover=$fetch_c['Gender'];
					echo"<p style='width:auto; font-family:algerian; font-size:2.3em; margin:240px 0px 0px 30px; position:absolute;'>$g_name</p>";
					if(@$group_post_pic==''){
					echo"<img src='../image/Background-4.jpg'  style='width:100%; height:300px;z-index:1000;'/>";}
					else{if($gender_cover=="Male" || $gender_cover=="Female"){echo"<img src='../../../fb_user/$gender_cover/$email_cover/$g_name/Cover/$group_post_pic' style='width:100%; z-index:-1;height:300px;'>";}}
			
			?>
			<div id="cover_bottom">
				<table border="0" width="auto" style='float:left;'>
					<tr>
					<?php 
					$row_group_member_join=$mysqli->query("select * from group_member where group_id='$group_id' AND member_id='$u_id'");
					while($fetch_group_join=$row_group_member_join->fetch_array()){
					$group_join=$fetch_group_join['member_id'];}
					
					if(@$group_join == $u_id   AND $group_id == $group_id){?>
					<td><button class='btn btn' style=''>Joined</button></td>
					<td><button class='btn btn-leavegroup'> Leave Group</button></td>
					<td><button class='btn btn-addmember' onclick='addmember();'> Add Member</button></td>
					<?php }else{?>
					<td><button class='btn btn-join-request' style=''>Join</button></td>
					<?php }?>
					<input type='hidden' value='<?php echo $g_id;?>' id='group_join-leave' />
					
					
					<?php if($u_id == $g_user_id){ ?>
					<form method="POST" enctype="multipart/form-data">
						<td><label for="pics" class="btn">change cover</label></td>
						<td><button  type="submit" name="change_cover" class='btn btn-cover-sub'>Submit</button></td>
						<td width="1%"><input id="pics" style="visibility:hidden;"  accept="image/*" type="file" name="file" /></td>
					</form>
					<?php } ?>
					
					</tr>
				</table>
				<pre id='menu_mobile'>menu</pre>
			</div>
		</div>
		<!---for mobile --->
		<div id='menu'>
		
			<?php
			echo"
			<table id='group_side_nav' border='0'>
				<tr  style='border:1px solid lightgray; cursor:pointer; border-radius:4px; background-color:#e5e5e5;' onclick='Discussion()'><td>Discussion</td></tr>
				<tr onclick='member()'><td>Members</td></tr>
				<tr ><td>Videos</td></tr>
				<tr onclick='Group_Photo()'><td>Photos</td></tr>
			
			</table>";
			
			?>
			<table border="0" width="auto">
				<tr>
				<?php 
				$row_group_member_join=$mysqli->query("select * from group_member where group_id='$group_id' AND member_id='$u_id'");
				while($fetch_group_join=$row_group_member_join->fetch_array()){
				$group_join=$fetch_group_join['member_id'];}
				
				if(@$group_join == $u_id   AND $group_id == $group_id){?>
				<td><button class='btn btn' style=''>Joined</button></td>
				<td><button class='btn btn-leavegroup'> Leave Group</button></td>
				<td><button class='btn btn-addmember' onclick='addmember();'> Add Member</button></td>
				<?php }else{?>
				<td><button class='btn btn-join-request' style=''>Join</button></td>
				<?php }?>
				<input type='hidden' value='<?php echo $g_id;?>' id='group_join-leave' />
				
				
				<?php if($u_id == $g_user_id){ ?>
				<form method="POST" enctype="multipart/form-data">
					<td><label for="pics_cover" class="btn">change cover</label></td>
					<td width="1%"><input id="pics_cover" style="visibility:hidden;"  accept="image/*" type="file" name="file" /></td>
					<td><button  type="submit" name="change_cover" class='btn btn-cover-sub'>Submit</button></td>
				</form>
				<?php } ?>
				
				</tr>
			</table>
		
		</div>
		<!--- end for mobile --->
		<?php if(@$group_join == $u_id  AND $group_id == $group_id){?> 
		<div id='Group_Photo' style="width:100%; background:; display:none; border:; float:left;"></div>

		<div id="posting_area_group">
			<!-------for Dekstop srch---------->
			<div id='upload_mobile_h'  style='font-family:algerian;'>
				<!----for srch----->
				<form method='POST' enctype='multipart/form-data'>
					<table border='0'   style='width:100%;' >
						<tr>
							<td colspan='2'  width='30px' align='center'><img src='../image/newsfeed.png' width='15px'  >Upload Status</td>
							
							<td width='10px'colspan='2'  align='center'><img src='../image/my_videos.png' style='' width='20px'>Upload Photos</td>
							
						</tr>
						<tr>
							<td colspan='4' align='center'><textarea  id='group_stat' name='group_stat' rows='6' cols='60' placeholder='Whats on your mind....' style='width:100%; padding:5px; font-family:sans-serif;'></textarea></td>
						</tr>
						<tr>
							<td colspan="4">
								<table border='0' width='100%;'>
									<tr>
										<td>
										<label for="files" style="border:1px solid gray; font-family:algerian; color:gray; cursor:pointer; float:left; width:auto; border-radius:15px; margin:15px 0px 0px 10px; padding:5px 10px 0px 10px; height:30px; background:lightgray;"><i class="glyphicon glyphicon-picture"></i>&nbsp Photo</label>						
										<label for="filess" class="" style="border:1px solid gray; font-family:algerian; cursor:pointer; color:gray; width:auto; border-radius:15px; margin:15px 0px 0px 10px; padding:5px 10px 0px 10px; height:30px; background:lightgray;"><i class="glyphicon glyphicon-film"></i>&nbsp video</label>						
										<input type='submit' id='p1' name='p1' Value='POST' class='btn btn' style=' background:#3B5998; float:right; color:white; height:auto;border-radius:3px; margin:15px 10px 0px 0px;font-weight:bolder;font-family:serif;'>

										<input  id="files" style="visibility:hidden;" type="file" name="files" accept="image/*" />
										<input  id="filess" style="visibility:hidden;" type="file" name="filess" accept="video/*" />
										</td>
										
									</tr>
								</table>
							</td>
							
						</tr>
					</table>
				</form>
			</div>
			
			<div id='Discussion' style="width:100%; background:; float:left;"></div>
			<div id='addmember' style="width:100%; background:; display:none; border:white solid 1px; float:left;"></div>
			<div id='member' style="width:100%; background:; display:none; border:white solid 1px; float:left;"></div>

		</div>
		<div id="group_details">
			<div id="members_addand_desc">
				<?php 
					$row_group_member=$mysqli->query("select * from group_member where group_id='$group_id'");
						$fetch_group_member=$row_group_member->fetch_array();
						$count_member=mysqli_num_rows($row_group_member);
				?>
				<table rules="rows" style=' width:100%; font-family:serif; font-weight:bolder;	color:gray;'>
					
					<tr><td style="padding:5px;">MEMBERS</td><td  align='center'><?php if($count_member >=0){echo $count_member;}else{echo" No Member Yet..!";}?></td></tr>
					<tr>
						<td colspan="2">
						<?php 
							$row_group_member_pic=$mysqli->query(
							"select group_member.member_id,user_profile_pic.image,users.Email,users.Gender,users.Name 
							from((group_member 
							INNER JOIN user_profile_pic  ON group_member.member_id = user_profile_pic.user_id) 
							INNER JOIN  users ON group_member.member_id = users.user_id) 
							where group_id='$group_id'  LIMIT 5");
							while($fetch_group_member_pic=$row_group_member_pic->fetch_array()){
								$member_name=$fetch_group_member_pic['Name'];
								$member_email=$fetch_group_member_pic['Email'];
								$member_gender=$fetch_group_member_pic['Gender'];
								$member_pic=$fetch_group_member_pic['image'];
								$member_id=$fetch_group_member_pic['member_id'];
								echo"<a href='../Profile/Profile.php?id=$member_id'><img src='../../../fb_user/$member_gender/$member_email/Profile/$member_pic' title='$member_name' style='width:45px; height:35px; float:left; border:0.5px solid lightgray;'></a>";
							}
						?>
						</td>
					</tr>
					
					<tr><td style="padding:5px; word-break: break-all; width:10%;" colspan="2"><label style="font-family:serif; color:gray;">DESCRIPTION</label> <br><p style='color:gray;padding:2px;'><?php echo $g_desc;?></p><button class='btn btn-add-desc' style='background:#3B5998; width:auto; padding:3px; float:left; color:white; font-family:algerian; border-color:lightblue; height:30px;'>Add Description</button></td></tr>
					
				</table>
				<!-------------descriptin add--------------------------->
				<div  id="descptn" style='width:100%; display:none; padding:10px;float:left; border:1px solid lightgray;'>
					<textarea cols='20' rows='4' name='group_desc'  id='group_desc' placeholder="Add a Description...."style="width:100%; border-radius:4px; padding-left:10px;"></textarea><br>
					<input type='hidden' value='<?php echo $g_id;?>' id='group_id' />
					<button class='btn btn-add-save-desc'  style='background:#3B5998; width:48%; padding:0px; color:white; border-color:lightblue;font-family:algerian; height:30px;'>Save</button>
					<button class='btn btn-cancel' style='background:#3B5998; width:50%; padding:0px; color:white;border-color:lightblue; font-family:algerian; height:30px;'>Cancel</button>
				</div>
				<!----------------------------------------------------->
			</div>
			<div id="creat_group_desc"><label style="font-family:serif; color:gray;">CREATE NEW GROUPS</label><br><p style="color:gray; font-weight:bolder; font-family:serif;">Groups make it easier than ever to share with friends, family and teammates. <a href="Create_Groups.php"><button class='btn btn-for-create_group_ingroup' style='background:#3B5998; width:35%; padding:0px; border-color:lightblue; color:white; font-family:algerian; height:30px;'>Create</button></a></p></div>
			<div id="add_member_group" ><label style="font-family:serif; overflow:hidden; color:gray; padding:5px;">ADD MEMBERS</label>
				<div><?php include("Add_member.php");?></div>
			</div>
		</div>
		<?php }else{echo"<div style='width:100%; height:400px; float:left; '><p style='color:lightgray; font-family:algerian; font-size:3.0em; padding-top:180px;text-align:center;'><span class='glyphicon glyphicon-picture' style='color:lightgray; font-size:2.3em;'></span><br>Nothing to Show...</p></div>";}?>
	</div>
	
</body>
</html>

<?php
//for cover 
	if(isset($_POST['change_cover']))
	{
		$pic=$_FILES['file']['name'];
		$tmp_name=$_FILES['file']['tmp_name'];
		$ext_cover = pathinfo($pic, PATHINFO_EXTENSION);
		$time= Date("g:i a");			
		if($pic !='')
		{
			if($_FILES['file']['size']>2000)
			{
				if($ext_cover =='jpg'|| $ext_cover =='JPG')
				{
					move_uploaded_file($tmp_name,"../../../fb_user/$gender_posting/$email_posting/$g_name/Cover/$pic");
					$pst1=$mysqli->query("insert into group_post (group_id,post_user_id,group_post_pic,time,group_post_text)values('$g_id','$u_id','$pic','$time','added a Cover photo..')");
				}else{echo"<script>alert('your file is not match the valid extensions..');</script>";}
			}else{echo"<script>alert('Your file is to large');</script>";}	
		
		}else{echo"<script>alert('Your Must be Select a file to Upload..');</script>";}	
	}
//for srching and adding the post
	if(isset($_POST['p1'])){
		$txt=$_POST['group_stat'];
		$pics=$_FILES['files']['name'];
		$ext = pathinfo($pics, PATHINFO_EXTENSION);
		$tmp_name=$_FILES['files']['tmp_name'];
		$time= Date("g:i a");			
		
		if($pics !=""){
			if($_FILES['files']['size']>2000)
			{
				if($ext =='jpg'|| $ext =='JPG'|| $ext =='png' || $ext =='PNG'|| $ext =='mp4' || $ext =='MP4')
				{
					if($txt ==''){
						move_uploaded_file($tmp_name,"../../../fb_user/$gender_posting/$email_posting/$g_name/Post/$pics");
						$pst1=$mysqli->query("insert into group_post (group_id,post_user_id,group_post_pic,time,group_post_text)values('$g_id','$u_id','$pics','$time','added a new photo..')");
						
						//$mysqli->query("insert into  users_notice(user_id,friend_id,post_id,notice_time,notice_txt)values('$u_id','$addstat','$post_id+1','$time','added a new photo..')");
						
					}else{
						move_uploaded_file($tmp_name,"../../../fb_user/$gender_posting/$email_posting/$g_name/Post/$pics");
						$pst1=$mysqli->query("insert into group_post (group_id,post_user_id,group_post_pic,time,group_post_text)values('$g_id','$u_id','$pics','$time','$txt')");
						
						//$mysqli->query("insert into  users_notice(user_id,friend_id,post_id,notice_time,notice_txt)values('$u_id','$addstat','$post_id+1','$time','added a status..!')");
					}
				}else{echo"<script>alert('your file is not match the valid extensions..');</script>";}
			}else{echo"<script>alert('Your file is to large');</script>";}	
		}
		else
		{
			$pst1=$mysqli->query("insert into group_post (group_id,post_user_id,time,group_post_text)values('$g_id','$u_id','$time','$txt')");
			//$mysqli->query("insert into  users_notice(user_id,friend_id,post_id,notice_time,notice_txt)values('$u_id','$addstat','$post_id+1','$time','added a status..!')");
		}
	}

	
		
	
//descriptin

	if(isset($_POST['update'])){
		$group_desc=$_POST['group_desc'];
		$group_id_desc=$_POST['group_id'];
		
		$mysqli->query("Update groups set group_description='$group_desc' where group_id='$group_id_desc'");
	}
//join group

	if(isset($_POST['join'])){
		$group_id_join=$_POST['group_id'];
		
		$statu_like=$mysqli->query("select * from group_member where group_id='$group_id_join' AND member_id='$u_id'");
		$que=mysqli_num_rows($statu_like);
		if($que<=0){
		$mysqli->query("insert into group_member (group_id,member_id)values('$group_id_join','$u_id')");
		}
	}
	
//leave group

	if(isset($_POST['leave'])){
		$group_id_leave=$_POST['group_id'];
		
		$mysqli->query("Delete from group_member where group_id='$group_id_leave' AND member_id='$u_id' ");
	
	}
?>
<?php
}else{header("location:../../../index.php");}
?>
<script>
$(document).ready(function(){
$('#menu_mobile').click(function(){
$('#menu').slideDown("slow");
});

});

</script>