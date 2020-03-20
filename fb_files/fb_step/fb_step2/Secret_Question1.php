<?php 
	include("../../../connection/conect.php");
	session_start();
	if(isset($_SESSION['tempfbuser'])){
		
		$user=$_SESSION['tempfbuser'];
		
			$qu1=$mysqli->query("select * from users where Email='$user'");
			$row=$qu1->fetch_array();
			$user_id=$row['user_id'];
			$gender=$row['Gender'];
			
			$qu2=$mysqli->query("select * from user_secret_quotes where user_id='$user_id'");
			if(mysqli_num_rows($qu2)==0){
				
				$que3= $mysqli->query("select * from user_profile_pic where user_id='$user_id'");
				$count3=mysqli_num_rows($que3);
				if($count3>0)
					{
						
						
	?>					
<?php			
		

	if(isset($_POST['next'])){
		$que=$_POST['qus'];
		$ans=$_POST['ans'];
		if($que !="" && $ans!=""){
		$q="insert into user_secret_quotes (user_id,Question1,Answer1)values('$user_id','$que','$ans')";
		$qq=$mysqli->query($q);
		header("location:../fb_step3/Secret_Question2.php");
		}
	}
	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Step2</title>
</head>
<style>
#main{display:none;}
		#step2_main{
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
				overflow:;
			
		}
		#input{
				width:45%;
				height:200px;
				background:;
				margin:250px 0px 0px 20px;
				border-radius:4px;
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
		#step2{
			width:100%;
			height:100px;
			background:;
			margin:auto;
			float:left;
	}
	#step1,#step3{display:none;}
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
				height:30px;
				background:;
				margin:150px 0px 0px 50px;
				float:left;
			
		}
		
	}	
</style>
<body>
<?php include("../../../Background.php");?>

<div id='step2_main'>
	<div id="step">
		<pre style="color:white; font-family:serif; line-height:2.9; text-align:center;"><h1  id='step1'style="background:gray; width:100%; box-shadow:0px 0px 25px black; border-radius:0px 10px 10px 0px;">Step 1</h1>  <h1 id='step2'style="background:lightgreen; box-shadow:0px 0px 25px black; width:100%; border-radius:0px 10px 10px 0px;">Step 2</h1> <h1 id='step3'style="background:gray; box-shadow:0px 0px 25px black; width:100%; border-radius:0px 10px 10px 0px;">Step 3</h1></pre>
		
		</div>
		<div id="img">
			<img src="image/sonic.png" width="100%"/>
		</div>
		<div id="input">
			<form method="POST" onSubmit="return check();" name="ques" >
			<table border="0" width="100%" cellspacing="10px"  style=" border:1px groove white;font-family:serif;font-size:1.2em; padding:10px;">
				<tr>
					
					<td>Question:</td>
					
					<td>
						<select name="qus" style="width:100%; height:30px; font-family:serif;font-size:1.1em">
							<option value="select one">Select one</option>
							<option value="what is the first name of your favorite uncle?">what is the first name of your favorite uncle?</option>
							<option value="where did you meet you spouse?">where did you meet you spouse?</option>
							<option value="what is your oldest cousins name?">what is your oldest cousin's name?</option>
							<option value="what is your youngest childs nickname?">what is your youngest child's nickname?</option>
							<option value="what is your oldest childs nickname?">what is your oldest child's nickname?</option>
							<option value="what is the first name of your oldest niece?">what is the first name of your oldest niece?</option>
							<option value="what is the first name of your oldest nephew?">what is the first name of your oldest nephew?</option>
							<option value="what is the first name of your favorite aunt?">what is the first name of your favorite aunt?</option>
							<option value="where did you spend you honeymoon?">where did you spend you honeymoon?</option>

						</select>
					</td>
					<td id='msj' style='color:red;'> &nbsp </td>
				</tr>
				<tr>
					<td style="float:right;">Your Ans:</td>
					<td>
						<input type="text" placeholder="Type Ans Here" name="ans" style="width:100%; height:30px; font-family:serif;font-size:1.1em"/>
					</td>
					<td id='msj2' style='color:red;'> &nbsp </td>
				</tr>
				<tr>
					<td> &nbsp </td>

					<td>
						<input type="submit" value="Next" name="next"  style="float:right; width:100px; height:30px; font-family:serif; font-weight:bolder; background:#3B5998;color:white;" />
					</td>
				</tr>
			</table>
			</form>
		</div>
		<div id="meter">
			<meter min="0" max="100" value="65" style="width:100%; box-shadow:0px 0px 25px black; height:30px;"></meter>
		</div>	




<?php
		

			}else
			{
				if($gender=="Male")
				{
					header("location:../../fb_step1/Male.php");
				}
				else
				{
					header("location:../../fb_step1/Female.php");
				}
			}
			//	
			}else{
				
				header("location:../fb_step3/Secret_Question2.php");
				
				}

			//
			}else{
				header("location:../../../index.php");
				
				}

?>
</body>
</html>
<script> 
function check(){
	if(ques.qus.value=='select one'){
		var qust=document.getElementById("msj").innerHTML="*";
		document.getElementById("msj2").innerHTML="";
	ques.qus.focus();
	return false;
	
	}
	if(ques.ans.value==''){
		var anst=document.getElementById("msj2").innerHTML="*";
		document.getElementById("msj").innerHTML="";
		ques.ans.focus();
	return false;
	}
}

</script>	