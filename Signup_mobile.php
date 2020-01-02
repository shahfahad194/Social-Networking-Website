<?php
	include("fb_files/fb_home/singup/Singup.php");
	
?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
		<title>FriendsMe</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="fb_files/fb_home/Profile/js_files/jquery.js"></script>
<script src="fb_files/fb_home/singup/reg_validation.js"></script>
</head>

<style>
#main{display:none;}
#singup{
		width:100%;
		height:auto;
		background:;
		float:left;
		font-family:serif;
}
#singup_table{
	width:100%; line-height:1.6; word-wrap:hard; text-shadow:0px 0px 5px white; font-family:serif; font-weight:; color:black;margin:5px 0px 0px 0px; font-size:1.3em;
	}
#singup table tr td input{
	height:40px;
	width:100%;
	border-radius:4px;
}
#singup table tr td{
	padding:5px;
}
/* mobile size*/
@media (max-width:1024px) {
	*{
		
		margin:0px;
		padding:0px;
}
#singup{
		width:100%;
		height:auto;
		background:;
		float:left;
		font-family:serif;
}
#singup_table{
	width:100%; line-height:1.6; word-wrap:hard; text-shadow:0px 0px 5px white; font-family:serif; font-weight:; color:black;margin:5px 0px 0px 0px; font-size:1.3em;
	}
#singup table tr td input{
	height:40px;
	width:100%;
	border-radius:4px;
}
#singup table tr td{
	padding:5px;
}


}
</style>
<body>
<?php include("Background.php")?>
	<div id="singup" class='singup'>
		<form method="POST" onSubmit="return check();" name="Reg">
			<table id="singup_table" border='0'style="">
					<tr>
						<td>Frist Name</td>
					</tr>	
					
					<tr>	
						<td><input type="text" id="name" name="f_name" placeholder="Frist Name" /></td>
					</tr>
					
					<tr>
						<td>Last Name</td>
					</tr>	
					
					<tr>	
						<td><input type="text" name="l_name" id="l_name" placeholder="Last Name"/></td>
					</tr>
					
					<tr>
						<td>Email</td>
					</tr>	
					
					<tr>	
						<td><input type="email" name="email" id="email_one" placeholder="Email"/></td>
					</tr>
					
					<tr>
						<td>Renter-Email</td>
					</tr>	
					<tr>	
						<td><input type="text" name="re_emial" id="email_t"  placeholder="Renter-Email"/></td>
					</tr>
					
					<tr>
						<td>Password</td>
					</tr>
					<tr>
						<td><input type="password" name="pass" id="pass" placeholder="Password"/></td>
					</tr>
					
					<tr>
						<td>Birthday</td>
					</tr>
					<tr>
						<td><input type="date" name="dob" id="dob" placeholder="mm/dd/yy"/></td>
					</tr>
					
					<tr>
						<td>Gender</td>
					</tr>	
					<tr>	
						<td>
							<select  id="gen" name="gen" style=" width:100%; border-radius:4px; height:30px;" >
								<option value="I am">I am</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</td>
					</tr>
					
					<tr>
						<td> &nbsp 	</td>
					</tr>	
					<tr>	
						<td><input type="submit"  name="singup" value="Signup" onclick="abc()" style=" width:100px; box-shadow:0px 0px 15px black; color:white; background:green; font-family:serif; font-size:1.1em; outline-color:green; font:weight:bolder;" /> </td>

					</tr>
					<tr>
						<td> &nbsp 	</td>
					</tr>	
					<tr>	
						<td>
							<?php include("fb_files/fb_home/singup/error_singup.php");?>
						</td>

					</tr>
			</table>
		</form>
		
	</div>
</body>
</html>		