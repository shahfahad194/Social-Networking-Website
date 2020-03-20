<?php 
include("../../../connection/conect.php");

session_start();
if(isset($_SESSION['fbuser'])){
	$user=$_SESSION['fbuser'];

		if (isset($_COOKIE['group_id'])) 
			$group=$_COOKIE['group_id'];	
	$row_group_member_pic=$mysqli->query(
	"select group_member.member_id,user_profile_pic.image,users.Email,users.Gender,users.Name 
	from((group_member 
	INNER JOIN user_profile_pic  ON group_member.member_id = user_profile_pic.user_id) 
	INNER JOIN  users ON group_member.member_id = users.user_id) 
	where group_id='$group'");
	while($fetch_group_member_pic=$row_group_member_pic->fetch_array()){
	$member_name=$fetch_group_member_pic['Name'];
	$member_email=$fetch_group_member_pic['Email'];
	$member_gender=$fetch_group_member_pic['Gender'];
	$member_pic=$fetch_group_member_pic['image'];
	$member_id=$fetch_group_member_pic['member_id'];
	
	$row4=$mysqli->query("select * from  user_info where user_id='$member_id'");
			$fetch4=$row4->fetch_array();
			$city=$fetch4['current_city'];
			$hometown=$fetch4['hometown'];
	
	
	echo"
	<table border='0' style='font-family:Lucida Calligraphy; width:100%; border:lightgray 1px solid;' rules='rows'>
		<tr>
			<td width='35%'><a href='../Profile/Profile.php?id=$member_id'><img src='../../../fb_user/$member_gender/$member_email/Profile/$member_pic' title='$member_name' style='width:100%; height:150px; padding:5px; border-radius:5px; border:0.5px solid lightgray;'></a></td>
			<td style='padding-left:50px;'><a href='../Profile/Profile.php?id=$member_id' style='text-decoration:none; text-transform:capitalize;'>$member_name<br>$hometown</a></td>
		</tr>
	</table>";
	}
}	
?>