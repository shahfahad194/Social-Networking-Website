
<?php
include("../../../connection/conect.php");

//error_reporting(0);
session_start();


if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];
$row1=$mysqli->query("select * from users where Email='$user'");
$fetch1=$row1->fetch_array();
$u_id=$fetch1['user_id'];		

	if (isset($_COOKIE['mycookie'])) {
	$cook=$_COOKIE['mycookie'];
	Setcookie('cookie',$cook);}	
	if (isset($_COOKIE['cookie'])) 
				$postidc=$_COOKIE['cookie'];
 $col="select * from user_post_comment where post_id='$postidc' order by comment_id desc";
 $co=$mysqli->query($col);
//if(mysqli_num_rows($co)>0){
	$i=0;
while($c_s=$co->fetch_array()){
$i++;
$color=($i%2==0)?"lightgray":"white";

$comment_id=$c_s['comment_id'];
$comment_user_id=$c_s['user_id'];
$comment_p=$c_s['comment']; 
$time=$c_s['time']; 

$row11=$mysqli->query("select * from users where user_id='$comment_user_id'");
$fetch11=$row11->fetch_array();


$name=$fetch11['Name'];
$emai=$fetch11['Email'];
$ge=$fetch11['Gender'];
//fcth 2nd for pic
$row22=$mysqli->query("select * from  user_profile_pic where user_id='$comment_user_id'");
$fetch22=$row22->fetch_array();
$imag=$fetch22['image'];


echo "<table  border='0'id='p' style=' background:$color;  width:100%; border-radius:0px; height:auto; border-bottom-style:solid; border-width:thin; font-size:13px; font-family:sans-serif; border-color:gray;  word-break: break-all;'>		
<tr>
<td  valign='top' width='6%'style='border-right-style:groove; border-right-color:lightgray; border-width:thin;' >";
if($ge=='Male' || $ge=='Female'){echo"<img src='../../../fb_user/$ge/$emai/Profile/$imag' style='width:100%; height:auto; border-radius:0px;'/></td><td colspan=''style='text-transform:capitalize; padding:10px;'><a href='../Profile/Profile.php?id=$comment_user_id' style='margin-left:10px;'>$name</a><p style='color:gray; margin-left:10px;'>$time</p></td>";}
 if(@$u_id==$comment_user_id){echo"<td align='center' valign='top'><img src='../image/delete_comment.gif'  id='$comment_id'  class='delete' style='cursor:pointer; padding-top:10px; '/></td>";}
echo"</tr><tr><td style='border-right-style:groove; border-right-color:lightgray; border-width:thin;'>&nbsp</td>";
echo"<td colspan='2' width='90%' id='ci' style='margin-left:10px;'><p style='margin-left:5px; padding:5px 15px 5px 0px ;'>$comment_p</p></td>";

echo"</tr></table>";
}
//}

	//}




?>
<script>
//Dlete for ajax


$(function(){
	
	$(".delete").click(function() {
		var element=$(this);
		var userid=element.attr("id");
		$.ajax({
				
				url:'comment.php',
				type:'POST',
				data:{
					save:1,
					a:userid
				},
				
				success: function (){
					//get_message();
				}
				
			});
		$(this).parent().parent().parent().parent().fadeOut(300,function (){
			$(this).remove();
		});
		  
		return false;
	});
		

	
	
});	
	

<?php 
}

?>