<?php
include("../../../connection/conect.php");
echo" 
	<link rel='stylesheet' type='text/css' href='../css/Home.css'/>
	<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'/>
	<script src='../bootstrap/js/bootstrap.js'></script>
	<script src='../Profile/js_files/jquery.js'></script>
	<script src='../bootstrap/js/bootstrap.min.js'></script>
 ";
error_reporting(0);
session_start();
	if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];
		
		if (isset($_COOKIE['group_id'])) 
			$group=$_COOKIE['group_id'];	
		
		
		
		$row1=$mysqli->query("select * from users where Email='$user'");
		$fetch1=$row1->fetch_array();
		$u_id=$fetch1['user_id'];
			
		$arry=array();
		//$array = array_unique($arry);
		$row_group_all_own=$mysqli->query("select * from friends where user_id='$u_id' ");
		while($fetch_group_all_own=$row_group_all_own->fetch_array()){
			$user_friend_id=$fetch_group_all_own['user_friend_id'];
			array_push($arry,$user_friend_id);
			}
		
		$row_group_member=$mysqli->query("select * from group_member where group_id='$group' ");
			while($fetch_group_member=$row_group_member->fetch_array()){
			$user_group_member=$fetch_group_member['member_id'];	
				
			$index = array_search($user_group_member,$arry);
			if ( $index !== false ){unset( $arry[$index] );}
			}
		if($arry != false ){	
		foreach($arry as $kes)
		{ 	
			$row_f=$mysqli->query("select * from users where user_id='$kes'");
			$fetch_f=$row_f->fetch_array();
			$u_id_f=$fetch_f['user_id'];
			$name_f=$fetch_f['Name'];
			$email_f=$fetch_f['Email'];
			$gender_f=$fetch_f['Gender'];
			
			$row2=$mysqli->query("select * from  user_profile_pic where user_id='$u_id_f'");
			$fetch2=$row2->fetch_array();
				$image_f=$fetch2['image'];
				
			$row_noti=$mysqli->query("select * from users_notice where user_id='$u_id' && friend_id='$u_id_f' && post_id='$group'");
			$fetch_noti=$row_noti->fetch_array();
			$notice_txt=$fetch_noti['notice_txt'];
			
			
		?>	
			<table border='0' style='font-family:Lucida Calligraphy; width:100%; border:' rules='rows'>
				<tr>
					<td style='width:35%; padding:10px;'><?php echo"<img src='../../../fb_user/$gender_f/$email_f/Profile/$image_f' style='width:100%; height:150px; border-radius:5px; padding:4px; border:1px solid gray;'/>";?></td>
					<td style='text-align:left; padding-left:30px;'><a href="../Profile/Profile.php?id=<?php echo $u_id_f;?>" style='text-decoration:none;'><?php echo $name_f ;?></a><br><?php if(strchr($notice_txt,'invited you to join')=='invited you to join'){echo"Already sent an invitation..!";}else{?><button class='btn btn-add-member' style='background:#3B5998;  border-color:lightblue; color:white;' id='<?php echo $u_id_f;?>'>Add Member</button><br>Sent an Invitation...!<?php }?></td>
				</tr>
			</table>
		<?php }}else{echo"<span class='glyphicon glyphicon-user' style='font-size:3.4em; width:100%; color:lightgray;padding:30px 0px 0px 0px; text-align:center; height:200px;'><br><i style='font-family:algerian;font-size:0.7em;'>no user to show..!</i></span>";}?>
		
		<?php
			if(isset($_POST['add_member'])){	
				$time= Date("g:i a");
				$add_member=intval($_POST['add_member_id']);
				
				/*$row1_gr=$mysqli->query("select * from groups where group_id='$group'");
					$fetch_gr=$row1_gr->fetch_array();
					$group_name=$fetch_gr['group_name'];*/
				$mysqli->query("insert into  users_notice (user_id,friend_id,post_id,notice_txt,notice_time) values('$u_id','$add_member','$group','invited you to join','$time')");
			}
		?>
<?php }?>

<script>
$(document).ready(function(){
	$('.btn.btn-add-member').click(function(){
		var element= $(this);
		var member_id=element.attr('id');
		$.ajax({
	
			url:'Add_member.php',
			data:{	add_member:1,
					add_member_id:member_id
					},
			type:'POST',
			success:function (){
				addmember();
			}
		});
			
		return false;
	});
	
});
</script>