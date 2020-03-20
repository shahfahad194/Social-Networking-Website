 <?php 

include("../../../connection/conect.php");
include("../../../logout.php");
include("aboutquery.php");
error_reporting(0);

if(isset($_GET['id']))
		$id=$_GET['id'];
session_start();
	if(isset($_SESSION['fbuser'])){
		$user=$_SESSION['fbuser'];
		
		$about=$mysqli->query("select * from users where user_id='$id'");
		$about_f=$about->fetch_array();
			$user_id=$about_f['user_id'];
			$email=$about_f['Email'];
			$gen=$about_f['Gender'];
			$birth=$about_f['Birthday_Date'];
		$u_info=$mysqli->query("select * from user_info where user_id='$id'");
		$about_info=$u_info->fetch_array();
			$job=$about_info['job'];
			$school_or_collage=$about_info['school_or_collage'];
			$current_city=$about_info['current_city'];
			$hometown=$about_info['hometown'];
			$relationship_status=$about_info['relationship_status'];
			$mobile_no=$about_info['mobile_no'];
			$mobile_no_priority=$about_info['mobile_no_priority'];
			$website=$about_info['website'];

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>About</title>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>		
	<link rel='stylesheet' type='text/css' href='../bootstrap/css/bootstrap.css'/>
	<script src='../bootstrap/js/bootstrap.js'></script>
	<script src="js_files/jquery.js"></script>
	<script src="js_files/js_about.js"></script>	
</head>
<style>
body { background-image:url(../image/Crunchify.PNG);}

#about{
	background:transparent;
	width:75%;
	height:auto;
	float:left;
	padding:0px;
	margin-left:30px;
	box-shadow:10px 10px 25px black;

}
#title{
	background:#f5f5f5;
	width:100%;
	position:;
	height:100px;
	box-shadow:0px 10px 25px black;
	float:left;
	font-family:algerian;
	font-weight:bolder;
	font-size:1.9em;
	text-transform:capitalize;
	box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
	
	}
#frist{
	background:#f5f5f5;
	width:50%;
	height:400px;
	float:left;
	border-bottom-style:;
	border-width:thin;
	border-right-style:groove;
	box-sizing: border-box;
    border: 0.5px solid #ccc;
    border-radius: 4px;
	margin-top:20px;
	padding:40px;
}	
#second{
	background:#f5f5f5;
	width:50%;
	height:400px;
	float:left;
	border-bottom-style:;
	border-width:thin;
	box-sizing: border-box;
    border: 0.5px solid #ccc;
    border-radius: 4px;
		margin-top:20px;
		padding:40px;
	
}	
#thrid{
	background:#f5f5f5;
	width:50%;
	height:400px;
	float:left;
	border-width:thin;
	border-right-style:;
	border-bottom-style:;
	box-sizing: border-box;
    border: 0.5px solid #ccc;
    border-radius: 4px;
		padding:40px;


}	
#fourth{
	background:#f5f5f5;
	width:50%;
	height:400px;
	float:left;
	border-bottom-style:;
	border-width:thin;
	box-sizing: border-box;
    border: 0.5px solid #ccc;
    border-radius: 4px;
		padding:40px;

}
#fifth{
	background:;
	width:100%;
	position:;
	height:50px;
	float:left;
	
	
}	
input[type='reset'] {
	
	padding:4px;
	width:25%;
	color:black;
	box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
}
input[type='text']{
	
	padding:7px;
	width:90%;
	box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
	color:black;
}
input[type='submit'] {
	
	padding:4px;
	width:25%;
	color:black;
	box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
}
input[type='submit']:hover ,input[type='reset']:hover { background:black ;  border: 2px solid red; color:white;}

/*------frist table-------*/
#w_e{width:100%; text-align:center;  margin-top:50px; margin-left:0px; color:blue;font-family:serif; font-weight:bolder;text-transform:capitalize;}
#enty_schl{ display:none; width:100%; text-align:center; margin-top:50px; margin-left:0px;color:;font-family:serif; font-weight:bolder;text-transform:capitalize;}

#about #frist table tr td
	{
		padding:7px;
		background:#f5f5f5;
		color:#337ab7;
		word-break:break-all;
	}


 

/*------sceond table-------*/
#l_e{  width:100%; text-align:center; margin-top:50px; margin-left:0px;  color:blue;font-family:serif; font-weight:bolder;text-transform:capitalize; }
#enty_livg{ display:none; width:100%; margin-top:50px; margin-left:0px;  text-align:center; color:;font-family:serif; font-weight:bolder;text-transform:capitalize; }
#about #second table tr td{
	padding:7px;
	background:#f5f5f5;
	color:#337ab7;
	word-break:break-all;
}


/*------third table-------*/
#b_i{ width:100%; height:200px; margin-top:50px; margin-left:0px;  text-align:; font-family:serif; font-weight:bolder;text-transform:capitalize;}
#enty_info{display:none; width:100%; margin-top:50px; margin-left:0px; text-align:center;font-family:serif; font-weight:bolder;text-transform:capitalize;}
#about #thrid table tr td{
	padding:7px;
	background:#f5f5f5;
	color:#337ab7;
	word-break:break-all;
}


/*------fourth table-------*/

#about #fourth table tr td{
	padding:7px;
	background:#f5f5f5;
	color:#337ab7;	  
	word-break:break-all;

}
#c_i{
	 width:100%; height:200px;  
	 text-align:; font-family:serif;
	 font-weight:bolder;
	 text-transform:capitalize;
		margin-top:50px; margin-left:0px; 
	}
#enty_cnt{display:none; width:100%; margin-top:50px; margin-left:0px;  text-align:center; color:;font-family:serif; font-weight:bolder;text-transform:capitalize;}






	
	/* mobile size*/


@-ms-viewport {
		width: device-width;
	}

	body {
		-ms-overflow-style: scrollbar;
	}
	
@media screen and (max-width:2560px) 
	{
	body{margin:0px;padding:0px;background:; }
	}	
	
@media screen and (max-width: 1680px) 
	{
		body{margin:0px;padding:0px;background:;}
		#about{width:75%; float:left; height:auto;background:; padding:0px 0px 0px 0px; margin:0px 0px 0px 20px; position:;}
		
		#title{width:100%; float:left; background:;}
		
		
		#frist{width:50%; margin:10px auto auto auto; padding:70px 10px 10px 10px ; height:auto; min-height:400px; max-height:auto; float:left;background:;}
		#frist table{width:100%; word-break:normal; font-size:1.5em;}
		#w_e{margin:auto; float:;padding:auto;}
		#enty_schl{margin:auto; padding:auto;}
		
		
		#second{width:50%; margin:10px auto auto auto; padding:70px 10px 10px 10px ; height:auto; min-height:400px; max-height:auto; float:left;background:;}
		#second table{width:100%; word-break:normal; font-size:1.5em;}
		#l_e{margin:auto; float:;padding:auto;}
		#enty_livg{margin:auto; padding:auto;}
		
		
		#thrid{width:50%; margin:auto;padding:70px 10px 10px 10px ; height:auto; min-height:420px; max-height:auto; float:left;background:;} 
		#thrid table{width:100%; word-break:break-all; font-size:1.5em;}
		#b_i{margin:auto; float:; padding:auto;}
		#enty_info{margin:auto; padding:auto;}
		
		#fourth{width:50%; margin:auto;padding:70px 10px 10px 10px ; height:auto; min-height:420px; max-height:auto; float:left;background:;}
		#fourth table{width:100%; word-break:normal; font-size:1.5em;}
		#c_i{margin:auto; float:; height:auto; padding:auto;}
		#enty_cnt{margin:auto;  padding:auto;}
		
		#fifth{display:; float:left;}	
	}
	
	
@media (max-width:1280px) 
	{
		body{margin:0px;padding:0px;background:;}
		#about{width:75%; float:left; height:auto;background:; padding:0px 0px 0px 0px; margin:0px 0px 0px 20px; position:;}
		
		#title{width:100%; float:left; background:;}
		
		
		#frist{width:50%; margin:10px auto auto auto; padding:70px 10px 10px 10px ; height:auto; min-height:400px; max-height:auto; float:left;background:;}
		#frist table{width:100%; word-break:normal; font-size:1.3em;}
		#w_e{margin:auto; float:;padding:auto;}
		#enty_schl{margin:auto; padding:auto;}
		
		
		#second{width:50%; margin:10px auto auto auto; padding:70px 10px 10px 10px ; height:auto; min-height:400px; max-height:auto; float:left;background:;}
		#second table{width:100%; word-break:normal; font-size:1.3em;}
		#l_e{margin:auto; float:;padding:auto;}
		#enty_livg{margin:auto; padding:auto;}
		
		
		#thrid{width:50%; margin:auto;padding:70px 10px 10px 10px ; height:auto; min-height:400px; max-height:auto; float:left;background:;} 
		#thrid table{width:100%; word-break:break-all; font-size:1.3em;}
		#b_i{margin:auto; float:; padding:auto;}
		#enty_info{margin:auto; padding:auto;}
		
		#fourth{width:50%; margin:auto;padding:70px 10px 10px 10px ; height:auto; min-height:400px; max-height:auto; float:left;background:;}
		#fourth table{width:100%; word-break:normal; font-size:1.3em;}
		#c_i{margin:auto; float:; height:auto; padding:auto;}
		#enty_cnt{margin:auto;  padding:auto;}
		
		#fifth{display:; float:left;}	

	}		

@media (max-width:1024px) 
	{
		body{margin:0px;padding:0px;background:;}	
		#about{width:100%; float:left; height:auto;background:; padding:20px; margin:auto; position:;}
		
		#title{width:100%; float:left; background:;}
		
		
		#frist{width:100%; margin:10px auto auto auto; padding:30px 10px 10px 10px ; height:auto; min-height:290px; max-height:auto; float:left;background:;}
		#frist table{width:80%; word-break:break-all; font-size:1.3em;}
		#w_e{margin:auto; float:;padding:auto;}
		#enty_schl{margin:auto; padding:auto;}
		
		
		#second{width:100%;  margin:auto; padding:30px 10px 10px 10px ; height:auto; min-height:290px; max-height:auto; float:left;background:;}
		#second table{width:80%; word-break:break-all; font-size:1.3em;}
		#l_e{margin:auto; float:;padding:auto;}
		#enty_livg{margin:auto; padding:auto;}
		
		
		#thrid{width:100%; margin:auto;padding:30px 10px 10px 10px ; height:auto; min-height:290px; max-height:auto; float:left;background:;} 
		#thrid table{width:80%; word-break:break-all; font-size:1.3em;}
		#b_i{margin:auto; float:; padding:auto;}
		#enty_info{margin:auto; padding:auto;}
		
		#fourth{width:100%; margin:auto;padding:30px 10px 10px 10px ; height:auto; min-height:290px; max-height:auto; float:left;background:;}
		#fourth table{width:80%; word-break:break-all; font-size:1.3em;}
		#c_i{margin:auto; float:; height:auto; padding:auto;}
		#enty_cnt{margin:auto;  padding:auto;}
		
		#fifth{display:none;}	
		
	}	
	
@media (max-width:980px) 
	{
		body{margin:0px;padding:0px;background:;}
		#about{width:100%; float:left; height:auto;background:; padding:20px; margin:auto; position:;}
		
		#title{width:100%; float:left; background:;}
		
		
		#frist{width:100%; margin:10px auto auto auto; padding:30px 10px 10px 10px ; height:auto; min-height:290px; max-height:auto; float:left;background:;}
		#frist table{width:80%; word-break:break-all; font-size:1.3em;}
		#w_e{margin:auto; float:;padding:auto;}
		#enty_schl{margin:auto; padding:auto;}
		
		
		#second{width:100%;  margin:auto; padding:30px 10px 10px 10px ; height:auto; min-height:290px; max-height:auto; float:left;background:;}
		#second table{width:80%; word-break:break-all; font-size:1.3em;}
		#l_e{margin:auto; float:;padding:auto;}
		#enty_livg{margin:auto; padding:auto;}
		
		
		#thrid{width:100%; margin:auto;padding:30px 10px 10px 10px ; height:auto; min-height:290px; max-height:auto; float:left;background:;} 
		#thrid table{width:80%; word-break:break-all; font-size:1.3em;}
		#b_i{margin:auto; float:; padding:auto;}
		#enty_info{margin:auto; padding:auto;}
		
		#fourth{width:100%; margin:auto;padding:30px 10px 10px 10px ; height:auto; min-height:290px; max-height:auto; float:left;background:;}
		#fourth table{width:80%; word-break:break-all; font-size:1.3em;}
		#c_i{margin:auto; float:; height:auto; padding:auto;}
		#enty_cnt{margin:auto;  padding:auto;}
		
		#fifth{display:none;}		
	}

	
@media (max-width:736px) 
	{
		body{margin:0px;padding:0px;background:;}	
		#about{width:100%; float:left; height:auto;background:; padding:20px; margin:auto; position:;}
		
		#title{width:100%; float:left; background:;}
		
		
		#frist{width:100%; margin:10px auto auto auto;; padding:30px 10px 10px 10px ; height:auto; min-height:270px; max-height:auto; float:left;background:;}
		#frist table{width:100%; word-break:break-all; font-size:1.2em;}
		#w_e{margin:auto; padding:auto;}
		#enty_schl{margin:auto; padding:auto;}
		
		
		#second{width:100%;  margin:auto; padding:30px 10px 10px 10px ; height:auto; min-height:270px; max-height:auto; float:left;background:;}
		#second table{width:100%; word-break:break-all; font-size:1.2em;}
		#l_e{margin:auto; padding:auto;}
		#enty_livg{margin:auto; padding:auto;}
		
		
		#thrid{width:100%; margin:auto;padding:30px 10px 10px 10px ; height:auto; min-height:270px; max-height:auto; float:left;background:;} 
		#thrid table{width:100%; word-break:break-all; font-size:1.2em;}
		#b_i{margin:auto; padding:auto;}
		#enty_info{margin:auto; padding:auto;}
		
		#fourth{width:100%; margin:auto;padding:50px 10px 10px 10px ; height:auto; min-height:250px; max-height:auto; float:left;background:;}
		#fourth table{width:100%; word-break:break-all; font-size:1.2em;}
		#c_i{margin:auto; float:left; height:auto; padding:auto;}
		#enty_cnt{margin:auto;  padding:auto;}
		
		#fifth{display:none;}
		
		
		
	}
	
	
@media (max-width:480px) 
	{
		body{margin:0px;padding:0px;background:;}	
	
		#about{width:100%; float:left; height:auto;background:; padding:10px; margin:auto; position:;}
		
		#title{width:100%; float:left; background:;}
		
		
		#frist{width:100%; margin:10px auto auto auto;; padding:30px 10px 10px 10px ; height:auto; min-height:270px; max-height:auto; float:left;background:;}
		#frist table{width:100%; word-break:break-all; font-size:1.1em;}
		#w_e{margin:auto; padding:auto;}
		#enty_schl{margin:auto; padding:auto;}
		
		
		#second{width:100%;  margin:auto; padding:30px 10px 10px 10px ; height:auto; min-height:270px; max-height:auto; float:left;background:;}
		#second table{width:100%; word-break:break-all; font-size:1.1em;}
		#l_e{margin:auto; padding:auto;}
		#enty_livg{margin:auto; padding:auto;}
		
		
		#thrid{width:100%; margin:auto;padding:30px 10px 10px 10px ; height:auto; min-height:270px; max-height:auto; float:left;background:;} 
		#thrid table{width:100%; word-break:break-all; font-size:1.1em;}
		#b_i{margin:auto; padding:auto;}
		#enty_info{margin:auto; padding:auto;}
		
		#fourth{width:100%; margin:auto;padding:50px 10px 10px 10px ; height:auto; min-height:250px; max-height:auto; float:left;background:;}
		#fourth table{width:100%; word-break:break-all; font-size:1.1em;}
		#c_i{margin:auto; float:left; height:auto; padding:auto;}
		#enty_cnt{margin:auto;  padding:auto;}
		
		#fifth{display:none;}
	
	
	}
	
	
@media (max-width:360px) 
	{
		body{margin:0px;padding:0px;background:;}
		
		#about{width:100%; float:left; height:auto;background:; padding:10px; margin:auto; position:;}
		
		#title{width:100%; float:left; background:;}
		
		
		#frist{width:100%;  margin:10px auto auto auto; padding:30px 10px 10px 10px ; height:auto; min-height:270px; max-height:auto; float:left;background:;}
		#frist table{width:100%; word-break:break-all; font-size:0.9em;}
		#w_e{margin:auto; padding:auto;}
		#enty_schl{margin:auto; padding:auto;}
		
		
		#second{width:100%;  margin:auto;padding:30px 10px 10px 10px ; height:auto; min-height:270px; max-height:auto; float:left;background:;}
		#second table{width:100%; word-break:break-all; font-size:0.9em;}
		#l_e{margin:auto; padding:auto;}
		#enty_livg{margin:auto; padding:auto;}
		
		
		#thrid{width:100%; margin:auto;padding:30px 10px 10px 10px ; height:auto; min-height:270px; max-height:auto; float:left;background:;} 
		#thrid table{width:100%; word-break:break-all; font-size:0.9em;}
		#b_i{margin:auto; padding:auto;}
		#enty_info{margin:auto; padding:auto;}
		
		#fourth{width:100%; margin:auto;padding:50px 10px 10px 10px ; height:auto; min-height:250px; max-height:auto; float:left;background:;}
		#fourth table{width:100%; word-break:break-all; font-size:0.9em;}
		#c_i{margin:auto; float:left;  height:auto; padding:auto;}
		#enty_cnt{margin:auto;  padding:auto;}
		
		#fifth{display:none;}
	
	
	}
	
	
</style>
<body>
 
<?php  include("background.php");?>
	
	<div id="about">
			

		<!----------title-----Helvetica------------>
		<div id="title">
			<p style='padding:10px; color:gray;'><img src='image/about1.PNG' height='70px' style='padding:10px;'/>about	</p>
			
		</div>
		
		
<!----------Work and education---------------->
			<!---for edit button -->
			<div id="frist">
				<table border='0' id="w_e" style=''> 
					<tr>
						<td style='color:black; font-size:1.4em;'>Work & Education</td>
						<td align='right'> <?php if($user==$email) {echo"<img id='edit' style='cursor:pointer;' src='image/edit_button.png'/>";} ?></td>
					</tr>
					<tr>
						<td ><img src='image/job.png'/></td>
						<td style='text-align:left;'><?php if($job !=""){echo $job; }else{echo"Add a job";} ?></td>
					</tr>
					<tr>
						<td><img src='image/school.png'/></td>
						<td style='text-align:left;'><?php if($school_or_collage !=""){echo $school_or_collage; }else{echo"Add a school or college";} ?></td>
					</tr>
				
				
				</table>
				<!---for entry -->
				<form method="POST">
					<table border='0' id="enty_schl" style=''> 
						<tr>
							<td style='color:black; font-size:1.4em;'>Work & Education</td>
							
						</tr>
						<tr>
							
							<td style='text-align:left;'>job<br><input type='text' name='job' autofocus="on"/></td>
						</tr>
						<tr>
							
							<td style='text-align:left;'> school or college<br><input type='text' name='schol'/></td>
						</tr>
						<tr>
							
							<td style='text-align:left; padding:10px;'><input type='submit' name='sub' value="Save"/> &nbsp &nbsp &nbsp &nbsp <input  id="w"type='reset' value="Cancel"/></td>
						</tr>
					
					</table>
				</form>
			
			</div>
<!-------------Living-------------------------->	
			<div id="second">
				<table border='0' id="l_e" style=''> 
					<tr>
						<td style='color:black; font-size:1.4em;'>Living</td>
						<td align='right'> <?php if($user==$email) {?><img id="edit_l" style='cursor:pointer;' src='image/edit_button.png'/><?php }?></td>
					</tr>
					<tr>
						<td ><img src='image/hometown.PNG'/></td>
						<td style='text-align:left;'><?php if($current_city !=""){echo $current_city; }else{echo"Add Your Current City";} ?></td>
					</tr>
					<tr>
						<td><img src='image/hometown.PNG'/></td>
						<td style='text-align:left;'><?php if($hometown !=""){echo $hometown; }else{echo"Add your hometown";} ?></td>
					</tr>
				
				
				</table>
				<!---for entry -->
				<form method="POST">
					<table border='0' id="enty_livg" style=''> 
						<tr>
							<td style='color:black; font-size:1.4em;'>Living</td>
							
						</tr>
						<tr>
							
							<td style='text-align:left;'>Current City<br><input type='text' name='city' autofocus="on"/></td>
						</tr>
						<tr>
							
							<td style='text-align:left;'> hometown<br><input type='text' name='town'/></td>
						</tr>
						<tr>
							
							<td style='text-align:left; padding:10px;'><input type='submit' name='sub_2' value="Save"/> &nbsp &nbsp &nbsp &nbsp <input type='reset' id="l" value="Cancel"/></td>
						</tr>
					
					</table>
				</form>
			
			
			
			
			</div>
<!------------Basic Information---------------->
			<div id="thrid">
				<table border='0' id="b_i" style=' '> 
					<tr>
						<td style='color:black; font-size:1.4em;'>Basic Information</td>
						<td align='right'><?php if($user==$email) {?> <img id="edit_b" style='cursor:pointer;' src='image/edit_button.PNG'/><?php }?></td>
					</tr>
					<tr>
						<td>Brithday</td>
						<td style='text-align:left;'><?php echo $birth; ?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td style='text-align:left;'><?php echo $gen; ?></td>
					</tr>
					<tr>
						<td>relationship</td>
						<td style='text-align:left;'><?php if($relationship_status !=""){echo $relationship_status; }else{echo"add your relationship";}?></td>
					</tr>
				
				
				</table>
				<!---for entry basic info -->
				<form method="POST">
				<table border='0' id="enty_info" style=' '> 
					<tr>
						<td style='color:black; font-size:1.4em;'>Basic Information</td>
						
					</tr>
					<tr>
						
						<td style='text-align:left;'>Brithday<br><input type='date' name='birth' autofocus="on"/></td>
					</tr>
					<tr>
						
						<td style='text-align:left;'>Gender &nbsp &nbsp &nbsp &nbsp <?php echo $gen;?></td>
					</tr>
					<tr>
						
						<td style='text-align:left;'>relationship<br><input type='text' name='rel'/></td>
					</tr>
					<tr>
						
						<td style='text-align:left; padding:10px;'><input type='submit' name='sub_3' value="Save"/> &nbsp &nbsp &nbsp &nbsp <input  id="b" type='reset' value="Cancel"/></td>
					</tr>
				
				</table>
				</form>
				
			</div>
<!--------------Contact Information------------>
			<div id="fourth">
				<table border='0' id="c_i" style=' '> 
					<tr>
						<td style='color:black; font-size:1.4em;'>Contact Information</td>
						<td align='right'><?php if($user==$email) {?> <img id="edit_c" style='cursor:pointer;' src='image/edit_button.PNG'/> <?php }?></td>
					</tr>
					<tr>
						<td>Mobile Phones</td>
						<td style='text-align:left;'><?php if($mobile_no_priority=='public'){if($mobile_no !=""){echo $mobile_no; }else{echo"Add Mobile Number";}}?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td style='text-align:left;'><?php echo $email;?></td>
					</tr>
					<tr>
						<td>Website</td>
						<td style='text-align:left;'><?php if($website !=""){echo $website; }else{echo"Add Website";}?></td>
					</tr>
				
				
				</table>
				<!---for entry contact info -->
				<form method="POST">
				<table border='0' id="enty_cnt" style=' ;'> 
					<tr>
						<td style='color:black; font-size:1.4em;'>Contact Information</td>
						
					</tr>
					<tr>
						
						<td style='text-align:left;'>Mobile Phones<br><input type='text' name='phone'  autofocus="on"/> &nbsp <select name="mobile_no_priority" ><option value='public'>Public</option><option value='Only me'>Only me</option></select> </td>
					</tr>
					<tr>
						
						<td style='text-align:left;'>Email &nbsp &nbsp &nbsp &nbsp <?php echo $user;?></td>
					</tr>
					<tr>
						
						<td style='text-align:left;'>Website<br><input type='text' name='website'/></td>
					</tr>
					<tr>
						
						<td style='text-align:left; padding:10px;'><input type='submit' name='sub_4' value="Save"/> &nbsp &nbsp &nbsp &nbsp <input  id="c" type='reset' value="Cancel"/></td>
					</tr>
				
				</table>
				</form>
			</div>
	
	</div>
<!----end of about div--------->
		<div id="fifth"></div>


	<?php }?>
</body>
</html>