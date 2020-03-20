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
		 echo$profile_id=$_COOKIE['profile_id'];

	
		
	
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
<?php }}?>
<?php

//Sent request for any of them
	if(isset($_POST['requests'])){
		$friends_id=$_POST['friends_id'];
		$time=date("g:i a");
		$mysqli->query("insert into friend_request (user_id,friend_id,request)values('$u_id','$profile_id','Yes')");
		$mysqli->query("insert into users_notice(user_id,friend_id,notice_txt,notice_time)values('$u_id','$profile_id','Sent You a Friend Request..!','$time')");
		
		
	}


?>



<?php }?>
<script>	
	$(document).ready(function(){
		$('.btn.btn-warning-for_addfriend').click(function(){
			var elementf=$('.friendsid');
			var friend_id=elementf.attr('id');
			$.ajax({
				url:'friend_request.php',
				data:{	requests:1,
				friends_id:friend_id
				},
				type:'POST',
				success:function (){
				alert(friend_id);
				}
			});
		});
	});

//delete request
	$(document).ready(function(){
		$('#cancel_request').click(function(){
		var elementdf=$('.friendsidd');
		var friend_idd=elementdf.attr('id');
			$.ajax({
				url:'friend_request.php',
				data:{	delete_request:1,
				del_friends_id:friend_idd
				},
				type:'POST',
				success:function (){
				alert('ok');
				}
			});

		});


	});



//delete request for secnd user
$(document).ready(function(){
	$('.cancel_requ').click(function(){

		$.ajax({

		url:'friend_request.php',
		data:{delete_requ:1},
		type:'POST',
		success:function (){

		alert('ok');
		}
		});

	});


});

//delete friend for  user
$(document).ready(function(){
	$('.btn.btn-primary-unfriend_1').click(function(){

		$.ajax({

		url:'friend_request.php',
		data:{delete_friend:1},
		type:'POST',
		success:function (){

		alert('ok');
		}
		});

	});


});





</script>					