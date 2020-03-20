
<?php 
	include("../../../connection/conect.php");
	session_start();
	if(isset($_SESSION['tempfbuser'])){
		
		$user=$_SESSION['tempfbuser'];
		
			$qu1=$mysqli->query("select * from users where Email='$user'");
			$row=$qu1->fetch_array();
			$user_id=$row['user_id'];
			
			$qu2=$mysqli->query("select * from user_secret_quotes where user_id='$user_id'");
			$row=$qu2->fetch_array();
				$que2=$row['Question2'];
				$ans2=$row['Answer2'];
				if($que2 =="" && $ans2=="")
		{
				$que3= $mysqli->query("select * from user_profile_pic where user_id=$user_id");
				$count3=mysqli_num_rows($que3);
			if($count3>0)
			{
?>					
<?php			
	
	if(isset($_POST['finish'])){
			$que2=$_POST['que2'];
			$ans2=$_POST['ans2'];
		if($que2 !="" && $ans2 !=""){
			
		$mysqli->query("update user_secret_quotes set Question2='$que2',Answer2='$ans2' where user_id='$user_id'");

		$que_user_data=$mysqli->query("select * from users where Email='$user';");
		$user_data=$que_user_data->fetch_array();
		$userid=$user_data['user_id'];
		$user_join_time=$user_data['FB_join_Date'];
			$mysqli->query("insert into user_post(user_id,post_txt,post_time,priority) values($user_id,'Join FriendsMe','$user_join_time','Public')");
			$mysqli->query("insert into user_status (user_id,status) values($user_id,'Online')");
			$mysqli->query("insert into user_info(user_id) values($user_id)");
			$mysqli->query("insert into friends(user_id,user_friend_id,status) values('$user_id','$user_id','Friend')");
		
		//$mysqli->query("update users set friend='$userid' where user_id='$userid'");
		
		session_start();
		$_SESSION['fbuser']=$user;
		header("location:../../fb_home/Home/Home.php");
	}
	}					
	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<title>Step3</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
#main{display:none;}
		#step3_main{
			width:100%;
			height:auto;
			background:;
			float:left;
		}
		#step{
				width:10%;
				height:400px;
				background:;
				margin:100px 0px 0px 0px;
				float:left;
		}
		#img{
			
				width:11%;
				height:250px;
				background:;
				margin:200px 0px 0px 100px;
				float:left;
				overflow:hidden;
			
		}
		#input{
				width:45%;
				height:200px;
				background:;
				margin:250px 0px 0px 20px;
				float:left;
				
			
			
		}
		#meter{
				width:80%;
				height:50px;
				background:;
				margin:200px 0px 0px 0px;
				float:left;
		}
@media (max-width:1024px) {
		#main{display:none;}
		#step{	
			width:50%;
			height:auto;
			background:;
			margin:30px 0px 0px 0px;
			float:left;
		}
		#step3{
			width:100%;
			height:100px;
			background:;
			margin:auto;
			float:left;
	}
	#step1,#step2{display:none;}
	#img{
		width:15%;
		height:auto;
		background:;
		margin:80px 0px 0px 50px;
		float:left;
		overflow:;
	
	}	
	#input{
		width:100%;
		height:200px;
		background:transparent;
		
		margin:100px 0px 0px 0px;
		float:left;
	}
	#meter{
				width:80%;
				height:50px;
				background:;
				margin:150px 0px 0px 50px;
				float:left;
			
		}
		
	}			
</style>
<body>
<?php include("../../../Background.php");?>
<div id='step3_main'>
<div id="step">
		<pre style="color:white; font-family:serif; line-height:2.9; text-align:center;"><h1  id='step1'style="background:gray; width:100%; box-shadow:0px 0px 25px black; border-radius:0px 10px 10px 0px;">Step 1</h1>  <h1 id='step2'style="background:gray; box-shadow:0px 0px 25px black; width:100%; border-radius:0px 10px 10px 0px;">Step 2</h1> <h1 id='step3'style="background:lightgreen; box-shadow:0px 0px 25px black; width:100%; border-radius:0px 10px 10px 0px;">Step 3</h1></pre>
		
		</div>
		<div id="img">
				<img src="../fb_step2/image/sonic.png" width="100%"/>
				</div>
		<div id="input">
			<form method="POST" onSubmit="return check();" name="ques2" >
			<table border="0" width="100%" cellspacing="10px"  style=" border:1px groove white;font-family:serif;font-size:1.2em; padding:10px;">
				<tr>
					<td>Question 2:</td>
					<td>
						<select name="que2" style="width:100%; height:30px; font-family:serif;font-size:1.1em">
							<option value="select one">select one</option>
							<option value="what was your favorite food as a child?">what was your favorite food as a child?</option>
							<option value="what was the last name of your first boss?">what was the last name of your first boss?</option>
							<option value="what is the name of your favorite sports team?">what is the name of your favorite sports team?</option>
							<option value="what was you first pets name?">what was you first pet's name?</option>
							<option value="what is the name of your favorite book?">what is the name of your favorite book?</option>
							<option value="who is your all-time favorite movie character?">who is your all-time favorite movie character?</option>
							<option value="what was the make of your fist car?">what was the make of your fist car?</option>
							<option value="what was the make of your first motorcycle?">what was the make of your first motorcycle?</option>
							<option value="who is you favorite author?">who is you favorite author?</option>
						</select>
					</td>
					<td id='msj' style='color:red;'> &nbsp </td>
				</tr>
				<tr>
					<td style="float:right;">Your Ans:</td>
					<td>
						<input type="text" placeholder="Type Ans Here" name="ans2" style="width:100%; height:30px; font-family:serif;font-size:1.1em"/>
					</td>
					<td id='msj2' style='color:red;'> &nbsp </td>

				</tr>
				<tr>
					<td>&nbsp </td>

					<td>
						<input type="submit" value="Finish" name="finish"  style="float:right; width:100px; height:30px; font-family:serif; font-weight:bolder; background:#3B5998;color:white;" />
					</td>
				</tr>
			</table>
			</form>
		</div>
		<div id="meter">
			<meter min="0" max="100" value="100" style="width:100%; box-shadow:0px 0px 25px black; height:30px;"></meter>
		</div>	
</div>



<?php
			}else
				{
					header("location:../../fb_step2/Secret_Question1.php");
				}

		}else
			{
				header("location:../../fb_home/Home/Home.php");
			}
			}
			else{
				header("location:../../../index.php");
				
				}

?>
</body>
</html>
<script> 
function check(){
	if(ques2.que2.value=='select one'){
		document.getElementById("msj").innerHTML="*";
		document.getElementById("msj2").innerHTML="";
	ques.que2.focus();
	return false;
	
	}
	if(ques2.ans2.value==''){
		document.getElementById("msj2").innerHTML="*";
		document.getElementById("msj").innerHTML="";
		ques.ans2.focus();
	return false;
	}
}
</script>	