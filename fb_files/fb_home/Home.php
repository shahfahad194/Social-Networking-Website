<?php   	

include("../../connection/conect.php");
include("../../logout.php");

//error_reporting(0);
?>

<?php
session_start();
if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];

		$row1=$mysqli->query("select * from users where Email='$user'");
		$fetch1=$row1->fetch_array();
		$u_id=$fetch1['user_id'];
			$name=$fetch1['Name'];
			$em=$fetch1['Email'];
			$gen=$fetch1['Gender'];
			$friend=$fetch1['friend'];
			$valus=(explode(',',$friend));
			
			//fcth 2nd for pic
		$row2=$mysqli->query("select * from  user_profile_pic where user_id='$u_id'");
		$fetch2=$row2->fetch_array();
			$im=$fetch2['image'];
			//fecth 2 for post	
		//fcth 2nd for pic
		/*$row3=$mysqli->query("select * from  user_post where user_id='$user_id'");
		$fetch3=$row3->fetch_array();
			$post_txt=$fetch3['post_txt'];
			$prity=$fetch3['priority'];
			$post_time=$fetch3['post_time'];
			$post_pic=$fetch3['post_pic'];
		*/
			
?>
<?php
//for like
	if(isset($_POST['like'])){	
	$post_like=intval($_POST['post_like']);
	//$u_like=intval($_GET['u_like']);
	$mysqli->query("insert into  user_post_status (user_id,post_id,status) values('$u_id','$post_like','Like')");
	}
//for unlike

	if(isset($_POST['unlike'])){	
	$post_unlike=intval($_POST['post_unlike']);
	$mysqli->query("delete from user_post_status where user_id='$u_id'and post_id='$post_unlike'");
	}
//for liking end 
		
//comment
	if (isset($_POST['comment'])){
	//$c_u_id=intval($_POST['c_id']);
	$c_p_id=intval($_POST['post_comment_id_sub']);
	$commt=$_POST['comment_msj'];
	if($commt !=''){
	
	$upd=$mysqli->query("insert into user_post_comment(post_id,user_id,comment) values('$c_p_id','$u_id','$commt')").$mysqli->error;
		}
	
	}
//end comment query
?>

<?php 

//for srching and adding the post


	if(isset($_POST['p1'])){
		$txt=$_POST['txt'];
		$pic=$_FILES['file']['name'];
		$tmp_name=$_FILES['file']['tmp_name'];
		$time=date("g:i a");			
			if($pic!=""){
					if($txt==''){
					move_uploaded_file($tmp_name,"../../fb_user/$gen/$em/Post/$pic");
					$pst1=$mysqli->query("insert into user_post (user_id,post_pic,post_time,post_txt)values('$u_id','$pic','$time','added a new photo..')");
					$mysqli->query("insert into  users_notice(user_id,notice_time,notice_txt)values('$u_id','$time','added a new photo..')");
					
					}else{
						move_uploaded_file($tmp_name,"../../fb_user/$gen/$em/Post/$pic");
					$pst1=$mysqli->query("insert into user_post (user_id,post_pic,post_time,post_txt)values('$u_id','$pic','$time','$txt')");
					$mysqli->query("insert into  users_notice(user_id,notice_time,notice_txt)values('$u_id','$time','$txt')");
					
					}
				}
			else{
					if($txt ==""){ }
					else{
						$row11=$mysqli->query("select * from users where Email='$user'");
						$fetch11=$row11->fetch_array();
						$u_idd=$fetch11['user_id'];
						$friend=$fetch11['friend'];
						$valus_re_f=(explode(',',$friend));

						$index2 = array_search($u_idd, $valus_re_f);
							if ( $index2 !== false ) {
							unset( $valus_re_f[$index2] );
							//$array2=array($valus_re_f);

							$ar=implode(',',$valus_re_f);
							$mysqli->query("insert into  users_notice(user_id,notice_time,notice_txt,friend_id)values('$u_id','$time','$txt','$ar')");

						}
						$pst1=$mysqli->query("insert into user_post(user_id,post_txt,post_time)values('$u_id','$txt','$time')");

					}
				}
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>Home</title>
	<meta name="google-site-verification" content="h2HBLaPnCRo7_VBdbo4XqRB8hndJQIB4xdFqyWHYdJI" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="" href="css/Home.css"/>

	<script src="bootstrap/js/bootstrap.js"></script>
<script src="Profile/js_files/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
	<!--google aadss-->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({
	google_ad_client: "ca-pub-2589843701748129",
	enable_page_level_ads: true
	});
	</script>
	<!--google aadss-->	
 
</head>
<style>#upload_mobile{display:none; }</style>
<body>
<?php   	
	include("Background.php");
?>
	<div id="center"> 
			
<div id="upload"  style="width:80%; height:auto; float:left;margin-left:10px; box-shadow:0px 0px 25px black;  border:solid 3px lightgray; background:; text-align:; position:absolute;">
			<!-------for Dekstop srch---------->
			<form method="POST" enctype="multipart/form-data">
				<table border="0"   style="width:100%;" >
					<tr>
						<td width='30px' ><img src='image/newsfeed.png' style="float:right"width='15px' ></td>
						<td style="font-size:13px;padding-left:5px;">Upload Status</td>
						<td><img src='image/my_videos.png'  width='20px'></td>
						<td style="font-size:13px;">Upload Photos</td>
					</tr>
					<tr>
						<td colspan="4" align="center"><textarea  name="txt" rows="8" cols="64" placeholder="What's on your mind...."style="margin:0px 0px 0px 0px; width:100%; "></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><input type="file" name="file"></td>
						<td colspan="2"><input type="submit" name="p1" Value="POST" class='btn btn-primary' style=" background:white; display:block; float:right; color:#3B5998; height:30px; border-radius:3px; font-weight:bolder;font-family:serif;"></td>
					</tr>
				</table>
			</form>	
		</div>
	
		<!-------for fetch upload mobile ---------->
		
		<div id='upload_mobile'  style='box-shadow:0px 0px 25px black; height:auto; border:solid 1px lightgray; background:;  text-align:; '>
			<!-------for srch---------->
			<form method='POST' enctype='multipart/form-data'>
				<table border='0'   style='width:100%;' >
					<tr>
						<td width='30px' ><img src='image/newsfeed.png' style='float:right'width='15px' ></td>
						<td style='font-size:13px;padding-left:7px;'>Upload Status</td>
						<td><img src='image/my_videos.png'  width='20px'></td>
						<td style='font-size:13px;'>Upload Photos</td>
					</tr>
					<tr>
						<td colspan='4' align='center'><textarea  name='txt' rows='6' cols='60' placeholder='Whats on your mind....' style='margin:0px 0px 0px 0px; width:100%; '></textarea></td>
					</tr>
					<tr>
						<td colspan='2'><input type='file' name='file' style='width:auto; font-size:10px; height:auto;'></td>
						<td colspan='2'><input type='submit' name='p1' Value='POST' class='btn btn-primary' style=' background:white; float:right; color:#3B5998; height:auto;border-radius:3px; font-weight:bolder;font-family:serif;'></td>
					</tr>
				</table>
			</form>	
		</div>
			
				
		<!-------for fetch all member post ---------->

		<div id="comment_area">
			<div id="post">	</div>
		</div>			
		<!--end post query -->			
							
				
	</div>
<?php 

}else{
	
	header("location:../../index.php");
	
} ?>

</body>
</html>
<script>
var intervalId;
function get_Post(){

		$.ajax({

			url:'Post.php',
			type:'GET',
			success: function (data){
				$('#post').html(data).fade("slow");
			
			}

		});

	}
	//intervalId=setInterval("get_Post()",3000);
	get_Post();
	
	
	

</script>