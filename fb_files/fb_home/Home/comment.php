<?php
include("../../../connection/conect.php");

session_start();
if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];

		if(isset($_GET['postid']))
		$postid=$_GET['postid'];
		//$_SESSION['postcomt']=$postid;
Setcookie('mycookie',$postid);			
		
$row1=$mysqli->query("select * from users where Email='$user'");
$fetch1=$row1->fetch_array();
$u_id=$fetch1['user_id'];
$name=$fetch1['Name'];
$email=$fetch1['Email'];
$gender=$fetch1['Gender'];

	$row_group=$mysqli->query("select * from  group_post where group_post_id='$postid'");
	$fetch_group=$row_group->fetch_array();
	$group_post_id=$fetch_group['group_post_id'];
	$group_id=$fetch_group['group_id'];
	$post_user_id=$fetch_group['post_user_id'];
	$group_post_text=$fetch_group['group_post_text'];
	$group_post_pic=$fetch_group['group_post_pic'];
	

	$row3=$mysqli->query("select * from  user_post where post_id='$postid'");
	$fetch3=$row3->fetch_array();
	$user_p_id=$fetch3['user_id'];
	$pt_txt=$fetch3['post_txt'];
	$post_id=$fetch3['post_id'];
	$pt_pic=$fetch3['post_pic'];


	$row2=$mysqli->query("select * from  user_profile_pic where user_id='$u_id'");
	$fetch2=$row2->fetch_array();
	$image=$fetch2['image'];
	
	$row1=$mysqli->query("select * from users where user_id='$user_p_id' || user_id='$post_user_id'");
	$fetch1=$row1->fetch_array();
	$name_post=$fetch1['Name'];
	$email_post=$fetch1['Email'];
	$gender_post=$fetch1['Gender'];
	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <title>Comment</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /> 
<link rel="stylesheet" type="" href="../bootstrap/css/bootstrap.css"/>

<script src="../popupjquery/ajax.js"></script>
<script src="../Profile/js_files/jquery.js"></script>
<script src="../popupjquery/maxcdn.bootstrapcdn.js"></script>	

</head>
<style>
body{
	padding:0px;
	margin:0px;
	 background-image:url(../image/Crunchify.png);
}

#main_cmt{ width:40%; background:white; height:auto; top:;left:20%; position:absolute; border:solid 1px gray;}
#main_c{display:; position:;left:;  box-shadow:0px 0px 25px balck; width:100%; height:auto;  background:#e5e8f1; opacity:0.9;}

.popover-content{text-transform:capitalize;background:black;color:white;border-radius:5px;word-warp:break-word;display:block;width:120px; font-family:Lucida Calligraphy;}
.popover-title{background:white;color:black;border-radius:5px;font-weight:bolder; font-family:Algerian;}					

.load{
	font-family:serif;
	font-size:20px;
	font-style:italic;
	
}
/* mobile size*/
@media (max-width:1024px) {
	#main_cmt{width:100%; position:absolute; background:white; top:18%; left:0px; border:solid 1px gray; height:auto;}	
	#main_c{width:100%; position:; left:0px; height:auto;}	
	.pic{width:20%;}
	
}
</style>
<body>
<?php include("Background.php");?>
<div id="main_cmt">
<div id="main_c" style=''  >
		<?php if($group_post_id !=''){?>
		<div   style=' width:100%; float:left; height:auto; background:black;'>
		<?php
		echo"<table  id='po_all' width='100%'  style=' text-align:; border-bottom-style:;height:100px; margin-top:3px; font-family:sans-serif;'>
		<tr>";

		if($group_post_pic !=""){
			//for male and female pic post
			if(strchr($group_post_pic,'mp4')=='mp4'){echo"<td style='padding:20px;'>$group_post_text</td></tr><tr><td style='padding:20px;'>";?><?php  if($gender_post=='Male' || $gender_post=='Female'){echo"  <video src='../../../fb_user/$gender_post/$email_post/Post/$group_post_pic'   controls id='vid' height='200px' width='100%' style=' z-index:1000; border:solid 1px lightgray; box-shadow:0px 0px 25px black;  '></video> </td> ";}}
			elseif(strchr($group_post_text,'added a Cover photo..')=='added a Cover photo..'){echo"<td style='padding:20px; color:white;'>$group_post_text</td></tr><tr><td style='padding:20px;'>";?><?php  if($gender_post=='Male' || $gender_post=='Female'){echo"<img src='../../../fb_user/$gender_post/$email_post/Cover/$group_post_pic'   height='200px' width='100%' style='border:inset 2px lightgray; padding:10px; box-shadow:0px 0px 25px black; ' /></td> ";}}
			else{echo"<td style='padding:20px;'>$group_post_text</td></tr><tr><td style='padding:20px;'>";?><?php  if($gender_post=='Male' || $gender_post=='Female'){echo"<img src='../../../fb_user/$gender_post/$email_post/Post/$group_post_pic'   height='200px' width='100%' style='border:inset 2px lightgray; padding:10px; box-shadow:0px 0px 25px black; ' /></td> ";}}
		}else{echo"<td></td><td style='padding:20px;'align='left'><p style='word-break: break-all; text-align:left; color:white;'>$group_post_text</p></td>";}
		echo"</tr></table>";

		//end post query ?>
		</div>
		<?php }else{?>
		<!----------------------------->
		<div  style=' width:100%; float:left; height:auto; background:black;'>
		<?php
		echo"<table  id='po_all' width='100%'  style=' text-align:; border-bottom-style:;height:100px; color:white;	 margin-top:3px; font-family:sans-serif;'>
		<tr>";
		if($pt_pic !=""){
			if(strchr($pt_pic,'mp4')=='mp4'){echo"<td style='padding:20px;'>$pt_txt</td></tr><tr><td style='padding:20px;' align='center'>";?><?php  if($gender_post=='Male' || $gender_post=='Female'){echo"  <video src='../../../fb_user/$gender_post/$email_post/Post/$pt_pic'   controls id='vid' height='200px' width='auto' style=' z-index:1000; border:solid 1px lightgray; box-shadow:0px 0px 25px black;  '></video> </td> ";}}
			elseif(strchr($pt_txt,'added a Cover photo..')=='added a Cover photo..'){echo"<td style='padding:20px; color:white;'>$pt_txt</td></tr><tr><td style='padding:20px;'>";?><?php  if($gender_post=='Male' || $gender_post=='Female'){echo"<img src='../../../fb_user/$gender_post/$email_post/Cover/$pt_pic'   height='200px' width='100%' style='border:inset 2px lightgray; padding:10px; box-shadow:0px 0px 25px black; ' /></td> ";}}
			else{echo"<td style='padding:20px;'>$pt_txt</td></tr><tr><td style='padding:20px;'>";?><?php  if($gender_post=='Male' || $gender_post=='Female'){echo" <img src='../../../fb_user/$gender_post/$email_post/Post/$pt_pic'   height='200px' width='100%' style='border:inset 1px lightgray; padding:5px; box-shadow:0px 0px 25px black; ' /></td> ";}}
		}else{echo"<td></td><td align='left'><p style='word-break: break-all; padding:20px;text-align:left;'>$pt_txt</p></td>";}
		echo"</tr></table>";

		//end post query ?>
		</div>
		<?php }?>
	
	<div  class='' style=' width:100%; height:auto; float:left; background:white;'>
		<table   class='like_lod'  rules='rows'  style='font-family:serif; width:100%; border-bottom-style:solid; border-color:white; border-width:thin; padding:5px; font-size:15px; '>
			<?php
			//comment count query
			$statu_comt=$mysqli->query("select * from user_post_comment where  post_id='$post_id'");
			$que_comt=mysqli_num_rows($statu_comt);
			//start like query	
			$statu=$mysqli->query("select * from user_post_status where post_id='$post_id' and user_id='$u_id'");
			$statu_like=$mysqli->query("select * from user_post_status where  post_id='$post_id'");
			$que=mysqli_num_rows($statu_like);
			$f_s=$statu->fetch_array();
			$stat=$f_s['status']; 
			if($stat =='Like' ){
			?>
			<tr >
			<td style='  width:50%;'><?php echo"<input type='button'  Value='Unlike'  style='border-color:#337ab7; background:#edeff4;display:block; color:#337ab7;border-radius:2px; margin-left:0px; text-decoration:none; width:100%;'   class='btn btn-info-home-unlike' id='$post_id'>"?></td>
			<td style=' width:50%;'><a href="comment.php?tag&postid=<?php echo $post_id; ?>"><button  class='btn btn-primary' id='<?php echo $post_id; ?>' style='background:#edeff4; color:#337ab7; width:100%; float:right;  margin-right:0px;'>Comment(<?php echo $que_comt;?>)</button></a></td>
			</tr>
			<?php }else{?>		
			<tr>
			<td style='  width:50%;' ><?php echo"<input type='button'  Value='Like'  style='background:#edeff4; display:block; border-color:#337ab7; color:#337ab7; margin-left:0px; width:100%;'  class='btn btn-info-home-like' id='$post_id'>"?></td>
			<td style=' width:50%;'><a href="comment.php?tag&postid=<?php echo $post_id; ?>"><button  class='btn btn-primary'  id='<?php echo $post_id; ?>' style='background:#edeff4; color:#337ab7;float:right; width:100%; margin-right:0px;'>Comment(<?php echo $que_comt;?>)</button></a></td>

			</tr>
			<?php }?>
		</table>
		
		<table style='background:#edeff4; width:100%; '>
			<tr id="lk"  width="2%">	
			<?php
			$statu_like=$mysqli->query("select * from user_post_status where  post_id='$post_id' || post_id='$group_post_id'");
			$que=mysqli_num_rows($statu_like);
			if($que>0){
			?>

				<td style='padding:4px;'><a href="#" title="Like" data-toggle="popover" data-placement="bottom"  data-trigger="hover" data-content="
				<?php 				
				$pop_like=$mysqli->query("select * from user_post_status where post_id='$postid'");
				while($pop=$pop_like->fetch_array()){	
				$u_ll_id=$pop['user_id'];
				$p_stat=$pop['status'];
				if($p_stat=='Like'){
				$fetch1=$mysqli->query("select * from users where user_id='$u_ll_id'");
				$row1=$fetch1->fetch_array();
				$u_like_id=$row1['user_id'];
				$p_name=$row1['Name'];
				echo $p_name." ";
				}

				}

			?>" ><span class='badge' style='font-size:1.0em; width:auto; background:#edeff4;font-family:serif; color:#3b5998; text-align:left;'><img src='../image/like.PNG' />(<?php echo @$que;  ?>)Like this.</span></a></td>
			<td> &nbsp </td>
			<?php }else{?>

			<td style='padding:4px;'> <span class='badge' style='font-size:1.0em; width:auto; font-family:serif; padding:5px; background:#edeff4; color:#3b5998; text-align:left;'><img src='../image/like.PNG' />(<?php echo @$que;  ?>)You be the frist Like.</span> </td>			
			<td> &nbsp </td>
			<?php }
			//end pop over msj
			?>	
			</tr>		
		</table>
		
		
		
		
<!---------------------------->
		<table class=''  style='width:100%; '>
		<tr>
			<td width='10%' align=''><img src='<?php echo"../../../fb_user/$gender/$email/Profile/$image";?>' style='width:100%; float:; height:35px; box-shadow:0px 0px 25px black; border-radius:3px; ' title='<?php echo $name;?>'/></td>
			<td width='90%'><input type='text'  id='c' placeholder='Write a Comment....' style='width:100%; padding-left:10px; height:35px; border-radius:5px;' /></td>
			<!--<td><input type='submit' class='btn btn-primary' value='Comment' name='Comment' style='background:white; color:blue;' /></td>-->
			<td><input type='hidden' class='postid_comt' id='<?php echo $postid;?>' /></td>
		</tr>
		</table>
			
	</div>
<div id='flash'  class='' style='width:100%; border-bottom-style:solid; border-bottom-width:thin;display:none; height:50px; float:left; color:lightgray; background:;'></div>

<div id='show_comment'  class='' style='width:100%;  height:auto; overflow:; float:left; background:transparent;'>

<?php
//post for comment
if (isset($_POST['comment']))
{
	//$c_u_id=intval($_POST['c_id']);
	$c_p_id=intval($_POST['post_comment_id_sub']);
	$commt=$_POST['comment_msj'];
	$time= Date("g:i a");
	if($commt !=''){
	
	$upd=$mysqli->query("insert into user_post_comment(post_id,user_id,comment,time) values('$c_p_id','$u_id','$commt','$time')").$mysqli->error;
		
		$row3=$mysqli->query("select * from  user_post where post_id='$c_p_id'");
		$fetch3=$row3->fetch_array();
		$friend_id_notification=$fetch3['user_id'];
		$mysqli->query("insert into  users_notice (user_id,friend_id,post_id,notice_txt,notice_time) values('$u_id','$friend_id_notification','$c_p_id','Commented on Your Post <br> $commt','$time')");

	}
}		


//Delete for comment		
if(isset($_POST['save'])){
	$comnt_d=$_POST['a'];
		$upd=$mysqli->query("delete from user_post_comment where comment_id='$comnt_d'").$mysqli->error;
	
}

	
	
	

?>
</div>

</div>
</div>

</body>

</html>

<script>
function get_message(){
		$.ajax({
				url:'commentquery.php',
				type:'GET',
				success: function (data){
				
				$('#show_comment').html(data);
				
				}
			});
}


$('#c').keypress(function(event){
	var coment= $('#c').val();
	var post_coment= $('.postid_comt');
	var post_comment_id=post_coment.attr('id');
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		//alert('You pressed a "enter" key in textbox');
		if(coment=='')
		{
		alert("Enter some text..");
		$("#c").focus();
		}
		else
		{
		$("#flash").show();
		$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
		$.ajax({
			
			url:'comment.php',
			data:{	comment:1,
					comment_msj:coment,
					post_comment_id_sub:post_comment_id
					
					},
			type:'POST',
			cache: true,
			success:function(html){
			//$('#show_comment').after(html);
			$('#c').val("");
			$("#flash").fadeOut('slow');
			$("#c").focus();
			get_message();
			}
			
		});
		}
	}

	event.stopPropagation();
});



/*$(document).ready(function(){
	
$('.btn.btn-primary').click(function(){
var coment= $('#c').val();
var post_coment= $('.postid_comt');
var post_comment_id=post_coment.attr('id');
//alert(post_comment_id);

	
});
});
*/	

//for refresh
get_message();
setInterval("get_message()",5000);
</script>
<!---------------popup jquery----------------------------->
<script>
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover();


	});

</script>
<script>
$(document).ready(function(){
$('.btn.btn-info-home-like').click(function(){
var element= $(this);
var postid=element.attr('id');

var audio= new Audio('../sound/facebookpo_poRHYXCU.mp3');


$.ajax({
	
	url:'../Home/Home.php',
	data:{	like:1,
			
			post_like:postid,
		
			},
	type:'POST',
	success:function (){
			audio.play();
		get_message();
	}
});

//$(this).val('Unlike');	

});
return false;
});

</script>
<!-----------------unlike----------------->
<script>
$(document).ready(function(){
$('.btn.btn-info-home-unlike').click(function(){
var audio= new Audio('../sound//facebookpo_poRHYXCU.mp3');
var element= $(this);
var postidunlike=element.attr('id');
$.ajax({
	
	url:'../Home/Home.php',
	data:{	unlike:1,
			
			post_unlike:postidunlike,
			
			},
	type:'POST',
	success:function (){
		audio.play();
		get_message();
		 
	}
});
//$(this).val('Like');
});

return false;
});



</script>
<?php }?>

