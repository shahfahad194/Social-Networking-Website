<?php
//include("../../connection/conect.php");

	$status_online=$mysqli->query("select * from user_status where status='online'");
		$count_status=mysqli_num_rows($status_online);
	if($count_status>0){
	$status_fetch_all=$mysqli->query("select * from user_status order by status='offline' asc");
	while($status_array=$status_fetch_all->fetch_array()){
		$status_userid=$status_array[1];
		$status_of_chatlist=$status_array[2];
		
	$status_name=$mysqli->query("select * from users where user_id='$status_userid'");
		$status_array_name=$status_name->fetch_array();
	
	$status_profile_pic=$mysqli->query("select * from  user_profile_pic where user_id='$status_userid'");
		$status_profile=$status_profile_pic->fetch_array();
			echo "<table id='status' style='width:100%;display:;border-bottom-style:groove; border-width:thin; border-color:white; color:white; font-family:serif; text-transform:capitalize;'>
					<tr><td><img src='../../../fb_user/".$status_array_name['Gender']."/".$status_array_name['Email']."/Profile/".$status_profile['image']."' style='padding:5px;' width='20%' height='35px'/>";
			echo "<a href='../msj.php?message_id=$status_userid' style='text-decoration:none; color:white;'>".$status_array_name['Name']."</a></td>";
			if($status_of_chatlist=='online'){
			echo"<td><img src='../image/online_symbol.png' style='padding:5px; border-radius:10px;'/>Online</td></tr></table>";
			
			}else{
			echo"<td style='color:lightgray'>$status_of_chatlist</td></tr></table>";

				
			}
	}
	}
	?>