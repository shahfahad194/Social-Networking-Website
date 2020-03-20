<?php
include("../../connection/conect.php");

session_start();
if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];

		$row1=$mysqli->query("select * from users where Email='$user'");
		$fetch1=$row1->fetch_array();
		$u_id=$fetch1['user_id'];
if (isset($_COOKIE['pst'])) {
	$cook=$_COOKIE['pst'];
	Setcookie('cookiepst',$cook);}
	if (isset($_COOKIE['cookiepst'])) 
		$post_id=$_COOKIE['cookiepst'];	
//var_dump($cook);
//print_r($cook);
?>

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
<td style='  width:50%;'><?php echo"<input type='button'  Value='Unlike'  style='border-color:#337ab7; background:#edeff4;display:block; border-radius:2px; margin-left:0px; text-decoration:none; width:100%;'   class='btn btn-link' id='$post_id'>"?></td>
<td style=' width:50%;'><a href="comment.php?tag&postid=<?php echo $post_id; ?>"><button  class='btn btn-primary' id='<?php echo $post_id; ?>' style='background:#edeff4; color:#337ab7; width:100%; float:right;  margin-right:0px;'>Comment(<?php echo $que_comt;?>)</button></a></td>
</tr>
<?php }else{?>		
<tr>
<td style='  width:50%;' ><?php echo"<input type='button'  Value='Like'  style='background:#edeff4; display:block; border-color:#337ab7; color:#337ab7; margin-left:0px; width:100%;'  class='btn btn-info' id='$post_id'>"?></td>
<td style=' width:50%;'><a href="comment.php?tag&postid=<?php echo $post_id; ?>"><button  class='btn btn-primary'  id='<?php echo $post_id; ?>' style='background:#edeff4; color:#337ab7;float:right; width:100%; margin-right:0px;'>Comment(<?php echo $que_comt;?>)</button></a></td>

</tr>

<?php }?>
	<!------------ popover msj --------------->
	<tr id="lk"  width="2%">	
		<?php
		if($que>0){
		?>

			<td style='padding:3px;'><a href="#" title="Like" data-toggle="popover" data-placement="right"  data-trigger="hover" data-content="
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

		?>" ><span class='badge' style='font-size:1.0em; width:25%; background:#edeff4; color:#337ab7; text-align:left;'><img src='image/like.png' />(<?php echo $que;  ?>)Like this.</span></a></td>
		<td> &nbsp </td>
		<?php }else{?>

		<td style='padding:3px;'> <span class='badge' style='font-size:1.0em; width:auto;  padding:5px; 	background:#edeff4; color:#337ab7; text-align:left;'><img src='image/like.png' />(<?php echo $que;  ?>)You be the frist Like.</span> </td>			
		<td> &nbsp </td>
		<?php }
		//end pop over msj
		?>	
</tr>		
</table>	
<?php }?>


</script>