<?php
include("../../connection/conect.php");

echo" 
	 <script src='../popupjquery/ajax.js'></script>
	 <script src='../Profile/js_files/jquery.js'></script>
	 <script src='../popupjquery/maxcdn.bootstrapcdn.js'></script>

 ";
 
session_start();		
if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];

		$row11=$mysqli->query("select * from users where Email='$user'");
		$fetch11=$row11->fetch_array();
		$u_id=$fetch11['user_id'];
		$name=$fetch11['Name'];
	//echo"<table border='1'class='btn btn'><tr></tr><td >Delete all conversaion</td></table>";
	//echo"<table border='1' style='display:none; 'class='btn btn-primary'><tr></tr><td>are your sure want to Delete this..<button >yes</button></td></table>";
		
		if (isset($_COOKIE['message_id'])) {
			$friend_id_msj=$_COOKIE['message_id'];	
			Setcookie('friend_id',$friend_id_msj);}	
		if (isset($_COOKIE['friend_id'])) 
				$friend_msj_id=$_COOKIE['friend_id'];
		$i=5;
	
		$chat_query=$mysqli->query("select * from chat where user_id='$u_id' && friend_id='$friend_msj_id' || friend_id='$u_id'  && user_id='$friend_msj_id' order by chat_id asc");
		
		while($chat_fetch=$chat_query->fetch_array()){
			$i++;
			$msj=$chat_fetch['msj'];
			$chat_time=$chat_fetch['time_chat'];
			$user_id=$chat_fetch['user_id'];
			$friend_id=$chat_fetch['friend_id'];
			
			$row1=$mysqli->query("select * from users where  user_id='$user_id' ");
				$fetch1=$row1->fetch_array();
				$uid_fbs=$fetch1['user_id'];
				$name_fbs=$fetch1['Name'];
				$email_fbs=$fetch1['Email'];
				$gender_fbs=$fetch1['Gender'];
			
			//fcth 2nd for pic
			$row2=$mysqli->query("select * from  user_profile_pic where user_id='$uid_fbs'");
				$fetch2=$row2->fetch_array();
				$imagefbs=$fetch2['image'];
			
			
			
				echo"
				
				<div id='mj' tabindex='-1' style='width:80%;  height:auto; background-color:rgba(225,25$i,15$i,0.7); margin:10px; border-radius:30px 10px 30px 0px; border:1px solid black;padding:10px; '>
					<table border='0' rules='rows' style='font-family:helvitca; word-break: break-all; height:auto;width:100%;'>
						<tr>";
						
						if($gender_fbs=='Male' || $gender_fbs=='Female'){
						echo"<td width='10%'><img src='../../fb_user/$gender_fbs/$email_fbs/Profile/$imagefbs'  height='35px' style=' width:100%; border-radius:5px; box-shadow:0px 0px 25px black; ' /></td>";
						}
						echo"<td align='left'style='color:white;padding-left:10px; text-transform:capitalize;'> $name_fbs </td>
						</tr>
						<tr>
							<td>&nbsp</td>	
							<td>$msj <br /><p style='color:white; text-align:right;'>$chat_time</p></td>
							
						</tr>
						
					</table>
				</div>
			
			";
			
		}
	
	}
?>
<script>
$(document).ready(function(){
$('.btn.btn').click(function(){
$('.btn.btn-primary').show('slow');
	

	
});
});


</script>
<script>

</script>