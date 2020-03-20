<?php
include("../../connection/conect.php");

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


$row3=$mysqli->query("select * from  user_post where post_id='$postid'");
$fetch3=$row3->fetch_array();
$user_p_id=$fetch3['user_id'];
$pt_txt=$fetch3['post_txt'];
$post_id=$fetch3['post_id'];
$pt_pic=$fetch3['post_pic'];
$row2=$mysqli->query("select * from  user_profile_pic where user_id='$u_id'");
$fetch2=$row2->fetch_array();
$image=$fetch2['image'];
$row1=$mysqli->query("select * from users where user_id='$user_p_id'");
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
<link rel="stylesheet" type="" href="bootstrap/css/bootstrap.css"/>

<script src="popupjquery/ajax.js"></script>
<script src="Profile/js_files/jquery.js"></script>
<script src="popupjquery/maxcdn.bootstrapcdn.js"></script>	
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
<style>
body{
	padding:0px;
	margin:0px;
}

#main_cmt{ width:40%; background:white; height:auto; top:7%;left:20%; position:absolute; border:solid 1px gray;}
#main_c{display:; position:;left:;  box-shadow:0px 0px 25px balck; width:100%; height:auto;  background:#e5e8f1; opacity:0.9;}
.popover-content {

	background:black;
	color:white;
	border-radius:5px;
	word-warp:break-word;
	display:block;  
	width:100px;
	 
}
.popover-title{

	background:;
	color:black;
	border-radius:5px;
	font-weight:;   
	
	
}
.load{
	font-family:serif;
	font-size:20px;
	font-style:italic;
	
}
/* mobile size*/
@media (max-width:1024px) {
	#main_cmt{width:100%; position:absolute; background:white; left:0px; border:solid 1px gray; height:auto;}	
	#main_c{width:100%; position:; left:0px; height:auto;}	
	.pic{width:20%;}
	
}
</style>
<body>
<?php include("Background.php");?>
<div id="main_cmt">
<div id="main_c" style=''  >
		<?php if($pt_pic ==''){?>
		<div  style='width:100%; float:left; height:auto; background:black;'><p style='width:100%; color:white; font-size:25px; font-family:sans-serif;  word-break:break-all; text-shadow:0px 0px 25px white; height:50%; margin:0px 0px 0px 0px;  border-radius:10px;  padding-left:10px;'><?php echo $pt_txt;?></p></div>
		<?php }else{?>
		<div   style=' width:100%; float:left; height:200px; background:black;'><img src='<?php echo"../../fb_user/$gender_post/$email_post/Post/$pt_pic";?>' style='width:100%; height:200px; margin:0px 0px 0px 0px;  border-radius:10px; box-shadow:0px 0px 25px white; border:solid 1px white; padding:20px;'/></div>
		<?php } ?>
		
	<div  class='' style=' width:100%; height:auto; float:left; background:white;'>
		<table style='background:#edeff4; width:100%; '>
			<tr id="lk"  width="2%">	
			<?php
			$statu_like=$mysqli->query("select * from user_post_status where  post_id='$post_id'");
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

			?>" ><span class='badge' style='font-size:1.0em; width:auto; background:#edeff4; color:#3b5998; text-align:left;'><img src='image/like.png' />(<?php echo @$que;  ?>)Like this.</span></a></td>
			<td> &nbsp </td>
			<?php }else{?>

			<td style='padding:4px;'> <span class='badge' style='font-size:1.0em; width:auto;  padding:5px; background:#edeff4; color:#3b5998; text-align:left;'><img src='image/like.png' />(<?php echo @$que;  ?>)You be the frist Like.</span> </td>			
			<td> &nbsp </td>
			<?php }
			//end pop over msj
			?>	
			</tr>		
		</table>

		<table class=''  style='width:100%;'>
		<tr>
			<td width='10%' align=''><img src='<?php echo"../../fb_user/$gender/$email/Profile/$image";?>' style='width:100%; float:; height:35px; box-shadow:0px 0px 25px black; border-radius:3px; ' title='<?php echo $name;?>'/></td>
			<td width='90%'><input type='text'  id='c' placeholder='Write a Comment....' style='width:100%; height:35px; border-radius:5px;' /></td>
			<!--<td><input type='submit' class='btn btn-primary' value='Comment' name='Comment' style='background:white; color:blue;' /></td>-->
			<td><input type='hidden' class='postid_comt' id='<?php echo $postid;?>' /></td>
		</tr>
		</table>
			
	</div>
<div id='flash'  class='' style='width:100%; border-bottom-style:solid; border-bottom-width:thin;display:none; height:50px; float:left; color:lightgray; background:;'></div>

<div id='show_comment'  class='' style='width:100%; height:auto; overflow:; float:left; background:;'>

<?php
//post for comment
if (isset($_POST['comment']))
{
	//$c_u_id=intval($_POST['c_id']);
	$c_p_id=intval($_POST['post_comment_id_sub']);
	$commt=$_POST['comment_msj'];
	if($commt !=''){
	
	$upd=$mysqli->query("insert into user_post_comment(post_id,user_id,comment) values('$c_p_id','$u_id','$commt')").$mysqli->error;
	
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
				
				$('#show_comment').html(data).fadeIn();
				
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
<?php }?>

