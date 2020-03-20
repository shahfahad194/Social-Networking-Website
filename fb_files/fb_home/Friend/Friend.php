<?php //Friends request work 
include("../../../connection/conect.php");
echo" 
	<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'/>
	<script src='../bootstrap/js/bootstrap.js'></script>
	<script src='../Profile/js_files/jquery.js'></script>
	<script src='../bootstrap/js/bootstrap.min.js'></script>
	
	<script src='../popupjquery/ajax.js'></script>
	 <script src='../Profile/js_files/jquery.js'></script>
	 <script src='../popupjquery/maxcdn.bootstrapcdn.js'></script>

 ";
session_start();		
if(isset($_SESSION['fbuser'])){
		echo $user=$_SESSION['fbuser'];

		if (isset($_COOKIE['Profile'])) {
$profile=$_COOKIE['Profile'];	
Setcookie('profile_id',$profile);}	
if (isset($_COOKIE['profile_id'])) 
 $profile_id=$_COOKIE['profile_id'];

$row11=$mysqli->query("select * from users where user_id='$profile_id'");
		$fetch11=$row11->fetch_array();
			$email_fbs=$fetch11['Email'];

		
		/*if (isset($_COOKIE['profile_id'])) 
		echo $profile_id=$_COOKIE['profile_id'];
	
		$row1=$mysqli->query("select * from users where Email='$user'");
		$fetch1=$row1->fetch_array();
		$u_id=$fetch1['user_id'];
		$email_fbs=$fetch1['Email'];
		$name_user=$fetch1['Name'];
	$row11=$mysqli->query("select * from users where user_id='$profile_id'");
		$fetch11=$row11->fetch_array();
			$email_fbs=$fetch11['Email'];
//for user
	$friend_query=$mysqli->query("select * from friend_request where user_id='$u_id' && friend_id='$profile_id'"); 
	$check_rquest=$friend_query->fetch_array();
		$user_id_check=$check_rquest['user_id'];
		$friend_id_check=$check_rquest['friend_id'];
		$request=$check_rquest['request'];
		$accept=$check_rquest['accept'];
//for friend	
	$fri_query=$mysqli->query("select * from friend_request where user_id='$profile_id' && friend_id='$u_id'"); 
	$check_rque=$fri_query->fetch_array();
		 $user_id_ch=$check_rque['user_id'];
		 $friend_id_ch=$check_rque['friend_id'];
		$reque=$check_rque['request'];
		 $acce=$check_rque['accept'];
	
	
			
		
		//for friend profile_id
		if($user_id_ch==$profile_id && $friend_id_ch==$u_id && $reque=='Yes' && $acce=='Yes'){
			if(in_array($friend_id_ch,$valus)){
				echo "<span class='btn btn-primary'>friend</span>&nbsp<button class='btn btn-primary-unfriend_1'>Unfriend</button> ";
			}
		}
		//for user u_id
		elseif($user_id_check==$u_id && $friend_id_check==$profile_id && $request=='Yes' && $accept=='Yes'){
			if(in_array($friend_id_check,$valus)){
				echo "<span class='btn btn-primary'>friend</span>&nbsp<button class='btn btn-primary-unfriend_1'>Unfriend</button> ";
			}
		}
		//for friend profile_id
		elseif($user_id_ch==$profile_id && $friend_id_ch==$u_id && $reque=='Yes' && $acce==''){
			echo"<td><button class='btn btn-for_cancelrequest' id='cancel_request' style='background:#f44336; color:white;'>Cancel Request</button><input type='hidden' class='friendsidd' id='$profile_id'/></td>";
		}
		//for user u_id
		elseif($user_id_check==$u_id && $friend_id_check==$profile_id && $request=='Yes' && $accept==''){
			echo"<td><button class='btn btn-for_sent' style='background:#8bc34a; color:white;' >Request Sent</button> &nbsp <button class='btn btn-for_cancelrequest'  id='cancel_request' style='background:#f44336; color:white;'>Cancel Request</button><input type='hidden' class='friendsidd' id='$profile_id'/></td>";
		}
		else{
		if ($user != $email_fbs){?>
		<td><button style="background:#337ab7; color:white;" class='btn btn-warning-for_addfriend'>Add Friend </button><input type='hidden' class='friendsid' id='<?php echo $u_id;?>'/></td>
<?php }}*/
?>




<?php }?>		