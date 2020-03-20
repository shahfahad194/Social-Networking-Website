<?php //Friends request work 
include("../../../connection/conect.php");
echo" 
	 <script src='../popupjquery/ajax.js'></script>
	 <script src='../Profile/js_files/jquery.js'></script>
	 <script src='../popupjquery/maxcdn.bootstrapcdn.js'></script>
	 <link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'/>

	 
	<style>*{margin:0px;padding:0px;}</style>
 ";
//error_reporting(0);
session_start();		
if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];
		
		$row1=$mysqli->query("select * from users where Email='$user'");
		$fetch1=$row1->fetch_array();
		$u_id=$fetch1['user_id'];
		$email_fbs=$fetch1['Email'];
		$name_user=$fetch1['Name'];
		$gender_user=$fetch1['Gender'];
		echo"<div style='width:100%; height:50px;  background:SlateGray;'><table width='50%'style='text-align:center; color:white; text-transform:capitalize;  font-size:1.8em; font-family:Algerian;' ><tr><td style='padding:10px;'>notification</td></tr></table></div>";
		$row_notifctin=$mysqli->query("select * from users_notice where friend_id='$u_id'");
		//$row_notifctin=$mysqli->query("select * from users_notice");
		while($fetch_notifctin=$row_notifctin->fetch_array()){
				$user_id_noti=$fetch_notifctin['user_id'];
				$friend_id_noti=$fetch_notifctin['friend_id'];
				$post_id_noti=$fetch_notifctin['post_id'];
				$notice_txt=$fetch_notifctin['notice_txt'];
				$notice_time=$fetch_notifctin['notice_time'];
		$row11=$mysqli->query("select * from users where user_id='$user_id_noti'");
				$fetch11=$row11->fetch_array();
				$email_notice=$fetch11['Email'];
				$name_notice=$fetch11['Name'];	
				$gender_notice=$fetch11['Gender'];	
		$row22=$mysqli->query("select * from  user_profile_pic where user_id='$user_id_noti'");
				$fetch22=$row22->fetch_array();
				$profile_image=$fetch22['image'];	
		$row223=$mysqli->query("select * from  user_post where post_id='$post_id_noti'");
				$fetch223=$row223->fetch_array();
				$post_pic=$fetch223['post_pic'];			
				$post_txt=substr($fetch223['post_txt'],0,20);			
				//$array=array($u_id);
				//print_r($array);
				if($u_id != $user_id_noti){
				
					echo"<table border='1' rules='rows' width='100%' style='padding:10px; border-color:white;margin-top:2px'>
						<tr><td width='10%'>";
						echo"<table  width='100%' style='font-family:Algerian; text-transform:capitalize; word-break: break-all;'>
								<tr>
									<td><a href='../Profile/Profile.php?id=$user_id_noti'><img src='../../../fb_user/$gender_notice/$email_notice/Profile/$profile_image' style='width:100%; height:80px; padding-left:5px;'/></a></td>
								</tr>
							</table></td>";
					
					echo"<td><table border='' width='100%' style='padding:50px; font-family:Algerian; margin-top:3px; text-transform:capitalize; word-break: break-all;'>
							<tr>
								<td style='padding:10px 0px 0px 10px;text-decoration:none;'>$name_notice<br /><a href='../Home/comment.php?tag&postid=$post_id_noti'>$notice_txt<br/>$notice_time</a></td>";?>
						<?php 
							if($post_pic !==""){
								if($gender_user=='Male' || $gender_user=='Female'){echo" <td width='10%' height='35px' align=''><a href='../Home/comment.php?tag&postid=$post_id_noti'><img src='../../../fb_user/$gender_notice/$email_notice/Post/$post_pic'   height='80px' width='100%' style=' padding:px; box-shadow:0px 0px 25px black; ' /></a></td> ";}
							}else{
								echo" <td style='padding:10px 0px 0px 10px;text-decoration:none; width:25%;'><a href='../Home/comment.php?tag&postid=$post_id_noti' style='text-decoration:none;'>$post_txt &nbsp learn more ....!</a></td>";
								
							}
							
						?>

					<?php echo"</tr>";
							
					if($notice_txt=='Sent You a Friend Request..!')
					{	
						echo"<tr><td colsapn='2' style='padding:10px 0px 10px 10px;'> <button class='btn btn-info'  id='$user_id_noti' value='Yes'>accept request</button><button class='btn btn-warning' id='cancel'>cancel request</button> </td>
							<td>&nbsp </td>
							</tr>";
					}
					
					if($notice_txt==$name_notice.' accepted your friend request...')
					{
						echo"<tr><td colsapn='2' style='padding:10px 0px 10px 10px;'> <button style='width:35%;' class='btn btn-info' id='$user_id_noti' value='Yes'>Friend</button> &nbsp <button style='width:35%;' class='btn btn-info' id=''>Unfriend</button> </td>
							<td>&nbsp </td>
							</tr>";	
					}	
					echo"</table>";
					echo"</td></tr></table>";
					
				}elseif($u_id == $user_id_noti){
				
					echo"<table border='1' rules='rows' width='100%' style='padding:10px; border-color:white;margin-top:2px'>
						<tr><td width='10%'>";
						echo"<table  width='100%' style='font-family:Algerian; text-transform:capitalize; word-break: break-all;'>
								<tr>
									<td><a href='../Profile/Profile.php?id=$user_id_noti'><img src='../../../fb_user/$gender_notice/$email_notice/Profile/$profile_image' style='width:100%; height:80px; padding-left:5px;'/></a></td>
								</tr>
							</table></td>";
					
					echo"<td><table border='' width='100%' style='padding:50px; font-family:Algerian; margin-top:3px; text-transform:capitalize; word-break: break-all;'>
							<tr>
								<td style='padding:10px 0px 0px 10px; text-decoration:none;'>$name_notice<br /><a href='../Home/comment.php?tag&postid=$post_id_noti'>$notice_txt <br/>$notice_time</a></td>";?>
						<?php 
							if($post_pic !==""){
								if($gender_user=='Male' || $gender_user=='Female'){echo" <td width='10%' height='35px' align=''><a href='../Home/comment.php?tag&postid=$post_id_noti'><img src='../../../fb_user/$gender_notice/$email_notice/Post/$post_pic'   height='80px' width='100%' style=' padding:px; box-shadow:0px 0px 25px black; ' /></a></td> ";}
							}else{
								echo" <td style=' padding:10px 0px 0px 10px; width:25%; text-decoration:none; '><a href='../Home/comment.php?tag&postid=$post_id_noti' target='_blank' style='text-decoration:none;'>$post_txt&nbsp learn more ....!</a></td>";
								
							}
							
						?>

				<?php echo"</tr>";
				echo"</table>";
					echo"</td></tr></table>";
				}
				
				
				
		} 
		echo"<table border='1'style='width:100%;  border-color:white; height:45px; background:SlateGray; text-align:center; font-family:algerian;'><tr><td><a href='../Notification/notification.php' target='_blank' style='text-decoration:none; color:white;'>see all</a></td></tr></table>";

		
		$values = array($u_id);
	

if(isset($_POST['req'])){
		//$request_acept=$_POST['request_acept'];
		$reqst_id=$_POST['reqst_idddds'];
	$time=date("g:i a");

	//array_push($array,$reqst_id);
		
		
		$mysqli->query("update friend_request set accept='Yes' where friend_id='$u_id'");
		$mysqli->query("insert into  users_notice (user_id,friend_id,notice_txt,notice_time)values('$u_id','$reqst_id','$name_user accepted your friend request...','$time')");
		//$arrayD= array('$u_id');
		//array['$reqst_id']=$reqst_id;
		//array_push($arrayD,$u_id);
		$row1=$mysqli->query("select * from users where Email='$user'");
		$fetch1=$row1->fetch_array();
		$res=$fetch1['friend'];
		
		$row112=$mysqli->query("select * from users where user_id='$reqst_id'");
		$fetch112=$row112->fetch_array();
		$re_fs=$fetch112['friend'];
		if($res <0){
		$ar=$mysqli->query("update  users set friend='$reqst_id' where user_id='$u_id'");
		$ar=$mysqli->query("update  users set friend='$u_id' where user_id='$reqst_id'");
		
		}else{
		//for user
		$abb=array($res,$reqst_id);
		$abs=implode(',',$abb);
			$ar=$mysqli->query("update  users set friend='$abs' where user_id='$u_id'");
		//for friend
		$abb_f=array($re_fs,$u_id);
		$abs_f=implode(',',$abb_f);
			$ar=$mysqli->query("update  users set friend='$abs_f' where user_id='$reqst_id'");
		
		}
	}


		


?>	

<script>	
$(document).ready(function(){
$('.btn.btn-info').click(function(){
	var request_acpt=$(this);
	var requst_id=request_acpt.attr('id');
	

	$.ajax({

	url:'../Notification/notification.php',
	data:{	req:1,
		reqst_idddds:requst_id
	},
	type:'POST',
	success:function (){
	alert('ok');
	

	}
	});

});

});


</script>									
<?php }?>