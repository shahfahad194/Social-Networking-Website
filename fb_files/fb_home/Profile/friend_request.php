<?php //Friends request work 
include("../../../connection/conect.php");
echo" 
	 <script src='../popupjquery/ajax.js'></script>
	 <script src='../Profile/js_files/jquery.js'></script>
	 <script src='../popupjquery/maxcdn.bootstrapcdn.js'></script>

 ";
session_start();		
if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];

		$row1=$mysqli->query("select * from users where Email='$user'");
		$fetch1=$row1->fetch_array();
		$u_id=$fetch1['user_id'];
		$email_fbs=$fetch1['Email'];
		$name_user=$fetch1['Name'];
		//$friend=$fetch1['friend'];
		//$valus=(explode(',',$friend));
		
if (isset($_COOKIE['Profile'])) {
$profile=$_COOKIE['Profile'];	
Setcookie('profile_id',$profile);}	
if (isset($_COOKIE['profile_id'])) 
 $profile_id=$_COOKIE['profile_id'];

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
			//if(in_array($friend_id_ch,$valus)){
				echo "<td><span class='btn btn-primary'>friend</span>&nbsp<button class='btn btn-primary-unfriend_1'>Unfriend</button> </td>";
			//}
		}
		//for user u_id
		elseif($user_id_check==$u_id && $friend_id_check==$profile_id && $request=='Yes' && $accept=='Yes'){
			//if(in_array($friend_id_check,$valus)){
				echo "<td><span class='btn btn-primary'>friend</span>&nbsp<button class='btn btn-primary-unfriend_1'>Unfriend</button></td> ";
			//}
		}
		//for friend profile_id
		elseif($user_id_ch==$profile_id && $friend_id_ch==$u_id && $reque=='Yes' && $acce==''){
			echo"<td><button class='btn btn-for_acept' id='acept_request' style='background:#f44336; color:white;'>Confirm</button>";
			echo"<td><button class='btn btn-for_cancelrequest' id='cancel_request' style='background:#f44336; color:white;'>Cancel Request</button><input type='hidden' class='friendsidd' id='$profile_id'/></td>";
		}
		//for user u_id
		elseif($user_id_check==$u_id && $friend_id_check==$profile_id && $request=='Yes' && $accept==''){
			echo"<td><button class='btn btn-for_sent' style='background:#8bc34a; color:white;' >Request Sent</button> &nbsp <button class='btn btn-for_cancelrequest'  id='cancel_request' style='background:#f44336; color:white;'>Cancel Request</button><input type='hidden' class='friendsidd' id='$profile_id'/></td>";
		}
		else{
		if ($user != $email_fbs){?>
		<td><button style="background:#337ab7; color:white;" class='btn btn-warning-for_addfriend'>Add Friend </button><input type='hidden' class='friendsid' id='<?php echo $u_id;?>'/></td>
<?php }
		}

	//request sent
	if(isset($_POST['requests'])){
		$friends_id=$_POST['friends_id'];
		$time=date("g:i a");
		$mysqli->query("insert into friend_request (user_id,friend_id,request)values('$u_id','$profile_id','Yes')");
		$mysqli->query("insert into users_notice(user_id,friend_id,notice_txt,notice_time)values('$u_id','$profile_id','Sent You a Friend Request..!','$time')");
		
		
	}
	//acept_request
	if(isset($_POST['requests_acpt'])){
		$friends_idacpt=$_POST['friends_idacpt'];
		$time=date("g:i a");
		$mysqli->query("update friend_request set accept='Yes' where user_id='$profile_id'");
		$mysqli->query("insert into friends (user_id,user_friend_id,status)values('$u_id','$profile_id','Friend')");
		$mysqli->query("insert into friends (user_id,user_friend_id,status)values('$profile_id','$u_id','Friend')");
		$mysqli->query("insert into users_notice(user_id,friend_id,notice_txt,notice_time)values('$u_id','$profile_id','Accept Your Friend Request..!','$time')");
		
		
	}
	//////////////////////////	
	if(isset($_POST['delete_request'])){
		$del_friends_id=$_POST['del_friends_id'];
		$mysqli->query("Delete from friend_request where user_id='$u_id' && friend_id='$profile_id'");
		$mysqli->query("Delete from friend_request where user_id='$profile_id' && friend_id='$u_id'");
		$mysqli->query("Delete from users_notice where user_id='$u_id' && friend_id='$profile_id'");
		$mysqli->query("Delete from users_notice where user_id='$profile_id' && friend_id='$u_id'");
		
		
	}
	////////////////////
	if(isset($_POST['delete_requ'])){
		
		$mysqli->query("Delete from friend_request where user_id='$profile_id' && friend_id='$u_id'");
		$mysqli->query("Delete from users_notice where user_id='$profile_id' && friend_id='$u_id'");
		$mysqli->query("Delete from users_notice where user_id='$u_id' && friend_id='$profile_id'");

	}
	
	//for delte friend
	if(isset($_POST['delete_friend'])){
		
		
		$mysqli->query("Delete from friends where user_id='$u_id' && user_friend_id='$profile_id'");
		$mysqli->query("Delete from friend_request where user_id='$u_id' && friend_id='$profile_id'");
		$mysqli->query("Delete from users_notice where user_id='$u_id' && friend_id='$profile_id'");
		$mysqli->query("Delete from users_notice where user_id='$profile_id' && friend_id='$u_id'");

		$mysqli->query("Delete from friends where user_id='$profile_id' && user_friend_id='$u_id'");
		$mysqli->query("Delete from friend_request where user_id='$profile_id' && friend_id='$u_id'");
		$mysqli->query("Delete from users_notice where user_id='$profile_id' && friend_id='$u_id'");
		$mysqli->query("Delete from users_notice where user_id='$u_id' && friend_id='$profile_id'");		
		
	}

		//end friens request work
}
?>




<script>	
//sent request
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
				friend();
				}
			});
		});
	});
	//acept request
$(document).ready(function(){
	$('.btn.btn-for_acept').click(function(){
		var elementaf=$('.friendsid');
		var friend_ida=elementaf.attr('id');
		$.ajax({
			url:'friend_request.php',
			data:{	requests_acpt:1,
			friends_idacpt:friend_ida
			},
			type:'POST',
			success:function (){
			alert("acept");
			friend();
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
				friend();
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
		friend();
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
		friend();
		alert('ok');
		}
		});

	});


});





</script>									





