<?php
//include("../../connection/conect.php");
if(isset($_SESSION['fbuser']))
{
	$user=$_SESSION['fbuser'];

	$row1=$mysqli->query("select * from users where Email='$user'");
	$fetch1=$row1->fetch_array();
	$u_id=$fetch1['user_id'];
	
		$status_online=$mysqli->query("select user_status.user_id from user_status INNER JOIN  friends ON user_status.user_id=friends.user_friend_id where user_status.status='online'");
		$count_status=mysqli_num_rows($status_online);
		echo"<span style='color:gray; background:transparent; float:left;  padding:10px 0px 10px 10px ; text-align:right; height:35px; width:30%; font-size:1.2em;'><img src='../image/online_symbol.png' style='padding:5px;float:right; cursor:pointer; border-radius:10px;'/></span>
		<span class='glyphicon glyphicon-user .badge' class='badge' style='color:gray; background:transparent; float:left; text-align:left; padding:10px; height:35px; width:70%; font-size:1.2em;'>Online($count_status)</span>";

	
	$friends_online=$mysqli->query("select * from friends where user_id='$u_id' && status='Friend'");
		while($fetchfriends_online=$friends_online->fetch_array())
		{
			$user_friend_id	=$fetchfriends_online['user_friend_id'];
			//if($count_status>0)
				$status_fetch_all=$mysqli->query("select * from user_status where user_id='$user_friend_id'  order by status='offline' asc");
				$status_array=$status_fetch_all->fetch_array();
					$status_userid=$status_array[1];
					$status_of_chatlist=$status_array[2];
				
				$status_name=$mysqli->query("select * from users where user_id='$status_userid'");
					$status_array_name=$status_name->fetch_array();
			
				$status_profile_pic=$mysqli->query("select * from  user_profile_pic where user_id='$status_userid'");
					$status_profile=$status_profile_pic->fetch_array();
					
					
					echo "<table id='status' rules='rows' border='1' style='width:100%;display:;border-bottom-style:solid;  border-width:thin; border-color:white; color:green; padding:3px;font-family:serif; text-transform:capitalize;'>
							<tr><td width='60%'><img src='../../../fb_user/".$status_array_name['Gender']."/".$status_array_name['Email']."/Profile/".$status_profile['image']."' style='padding:5px; border-radius:4px;' width='20%' height='35px'/>";
					echo "<a href='../Message/Msj.php?message_id=$status_userid' style='text-decoration:none; color:;'>".$status_array_name['Name']."</a></td>";
					if($status_of_chatlist=='online')
					{echo"<td width='20%'><img src='../image/online_symbol.PNG' style='padding:0px;  border-radius:10px;'/>&nbspOnline</td></tr></table>";
					}else{echo"<td width='20%' style='text-align:center; color:gray'>$status_of_chatlist</td></tr></table>";}
		}
}
?>
