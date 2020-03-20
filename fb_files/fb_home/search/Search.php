<?php
include("../../../connection/conect.php");
if(!empty($_GET['q'])){
	
	$sq=$_GET['q'];
	$sl=$mysqli->query("select * from users where Name LIKE '%{$sq}%'");
	// $array = array();

	if(mysqli_num_rows($sl)>0){
		
		while($row=$sl->fetch_array()){
		
		$name=$row['Name'];
		$u_id=$row['user_id'];
		$email=$row['Email'];
		$gender=$row['Gender'];
		
		$row2=$mysqli->query("select * from  user_profile_pic where user_id='$u_id'");
		$fetch2=$row2->fetch_array();
		$image=$fetch2['image'];
		
		$row2=$mysqli->query("select * from  user_info where user_id='$u_id'");
		$fetch2=$row2->fetch_array();
		// $array[] = $row['Name'];
		
		echo "<table border='0' rules='rows' style='width:100%; border:solid 1px lightgray; height:auto; padding:20px; margin-top:5px;'>
			<tr>
			<td width='15%'>
				<table border='0'style='width:100%; height:auto;'>
					<tr>
						<td>";?><?php if($gender=='Male' || $gender=='Female'){echo"<img src='../../../fb_user/$gender/$email/Profile/$image' style= 'width:100%; height:55px; border:1px solid white; ' /></td>";}
		echo"
				</tr>
				</table>		
			</td>
			<td>
				<table border='0'style='width:96%; height:auto;  margin-left:3%;'>
					<tr>
						<td><a href='../Profile/Profile.php?id=$u_id' style='text-decoration:none; font-size:20px; '>$name</a></td>
					</tr>
					<tr>
						<td><span class='btn btn-warning btn-xs' ><a href='../Profile/Profile.php?id=$u_id' style='text-decoration:none; color:white;'>see the more info</a></span></td>
					</tr>
				</table>
			</td>			
			</tr>
			</table>
			
		";
		}
	}
	else
	{
		echo"<div style='width:100%; height:100px; padding:8% 0px 0px 20%; font-size:25px; color:gray; text-transform:capitalize;'>no result found.....!</div>";
		
	}
	
}

?>
