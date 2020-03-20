<?php
include("../../../connection/conect.php");
include("../../../logout.php");
//error_reporting(0);

session_start();
		if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];
	
		if(isset($_GET['id']))
			$id=$_GET['id'];
		
		Setcookie('Profile',$id);	
		$row1=$mysqli->query("select * from users where Email='$user'");
		$fetch1=$row1->fetch_array();
			$uid_fb=$fetch1['user_id'];
			$name_fb=$fetch1['Name'];
			$email_fb=$fetch1['Email'];
			$gender_fb=$fetch1['Gender'];
			//fcth 2nd for pic
		$row2=$mysqli->query("select * from  user_profile_pic where user_id='$uid_fb'");
		$fetch2=$row2->fetch_array();
			$imagef=$fetch2['image'];
		$row3=$mysqli->query("select * from  user_post where user_id='$uid_fb'");
			$fetch3=$row3->fetch_array();
			$post_txt=$fetch3['post_txt'];
			$prity=$fetch3['priority'];
			$post_time=$fetch3['post_time'];
			$post_picf=$fetch3['post_pic'];
			$pt_time=$fetch3['post_time'];
//end query for on user
	?>
<?php 
	if(isset($_POST['like'])){
		$post_like=$_POST['post_like'];
		//$mysqli->query("insert into  user_post_status (user_id,post_id,status) values('$uid_fb','$post_like','Like')");
		
		$statu_like=$mysqli->query("select * from user_post_status where  post_id='$post_like' AND user_id='$uid_fb'");
		$que=mysqli_num_rows($statu_like);
		if($que<=0){
			$mysqli->query("insert into  user_post_status (user_id,post_id,status) values('$uid_fb','$post_like','Like')");
			
			$row3=$mysqli->query("select * from  user_post where post_id='$post_like'");
			$fetch3=$row3->fetch_array();
			$friend_id_notification=$fetch3['user_id'];
			$mysqli->query("insert into  users_notice (user_id,friend_id,post_id,notice_txt,notice_time) values('$uid_fb','$friend_id_notification','$post_like','Like Your Post..','$time')");
		}
	}
	//for unlike
		
	if(isset($_POST['unlike'])){
		$post_unlike=$_POST['post_unlike'];
		$mysqli->query("delete from user_post_status where user_id='$uid_fb'and post_id='$post_unlike'");
		
		$mysqli->query("delete from users_notice where  post_id='$post_unlike'");
	}
?>

<?php
		$row1=$mysqli->query("select * from users where user_id='$id'");
		$fetch1=$row1->fetch_array();
			$u_id=$fetch1['user_id'];
			$name=$fetch1['Name'];
			$email=$fetch1['Email'];
			$gender=$fetch1['Gender'];
			$dob=$fetch1['Birthday_Date'];
			$row4=$mysqli->query("select * from  user_info where user_id='$id'");
			$fetch4=$row4->fetch_array();
			$city=$fetch4['current_city'];
			$hometown=$fetch4['hometown'];
			
			//fcth 2nd for pic
		$row2=$mysqli->query("select * from  user_profile_pic where user_id='$u_id'");
		$fetch2=$row2->fetch_array();
			$image=$fetch2['image'];
		$row3=$mysqli->query("select * from  user_post where user_id='$u_id'");
			$fetch3=$row3->fetch_array();
			$post_txt=$fetch3['post_txt'];
			$prity=$fetch3['priority'];
			$post_time=$fetch3['post_time'];
			$post_pic=$fetch3['post_pic'];
			$pt_time=$fetch3['post_time'];

	if(isset($_POST['p1'])){
		$txt=$_POST['txt'];
		$pic=$_FILES['file']['name'];
		$ext = pathinfo($pic, PATHINFO_EXTENSION);
		$tmp_name=$_FILES['file']['tmp_name'];
		$time= Date("g:i a");
	
		if($pic !="")
		{
			if($_FILES['file']['size']>2000)
			{
			if($ext =='jpg'|| $ext =='JPG'|| $ext =='PNG'|| $ext =='png' || $ext =='mp4' || $ext =='MP4')
			{
				if($txt==''){
					move_uploaded_file($tmp_name,"../../../fb_user/$gender/$email/Post/$pic");
					$pst1=$mysqli->query("insert into user_post (user_id,post_pic,post_time,post_txt)values('$id','$pic','$time','added a new photo..')");
						
						$row3=$mysqli->query("select * from  user_post order by post_id desc");
							$fetch3=$row3->fetch_array();		
							$post_id=$fetch3['post_id'];
						
							$row4=$mysqli->query("select * from  friends where user_id='$id'");
							while($fetch4=$row4->fetch_array()){
							$user_friend_id=$fetch4['user_friend_id'];
							$mysqli->query("insert into  users_notice(user_id,friend_id,post_id,notice_time,notice_txt)values('$id','$user_friend_id','$post_id+1','$time','added a new photo..')");
							}	
				}else
				{
					move_uploaded_file($tmp_name,"../../../fb_user/$gender/$email/Post/$pic");
					$pst1=$mysqli->query("insert into user_post (user_id,post_pic,post_time,post_txt)values('$id','$pic','$time','$txt')");
					
					$row3=$mysqli->query("select * from  user_post order by post_id desc");
						$fetch3=$row3->fetch_array();		
						$post_id=$fetch3['post_id'];
					
						$row4=$mysqli->query("select * from  friends where user_id='$id'");
						while($fetch4=$row4->fetch_array()){
						$user_friend_id=$fetch4['user_friend_id'];
						$mysqli->query("insert into  users_notice(user_id,friend_id,post_id,notice_time,notice_txt)values('$id','$user_friend_id','$post_id+1','$time','$txt')");
						}			
				}
			}else{echo"<script> alert('Error:Only JPG And PNG File are Accepted...!');</script>";}
			}else{echo"<script> alert('Error:The File Size is Grather Than 2MB...!');</script>";}
		}
		else{
				$pst1=$mysqli->query("insert into user_post(user_id,post_txt,post_time)values('$id','$txt','$time')");
					$row3=$mysqli->query("select * from  user_post order by post_id desc");
						$fetch3=$row3->fetch_array();		
						$post_id=$fetch3['post_id'];
					
						$row4=$mysqli->query("select * from  friends where user_id='$id'");
						while($fetch4=$row4->fetch_array()){
						$user_friend_id=$fetch4['user_friend_id'];
						$mysqli->query("insert into  users_notice(user_id,friend_id,post_id,notice_time,notice_txt)values('$id','$user_friend_id','$post_id+1','$time','$txt')");
						}	
			}					
	}				
//end post updta query	
?>


<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>Profile</title>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>		
	<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'/>
	<script src='../bootstrap/js/bootstrap.js'></script>
	<script src='../Profile/js_files/jquery.js'></script>
	<script src='../bootstrap/js/bootstrap.min.js'></script>
	</head>
<style>
body { background-image:url(../image/Crunchify.PNG);}

#profile_main{
	width:70%;
	height:auto;
	background:transparent;
	float:left;
	
}

#left_main{
	width:30%;
	height:950px;
	background:;
	margin:0px 0px 0px 20px ;
	float:left;
	
	
	
}
#left{
	width:100%;
	height:200px;
	background:;
	margin:20px 0px 0px 0px ;
	float:left;
	box-shadow:0px 0px 25px black;
	border-style:groove;  border-width:thin;
}
#photos{
	width:100%;
	height:400px; 
	margin:20px 0px 0px 0px ;
	float:left;
	background-color:;
	overflow:hidden;
	box-shadow:0px 0px 25px black;
	border-style:groove;  
	border-width:thin;
}
#right_main_p{
	
	width:65%;
	height:auto;
	background:;
	margin:20px 0px 0px 20px ;
	border:1px white groove;
	float:left;
	border-radius:5px;
	padding:2px;
	box-shadow:0px 0px 20px black;
}
#my_post{
	
	width:65%;
	height:auto;
	float:left;
	margin:5px 0px 0px 20px ;
	
}
.popover-content{text-transform:capitalize;background:black;color:white;border-radius:5px;word-warp:break-word;display:block;width:120px; font-family:Lucida Calligraphy;}
.popover-title{background:white;color:black;border-radius:5px;font-weight:bolder; font-family:Algerian;}					



/* mobile size*/


@-ms-viewport {
		width: device-width;
	}

	body {
		-ms-overflow-style: scrollbar;
	}
	
@media screen and (max-width:2560px) 
	{
	body{margin:0px;padding:0px;background-image:url(../image/Crunchify.PNG);}
	}	
	
@media screen and (max-width: 1680px) 
	{
		body{margin:0px;padding:0px;}
		#profile_main{width:75%; padding:10px; height:auto; background:; float:left;}
	
		#right_main_p{width:65%; height:auto; margin:20px 0px 0px 20px;}
		
		#my_post{width:65%; background:; height:auto; float:left; margin:8px 0px 0px 20px;}

		
	}
@media (max-width:1280px) 
	{
		body{margin:0px;padding:0px;}
		
		#profile_main{width:75%; padding:10px; height:auto; background:; float:left;}
	
		#right_main_p{width:60%; height:auto; margin:20px 0px 0px 20px;}
		
		#my_post{width:60%; background:; height:auto; float:left; margin:8px 0px 0px 20px;}

	}		

@media (max-width:1024px) {
	body{margin:0px;padding:0px;background:;}
	
	#profile_main{width:100%; height:auto; padding:0px;background:; float:left;}
	
	#left_main{display:none;}	
	
	#right_main_p{width:100%; height:auto; margin:auto;}
	
	#my_post{width:100%; height:auto; float:left; margin:auto ;}
	
}
	
@media (max-width:980px) 
	{
		body{margin:0px;padding:0px;background:;}
		#profile_main{width:100%; height:auto; padding:0px;background:; float:left;}
	
		#left_main{display:none;}	
		
		#right_main_p{width:100%; height:auto; margin:auto;}
		
		#my_post{width:100%; height:auto; float:left; margin:auto ;}
		
	}	
@media (max-width:736px) 
	{
		body{margin:0px;padding:0px;background:;}
		#profile_main{width:100%; height:auto; padding:0px;background:; float:left;}
	
		#left_main{display:none;}	
		
		#right_main_p{width:100%; height:auto; margin:auto;}
		
		#my_post{width:100%; height:auto; float:left; margin:auto ;}
			
	}
@media (max-width:480px) 
	{
		body{margin:0px;padding:0px;background:;}
		
		#profile_main{width:100%; height:auto; padding:0px;background:; float:left;}
	
		#left_main{display:none;}	
		
		#right_main_p{width:100%; height:auto; margin:auto;}
		
		#my_post{width:100%; height:auto; float:left; margin:auto ;}
	
	}
	
	
@media (max-width:360px) 
	{
		body{margin:0px;padding:0px;background:;}
		#profile_main{width:100%; height:auto; padding:0px;background:; float:left;}
	
		#left_main{display:none;}	
		
		#right_main_p{width:100%; height:auto; margin:auto;}
		
		#my_post{width:100%; height:auto; float:left; margin:auto ;}
	}

</style>

<body onload="Post();">

<?php  include("background.php");?>
	<div id="profile_main" >
		<div id="left_main">
			<div id='left'>
				<div style='width:50%; float:left;border-width:thin; 	background:gray; text-transform:underline;  border-right-style:groove;  border-bottom-style:groove; height:50px; font-family:serif; font-weight:bolder; color:white; font-size:1.6em; text-align:center;'>Intro</div>
				<div style='width:50%;  float:right; background:white;  height:50px;'><img src='../image/intro.jpg' style='width:100%; height:50px; float:right; border-bottom-style:groove;'/></div>
				<table border='0' style='width:100%; height:139px; font-family:serif; color:lightgray; text-transform:capitalize; ' >
					
					<tr>
						<td colspan='2' align='center' style=' text-decoration:underline; color:black'> basic information</td>
						
					</tr>
					<tr>
						<td align='center'>brithday</td>
						<td><?php echo $dob; ?></td>
					</tr>
					
					<tr>
						<td align='center'>gender</td>
						<td><?php echo $gender; ?></td>
					</tr>
					<tr>
						<td align='center'>current location</td>
						<td><?php if($email==$user){if($city==''){echo" <a href='about.php?id=$u_id'>Add your City.</a>";}else{echo " <a href='about.php?id=$u_id'>$city</a>";}}else{ echo "User Not Describe..."; } ?></td>
					</tr>
					<tr>
						<td align='center'>hometown</td>
						<td><?php if($email==$user){if($hometown==''){echo" <a href='about.php?id=$u_id'>Add your hometown.</a>";}else{echo " <a href='about.php?id=$u_id'>$hometown</a>";}}else{ echo"User Not Describe...";} ?></td>
					</tr>
				
				</table>
				
			</div>
			<!----------------------------for photos ------------------------------------------------------>
			
			<div id='photos' >
				<div style=' width:50%; text-align:center; color:white; font-family:serif; height:50px; float:left; background-color:gray; font-size:1.6em;'>Photos</div>
				<div style=' width:50%; text-align:center; color:white; font-family:serif; height:50px; float:left; background-color:white; font-size:1.6em;'><img src='../image/photo&video.png' width='30%'/></div>
				<?php 
					$photo=$mysqli->query("select * from  user_post where user_id='$id' order by post_id desc");
						while($fetch_p=$photo->fetch_array()){
						$pid=$fetch_p['post_id'];
						$photos=$fetch_p['post_pic'];
						if($photos !=''){
						echo"
							
							<a href='Photo.php?id=$id'><img src='../../../fb_user/$gender/$email/Post/$photos' style='float:left; border:groove; border-width:;'width='50%' height='100px'/></a>
							
						";}
					}
				?>
					<!----------------------------end photos query ------------------------------------------------------>

			</div>			
					
		</div>
				<!----------------------------end left main ------------------------------------------------------>

		
		<div id="right_main_p">
			<!----------------------------for post status ------------------------------------------------------>
			<form method="POST" enctype="multipart/form-data" action='Profile.php?id=<?php echo $uid_fb;?>'>
			<?php if($email== $user){ echo"
			<table border='0'  style='width:100%;  font-family:algerian; height:auto; ' >
				<tr>
					<td width='30px' ><img src='../image/newsfeed.png' style='float:right'width='15px'></td>
					<td style='font-size:13px;padding-left:7px;'>Upload Status</td>
					<td><img src='../image/my_videos.png' width='20px'></td>
					<td style='font-size:13px;'>Upload Photos</td>
				</tr>
				<tr>
					<td colspan='4' align='center'><textarea  name='txt' rows='7' cols='64' placeholder='Whats on your mind....?' style='margin:0px 0px 0px 0px; width:100%; font-family:sans-serif; padding:10px 10px 10px 10px ; '></textarea></td>
				</tr>
				<tr>
					<td colspan='4'>
						<table border='0' width='100%;'>
							<tr>
								<td>
								<label for='files' style='border:1px solid gray; font-family:algerian; color:gray; cursor:pointer; float:left; width:auto; border-radius:15px; margin:15px 0px 0px 10px; padding:5px 10px 0px 10px; height:30px; background:lightgray;'><i class='glyphicon glyphicon-picture'></i>&nbsp Photo</label>						
								<label for='filess' class='' style='border:1px solid gray; font-family:algerian; cursor:pointer; color:gray; width:auto; border-radius:15px; margin:15px 0px 0px 10px; padding:5px 10px 0px 10px; height:30px; background:lightgray;'><i class='glyphicon glyphicon-film'></i>&nbsp video</label>						
								<input type='submit' name='p1' Value='POST' class='btn btn' style=' background:#3B5998; float:right; color:white; height:auto;border-radius:3px; margin:15px 10px 0px 0px;font-weight:bolder;font-family:serif;'>

								<input  id='files' style='visibility:hidden;' type='file' name='file' accept='image/*' />
								<input  id='filess' style='visibility:hidden;' type='file' name='filess' accept='video/*' />
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
			</table>";}
			?>
			</form>	
		</div>	
			<!-------------------------for status div close--------------------------------------------------------->
			<!-------------------------for name proflie pic start--------------------------------------------------------->

		<div id="my_post">
			<script>		
				function Post(){
					$.ajax({
						url:'Post_Profile.php',
						type:'GET',
						success: function (data){
							//alert(data);
							$('#my_post').html(data);	
						}
					});
				}
				//setInterval("Post()",1000);
			</script>
		</div>	
	</div>
</body>				
</html>
<script>
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover();
	});
</script>
<?php }else{
	header("location:../../../index.php");

}
?>