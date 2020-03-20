<?php	
include("../../../connection/conect.php");

echo" 
	
	 	
	<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'/>
	<script src='../bootstrap/js/bootstrap.js'></script>
	<script src='../Profile/js_files/jquery.js'></script>
	<script src='../bootstrap/js/bootstrap.min.js'></script>

 ";
 
session_start();
if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];

		$row1=$mysqli->query("select * from users where Email='$user'");
		$fetch1=$row1->fetch_array();
		$u_id=$fetch1['user_id'];


if (isset($_COOKIE['Profile'])) {
			$profile=$_COOKIE['Profile'];	
Setcookie('profile_id',$profile);	}
	if (isset($_COOKIE['profile_id'])) 
				$profile_id=$_COOKIE['profile_id'];

			$row3=$mysqli->query("select * from  user_post where user_id='$profile_id' order by post_id desc");
				while($fetch3=$row3->fetch_array()){
					$user_p_id=$fetch3['user_id'];
					$post_id=$fetch3['post_id'];
					$pt_txt=$fetch3['post_txt'];
					$prity=$fetch3['priority'];
					$pt_time=$fetch3['post_time'];
					$pt_pic=$fetch3['post_pic'];
					$row1=$mysqli->query("select * from users where user_id='$user_p_id'");
				$fetch1=$row1->fetch_array();
					
					$id=$fetch1['user_id'];
					$name=$fetch1['Name'];
					$email=$fetch1['Email'];
					$gender=$fetch1['Gender'];
					//fcth 2nd for pic
				$row2=$mysqli->query("select * from  user_profile_pic where user_id='$user_p_id'");
				$fetch2=$row2->fetch_array();
					$image=$fetch2['image'];
					//fecth 2 for post	
				//fcth 2nd for pic
				echo"
				<style>
					.img-responsive{height:80px;}
				#delete_msj .popover-content{width:auto; text-decoration:none; }
				</style>
				
				";
				?>
	<table  style=" width:100%; height:auto; border-radius:4px;padding-top:5%; ">
		<tr>		
			<td style="border:solid lightgray 1px; padding-top:20px;">	
				<?php echo"<table  border='0' id='po_all'  width='100%' height='auto' style='  margin-top:10px; font-family:sans-serif; text-transform:capitalize;'>
									<tr>";?>
					<?php 
							if($gender=='Male' || $gender=='Female'){
							echo"<td width='18%' ' ><a href='../Profile/Profile.php?id=$user_p_id'><img src='../../../fb_user/$gender/$email/Profile/$image' class='img-responsive' width='100px'  style='border:inset 1px lightgray; border-radius:5px; box-shadow:0px 0px 25px black; ' /></a></td>";
							}
							echo"<td style='font-weight:bolder; color:gray; font-family:Algerian;'><a href='../Profile/Profile.php?id=$id' style='text-decoration:none; '>$name</a><br />$pt_time &nbsp<p style='' title='Public' class='glyphicon glyphicon-globe'></p></td>
								<td></td>
								<td id='delete_msj' align='center'>";?><?php if($user==$email){echo"<a href='#' title='' data-toggle='popover' data-placement='left'  data-trigger='hover' data-content='Want to Delete This...!'><p class='glyphicon glyphicon-trash' style='cursor:pointer;' id='$post_id'><p></a>";}

							echo"<td></td>";
							echo"</tr>";
							echo"</table>";		
						?>
						<?php
							echo"<table  id='po_all' width='100%'  style=' text-align:; border-bottom-style:;height:100px; margin-top:3px; font-family:sans-serif;'>
								<tr>";
								
							if($pt_pic !=""){
							//for male and female pic post
								if (strchr($pt_pic,'mp4')=='mp4'){echo"<td style='padding:20px;'>$pt_txt</td></tr><tr><td style='padding:20px;'>";?><?php  if($gender=='Male' || $gender=='Female'){echo"  <video src='../../../fb_user/$gender/$email/Post/$pt_pic'   controls id='vid' height='200px' width='100%' style=' z-index:1000; border:solid 1px lightgray; box-shadow:0px 0px 25px black;  '></video> </td> ";}}
								else{
									echo"<td style='padding:20px;'>$pt_txt</td></tr><tr><td style='padding:20px;'>";?><?php  if($gender=='Male' || $gender=='Female'){echo"<img src='../../../fb_user/$gender/$email/Post/$pt_pic'   height='200px' width='100%' style='border:inset 2px lightgray; padding:0px; box-shadow:0px 0px 25px black; ' /></td> ";}
								}
							}else{
								echo"<td></td><td style='padding:20px;'align='left'><p style='word-break: break-all; text-align:left;'>$pt_txt</p></td>";}
								echo"</tr></table>";
			
//end post query ?>

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
<td style='padding:;'width='50%'><?php echo"<input type='button'  Value='Unlike'  style='border-color:#337ab7; background:#edeff4; display:block; color:#337ab7; border-radius:2px; margin-left:0px; text-decoration:none; width:100%;'   class='btn btn-info-unlike' id='$post_id'>"?></td>
<td style='padding:;' width='50%'><a href="../Home/comment.php?tag&postid=<?php echo $post_id; ?>"><button  class='btn btn-primary' id='<?php echo $post_id; ?>' style='background:#edeff4; color:#337ab7; width:100%; float:right;  margin-right:0px;'>Comment(<?php echo $que_comt;?>)</button></a></td>
</tr>
<?php }else{?>		
<tr>
<td style='padding:;'width='50%' ><?php echo"<input type='button'  Value='Like'  style='background:#edeff4; display:block; border-color:#337ab7; color:#337ab7; margin-left:0px; width:100%;'  class='btn btn-info-like' id='$post_id'>"?></td>
<td style='padding:0px;' width='50%'><a href="../Home/comment.php?tag&postid=<?php echo $post_id; ?>"><button  class='btn btn-primary'  id='<?php echo $post_id; ?>' style='background:#edeff4; color:#337ab7;float:right; width:100%; margin-right:0px;'>Comment(<?php echo $que_comt;?>)</button></a></td>

</tr>

<?php }?>
	<!------------ popover msj --------------->
	<tr id="lk"  width="2%">	
		<?php
		if($que>0){
		?>

			<td style='padding:3px;'><a href="#" title="Like" data-toggle="popover" data-placement="top"  data-trigger="hover" data-content="
			<?php 				
			$pop_like=$mysqli->query("select * from user_post_status where post_id='$post_id'");
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

		?>" ><span class='badge'   style='font-size:1.0em; width:25%; background:#edeff4; color:#337ab7; text-align:left;'><img src='../image/like.png' />(<?php echo $que;  ?>)Like this.</span></a></td>
		<td> &nbsp </td>
		<?php }else{?>

		<td style='padding:3px;'> <span class='badge' style='font-size:1.0em; width:auto;  padding:5px; 	background:#edeff4; color:#337ab7; text-align:left;'><img src='../image/like.png' />(<?php echo $que;  ?>)You be the frist Like.</span> </td>			
		<td> &nbsp </td>
		<?php }
		//end pop over msj
		?>	
</tr>		
</table>	


<table style='width:100%;   font-size:13px; font-family:sans-serif;  word-break: break-all;'>	

<tr>
<td colspan=''>
<?php
$col="select * from user_post_comment where post_id='$post_id' order by comment_id desc";
$co=$mysqli->query($col);
if(mysqli_num_rows($co)>0){

$c_s=$co->fetch_array();
$comment_id=$c_s['comment_id'];
$comment_user_id=$c_s['user_id'];
$comment_p=$c_s['comment']; 

$row11=$mysqli->query("select * from users where user_id='$comment_user_id'");
$fetch11=$row11->fetch_array();

$name=$fetch11['Name'];
$emai=$fetch11['Email'];
$ge=$fetch11['Gender'];
//fcth 2nd for pic
$row22=$mysqli->query("select * from  user_profile_pic where user_id='$comment_user_id'");
$fetch22=$row22->fetch_array();
$imag=$fetch22['image'];


echo "<table rules='rows' style='  width:100%; border-radius:10px; border:solid 1px white;  font-size:13px; font-family:sans-serif;  word-break: break-all;'>		
<tr>
<td width='10%'>";
if($ge=='Male' || $ge=='Female'){echo"<img src='../../../fb_user/$ge/$emai/Profile/$imag' style='width:50%; border-radius:5px;'/></td>";}

echo"<td width='90%' style='padding:10px;'>$comment_p</td>";
echo"</tr></table>";

}


?> 
</td>
</tr>
</table>


</td>
</tr>							
</table>	
<?php
	}
?>
<!-------all jquery and ajax work------------>
<script>
$(document).ready(function(){
$('.btn.btn-info-like').click(function(){
var audio= new Audio('../sound/facebookpo_poRHYXCU.mp3');
var element= $(this);
var postid=element.attr('id');
$.ajax({
	
	url:'Profile.php',
	data:{	like:1,
			
			post_like:postid,
			
			},
	type:'POST',
	success:function (){
	audio.play();
		 Post();
	}
});

$(this).val('Unlike');
});

return false;
});

</script>
<!-----------------unlike----------------->
<script>
$(document).ready(function(){
$('.btn.btn-info-unlike').click(function(){
var audio= new Audio('../sound/facebookpo_poRHYXCU.mp3');
var element= $(this);
var postidunlike=element.attr('id');
$.ajax({
	
	url:'Profile.php',
	data:{	unlike:1,
			
			post_unlike:postidunlike,
			
			},
	type:'POST',
	success:function (){
	Post();
	audio.play();
		 
	}
});
$(this).val('Like');
});

return false;
});


//delete post user
$(function(){
	
	$(".glyphicon.glyphicon-trash").click(function() {
		var element=$(this);
		var delete_id=element.attr("id");
		$.ajax({
				
				url:'../Home/Home.php',
				type:'POST',
				data:{
					postdelete:1,
					delpostid:delete_id
				},
				
				success: function (){
					Post();
				}
				
			});
		$(this).parent().parent().parent().parent().parent().parent().parent().fadeOut(300,function (){
			$(this).remove();
		});
		  
		return false;
	});
		

	
	
});




</script>

<!---------------popup jquery----------------------------->
<script>
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover();


	});
	
</script>
<?php }?>