<?php
include("../../../connection/conect.php");
include("../../../logout.php");

error_reporting(0);
session_start();
if(isset($_SESSION['fbuser'])){
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
		
		//$row_frind=$mysqli->query("select * from friends where user_id='$u_id'");
		//while($fetch_friend=$row_frind->fetch_array()){
		//	$user_friend_id=$fetch_friend['user_friend_id'];
			
		//}
		
	?>



<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>Groups</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../Profile/js_files/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
	</head>
<style>
body{
	 background-image:url(../image/Crunchify.PNG);
	}
	
#right_nav{display:none;}

	
#group_right_nav{
	width:59%;
	height:620px;
	background:;
	position:;
	float:left;
	padding:5px;
	margin:70px 0px 0px 250px;

}
#create_button_header{
	width:100%;
	height:80px;
	background:transparent;
	border-bottom-style:groove;
	border-color:white;
	border-width:thin;
	float:left;
	border-radius: 4px;
	box-sizing: border-box;
    border: 2px solid #ccc;
	z-index:1000;
}
#groups_details{
	width:100%;
	height:667px;
	background:transparent;
	border-bottom-style:groove;
	border-color:white;
	border-width:thin;
	float:left;
	margin:30px 0px 0px 0px ;
	border-radius: 4px;
	box-sizing: border-box;
    border: 2px solid #ccc;
	z-index:1000;
}
#group_info{
	width:50%;
	background:;
	height:auto;
	padding:10px;
	float:left;
	z-index:1000;
	overflow:;
	border-right-style:solid;
	border-color:lightgray;
	border-width:thin;

	}
#group_info table{
	width:100%;
	height:auto;
	background:;
	font-family:Lucida Calligraphy;
	text-align:left;
	font-weight:bolder;
	font-size:1.3em;
	border-style:groove;
	border-color:lightgray;
	border-width:thin;
	float:left;
}
#group_info table tr td a{
	text-decoration:none;
	padding:0px 0px 0px 14px;
	
}
#group_info table tr td {
	text-decoration:none;
	padding:10px 0px 0px 14px;
	vertical-align: text-top;
	border-radius:4px;
}

#group_info table tr:hover td{
	background:#e5e5e5;
	border-radius:4px;
}	

	
#group_info_friend	{
	width:50%;
	background:;
	height:auto;
	padding:10px;
	float:left;
	z-index:1000;
	overflow:;
}
#group_info_friend table{
	width:100%;
	height:auto;
	background:transparent;
	font-family:Lucida Calligraphy;
	text-align:left;
	font-weight:bolder;
	font-size:1.3em;
	border-style:groove;
	border-color:lightgray;
	border-width:thin;
	float:left;
}
#group_info_friend table tr td a{
	text-decoration:none;
	padding:0px 0px 0px 14px;
	
}
#group_info_friend table tr td {
	text-decoration:none;
	padding:10px 0px 0px 14px;
	vertical-align: text-top;
	border-radius:4px;
}

#group_info_friend table tr:hover td{
	background:#e5e5e5;
	border-radius:4px;
	
	
}		

#group_info table tr td img,#group_info_friend table tr td img
{
	height:auto;
	width:auto;
	min-height:50px;
	max-height:auto;
	max-width:50px;
	max-width:auto;
	
}	

#create_group_box{
	width:100%;
	background:white;
	height:659px;
	position:absolute;
	top:;
	left:;
	border-radius: 4px;
	box-sizing: border-box;
    border: 2px solid #ccc;
	display:none;
}
#create_group_box table{
	margin-left:px;
	margin-top:10px;
	width:50%;  float:left; 
	margin:100px 0px 0px 10px;
	height:auto; 
	font-size:1.2em; 
	font-weight:bolder; 
	Background:white;
	
}
#create_group_box table tr td{
	padding:5px;
	
}
.group_text{
	width: 100%;
	height:40px;
	margin-bottom:25px;
	padding:5px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color:white;
	
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
		#group_right_nav
		{
			width:60%;
			height:auto;
			background:;
			float:left;
			padding:5px;
			margin:100px 0px 0px 260px;

		}
		#groups_details
		{
			width:100%;
			height:auto;
			background:transparent;
			border-bottom-style:groove;
			border-color:white;
			border-width:thin;
			float:left;
			margin:30px 0px 0px 0px ;
			border-radius: 4px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			z-index:1000;
		}
		#group_info
		{
			width:50%;
			background:;
			height:auto;
			padding:10px;
			float:left;
			z-index:1000;
			overflow:;
			border-right-style:solid;
			border-color:lightgray;
			border-width:thin;

		}
		#group_info_friend	
		{
			width:50%;
			background:;
			height:auto;
			padding:10px;
			float:left;
			z-index:1000;
			overflow:;
		}
		
		#create_group_box
		{
			width:100%;
			background:white;
			height:auto;
			position:absolute;
			top:0%;
			left:0%;
			margin:auto;
			display:none;
		}
		#create_group_box table
		{
			margin-left:0px;
			margin-top:110px;
			padding:0px;
			width:50%; 
			height:auto; 
			font-size:1.2em; 
			font-weight:bolder; 
			Background:white;
		}
	}
@media (max-width:1280px) 
	{
		body{margin:0px;padding:0px;background:;}
		#group_right_nav
		{
			width:60%;
			height:auto;
			background:;
			float:left;
			padding:5px;
			margin:120px 0px 0px 250px;

		}
		#groups_details
		{
			width:100%;
			height:auto;
			background:transparent;
			border-bottom-style:groove;
			border-color:white;
			border-width:thin;
			float:left;
			margin:30px 0px 0px 0px ;
			border-radius: 4px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			z-index:1000;
		}
		#group_info
		{
			width:50%;
			background:;
			height:auto;
			padding:10px;
			float:left;
			z-index:1000;
			overflow:;
			border-right-style:solid;
			border-color:lightgray;
			border-width:thin;

		}
		#group_info_friend	
		{
			width:50%;
			background:;
			height:auto;
			padding:10px;
			float:left;
			z-index:1000;
			overflow:;
		}
		
		#create_group_box
		{
			width:100%;
			background:white;
			height:auto;
			position:absolute;
			top:0%;
			left:0%;
			margin:auto;
			display:none;
		}
		#create_group_box table
		{
			margin-left:0px;
			margin-top:110px;
			padding:0px;
			width:50%; 
			height:auto; 
			font-size:1.2em; 
			font-weight:bolder; 
			Background:white;
		}

	}		

@media (max-width:1024px) 
	{
		body{margin:0px;padding:0px;background:;}	
		#group_right_nav
		{
			width:100%;
			height:auto;
			background:;
			float:left;
			padding:5px;
			margin:120px 0px 0px 0px;

		}
		#groups_details
		{
			width:100%;
			height:auto;
			background:transparent;
			border-bottom-style:groove;
			border-color:white;
			border-width:thin;
			float:left;
			margin:30px 0px 0px 0px ;
			border-radius: 4px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			z-index:1000;
		}
		#group_info
		{
			width:50%;
			background:;
			height:auto;
			padding:10px;
			float:left;
			z-index:1000;
			overflow:;
			border-right-style:solid;
			border-color:lightgray;
			border-width:thin;

		}
		#group_info_friend	
		{
			width:50%;
			background:;
			height:auto;
			padding:10px;
			float:left;
			z-index:1000;
			overflow:;
		}
		
		#create_group_box
		{
			width:100%;
			background:white;
			height:auto;
			position:absolute;
			top:0%;
			left:0%;
			margin:auto;
			display:none;
		}
		#create_group_box table
		{
			margin-left:0px;
			margin-top:110px;
			padding:0px;
			width:50%; 
			height:auto; 
			font-size:1.1em; 
			font-weight:bolder; 
			Background:white;
		}
			
	}	
	
@media (max-width:980px) 
	{
		body{margin:0px;padding:0px;background:;}
		#group_right_nav
		{
			width:100%;
			height:auto;
			background:;
			float:left;
			padding:5px;
			margin:120px 0px 0px 0px;

		}
		#groups_details
		{
			width:100%;
			height:auto;
			background:transparent;
			border-bottom-style:groove;
			border-color:white;
			border-width:thin;
			float:left;
			margin:30px 0px 0px 0px ;
			border-radius: 4px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			z-index:1000;
		}
		#group_info
		{
			width:100%;
			background:;
			height:auto;
			padding:10px;
			float:left;
			z-index:1000;
			overflow:;
			border-right-style:solid;
			border-color:lightgray;
			border-width:thin;

		}
		#group_info_friend	
		{
			width:100%;
			background:;
			height:auto;
			padding:10px;
			float:left;
			z-index:1000;
			overflow:;
		}
		
		#create_group_box
		{
			width:100%;
			background:white;
			height:auto;
			position:absolute;
			top:0%;
			left:0%;
			margin:auto;
			display:none;
		}
		#create_group_box table
		{
			margin-left:0px;
			margin-top:110px;
			padding:0px;
			width:100%; 
			height:auto; 
			font-size:1.1em; 
			font-weight:bolder; 
			Background:white;
		}
		#create_group_box img{display:none;}	
			
	}	
@media (max-width:736px) 
	{
		body{margin:0px;padding:0px;background:;}
		#group_right_nav
		{
			width:100%;
			height:auto;
			background:;
			float:left;
			padding:5px;
			margin:120px 0px 0px 0px;

		}
		#groups_details
		{
			width:100%;
			height:auto;
			background:transparent;
			border-bottom-style:groove;
			border-color:white;
			border-width:thin;
			float:left;
			margin:30px 0px 0px 0px ;
			border-radius: 4px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			z-index:1000;
		}
		#group_info
		{
			width:100%;
			background:;
			height:auto;
			padding:10px;
			float:left;
			z-index:1000;
			overflow:;
			border-right-style:solid;
			border-color:lightgray;
			border-width:thin;

			}
		#group_info_friend	
		{
			width:100%;
			background:;
			height:auto;
			padding:10px;
			float:left;
			z-index:1000;
			overflow:;
		}
		#create_group_box
		{
			width:100%;
			background:white;
			height:auto;
			position:absolute;
			top:0%;
			left:0%;
			margin:auto;
			display:none;
		}
		#create_group_box table
		{
			margin-left:0px;
			margin-top:110px;
			padding:0px;
			width:100%; 
			height:auto; 
			font-size:1.1em; 
			font-weight:bolder; 
			Background:white;
		}
		#create_group_box img{display:none;}	
	
		
	}
@media (max-width:480px) 
	{
		body{margin:0px;padding:0px;background:;}	
		#group_right_nav
		{
			width:100%;
			height:auto;
			background:;
			float:left;
			padding:5px;
			margin:120px 0px 0px 0px;

		}
		#groups_details
		{
			width:100%;
			height:auto;
			background:transparent;
			border-bottom-style:groove;
			border-color:white;
			border-width:thin;
			float:left;
			margin:30px 0px 0px 0px ;
			border-radius: 4px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			z-index:1000;
		}
		#group_info
		{
			width:100%;
			background:;
			height:auto;
			padding:10px;
			float:left;
			z-index:1000;
			overflow:;
			border-right-style:solid;
			border-color:lightgray;
			border-width:thin;

			}
		#group_info_friend	
		{
			width:100%;
			background:;
			height:auto;
			padding:10px;
			float:left;
			z-index:1000;
			overflow:;
		}
		#create_group_box
		{
			width:100%;
			background:white;
			height:auto;
			position:absolute;
			top:0%;
			left:0%;
			margin:auto;
			display:none;
		}
		#create_group_box table
		{
			margin-left:0px;
			margin-top:110px;
			padding:0px;
			width:100%; 
			height:auto; 
			font-size:1.1em; 
			font-weight:bolder; 
			Background:white;
		}
		#create_group_box img{display:none;}	
	
	
	
	}
	
	
@media (max-width:360px) 
	{
		body{margin:0px;padding:0px;background:;}
		
		#group_right_nav
		{
			width:100%;
			height:auto;
			background:;
			float:left;
			padding:5px;
			margin:120px 0px 0px 0px;

		}
		#groups_details
		{
			width:100%;
			height:auto;
			background:transparent;
			border-bottom-style:groove;
			border-color:white;
			border-width:thin;
			float:left;
			margin:30px 0px 0px 0px ;
			border-radius: 4px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			z-index:1000;
		}
		#group_info
		{
			width:100%;
			background:;
			height:auto;
			padding:10px;
			float:left;
			z-index:1000;
			overflow:;
			border-right-style:solid;
			border-color:lightgray;
			border-width:thin;

			}
		#group_info_friend	
		{
			width:100%;
			background:;
			height:auto;
			padding:10px;
			float:left;
			z-index:1000;
			overflow:;
		}
		#create_group_box
		{
			width:100%;
			background:white;
			height:auto;
			position:absolute;
			top:0%;
			left:0%;
			margin:auto;
			display:none;
		}
		#create_group_box table
		{
			margin-left:0px;
			margin-top:110px;
			padding:0px;
			width:100%; 
			height:auto; 
			font-size:1.1em; 
			font-weight:bolder; 
			Background:white;
		}
		#create_group_box img{display:none;}
	}
	
	
</style>
<body>
<?php include("../Home/Background.php");?>
	<div id="group_right_nav">
		<div id='create_button_header'>
			<p style='padding:25px 0px 0px 10px;font-weight:bolder; color:gray; text-shadow:0px 5px 5px lightgray; font-family:algerian; font-size:1.5em;'> Groups
			<button class='btn btn-create_button' style='background:#42b72a; color:white; float:right; margin:0px 10px 0px 0px; box-sizing: border-box; font-family:serif;  font-weight:bolder;'>+ Create Group </button></p>
		</div>
		<div id='groups_details'>
			
			<div id="group_info" 	scrolling="auto" seamless="seamless">
				<div style="width:100%;  float:left;">
					<pre style='width:100%; float:left; margin:10px 0px 0px 0px; height:50px; padding:10px 0px 0px 10px;font-weight:bolder; color:gray ;font-size:1.5em; font-family:algerian; text-shadow:0px 5px 5px lightgray;'>Your Groups</pre>
				</div>
				<?php 
				$row_groups=$mysqli->query("select * from groups where user_id='$u_id'");
					while($fetch_groups=$row_groups->fetch_array()){
					$group_ids=$fetch_groups['group_id'];
					$group_names=substr($fetch_groups['group_name'],0,12);
					$group_nas=$fetch_groups['group_name'];
				
				$row_groups_pic=$mysqli->query("select * from group_post where group_id='$group_ids' AND group_post_text='added a Cover photo..' order by time desc");
					$fetch_groups_pic=$row_groups_pic->fetch_array();
					$group_post_texts=strchr($fetch_groups_pic['group_post_text'],'added a Cover photo..');
					$group_post_pics=$fetch_groups_pic['group_post_pic'];
					
				?>
				<table border='1' rules='rows'>
					<tr>
						<td style='width:25%; padding:10px;'>
						<?php if(strchr($group_post_texts,'added a Cover photo..')=='added a Cover photo..' AND $group_post_pics !=''){echo"<img src='../../../fb_user/$gender/$email/$group_nas/Cover/$group_post_pics' style='width:100%; height:50px; border-radius:5px; border:1px solid gray;'/>";}
						else{echo"<img src='../image/Group-icon.png' style='width:;'/>";}?>
						</td>
						<td style='text-align:left;'><a href="../Group/Groups.php?group_id=<?php echo $group_ids;?>"><?php echo $group_names.'&nbsp....' ;?></a></td>
						
					</tr>
				</table>
					<?php }?>
			</div>
			
			<div id="group_info_friend" scrolling="auto" seamless="seamless">
				<div style="width:100%;  float:left;">
					<pre style='width:100%;  float:right;margin:10px 0px 0px 10px; height:50px; padding:10px 0px 0px 10px;font-weight:bolder; color:gray ;font-size:1.5em; font-family:algerian; text-shadow:0px 5px 5px lightgray;'>Friends Groups</pre>
				</div>
				<?php	
					$arry=array();
					$row_group_all_own=$mysqli->query("select groups.group_id,friends.user_friend_id  from groups INNER JOIN friends ON groups.user_id = friends.user_friend_id where friends.user_id='$u_id' ");
					while($fetch_group_all_own=$row_group_all_own->fetch_array()){
					$group_id_all_own=$fetch_group_all_own['group_id'];
					$user_friend_id=$fetch_group_all_own['user_friend_id'];
						array_push($arry,$user_friend_id);
						$index = array_search($u_id,$arry);
						if ( $index !== false ){unset( $arry[$index] );}
					}
					foreach($arry as $kes)
					{
						$row_groups_friends=$mysqli->query("select * from groups where user_id='$kes'");
						while($fetch_groups_friends=$row_groups_friends->fetch_array()){
							$group_ids_friends=$fetch_groups_friends['group_id'];
							$group_names_friends=substr($fetch_groups_friends['group_name'],0,12);
							$group_nas_friends=$fetch_groups_friends['group_name'];
						
						$row_friends=$mysqli->query("select * from users where user_id='$kes'");
						$fetch_friends=$row_friends->fetch_array();
							$email_friends=$fetch_friends['Email'];
							$gender_friends=$fetch_friends['Gender'];
						
						$row_groups_pic_friends=$mysqli->query("select * from group_post where group_id='$group_ids_friends' AND group_post_text='added a Cover photo..' order by time desc");
						$fetch_groups_pic_friends=$row_groups_pic_friends->fetch_array();
							$group_post_texts_friends=strchr($fetch_groups_pic_friends['group_post_text'],'added a Cover photo..');
							$group_post_pics_friends=$fetch_groups_pic_friends['group_post_pic'];
				?>
							<table border='1' rules='rows'>
								<tr>
									<td style='width:25%; padding:10px;'>
									<?php if(strchr($group_post_texts_friends,'added a Cover photo..')=='added a Cover photo..' AND $group_post_pics_friends !=''){echo"<img src='../../../fb_user/$email_friends/$email_friends/$group_nas/Cover/$group_post_pics_friends' style='width:100%; height:50px; border-radius:5px; border:1px solid gray;'/>";}
									else{echo"<img src='../image/Group-icon.png' style='width:100%;'/>";}?>
									</td>
									<td style='text-align:left;'><a href="../Group/Groups.php?group_id=<?php echo $group_ids_friends;?>"><?php echo $group_names_friends.'&nbsp....' ;?></a></td>
								
								</tr>
							</table>
				
				<?php	}
					}
					?>
			</div>
		</div>
	</div>

	<div id='create_group_box'>
		
			<table border='0' style="">
				<tr>
					<td><pre style='font-size:1.2em; font-family:inherit;'>Create New Group <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></pre></td>
					
				</tr>
				<tr>
					<td>Name your group</td>
				</tr>
				<tr>
					<td><input type="text" id='group_name'  class="group_text" name="" autocomplete='off' placeholder="" style='padding:15px;' ></td>
				</tr>
				<tr>
					<td>Add a Description</td>
				</tr>
				<tr>
					<td><textarea  rows="5" cols="64" id='group_description' class="group_text" name="" placeholder=" Add a Description.." style='height:auto; padding:15px;' ></textarea></td>
				</tr>
				<tr style='border-top-style:solid; border-width:thin; '>
					<td><input type="Submit" id='' class="btn btn-create_group"  style='float:right; color:white; font-weight:bolder; margin-right:50px; background:#4267b2;' ></td>
				</tr>
			</table>
		
		<img src="../image/slide3.PNG" style="float:left; margin:80px 0px 0px 50px ;"/>
		<?php
			//group create query
			
			if(isset($_POST['group'])){
			$group_name=$_POST['group_name'];
			$group_description=$_POST['group_description'];
			$path_group_cover = "../../../fb_user/$gender/".$user."/$group_name/Cover/";
			$path_group = "../../../fb_user/$gender/".$user."/$group_name/Post/";
			mkdir($path_group_cover, 755, true);
			mkdir($path_group, 755, true);
			$time=Date("g:i a");
			$mysqli->query("Insert into groups (group_id,user_id,group_name,group_description,time) values ('$i++','$u_id','$group_name','$group_description','$time')");
			
			$row_groupid=$mysqli->query("select * from groups order by group_id desc");
				$fetch_groupforid=$row_groupid->fetch_array();
				$g_id=$fetch_groupforid['group_id'];
	
			$mysqli->query("Insert into group_member (member_id,group_id) values ('$u_id','$g_id+1')");
			}
		?>
	</div>

<script>
	$(document).ready(function(){
		$(".btn.btn-create_group").click(function(){
		var name_group=$("#group_name").val();	
		var description_group=$("#group_description").val();	
			
			if(name_group !=""){
				$.ajax({
					
					url:'Create_Groups.php',
					data:{
						group:1,
						group_name:name_group,
						group_description:description_group
					},
					type:'POST',
					success:function (){
						location.reload();
					}
				
				});
			}
		});
	});
	
		
</script>

</body>
</html>
<script>
	//for create group box 
	$(document).ready(function(){
		$(".btn.btn-create_button").click(function(){
		$("#create_group_box").fadeIn("slow");
		//$(".container-fluid").css("z-index":"-1");
		
		});
	});
	
	$(document).ready(function(){
		$(".close").click(function(){
		$("#create_group_box").fadeOut("slow");
		
		
		});
	});
	
	//end create group box
</script>	

	
<?php }?>