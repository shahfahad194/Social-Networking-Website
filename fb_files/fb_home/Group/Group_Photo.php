<?php 
include("../../../connection/conect.php");
echo" 
	<link rel='stylesheet' type='text/css' href='../css/Home.css'/>
	<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'/>
	<script src='../bootstrap/js/bootstrap.js'></script>
	<script src='../Profile/js_files/jquery.js'></script>
	<script src='../bootstrap/js/bootstrap.min.js'></script>
 ";
session_start();
if(isset($_SESSION['fbuser'])){
	$user=$_SESSION['fbuser'];
	echo"
	<style>
	#cover_singl{
		width:45%; height:320px; background:;  cursor:pointer; margin:20px; float:left;

	}
	#post_singl{
		width:45%; height:320px; background:;  cursor:pointer; margin:20px; float:left;

	}
	@media (max-width:1024px) {
		#heading{
			width:100%;
			height:100px;
			margin:auto;
			float:left;
		}
		#cover_all{
			width:100%;
			height:auto;
			margin:auto;
			float:left;
		}
		#cover_singl{
			width:100%;
			height:auto;
			margin:auto;
			float:left;
		}
		#cover_singl pre,p{
			width:100%;
			height:auto;
			margin:auto;
			float:left;
		}
		
		#rt_cover{
			width:100%;
			height:auto;
			margin:auto;
			float:left;
		}
		#post_singl{
		width:100%;
			height:auto;
			margin:auto;
			float:left;
		}
	
	}
	
	</style>";
	if (isset($_COOKIE['group_id'])) 
			$group=$_COOKIE['group_id'];	
	echo"<div id='heading' style='width:100%; display:; height:100px; border-radius:10px; background:transparent; margin-top:10px; border:1px white groove; float:left;'><p style='color:gray; font-family:algerian; padding:20px 0px 0px 30px; font-size:3.0em; text-align:;'>Photos</p></span></div>
		<div id='cover_all' style='width:100%; display:none; height:auto; background:; float:left;'>";
	echo"<div id='rt_cover'style='width:100%; padding:20px;'><img src='../Profile/image/previous.gif' style='cursor:pointer;' /></div>";

	$row38=$mysqli->query("select * from  group_post where group_id='$group' && group_post_text ='added a Cover photo..'");
	while($fetch38=$row38->fetch_array()){
			$group_post_id=$fetch38['group_post_id'];
			$group_id=$fetch38['group_id'];
			$post_user_id=$fetch38['post_user_id'];
			$group_post_text=$fetch38['group_post_text'];
			$group_post_pic=$fetch38['group_post_pic'];
		
		$row_group=$mysqli->query("select * from groups where  group_id='$group'");
			$fetch_group=$row_group->fetch_array();
				$g_user_id=$fetch_group['user_id'];
				$g_name=$fetch_group['group_name'];
		
		$row1=$mysqli->query("select * from users where user_id='$g_user_id'");
			$fetch1=$row1->fetch_array();
				//$id=$fetch1['user_id'];
				$name=$fetch1['Name'];
				$email_posting=$fetch1['Email'];
				$gender_posting=$fetch1['Gender'];
	?>
	
		<?php //cover all
		if($group_post_pic !="")
		{
		echo"<a href='../Home/comment.php?tag&postid=$group_post_id'><img src='../../../fb_user/$gender_posting/$email_posting/$g_name/Cover/$group_post_pic'  width='45%' style='height:200px; border-radius:4px; padding:15px; border:1px groove white ; margin:10px; float:left;' /></a>";
		}else{echo"<p style='color:lightgray; font-family:algerian; font-size:3.0em; padding-top:80px;text-align:center;'><span class='glyphicon glyphicon-picture' style='color:lightgray; font-size:2.3em;'></span></p>";}
		?>
	
<?php }	?>
	</div>
	<?php echo"<div id='cover_singl' style=''>";?>
		<?php //cover single
		if($group_post_pic !="")
		{
			echo"<img src='../../../fb_user/$gender_posting/$email_posting/$g_name/Cover/$group_post_pic'    width='100%' style='height:250px; padding:10px; border:1px white groove; border-radius:5px;' />";
		}else{echo"<p style='color:lightgray; font-family:algerian; font-size:3.0em; padding-top:80px;text-align:center;'><span class='glyphicon glyphicon-picture' style='color:lightgray;  font-size:2.3em;'></span></p>";}
			echo"<pre style='width:100%; height:50px; margin-top:10px; color:gray; text-align:center; background:transparent; font-family:algerian; font-size:2.0em; overflow:hidden;'>Cover</pre>";

		
	echo"</div>";
	?>
	<!---------POST ALL---------------------->
	
	<?php
	echo"<div id='post_all' style='width:100%; display:none; height:auto; background:; float:left;'>";
	echo"<div id='rt_post'style='width:100%; padding:20px;'><img src='../Profile/image/previous.gif' style='cursor:pointer;' /></div>";
	
	$rowpost=$mysqli->query("select * from  group_post where group_id='$group' && group_post_text !='added a Cover photo..'");
	while($fetchpost=$rowpost->fetch_array()){
		$group_post_id_post_post=$fetchpost['group_post_id'];
		$group_id_post_post=$fetchpost['group_id'];
		$post_user_id_post=$fetchpost['post_user_id'];
		$group_post_text_post=$fetchpost['group_post_text'];
		$group_post_pic_post=$fetchpost['group_post_pic'];
		
		$row_group_post=$mysqli->query("select * from groups where  group_id='$group'");
			$fetch_group=$row_group_post->fetch_array();
				$g_user_id_post=$fetch_group['user_id'];
				$g_name_post=$fetch_group['group_name'];
		
		$row1=$mysqli->query("select * from users where user_id='$g_user_id_post'");
			$fetch1=$row1->fetch_array();
				//$id=$fetch1['user_id'];
				$name=$fetch1['Name'];
				$email_posting_post=$fetch1['Email'];
				$gender_posting_post=$fetch1['Gender'];
		
	?>
	
		<?php //post all
		
		if($group_post_pic_post !="")
		{
			echo"<a href='../Home/comment.php?tag&postid=$group_post_id_post_post'><img src='../../../fb_user/$gender_posting_post/$email_posting_post/$g_name_post/Post/$group_post_pic_post'  width='45%' style='height:200px; border-radius:4px; padding:15px; border:1px groove white ; margin:10px; float:left;' /></a>";
		}else{echo"<p style='color:lightgray; font-family:algerian; font-size:3.0em; padding-top:80px;text-align:center;'><span class='glyphicon glyphicon-picture' style='color:lightgray; font-size:2.3em;'></span></p>";}
		
		?>
	
	<?php }	?>
	</div>
	<div id='post_singl' style=''>
		<?php //post single
		if($group_post_pic_post !="")
		{
		echo"<img src='../../../fb_user/$gender_posting_post/$email_posting_post/$g_name_post/Post/$group_post_pic_post'    width='100%' style='height:250px; padding:10px; border:1px white groove; border-radius:5px;' />";
		}else{echo"<p style='color:lightgray; font-family:algerian; font-size:3.0em; padding-top:80px;text-align:center;'><span class='glyphicon glyphicon-picture' style='color:lightgray;  font-size:2.3em;'></span></p>";}
		echo"<pre style='width:100%; height:50px; margin-top:10px; color:gray; text-align:center; background:transparent; font-family:algerian; font-size:2.0em; overflow:hidden;'>Post</pre>";

		?>
	</div>

	
<?php	}?>
<script>
//for cover
$(document).ready(function(){
		$("#cover_singl").click(function(){
		$("#cover_singl,#post_singl").slideUp("slow",function(){
			$("#cover_all").fadeIn("slow");
			
		});
		
		
		});
	});
	
	$(document).ready(function(){
		$("#rt_cover").click(function(){
		$("#cover_all").slideUp("slow",function(){
			$("#post_singl,#cover_singl").fadeIn("slow");
			
		});
		
		});
	});

//for post
$(document).ready(function(){
		$("#post_singl").click(function(){
		$("#post_singl,#cover_singl").slideUp("slow",function(){
			$("#post_all").fadeIn("slow");
			
		});
		
		
		});
	});
	
	$(document).ready(function(){
		$("#rt_post").click(function(){
		$("#post_all").slideUp("slow",function(){
			$("#post_singl,#cover_singl").fadeIn("slow");
			
		});
		
		
		});
	});

</script>