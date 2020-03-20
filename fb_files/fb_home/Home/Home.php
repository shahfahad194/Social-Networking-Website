<?php   	

include("../../../connection/conect.php");
include("../../../logout.php");

//error_reporting(0);
?>

<?php
//session_start();
if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];

		$row1=$mysqli->query("select * from users where Email='$user'");
		$fetch1=$row1->fetch_array();
		$u_id=$fetch1['user_id'];
			$name=$fetch1['Name'];
			$em=$fetch1['Email'];
			$gen=$fetch1['Gender'];
			
			//fcth 2nd for pic
		$row2=$mysqli->query("select * from  user_profile_pic where user_id='$u_id'");
		$fetch2=$row2->fetch_array();
			$im=$fetch2['image'];
?>
<?php
//for like
	if(isset($_POST['like'])){	
		$post_like=intval($_POST['post_like']);
		$time= Date("g:i a");
		//$u_like=intval($_GET['u_like']);
		$statu_like=$mysqli->query("select * from user_post_status where  post_id='$post_like' AND user_id='$u_id'");
		$que=mysqli_num_rows($statu_like);
		if($que<=0){
			$mysqli->query("insert into  user_post_status (user_id,post_id,status) values('$u_id','$post_like','Like')");
			
			$row3=$mysqli->query("select * from  user_post where post_id='$post_like'");
			$fetch3=$row3->fetch_array();
			$friend_id_notification=$fetch3['user_id'];
			$mysqli->query("insert into  users_notice (user_id,friend_id,post_id,notice_txt,notice_time) values('$u_id','$friend_id_notification','$post_like','Like Your Post..','$time')");
		}
	}
//for unlike

	if(isset($_POST['unlike'])){	
	$post_unlike=intval($_POST['post_unlike']);
	$mysqli->query("delete from user_post_status where user_id='$u_id'and post_id='$post_unlike'");
	
	$mysqli->query("delete from users_notice where user_id='$u_id' and post_id='$post_unlike'");
	
	}
//for liking end 
		
//comment
	if (isset($_POST['comment'])){
	//$c_u_id=intval($_POST['c_id']);
	$c_p_id=intval($_POST['post_comment_id_sub']);
	$commt=$_POST['comment_msj'];
	if($commt !=''){
	
	$upd=$mysqli->query("insert into user_post_comment(post_id,user_id,comment) values('$c_p_id','$u_id','$commt')").$mysqli->error;
		}
	
	}
//end comment query
//for post delete
	if (isset($_POST['postdelete'])){
		$delpostid=$_POST['delpostid'];
		
		$row_post_del=$mysqli->query("select * from  user_post where  user_id='$u_id' AND  post_id='$delpostid' ");
		$fetch_row_del=$row_post_del->fetch_array();
		$pt_pic_del=$fetch_row_del['post_pic'];
		if($gen=='Male' || $gen=='Female'){$folder="../../../fb_user/".$gen."/".$em."/Post/";}
		
		if(unlink($folder.$pt_pic_del)){
			
			$mysqli->query("delete from user_post where user_id='$u_id' and post_id='$delpostid'");
			$mysqli->query("delete from user_post_status where  post_id='$delpostid'");
			$mysqli->query("delete from user_post_comment where post_id='$delpostid'");
			$mysqli->query("delete from users_notice where post_id='$delpostid'");
		}else{
			$mysqli->query("delete from user_post where user_id='$u_id' and post_id='$delpostid'");
			$mysqli->query("delete from user_post_status where post_id='$delpostid'");
			$mysqli->query("delete from user_post_comment where  post_id='$delpostid'");
			$mysqli->query("delete from users_notice where post_id='$delpostid'");
		}
	}
	//end
?>

<?php 
//for srching and adding the post
	if(isset($_POST['p1']))
	{
		$txt=$_POST['txt'];
		$pic=$_FILES['file']['name'];
		$tmp_name=$_FILES['file']['tmp_name'];
		$ext = pathinfo($pic, PATHINFO_EXTENSION);
		
		$time= Date("g:i a");			
			if($pic!="")
			{
				if($_FILES['file']['size']>2000)
				{
				if($ext =='jpg'|| $ext =='JPG'|| $ext =='mp4' || $ext =='MP4')
				{
					if($txt==''){
						move_uploaded_file($tmp_name,"../../../fb_user/$gen/$em/Post/$pic");
						$pst1=$mysqli->query("insert into user_post (user_id,post_pic,post_time,post_txt)values('$u_id','$pic','$time','added a new photo..')");
							
							$row3=$mysqli->query("select * from  user_post order by post_id desc");
							$fetch3=$row3->fetch_array();		
							$post_id=$fetch3['post_id'];
						
							$row4=$mysqli->query("select * from  friends where user_id='$u_id'");
							while($fetch4=$row4->fetch_array()){
							$user_friend_id=$fetch4['user_friend_id'];
							$mysqli->query("insert into  users_notice(user_id,friend_id,post_id,notice_time,notice_txt)values('$u_id','$user_friend_id','$post_id+1','$time','added a new photo..')");
							}					
					}else{
						move_uploaded_file($tmp_name,"../../../fb_user/$gen/$em/Post/$pic");
						$pst1=$mysqli->query("insert into user_post (user_id,post_pic,post_time,post_txt)values('$u_id','$pic','$time','$txt')");
						
						$row3=$mysqli->query("select * from  user_post order by post_id desc");
						$fetch3=$row3->fetch_array();		
						$post_id=$fetch3['post_id'];
					
						$row4=$mysqli->query("select * from  friends where user_id='$u_id'");
						while($fetch4=$row4->fetch_array()){
						$user_friend_id=$fetch4['user_friend_id'];
						$mysqli->query("insert into  users_notice(user_id,friend_id,post_id,notice_time,notice_txt)values('$u_id','$user_friend_id','$post_id+1','$time','$txt')");
						}					
					}	
				}else{echo"<script> alert('Error:Only JPG And PNG File are Accepted...!');</script>";}
				}else{echo"<script> alert('Error:The File Size is Grather Than 2MB...!');</script>";}
			}
			else{
					if($txt !=""){
					$pst1=$mysqli->query("insert into user_post(user_id,post_txt,post_time)values('$u_id','$txt','$time')");
					
					$row3=$mysqli->query("select * from  user_post order by post_id desc");
						$fetch3=$row3->fetch_array();		
						$post_id=$fetch3['post_id'];
					
					$row4=$mysqli->query("select * from  friends where user_id='$u_id'");
						while($fetch4=$row4->fetch_array()){
						$user_friend_id=$fetch4['user_friend_id'];
						$mysqli->query("insert into  users_notice(user_id,friend_id,post_id,notice_time,notice_txt)values('$u_id','$user_friend_id','$post_id+1','$time','added a status..!')");
					}
					}
				}
	}
?>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" type="text/css" href="../css/Home.css"/>-->
	<!--<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'/>-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<script src="../Profile/js_files/jquery.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script>
function get_Post(){
		$.ajax({

			url:'Post.php',
			type:'GET',
			success: function (data){
				$('#post_h').html(data);
				
			}

		});

	}
</script>
</head>
<style>
body {
	margin:0px;
	padding:0px;
   background-image:url(../image/Crunchify.png);
	

}
#main{display:none;}
#center_b{
	width:43%;
	height:auto;
	background:;
	float:left;
	margin:0px 0px 0px 250px;
	padding:10px;
	}
#upload_mobile_h{
	width:100%; display:; 
	border-radius:5px; height:auto; 
	float:left;
	margin:70px 0px 0px 0px; 
	box-shadow:0px 0px 5px black; 
	border:groove 1px lightgray; 
	background:transparent; text-align:;
	
	
	
}
textarea{
	
	margin:0px 0px 0px 0px; width:100%; border-radius:4px;  padding:5px 5px 10px 10px ; 
	
	
}
#comment_area_h{
	width:100%;
	height:auto;
	background:;
	float:left;
	
}
#post_h{
	width:100%;
	height:auto;
	background:;     
	float:left;
	padding:0px;
	
	
}


#po_all tr td{
	padding:3px;
	color:;
}
#po_all{
	height:10px;
}

#comt_b{
	
	
	background-image:url(image/delete_comment.gif); 
	background-size:15px;
	background-repeat:no-repeat;	
	
}

/* mobile size*/
@media (max-width:1024px) {
	
	
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
		#main{display:none;}
		#center_b{
			width:43%;
			height:auto;
			background:;
			float:left;
			margin:0px 0px 0px 250px;
			padding:10px;
			}
	}
@media (max-width:1280px) 
	{
		body{margin:0px;padding:0px;background:;}
		#main{display:none;}
		#center_b{
			width:43%;
			height:auto;
			background:;
			float:left;
			margin:0px 0px 0px 230px;
			padding:10px;
			}

	}		

@media (max-width:1024px) 
	{
		body{margin:0px;padding:0px;background:;}	
		*{margin:0px; padding:0px;}
			#main{display:none;}
			#center_b{
			width:100%;
			height:auto;
			background:;
			float:left;
			margin:auto;
			padding:0px;
			}
			#upload_mobile_h{
			width:100%; 
			border-radius:5px; height:auto; 
			float:left;margin:120px 0px 0px 0px; 
			box-shadow:0px 0px 5px black; 
			background:; text-align:;
			padding:0px;
			}
			
			
			#comment_area_h{
			width:100%;
			height:auto;
			background:;
			float:left;
			margin:auto; 
			padding:0px;
		}
		#post_h{
			width:100%;
			height:auto;
			background:;     
			float:left;
			padding:0px;
		}
				
	}
</style>
<body onload='get_Post();'>
<?php  include("Background.php");?>
	
	<div id="center_b"> 
		<!-------for Dekstop srch---------->
		<!--<div id="upload_h"  style="">
			
			<form method="POST" enctype="multipart/form-data">

				<table border="0"   style="width:100%; " >
					<tr>
						<td width='0px' ><img src='../image/newsfeed.png' style="float:right"width='15px' ></td>
						<td style="font-size:13px;padding-left:5px;">Upload Status</td>
						<td><img src='../image/my_videos.png'  width='20px'></td>
						<td style="font-size:13px;">Upload Photos</td>
					</tr>
					<tr>
						<td colspan="4" align="center"><textarea  name="txt" rows="8" cols="64" placeholder="What's on your mind...."style=""></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><label for="files" class="btn" style="border:1px solid gray; font-family:algerian; color:white; width:40%; border-radius:15px; margin:10px 5px 5px 10px; padding:5px; height:30px; background:gray;"><img src="../image/Mini-Video.png" style="padding:0px;height:; width:20px;"/> Photo/vedio</label>						
							<input  id="files" style="visibility:hidden;" type="file" name="file"></td>
		
							--<td colspan="2"><input type="file" name="file"></td>-

						<td colspan="2"><input type="submit" name="p1" Value="POST" class='btn btn-primary' style=" background:#3B5998; display:block; float:right; margin:0px 15px 20px 0px; color:white; border:1px solid lightblue; width:100px; padding:0px; 	height:30px; border-radius:3px; font-size:1.2em; font-weight:bolder;font-family:algerian;"></td>
					</tr>
				</table>
			</form>	
		</div>-->
	
		<!-------for fetch upload mobile ---------->
		
		<div id='upload_mobile_h'  style='font-family:algerian;'>
			<!----for srch----->
			<form method='POST' enctype='multipart/form-data'>
				<table border='0'   style='width:100%;' >
					<tr>
						<td colspan='2'  width='30px' align='center'><img src='../image/newsfeed.png' width='15px'  >Upload Status</td>
						
						<td width='10px'colspan='2'  align='center'><img src='../image/my_videos.png' style='' width='20px'>Upload Photos</td>
						
					</tr>
					<tr>
						<td colspan='4' align='center'><textarea  name='txt' rows='6' cols='60' placeholder='Whats on your mind....' style='width:100%; font-family:sans-serif;'></textarea></td>
					</tr>
					<tr>
						<td colspan="4">
							<table border='0' width='100%;'>
								<tr>
									<td>
									<label for="files" style="border:1px solid gray; font-family:algerian; color:gray; cursor:pointer; float:left; width:auto; border-radius:15px; margin:15px 0px 0px 10px; padding:5px 10px 0px 10px; height:30px; background:lightgray;"><i class="glyphicon glyphicon-picture"></i>&nbsp Photo</label>						
									<label for="filess" class="" style="border:1px solid gray; font-family:algerian; cursor:pointer; color:gray; width:auto; border-radius:15px; margin:15px 0px 0px 10px; padding:5px 10px 0px 10px; height:30px; background:lightgray;"><i class="glyphicon glyphicon-film"></i>&nbsp video</label>						
									<input type='submit' name='p1' Value='POST' class='btn btn' style=' background:#3B5998; float:right; color:white; height:auto;border-radius:3px; margin:15px 10px 0px 0px;font-weight:bolder;font-family:serif;'>

									<input  id="files" style="visibility:hidden;" type="file" name="file" accept="image/*" />
									<input  id="filess" style="visibility:hidden;" type="file" name="filess" accept="video/*" />
									</td>
									
								</tr>
							</table>
						</td>
						
					</tr>
				</table>
			</form>
			<p id='msj'></p>	
		</div>
			
				
		<!-------for fetch all member post ---------->

		<div id="comment_area_h">
			<div id="post_h">	</div>
		</div>			
		<!--end post query -->			
	</div>
<?php 

}else{} ?>

</body>
</html>
